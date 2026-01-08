<?php
session_start();
// Đường dẫn tới thư mục cache
$cache_path = '../upload/trash/cache/';

if (is_dir($cache_path)) {
    $files = glob($cache_path . '*'); // Lấy tất cả file trong thư mục
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file); // Xóa file
        }
    }
    echo "<h3>Đã xóa sạch bộ nhớ đệm (Cache) thành công!</h3>";
    echo "<p>Bây giờ bạn hãy quay lại <a href='../index.php'>Trang chủ</a> để kiểm tra giao diện mới.</p>";
} else {
    echo "Thư mục cache không tồn tại hoặc đã được xóa.";
}
?>