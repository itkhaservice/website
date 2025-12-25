<?php
$localhost = 1;
$_SERVER['SERVER_NAME'] = 'localhost';
@define ( '_lib' , './lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";
$d = new database($config['database']);

echo "<h2>Cấu trúc Database hiện tại (khaservice_db)</h2>";

$d->query("SHOW TABLES");
$tables = $d->result_array();

foreach($tables as $t){
    $tableName = array_values($t)[0];
    if(strpos($tableName, 'table_') !== 0) continue; // Chỉ xem các bảng của project mới

    echo "<h4>Bảng: $tableName</h4>";
    $d->query("DESCRIBE `$tableName`");
    $columns = $d->result_array();
    
    echo "<table border='1' cellpadding='5' style='border-collapse:collapse; font-size:12px; margin-bottom:20px;'>";
    echo "<tr style='background:#eee;'><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    foreach($columns as $col){
        echo "<tr>";
        echo "<td><b>{$col['Field']}</b></td>";
        echo "<td>{$col['Type']}</td>";
        echo "<td>{$col['Null']}</td>";
        echo "<td>{$col['Key']}</td>";
        echo "<td>{$col['Default']}</td>";
        echo "<td>{$col['Extra']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>