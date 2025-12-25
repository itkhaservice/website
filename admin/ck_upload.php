<?php
session_start();
// Kiểm tra đăng nhập admin
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    die(json_encode(['error' => ['message' => 'Unauthorized']]));
}

// Cấu hình đường dẫn upload
$dir = (isset($_GET['dir']) && $_GET['dir'] != '') ? $_GET['dir'] : 'news_content';
$upload_dir = '../upload/'.$dir.'/';
$upload_url = '../upload/'.$dir.'/'; // URL để hiển thị ảnh

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
    $file = $_FILES['upload'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($ext, $allowed)) {
        // Tạo tên file mới để tránh trùng lặp
        $new_name = time() . '_' . rand(1000, 9999) . '.' . $ext;
        $destination = $upload_dir . $new_name;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Lấy tên thư mục gốc của dự án (ví dụ /khaservi_khaserv/)
            $root_folder = str_replace('/admin/ck_upload.php', '', $_SERVER['PHP_SELF']);
            $final_url = $root_folder . '/upload/' . $dir . '/' . $new_name;
            $final_url = str_replace('//', '/', $final_url); // Fix double slashes

            echo json_encode([
                'uploaded' => 1,
                'fileName' => $new_name,
                'url' => $final_url
            ]);
        } else {
            echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Lỗi khi lưu file.']]);
        }
    } else {
        echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Định dạng file không hỗ trợ.']]);
    }
} else {
    echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Không có file được tải lên.']]);
}
?>