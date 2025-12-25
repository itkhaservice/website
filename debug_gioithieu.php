<?php
    $conn = new mysqli('localhost', 'root', '', 'khaservice_db');
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $result = $conn->query("SELECT id, ten_vi, hienthi FROM table_gioithieu");
    echo "Danh sach bai viet trong table_gioithieu:\n";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Ten: " . $row['ten_vi'] . " - Hien thi: " . $row['hienthi'] . "\n";
    }
    $conn->close();
?>