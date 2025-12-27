<?php
    define('_lib','./lib/');
    
    // Ép cấu hình Localhost
    $config['database']['servername'] = 'localhost';
    $config['database']['username'] = 'root';
    $config['database']['password'] = '';
    $config['database']['database'] = 'khaservice_db';
    $config['database']['refix'] = 'table_';
    
    include _lib."class.database.php";
    
    $d = new database($config['database']);
    
    echo "ID | Ten | Slug | Type | Photo\n";
    echo "--------------------------------------------------\n";
    
    // Kiểm tra bài viết ID=5 hoặc có slug liên quan
    $d->reset();
    $d->query("select id, ten_vi, ten_khong_dau, type, photo from table_news where id=5 OR ten_khong_dau='so-do-to-chuc-cong-ty'");
    $items = $d->result_array();
    
    foreach($items as $item) {
        echo "{$item['id']} | {$item['ten_vi']} | {$item['ten_khong_dau']} | {$item['type']} | {$item['photo']}\n";
    }
?>
