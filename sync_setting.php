<?php
    $conn = new mysqli('localhost', 'root', '');
    
    // 1. Cap nhat cau truc
    $cols = [
        'logo' => 'varchar(255)',
        'logoRectangle' => 'varchar(255)',
        'longName' => 'varchar(255)',
        'nationalName' => 'varchar(255)',
        'shortName' => 'varchar(255)',
        'taxCode' => 'varchar(50)',
        'tiktok' => 'varchar(255)',
        'youtubeInfo' => 'varchar(255)',
        'updated_at' => 'varchar(200)'
    ];
    
    foreach($cols as $col => $type) {
        $conn->query("ALTER TABLE khaservice_db.table_setting ADD COLUMN IF NOT EXISTS $col $type");
    }
    
    // 2. Dong bo du lieu (Lay ban ghi dau tien)
    $res = $conn->query("SELECT * FROM company_info.info LIMIT 0,1");
    if($res && $row = $res->fetch_assoc()) {
        $data = [
            'ten_vi' => $conn->real_escape_string($row['longName']),
            'longName' => $conn->real_escape_string($row['longName']),
            'nationalName' => $conn->real_escape_string($row['nationalName']),
            'shortName' => $conn->real_escape_string($row['shortName']),
            'diachi_vi' => $conn->real_escape_string($row['address']),
            'taxCode' => $conn->real_escape_string($row['taxCode']),
            'dienthoai' => $conn->real_escape_string($row['mobile']),
            'hotline' => $conn->real_escape_string($row['hotline']),
            'email' => $conn->real_escape_string($row['mail']),
            'fanpage' => $conn->real_escape_string($row['facebook']),
            'tiktok' => $conn->real_escape_string($row['tiktok']),
            'youtube' => $conn->real_escape_string($row['youtube']),
            'youtubeInfo' => $conn->real_escape_string($row['youtubeInfo']),
            'google_map' => $conn->real_escape_string($row['map']),
            'description' => $conn->real_escape_string($row['descript']),
            'logo' => $conn->real_escape_string($row['logo']),
            'logoRectangle' => $conn->real_escape_string($row['logoRectangle'])
        ];
        
        $fields = [];
        foreach($data as $k => $v) $fields[] = "$k = '$v'";
        
        $conn->query("UPDATE khaservice_db.table_setting SET " . implode(', ', $fields) . " WHERE id=1");
        echo "Dong bo du lieu thanh cong!";
    }
?>