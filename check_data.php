<?php
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';
@define ( '_lib' , './lib/');
@define ( '_ajax_folder' , './ajax/');

include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

echo "<h2>Kiểm tra dữ liệu table_themanh</h2>";

$d->reset();
$d->query("SELECT * FROM table_themanh");
$items = $d->result_array();

if(count($items) > 0){
    echo "Tìm thấy " . count($items) . " dòng dữ liệu.<br>";
    echo "<pre>";
    print_r($items);
    echo "</pre>";
} else {
    echo "Bảng table_themanh RỖNG!";
}
?>