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

// --- TRASH CONFIGURATION ---
$trash_name = 'trash';
$trash_path = $root_path . DIRECTORY_SEPARATOR . $trash_name;
$meta_file = $trash_path . DIRECTORY_SEPARATOR . 'meta.json';

if (!file_exists($trash_path)) {
    mkdir($trash_path, 0755, true);
    // Security: Prevent direct web access to trash content if possible, though browser.php needs access via PHP proxy?
    // No, browser.php loads images via direct URL. So we CANNOT deny all.
    // However, we should probably hide listing. But for now, let's keep it accessible so images show up in Trash view.
    // file_put_contents($trash_path . DIRECTORY_SEPARATOR . '.htaccess', "Order deny,allow\nDeny from all");
}
// ---------------------------

$action = $_GET['act'] ?? 'list';
$dir = $_GET['dir'] ?? '';
$dir = str_replace(['..', './'], '', $dir);
$dir = trim($dir, '/\\');

$is_in_trash = ($dir === $trash_name);

$target_dir = $root_path;
if ($dir !== '') {
    $target_dir .= DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir);
}

if (!file_exists($target_dir)) mkdir($target_dir, 0755, true);

// --- HELPERS ---
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

// Trash Metadata Helpers
function getTrashMeta() {
    global $meta_file;
    if (file_exists($meta_file)) {
        $content = file_get_contents($meta_file);
        return json_decode($content, true) ?? [];
    }
    return [];
}

function saveTrashMeta($data) {
    global $meta_file;
    file_put_contents($meta_file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function moveToTrash($file_path, $original_rel_dir) {
    global $trash_path;
    $basename = basename($file_path);
    $dest = $trash_path . DIRECTORY_SEPARATOR . $basename;
    
    // Handle duplicate names in trash
    if (file_exists($dest)) {
        $info = pathinfo($basename);
        $basename = $info['filename'] . '_' . time() . (isset($info['extension']) ? '.' . $info['extension'] : '');
        $dest = $trash_path . DIRECTORY_SEPARATOR . $basename;
    }

    if (rename($file_path, $dest)) {
        $meta = getTrashMeta();
        $meta[$basename] = [
            'original_dir' => $original_rel_dir,
            'original_name' => basename($file_path),
            'deleted_at' => time()
        ];
        saveTrashMeta($meta);
        return true;
    }
    return false;
}

function restoreFromTrash($file_name) {
    global $trash_path, $root_path;
    $src = $trash_path . DIRECTORY_SEPARATOR . $file_name;
    if (!file_exists($src)) return false;

    $meta = getTrashMeta();
    $info = $meta[$file_name] ?? ['original_dir' => '', 'original_name' => $file_name];
    
    $dest_dir = $root_path;
    if (!empty($info['original_dir'])) {
        $dest_dir .= DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $info['original_dir']);
    }

    if (!file_exists($dest_dir)) mkdir($dest_dir, 0755, true);

    $dest_file = $dest_dir . DIRECTORY_SEPARATOR . $info['original_name'];
    
    // Handle duplicate names in restore destination
    if (file_exists($dest_file)) {
        $p = pathinfo($info['original_name']);
        $dest_file = $dest_dir . DIRECTORY_SEPARATOR . $p['filename'] . '_restored_' . time() . (isset($p['extension']) ? '.' . $p['extension'] : '');
    }

    if (rename($src, $dest_file)) {
        unset($meta[$file_name]);
        saveTrashMeta($meta);
        return true;
    }
    return false;
}

// ---------------------------

// 1. Upload
if ($action === 'upload' && isset($_FILES['file'])) {
    if ($is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Không thể tải lên vào thùng rác']));
    
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

// 2. Xóa (Soft delete OR Permanent delete)
if ($action === 'delete' && isset($_POST['file'])) {
    $file_name = basename($_POST['file']);
    $path = $target_dir . DIRECTORY_SEPARATOR . $file_name;
    
    if (file_exists($path)) {
        if ($is_in_trash) {
            // Permanent Delete
            if (deleteRecursive($path)) {
                // Cleanup meta if exists
                $meta = getTrashMeta();
                if (isset($meta[$file_name])) {
                    unset($meta[$file_name]);
                    saveTrashMeta($meta);
                }
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'msg' => 'Không thể xóa vĩnh viễn']);
            }
        } else {
            // Soft Delete (Move to Trash)
            if ($file_name === $trash_name && $dir === '') {
                echo json_encode(['status' => 0, 'msg' => 'Không thể xóa thùng rác']);
            } else {
                if (moveToTrash($path, $dir)) echo json_encode(['status' => 1]);
                else echo json_encode(['status' => 0, 'msg' => 'Lỗi khi chuyển vào thùng rác']);
            }
        }
    } else { echo json_encode(['status' => 0, 'msg' => 'Không tìm thấy tệp']); }
    exit;
}

// 2b. Xóa nhiều
if ($action === 'delete_multiple' && isset($_POST['files'])) {
    $success = 0; $fail = 0;
    $meta = ($is_in_trash) ? getTrashMeta() : [];
    
    foreach ($_POST['files'] as $f) {
        $file_name = basename($f);
        $path = $target_dir . DIRECTORY_SEPARATOR . $file_name;
        
        if (file_exists($path)) {
            if ($is_in_trash) {
                // Permanent
                if (deleteRecursive($path)) {
                    $success++;
                    if (isset($meta[$file_name])) unset($meta[$file_name]);
                } else $fail++;
            } else {
                // Soft
                if ($file_name === $trash_name && $dir === '') { $fail++; continue; }
                if (moveToTrash($path, $dir)) $success++; else $fail++;
            }
        } else $fail++;
    }
    
    if ($is_in_trash) saveTrashMeta($meta);
    echo json_encode(['status' => 1, 'success' => $success, 'fail' => $fail]);
    exit;
}

// 2c. Restore
if ($action === 'restore' && isset($_POST['file'])) {
    if (!$is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Chỉ có thể khôi phục từ thùng rác']));
    if (restoreFromTrash(basename($_POST['file']))) echo json_encode(['status' => 1]);
    else echo json_encode(['status' => 0, 'msg' => 'Lỗi khôi phục']);
    exit;
}

// 2d. Restore Multiple
if ($action === 'restore_multiple' && isset($_POST['files'])) {
    if (!$is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Chỉ có thể khôi phục từ thùng rác']));
    $success = 0; $fail = 0;
    foreach ($_POST['files'] as $f) {
        if (restoreFromTrash(basename($f))) $success++; else $fail++;
    }
    echo json_encode(['status' => 1, 'success' => $success, 'fail' => $fail]);
    exit;
}

// 3. Tạo thư mục
if ($action === 'mkdir' && isset($_POST['name'])) {
    if ($is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Không thể tạo thư mục trong thùng rác']));
    $name = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $_POST['name']);
    $name = trim($name);
    if ($name === '') die(json_encode(['status' => 0, 'msg' => 'Tên không hợp lệ']));
    if ($name === 'trash') die(json_encode(['status' => 0, 'msg' => 'Tên này được bảo lưu']));
    
    $new_folder = $target_dir . DIRECTORY_SEPARATOR . $name;
    if (!file_exists($new_folder)) {
        if (mkdir($new_folder, 0755, true)) echo json_encode(['status' => 1]);
        else echo json_encode(['status' => 0, 'msg' => 'Lỗi tạo thư mục']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Thư mục đã tồn tại']); }
    exit;
}

// 4. Đổi tên
if ($action === 'rename' && isset($_POST['old_name'], $_POST['new_name'])) {
    if ($is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Không thể đổi tên trong thùng rác']));
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
    if ($is_in_trash) die(json_encode(['status' => 0, 'msg' => 'Không thể sao chép/di chuyển trong thùng rác']));
    
    $dest_rel = str_replace(['..', './'], '', $_POST['dest_dir'] ?? '');
    $dest_rel = trim($dest_rel, '/\\');
    
    // Prevent moving INTO trash manually (use delete instead)
    if ($dest_rel === $trash_name) die(json_encode(['status' => 0, 'msg' => 'Sử dụng nút Xóa để chuyển vào thùng rác']));

    $dest_path = $root_path . ($dest_rel !== '' ? DIRECTORY_SEPARATOR . $dest_rel : '');
    
    if (!file_exists($dest_path)) mkdir($dest_path, 0755, true);
    
    $items_to_process = isset($_POST['files']) ? $_POST['files'] : (isset($_POST['file']) ? [$_POST['file']] : []);
    $success = 0; $fail = 0;

    foreach ($items_to_process as $f) {
        $basename = basename($f);
        if ($basename === $trash_name) { $fail++; continue; } // Cannot move trash folder

        $src = $target_dir . DIRECTORY_SEPARATOR . $basename;
        $dst = $dest_path . DIRECTORY_SEPARATOR . $basename;

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
    $meta = ($is_in_trash) ? getTrashMeta() : [];

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        if ($is_in_trash && ($item === 'meta.json' || $item === '.htaccess')) continue; // Hide system files in trash

        $full = $target_dir . DIRECTORY_SEPARATOR . $item;
        $rel = trim(str_replace($root_path, '', $full), DIRECTORY_SEPARATOR);
        $rel = str_replace('\\', '/', $rel);
        $mtime = filemtime($full);
        
        // Enhance trash info
        $original_path = '';
        if ($is_in_trash && isset($meta[$item])) {
            $original_path = $meta[$item]['original_dir'] . '/' . $meta[$item]['original_name'];
        }

        if (is_dir($full)) {
            $folders[] = [
                'name' => $item, 
                'path' => $rel, 
                'date' => date('d/m/Y H:i', $mtime), 
                'timestamp' => $mtime, 
                'size' => '-',
                'original_path' => $original_path
            ];
        } else {
            $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','gif','webp','svg'])) {
                $fsize = filesize($full);
                $files[] = [
                    'name' => $item, 
                    'path' => $rel, 
                    'url' => '../upload/' . $rel,
                    'size' => formatSize($fsize), 
                    'size_bytes' => $fsize,
                    'date' => date('d/m/Y H:i', $mtime), 
                    'timestamp' => $mtime,
                    'original_path' => $original_path
                ];
            }
        }
    }
    echo json_encode(['current_dir' => $dir, 'folders' => $folders, 'files' => $files, 'is_trash' => $is_in_trash]);
    exit;
}
?>