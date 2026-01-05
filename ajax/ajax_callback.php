<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

@define ( '_template' , '../templates/');
@define ( '_source' , '../sources/');
@define ( '_lib' , '../lib/');

include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$topic = isset($_POST['topic']) ? htmlspecialchars($_POST['topic']) : '';

if($name == '' || $phone == ''){
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập họ tên và số điện thoại']);
    exit;
}

// Xử lý nội dung: Ưu tiên nội dung người dùng nhập (message), nếu không có thì dùng mẫu mặc định
$user_message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

if($user_message != ''){
    $content = $user_message;
} else {
    $content = "Yêu cầu gọi lại từ trang chủ.\n";
    if($topic){
        $content .= "Dịch vụ quan tâm: " . $topic;
    }
}

$data = array();
$data['ten'] = $name;
$data['email'] = $email;
$data['dienthoai'] = $phone;
$data['noidung'] = $content;
$data['ngaytao'] = time();
$data['trangthai'] = 0; // Trạng thái mới

$d->setTable('contact');
if($d->insert($data)){
    echo json_encode(['status' => 'success', 'message' => 'Gửi yêu cầu thành công! Chúng tôi sẽ liên hệ lại sớm.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
}
?>
