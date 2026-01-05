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

if($email == ''){
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập email']);
    exit;
}

$content = "Đăng ký nhận tin từ website.";

$data = array();
$data['ten'] = $name;
$data['email'] = $email;
$data['noidung'] = $content;
$data['ngaytao'] = time();
$data['trangthai'] = 0; // Trạng thái mới

$d->setTable('contact');
if($d->insert($data)){
    // Gửi email thông báo
    $subject = "Thông báo: Đăng ký nhận tin mới từ website Khaservice";
    $body = "<h3>Có đăng ký nhận tin mới:</h3>";
    $body .= "<p><strong>Họ tên:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Ngày gửi:</strong> " . date('d/m/Y H:i:s') . "</p>";

    // Gửi đến IT
    mailSend_admin($body, $subject, 'it@khaservice.com.vn');

    echo json_encode(['status' => 'success', 'message' => 'Đăng ký thành công! Cảm ơn bạn.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
}
?>