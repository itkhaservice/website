<?php
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';
define('_lib', './lib/');
@include_once _lib."config.php";
@include_once _lib."class.database.php";
$d = new database($config['database']);

echo "Checking table_static columns:\n";
$d->query("SHOW COLUMNS FROM table_static");
print_r($d->result_array());

echo "\nTesting SELECT query:\n";
$d->query("select id from table_static where type='ve-chung-toi'");
echo "Rows: " . $d->num_rows();
?>