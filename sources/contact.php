<?php
if(!defined('_source')) die("Error");

$title_bar = "Liên hệ";

if(isset($_POST['btnContact'])){
    $data = [];
    $data['ten'] = (isset($_POST['name'])) ? addslashes($_POST['name']) : "";
    $data['email'] = (isset($_POST['email'])) ? addslashes($_POST['email']) : "";
    $data['dienthoai'] = (isset($_POST['phone'])) ? addslashes($_POST['phone']) : "";
    $data['noidung'] = (isset($_POST['message'])) ? addslashes($_POST['message']) : "";
    $data['ngaytao'] = time();
    $data['trangthai'] = 0; // Mới

    if($data['ten'] && $data['email']){
        $d->setTable('contact');
        if($d->insert($data)){
            transfer("Gửi liên hệ thành công! Chúng tôi sẽ sớm phản hồi.", "index.php");
        } else {
            transfer("Có lỗi xảy ra. Vui lòng thử lại.", "index.php?com=lien-he");
        }
    } else {
        transfer("Vui lòng điền đầy đủ thông tin.", "index.php?com=lien-he");
    }
}
?>