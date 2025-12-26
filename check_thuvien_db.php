<?php
session_start();
define('_lib','./lib/');

$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'root';
$config['database']['password'] = '';
$config['database']['database'] = 'khaservice_db';
$config['database']['refix'] = 'table_';

@include _lib."class.database.php";
$d = new database($config['database']);

echo "<pre>";
// Kiểm tra bảng thuvien
$d->query("SHOW COLUMNS FROM table_thuvien");
echo "Bảng table_thuvien:\n";
print_r($d->result_array());

// Kiểm tra xem có bảng thuvien_photo (để lưu nhiều ảnh cho 1 album) không
$d->query("SHOW TABLES LIKE 'table_thuvien_photo'");
$check = $d->result_array();
if(!empty($check)){
    echo "\nBảng table_thuvien_photo tồn tại.\n";
    $d->query("SHOW COLUMNS FROM table_thuvien_photo");
    print_r($d->result_array());
} else {
    echo "\nBảng table_thuvien_photo KHÔNG tồn tại.\n";
}
echo "</pre>";
?>