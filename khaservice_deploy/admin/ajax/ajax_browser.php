<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    header('Content-Type: application/json');
    die(json_encode(['error' => 'Unauthorized']));
}

$root_path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'upload';
// Fix: Sử dụng dấu nháy kép cho backslash hoặc thoát chuỗi đúng cách
$root_path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $root_path);

if(!file_exists($root_path)) mkdir($root_path, 0777, true);

$action = isset($_GET['act']) ? $_GET['act'] : 'list';
$dir = isset($_GET['dir']) ? str_replace(['..', './'], '', $_GET['dir']) : ''; 
$dir = trim($dir, '/\\');

$target_dir = $root_path;
if ($dir !== '') {
    $target_dir .= DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir);
}

if (!file_exists($target_dir)) {
    @mkdir($target_dir, 0777, true);
}

function formatSizeUnits($bytes) {
    if ($bytes >= 1073741824) $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    elseif ($bytes >= 1048576) $bytes = number_format($bytes / 1048576, 2) . ' MB';
    elseif ($bytes >= 1024) $bytes = number_format($bytes / 1024, 2) . ' KB';
    elseif ($bytes > 1) $bytes = $bytes . ' bytes';
    elseif ($bytes == 1) $bytes = $bytes . ' byte';
    else $bytes = '0 bytes';
    return $bytes;
}

// 1. Upload File
if($action == 'upload' && isset($_FILES['file'])){
    header('Content-Type: application/json');
    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
        $new_name = time() . '_' . rand(100, 999) . '.' . $ext;
        if(move_uploaded_file($file['tmp_name'], $target_dir . DIRECTORY_SEPARATOR . $new_name)){
            echo json_encode(['status' => 1]);
        } else { echo json_encode(['status' => 0, 'msg' => 'Lỗi khi lưu file']); }
    } else { echo json_encode(['status' => 0, 'msg' => 'Định dạng không hỗ trợ']); }
    exit;
}

// 2. Xóa File hoặc Thư mục
if($action == 'delete' && isset($_POST['file'])){
    header('Content-Type: application/json');
    $path_to_delete = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['file']);
    if(file_exists($path_to_delete)){
        if(is_file($path_to_delete)) { 
            if(@unlink($path_to_delete)) echo json_encode(['status' => 1]); else echo json_encode(['status' => 0]);
        } else if(is_dir($path_to_delete)) {
            if(@rmdir($path_to_delete)) echo json_encode(['status' => 1]); else echo json_encode(['status' => 0, 'msg' => 'Thư mục không trống']);
        }
    } else { echo json_encode(['status' => 0]); }
    exit;
}

// 2b. Xóa nhiều
if($action == 'delete_multiple' && isset($_POST['files'])){
    header('Content-Type: application/json');
    $files_to_delete = $_POST['files'];
    $success = 0; $fail = 0;
    foreach($files_to_delete as $f){
        $path = $target_dir . DIRECTORY_SEPARATOR . basename($f);
        if(file_exists($path)){
            if(is_file($path)) { if(@unlink($path)) $success++; else $fail++; } 
            else if(is_dir($path)) { if(@rmdir($path)) $success++; else $fail++; }
        }
    }
    echo json_encode(['status' => 1, 'success' => $success, 'fail' => $fail]);
    exit;
}

// 3. Tạo thư mục mới
if($action == 'mkdir' && isset($_POST['name'])){
    header('Content-Type: application/json');
    $folder_name = preg_replace('/[^a-zA-Z0-9_\-s]/', '', $_POST['name']);
    $folder_name = trim($folder_name);
    if($folder_name == '') die(json_encode(['status' => 0, 'msg' => 'Tên không hợp lệ']));
    
    $new_folder = $target_dir . DIRECTORY_SEPARATOR . $folder_name;
    if(!file_exists($new_folder)){
        if(mkdir($new_folder, 0777, true)) echo json_encode(['status' => 1]); 
        else echo json_encode(['status' => 0, 'msg' => 'Lỗi hệ thống']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Tên thư mục đã tồn tại']); }
    exit;
}

// 4. Đổi tên
if($action == 'rename' && isset($_POST['old_name']) && isset($_POST['new_name'])){
    header('Content-Type: application/json');
    $old_path = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['old_name']);
    $new_name = preg_replace('/[^a-zA-Z0-9_\-.\s]/', '', $_POST['new_name']);
    $new_path = $target_dir . DIRECTORY_SEPARATOR . $new_name;
    if(file_exists($old_path) && !file_exists($new_path)){
        if(rename($old_path, $new_path)) echo json_encode(['status' => 1]); 
        else echo json_encode(['status' => 0, 'msg' => 'Lỗi khi đổi tên']);
    } else { echo json_encode(['status' => 0, 'msg' => 'Tên đã tồn tại hoặc không tìm thấy tệp']); }
    exit;
}

// 5. Liệt kê (List)
if($action == 'list') {
    $items = @scandir($target_dir);
    $folders = []; $files = [];
    if($items) {
        foreach ($items as $item) {
            if ($item == '.' || $item == '..') continue;
            $full_path = $target_dir . DIRECTORY_SEPARATOR . $item;
            $rel_path = trim(str_replace($root_path, '', $full_path), DIRECTORY_SEPARATOR);
            $rel_path = str_replace('\\', '/', $rel_path);
            $mtime = filemtime($full_path);
            if (is_dir($full_path)) {
                $folders[] = ['name' => $item, 'path' => $rel_path, 'date' => date('d/m/Y H:i', $mtime), 'timestamp' => $mtime, 'size' => '-'];
            } else {
                $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
                    $fsize = filesize($full_path);
                    $files[] = [
                        'name' => $item, 'path' => $rel_path, 'url' => '../upload/' . $rel_path,
                        'date' => date('d/m/Y H:i', $mtime), 'timestamp' => $mtime,
                        'size' => formatSizeUnits($fsize), 'size_bytes' => $fsize
                    ];
                }
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode(['folders' => $folders, 'files' => $files, 'current_dir' => $dir]);
    exit;
}
?>