<?php
/**
 * =====================================================
 * IMAGE MANAGER - PHP API
 * =====================================================
 * YÊU CẦU:
 * - Duyệt & xem ảnh trong folder con (dir động)
 * - Upload ảnh vào folder hiện tại
 * - Tạo folder
 * - Đổi tên file / folder
 * - Xóa 1 hoặc nhiều file
 * - Hiển thị size, ngày tạo, ngày sửa
 * - Trả JSON cho frontend xử lý
 * =====================================================
 */

session_start();
error_reporting(0);
ini_set('display_errors', 0);

/* ================== AUTH ================== */
if (!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true) {
    header('Content-Type: application/json');
    die(json_encode(['error' => 'Unauthorized']));
}

/* ================== ROOT ================== */
// ROOT upload (GIỮ NGUYÊN như code bạn)
$root_path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'upload';
$root_path = realpath($root_path);

if (!$root_path) {
    die(json_encode(['error' => 'Root not found']));
}

/* ================== INPUT ================== */
$action = $_GET['act'] ?? 'list';
$dir = $_GET['dir'] ?? '';

/* Chống traversal nhưng vẫn cho folder con */
$dir = str_replace(['..'], '', $dir);
$dir = trim($dir, '/\\');

/* ================== TARGET DIR ================== */
$target_dir = $root_path;
if ($dir !== '') {
    $target_dir .= DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir);
}

$target_dir = realpath($target_dir) ?: $target_dir;

/* Không cho thoát root */
if (strpos($target_dir, $root_path) !== 0) {
    die(json_encode(['error' => 'Invalid directory']));
}

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

/* ================== HELPERS ================== */
function formatSize($bytes) {
    if ($bytes >= 1073741824) return round($bytes / 1073741824, 2) . ' GB';
    if ($bytes >= 1048576)  return round($bytes / 1048576, 2) . ' MB';
    if ($bytes >= 1024)     return round($bytes / 1024, 2) . ' KB';
    return $bytes . ' B';
}

/* ================== UPLOAD ================== */
if ($action === 'upload' && isset($_FILES['file'])) {
    header('Content-Type: application/json');

    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, ['jpg','jpeg','png','gif','webp','svg'])) {
        die(json_encode(['status' => 0, 'msg' => 'File không hỗ trợ']));
    }

    $new_name = time() . '_' . rand(100,999) . '.' . $ext;
    $dest = $target_dir . DIRECTORY_SEPARATOR . $new_name;

    if (move_uploaded_file($file['tmp_name'], $dest)) {
        echo json_encode(['status' => 1, 'name' => $new_name]);
    } else {
        echo json_encode(['status' => 0, 'msg' => 'Upload lỗi']);
    }
    exit;
}

/* ================== MKDIR ================== */
if ($action === 'mkdir' && isset($_POST['name'])) {
    header('Content-Type: application/json');

    $name = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $_POST['name']);
    $path = $target_dir . DIRECTORY_SEPARATOR . $name;

    if ($name === '') {
        die(json_encode(['status' => 0, 'msg' => 'Tên không hợp lệ']));
    }

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        echo json_encode(['status' => 1]);
    } else {
        echo json_encode(['status' => 0, 'msg' => 'Đã tồn tại']);
    }
    exit;
}

/* ================== RENAME ================== */
if ($action === 'rename') {
    header('Content-Type: application/json');

    $old = basename($_POST['old'] ?? '');
    $new = preg_replace('/[^a-zA-Z0-9_\-.\s]/', '', $_POST['new'] ?? '');

    $old_path = $target_dir . DIRECTORY_SEPARATOR . $old;
    $new_path = $target_dir . DIRECTORY_SEPARATOR . $new;

    if (file_exists($old_path) && !file_exists($new_path)) {
        rename($old_path, $new_path);
        echo json_encode(['status' => 1]);
    } else {
        echo json_encode(['status' => 0]);
    }
    exit;
}

/* ================== DELETE SINGLE ================== */
if ($action === 'delete' && isset($_POST['file'])) {
    header('Content-Type: application/json');

    $file = basename($_POST['file']);
    $path = $target_dir . DIRECTORY_SEPARATOR . $file;

    if (is_file($path)) unlink($path);
    elseif (is_dir($path)) rmdir($path);

    echo json_encode(['status' => 1]);
    exit;
}

/* ================== DELETE MULTIPLE ================== */
if ($action === 'delete_multiple' && isset($_POST['files'])) {
    header('Content-Type: application/json');

    $ok = 0; $fail = 0;
    foreach ($_POST['files'] as $f) {
        $p = $target_dir . DIRECTORY_SEPARATOR . basename($f);
        if (is_file($p) && unlink($p)) $ok++; else $fail++;
    }

    echo json_encode([
        'status' => 1,
        'success' => $ok,
        'fail' => $fail
    ]);
    exit;
}

/* ================== LIST ================== */
if ($action === 'list') {
    header('Content-Type: application/json');

    $folders = [];
    $files = [];

    foreach (scandir($target_dir) as $item) {
        if ($item === '.' || $item === '..') continue;

        $full = $target_dir . DIRECTORY_SEPARATOR . $item;
        $rel = trim(str_replace($root_path, '', $full), DIRECTORY_SEPARATOR);
        $rel = str_replace('\\', '/', $rel);

        if (is_dir($full)) {
            $folders[] = [
                'name' => $item,
                'path' => $rel,
                'date' => date('d/m/Y H:i', filemtime($full)),
                'size' => '-'
            ];
        } else {
            $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif','webp','svg'])) {
                $size = filesize($full);
                $files[] = [
                    'name' => $item,
                    'path' => $rel,
                    'url'  => '../upload/' . $rel, // ✅ XEM ẢNH FOLDER CON
                    'size' => formatSize($size),
                    'size_bytes' => $size,
                    'date' => date('d/m/Y H:i', filemtime($full)),
                    'timestamp' => filemtime($full)
                ];
            }
        }
    }

    echo json_encode([
        'current_dir' => $dir,
        'folders' => $folders,
        'files' => $files
    ]);
    exit;
}
