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
$id = 43; // ID bài viết khách đang test
$d->query("select id, ten_vi, photo from table_duan where id=$id");
$row = $d->fetch_array();

echo "ID: " . $row['id'] . "\n";
echo "Ten: " . $row['ten_vi'] . "\n";
echo "Path in DB: '" . $row['photo'] . "'\n";

if(!empty($row['photo'])){
    if(file_exists($row['photo'])){
        echo "File EXISTS locally.\n";
    } else {
        echo "File NOT FOUND locally at: " . realpath($row['photo']) . "\n";
        if(file_exists("../". $row['photo'])){
             echo "Found if using ../ prefix.\n";
        }
    }
} else {
    echo "Photo field is EMPTY in DB.\n";
}

echo "</pre>";
?>
