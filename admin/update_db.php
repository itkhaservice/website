<?php
session_start();
@define ( '_lib' , '../lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

// Thêm cột facebook_page_id vào bảng setting
$sql = "SHOW COLUMNS FROM #_setting LIKE 'facebook_page_id'";
$d->query($sql);
if($d->num_rows() == 0){
    $d->query("ALTER TABLE #_setting ADD `facebook_page_id` VARCHAR(50) DEFAULT NULL AFTER `fanpage`");
    echo "Đã thêm cột facebook_page_id thành công!<br>";
} else {
    echo "Cột facebook_page_id đã tồn tại.<br>";
}

// Thêm bảng log nếu chưa có
$sql = "SHOW TABLES LIKE '#_log'";
$d->query($sql);
if($d->num_rows() == 0){
    $sql_create = "CREATE TABLE `table_log` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `id_user` int(11) DEFAULT NULL,
      `username` varchar(100) DEFAULT NULL,
      `noidung` text COLLATE utf8mb4_unicode_ci,
      `module` varchar(50) DEFAULT NULL,
      `hanhdong` varchar(20) DEFAULT NULL,
      `ip` varchar(50) DEFAULT NULL,
      `ngaytao` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    $d->query($sql_create);
    echo "Đã tạo bảng table_log thành công!<br>";
} else {
    echo "Bảng table_log đã tồn tại.<br>";
}

echo "<hr>Cập nhật hoàn tất. Bạn có thể xóa file này.";
?>