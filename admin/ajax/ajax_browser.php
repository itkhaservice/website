<?php
session_start();
// Bật báo lỗi để debug nếu cần, nhưng sẽ tắt ở cuối tệp để tránh hỏng JSON
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    header('Content-Type: application/json');
    die(json_encode(['error' => 'Unauthorized']));
}

// Sử dụng đường dẫn tuyệt đối dựa trên vị trí tệp hiện tại
$root_path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'upload';
$root_path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $root_path);

if(!file_exists($root_path)) mkdir($root_path, 0777, true);

$action = isset($_GET['act']) ? $_GET['act'] : 'list';
$dir = isset($_GET['dir']) ? str_replace(['..', './'], '', $_GET['dir']) : ''; 

// Xử lý đường dẫn mục tiêu
$target_dir = $root_path . ( $dir ? DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir) : '' );

if (!file_exists($target_dir)) {
    @mkdir($target_dir, 0777, true);
}

// 1. Upload File
if($action == 'upload' && isset($_FILES['file'])){
    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
        $new_name = time() . '_' . rand(100, 999) . '.' . $ext;
        if(move_uploaded_file($file['tmp_name'], $target_dir . DIRECTORY_SEPARATOR . $new_name)){
            echo 1;
        } else { echo 0; }
    } else { echo 0; }
    exit;
}

// 2. Xóa File hoặc Thư mục
if($action == 'delete' && isset($_POST['file'])){
    $path_to_delete = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['file']);
    if(file_exists($path_to_delete)){
        if(is_file($path_to_delete)) {
            if(@unlink($path_to_delete)) echo 1; else echo 0;
        } else if(is_dir($path_to_delete)) {
            if(@rmdir($path_to_delete)) echo 1; else echo 0;
        }
    } else { echo 0; }
    exit;
}

// 3. Tạo thư mục mới
if($action == 'mkdir' && isset($_POST['name'])){
    $folder_name = preg_replace('/[^a-zA-Z0-9_\-]/', '', $_POST['name']);
    $new_folder = $target_dir . DIRECTORY_SEPARATOR . $folder_name;
    if(!file_exists($new_folder)){
        if(mkdir($new_folder, 0777, true)) echo 1; else echo 0;
    } else { echo 0; }
    exit;
}

// 4. Đổi tên
if($action == 'rename' && isset($_POST['old_name']) && isset($_POST['new_name'])){
    $old_path = $target_dir . DIRECTORY_SEPARATOR . basename($_POST['old_name']);
    $new_folder_name = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $_POST['new_name']);
    $new_path = $target_dir . DIRECTORY_SEPARATOR . $new_folder_name;
    if(file_exists($old_path) && !file_exists($new_path)){
        if(rename($old_path, $new_path)) echo 1; else echo 0;
    } else { echo 0; }
    exit;
}

// 5. Liệt kê (List)
$items = scandir($target_dir);
$folders = [];
$files = [];

foreach ($items as $item) {
    if ($item == '.' || $item == '..') continue;
    
    $full_path = $target_dir . DIRECTORY_SEPARATOR . $item;
    
    // Tạo path tương đối để hiển thị
    $rel_path = trim(str_replace($root_path, '', $full_path), DIRECTORY_SEPARATOR);
    $rel_path = str_replace('\\', '/', $rel_path);

    if (is_dir($full_path)) {
        $folders[] = ['name' => $item, 'path' => $rel_path];
    } else {
        $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
            $files[] = ['name' => $item, 'path' => $rel_path, 'url' => '../upload/' . $rel_path];
        }
    }
}

header('Content-Type: application/json');
echo json_encode(['folders' => $folders, 'files' => $files, 'current_dir' => $dir]);
?>
