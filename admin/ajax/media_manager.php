<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');

if (!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$root_path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'upload';
$root_path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $root_path);

if (!file_exists($root_path)) mkdir($root_path, 0755, true);

$action = $_GET['act'] ?? 'list';
$dir = $_GET['dir'] ?? '';
$dir = str_replace(['..', './'], '', $dir);
$dir = trim($dir, '/\\');

$target_dir = $root_path;
if ($dir !== '') {
    $target_dir .= DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir);
}

if (!file_exists($target_dir)) mkdir($target_dir, 0755, true);

function formatSize($bytes) {
    if ($bytes >= 1073741824) return number_format($bytes / 1073741824, 2) . ' GB';
    if ($bytes >= 1048576) return number_format($bytes / 1048576, 2) . ' MB';
    if ($bytes >= 1024) return number_format($bytes / 1024, 2) . ' KB';
    return $bytes . ' bytes';
}

function deleteRecursive($path) {
    if (is_dir($path)) {
        foreach (scandir($path) as $item) {
            if ($item == '.' || $item == '..') continue;
            deleteRecursive($path . DIRECTORY_SEPARATOR . $item);
        }
        return rmdir($path);
    }
    return unlink($path);
}

function copyRecursive($src, $dst) {
    if (is_dir($src)) {
        @mkdir($dst, 0755, true);
        foreach (scandir($src) as $item) {
            if ($item == '.' || $item == '..') continue;
            copyRecursive($src . DIRECTORY_SEPARATOR . $item, $dst . DIRECTORY_SEPARATOR . $item);
        }
        return true;
    }
    return copy($src, $dst);
}

// 1. Upload
if ($action === 'upload' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
        $new_name = time() . '_' . rand(100, 999) . '.' . $ext;
        if (move_uploaded_file($file['tmp_name'], $target_dir . DIRECTORY_SEPARATOR . $new_name)) {
            echo json_encode(['status' => 1]);
        } else { echo json_encode(['status' => 0, 'msg' => 'Lỗi lưu file']); }
    } else { echo json_encode(['status' => 0, 'msg' => 'Định dạng không hỗ trợ']); }
    exit;
}

// 2. Xóa
if ($action === 'delete' && isset($_POST['file'])) {
    $path = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['file']);
    if (file_exists($path)) {
        if (deleteRecursive($path)) echo json_encode(['status' => 1]);
        else echo json_encode(['status' => 0, 'msg' => 'Không thể xóa']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Không tìm thấy tệp']); }
    exit;
}

// 2b. Xóa nhiều
if ($action === 'delete_multiple' && isset($_POST['files'])) {
    $success = 0; $fail = 0;
    foreach ($_POST['files'] as $f) {
        $path = $target_dir . DIRECTORY_SEPARATOR . basename($f);
        if (file_exists($path) && deleteRecursive($path)) $success++; else $fail++;
    }
    echo json_encode(['status' => 1, 'success' => $success, 'fail' => $fail]);
    exit;
}

// 3. Tạo thư mục
if ($action === 'mkdir' && isset($_POST['name'])) {
    $name = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $_POST['name']);
    $name = trim($name);
    if ($name === '') die(json_encode(['status' => 0, 'msg' => 'Tên không hợp lệ']));
    $new_folder = $target_dir . DIRECTORY_SEPARATOR . $name;
    if (!file_exists($new_folder)) {
        if (mkdir($new_folder, 0755, true)) echo json_encode(['status' => 1]);
        else echo json_encode(['status' => 0, 'msg' => 'Lỗi tạo thư mục']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Thư mục đã tồn tại']); }
    exit;
}

// 4. Đổi tên
if ($action === 'rename' && isset($_POST['old_name'], $_POST['new_name'])) {
    $old = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['old_name']);
    $new = $target_dir . DIRECTORY_SEPARATOR . preg_replace('/[^a-zA-Z0-9_\-\.\s]/', '', $_POST['new_name']);
    if (file_exists($old) && !file_exists($new)) {
        if (rename($old, $new)) echo json_encode(['status' => 1]);
        else echo json_encode(['status' => 0, 'msg' => 'Lỗi đổi tên']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Không hợp lệ hoặc đã tồn tại']); }
    exit;
}

// 6. COPY / MOVE (Single & Multiple)
if (in_array($action, ['copy', 'move', 'copy_multiple', 'move_multiple'])) {
    $dest_rel = str_replace(['..', './'], '', $_POST['dest_dir'] ?? '');
    $dest_rel = trim($dest_rel, '/\\');
    $dest_path = $root_path . ($dest_rel !== '' ? DIRECTORY_SEPARATOR . $dest_rel : '');
    
    if (!file_exists($dest_path)) mkdir($dest_path, 0755, true);
    
    $items_to_process = isset($_POST['files']) ? $_POST['files'] : (isset($_POST['file']) ? [$_POST['file']] : []);
    $success = 0; $fail = 0;

    foreach ($items_to_process as $f) {
        $src = $target_dir . DIRECTORY_SEPARATOR . basename($f);
        $dst = $dest_path . DIRECTORY_SEPARATOR . basename($f);

        if (!file_exists($src)) { $fail++; continue; }
        
        // Tránh trùng tên
        if (file_exists($dst)) {
            $info = pathinfo(basename($f));
            $dst = $dest_path . DIRECTORY_SEPARATOR . $info['filename'] . '_' . time() . (isset($info['extension']) ? '.' . $info['extension'] : '');
        }

        if (strpos($action, 'copy') !== false) {
            if (copyRecursive($src, $dst)) $success++; else $fail++;
        } else {
            if (rename($src, $dst)) $success++; else $fail++;
        }
    }
    echo json_encode(['status' => 1, 'success' => $success, 'fail' => $fail]);
    exit;
}

// 5. Liệt kê
if ($action === 'list') {
    $items = scandir($target_dir);
    $folders = []; $files = [];
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $full = $target_dir . DIRECTORY_SEPARATOR . $item;
        $rel = trim(str_replace($root_path, '', $full), DIRECTORY_SEPARATOR);
        $rel = str_replace('\\', '/', $rel);
        $mtime = filemtime($full);
        if (is_dir($full)) {
            $folders[] = ['name' => $item, 'path' => $rel, 'date' => date('d/m/Y H:i', $mtime), 'timestamp' => $mtime, 'size' => '-'];
        } else {
            $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif','webp','svg'])) {
                $fsize = filesize($full);
                $files[] = [
                    'name' => $item, 'path' => $rel, 'url' => '../upload/' . $rel,
                    'size' => formatSize($fsize), 'size_bytes' => $fsize,
                    'date' => date('d/m/Y H:i', $mtime), 'timestamp' => $mtime
                ];
            }
        }
    }
    echo json_encode(['current_dir' => $dir, 'folders' => $folders, 'files' => $files]);
    exit;
}
?>