<?php
    define('_lib','./lib/');
    // Cấu hình Localhost
    $config['database']['servername'] = 'localhost';
    $config['database']['username'] = 'root';
    $config['database']['password'] = '';
    $config['database']['database'] = 'khaservice_db';
    $config['database']['refix'] = 'table_';
    
    include _lib."class.database.php";
    $d = new database($config['database']);
    
    // Thêm cột noibat nếu chưa có
    $d->query("SHOW COLUMNS FROM table_gioithieu LIKE 'noibat'");
    if($d->num_rows() == 0) {
        $sql = "ALTER TABLE table_gioithieu ADD noibat TINYINT(1) DEFAULT 0 AFTER hienthi";
        if($d->query($sql)) {
            echo "Đã thêm cột 'noibat' vào bảng table_gioithieu thành công.";
            // Set mặc định bài ID=5 (Sơ đồ tổ chức) là nổi bật để test
            $d->query("UPDATE table_gioithieu SET noibat = 1 WHERE id = 5");
        } else {
            echo "Lỗi khi thêm cột.";
        }
    } else {
        echo "Cột 'noibat' đã tồn tại.";
    }
?>