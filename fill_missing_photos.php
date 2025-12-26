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

// Danh sách các ảnh có sẵn trong project để làm mẫu
$sample_photos = [
    'img/portfolio/1.jpg',
    'img/portfolio/2.jpg',
    'img/portfolio/3.jpg',
    'img/portfolio/4.jpg',
    'img/portfolio/5.jpg',
    'img/portfolio/6.jpg'
];

// Lấy các dự án đang thiếu ảnh
$d->query("select id from table_duan where photo='' or photo IS NULL");
$rows = $d->result_array();

foreach($rows as $k => $v){
    $random_photo = $sample_photos[$k % count($sample_photos)];
    $d->query("update table_duan set photo='$random_photo' where id=".$v['id']);
    echo "Dự án ID ".$v['id'].": Đã gán ảnh mẫu '$random_photo'\n";
}

echo "\nHoàn tất gán ảnh mẫu cho các dự án thiếu ảnh.";
echo "</pre>";
?>