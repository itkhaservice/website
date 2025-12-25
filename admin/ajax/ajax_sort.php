<?php
session_start();
@define ( '_lib' , '../../lib/');
@define ( '_IN_ADMIN' , true );

// Giả lập môi trường cho config
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';

include_once _lib."config.php";
include_once _lib."class.database.php";

if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true) die("0");

$d = new database($config['database']);

$table = isset($_POST['table']) ? addslashes($_POST['table']) : "";
$ids = isset($_POST['ids']) ? $_POST['ids'] : [];

if($table != "" && !empty($ids)){
    // Cập nhật số STT lần lượt 1, 2, 3... dựa trên mảng gửi lên
    foreach($ids as $index => $id){
        $new_stt = $index + 1;
        $d->reset();
        $d->setTable($table);
        $d->setWhere('id', (int)$id);
        $data['stt'] = $new_stt;
        $d->update($data);
    }
    echo "1";
} else {
    echo "0";
}
?>