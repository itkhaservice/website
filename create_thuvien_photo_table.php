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

$sql = "CREATE TABLE IF NOT EXISTS table_thuvien_photo (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_main int(11) DEFAULT NULL,
  photo varchar(255) DEFAULT NULL,
  stt int(11) DEFAULT '1',
  hienthi tinyint(1) DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if($d->query($sql)){
    echo "Thành công: Đã tạo bảng 'table_thuvien_photo'.\n";
} else {
    echo "Lỗi khi tạo bảng: " . mysql_error() . "\n";
}

echo "</pre>";
?>
