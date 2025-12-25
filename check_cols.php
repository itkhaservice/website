<?php
    $conn = new mysqli('localhost', 'root', '', 'khaservice_db');
    $result = $conn->query("SHOW COLUMNS FROM table_gioithieu");
    while($row = $result->fetch_assoc()) {
        echo $row['Field'] . "\n";
    }
?>