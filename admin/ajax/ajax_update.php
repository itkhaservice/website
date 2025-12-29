<?php
session_start();
@define ( '_lib' , '../../lib/');
@define ( '_IN_ADMIN' , true );

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
$field = (isset($_POST['field'])) ? addslashes($_POST['field']) : "hienthi"; // Mặc định là hienthi
$value = (isset($_POST['value'])) ? (int)$_POST['value'] : 0;

if($id > 0 && $table != ""){
    $d->reset();
    $d->setTable($table);
    $d->setWhere('id', $id);
    $data[$field] = $value;
    
    if($d->update($data)){
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>