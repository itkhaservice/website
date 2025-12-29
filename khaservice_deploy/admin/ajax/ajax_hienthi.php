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
$table = (isset($_POST['table'])) ? addslashes($_POST['table']) : "";
$value = (isset($_POST['value'])) ? (int)$_POST['value'] : 0;

if($id > 0 && $table != ""){
    $d->reset();
    $d->setTable($table);
    $d->setWhere('id', $id);
    $data['hienthi'] = $value;
    
    if($d->update($data)){
        echo "1";
    } else {
        // Log lỗi ra file để debug nếu cần
        // error_log("AJAX Update Fail: Table $table, ID $id");
        echo "0";
    }
} else {
    echo "0";
}
?>