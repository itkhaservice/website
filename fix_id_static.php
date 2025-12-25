<?php
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';
define('_lib', './lib/');
@include_once _lib."config.php";
@include_once _lib."class.database.php";
$d = new database($config['database']);

$sql = "ALTER TABLE table_static ADD COLUMN id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
if($d->query($sql)){
    echo "Success: Added 'id' column.\n";
} else {
    echo "Fail: " . mysql_error() . "\n";
}
?>
