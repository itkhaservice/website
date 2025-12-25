<?php
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';
@define ( '_lib' , './lib/');
@define ( '_ajax_folder' , './ajax/');

include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

echo "<h2>Check Query with Prefix</h2>";
echo "Prefix config: " . $config['database']['refix'] . "<br>";

$d->reset();
$sql = "select * from #_themanh";
echo "SQL: " . $sql . "<br>";
$d->query($sql);
$items = $d->result_array();

echo "Result count: " . count($items) . "<br>";
if(count($items) > 0){
    print_r($items[0]);
}
?>