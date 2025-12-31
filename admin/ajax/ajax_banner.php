<?php
session_start();
@define ( '_lib' , '../../lib/');
@define ( '_IN_ADMIN' , true );

// Giả lập môi trường cho config
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';

if (file_exists(_lib."config.php")) {
    include_once _lib."config.php";
    include_once _lib."class.database.php";
} else {
    die("0");
}

// Kiểm tra đăng nhập
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    die("0");
}

$d = new database($config['database']);

$id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
$type = (isset($_POST['type'])) ? addslashes($_POST['type']) : "";
$value = (isset($_POST['value'])) ? (int)$_POST['value'] : 0;

if($id > 0 && $type != ""){
    // Nếu bật hiển thị banner này (value = 1), thì tắt tất cả các banner khác cùng type
    /* Logic cũ: Chỉ cho phép 1 banner hiển thị
    if($value == 1) {
        $d->reset();
        $sql = "UPDATE #_photo SET hienthi = 0 WHERE type = '$type'";
        $d->query($sql);
    }
    */
    
    // Cập nhật trạng thái cho banner hiện tại
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('id', $id);
    $data['hienthi'] = $value;
    
    if($d->update($data)){
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>