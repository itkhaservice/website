<?php
    $conn = new mysqli('localhost', 'root', '', 'khaservice_db');
    if ($conn->connect_error) die("Connection failed");

    $conn->query("ALTER TABLE table_static ADD COLUMN IF NOT EXISTS sl_khachhang int(11) DEFAULT 0");
    $conn->query("ALTER TABLE table_static ADD COLUMN IF NOT EXISTS sl_giaithuong int(11) DEFAULT 0");
    $conn->query("ALTER TABLE table_static ADD COLUMN IF NOT EXISTS sl_doitac int(11) DEFAULT 0");
    $conn->query("ALTER TABLE table_static ADD COLUMN IF NOT EXISTS mota_solieu text");

    echo "Cap nhat Database thanh cong!";
?>