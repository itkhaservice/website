<?php
session_start();
@define ( '_lib' , '../lib/');

include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

$ten = (isset($_POST['ten'])) ? addslashes($_POST['ten']) : "";
$email = (isset($_POST['email'])) ? addslashes($_POST['email']) : "";
$dienthoai = (isset($_POST['dienthoai'])) ? addslashes($_POST['dienthoai']) : "";
$noidung = ""; // Để trống nội dung theo yêu cầu

if($ten != '' && $dienthoai != ''){
    $data['ten'] = $ten;
    $data['email'] = $email;
    $data['dienthoai'] = $dienthoai;
    $data['noidung'] = $noidung;
    $data['ngaytao'] = time();
    $data['trangthai'] = 0; // Trạng thái mới (chưa xem)

    $d->setTable('contact');
    if($d->insert($data)){
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>