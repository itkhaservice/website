<?php
session_start();
@define ( '_lib' , './lib/');
@define ( '_IN_ADMIN' , true );

// Giả lập môi trường
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';

include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

// Thêm cột mota_doitac vào bảng table_static
$sql = "ALTER TABLE `table_static` ADD `mota_doitac` TEXT NULL DEFAULT NULL AFTER `mota_solieu`;";

if($d->query($sql)){
    echo "Thêm cột mota_doitac thành công.<br>";
} else {
    echo "Lỗi thêm cột hoặc cột đã tồn tại.<br>";
}
?>