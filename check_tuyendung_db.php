<?php
    $conn = new mysqli('localhost', 'root', '', 'khaservice_db');
    $cols = [
        'ten_khong_dau' => 'varchar(255)',
        'photo' => 'varchar(255)',
        'mota_vi' => 'text',
        'noidung_vi' => 'text',
        'stt' => 'int(11) DEFAULT 1',
        'hienthi' => 'int(1) DEFAULT 1',
        'ngaytao' => 'int(11)',
        'ngaysua' => 'int(11)',
        'title' => 'varchar(255)',
        'keywords' => 'text',
        'description' => 'text'
    ];
    foreach($cols as $col => $type) {
        $conn->query("ALTER TABLE table_tuyendung ADD COLUMN IF NOT EXISTS $col $type");
    }
    echo "Check table_tuyendung done!";
?>