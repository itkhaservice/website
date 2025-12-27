<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaservice_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Danh sách bảng cần xóa
$tables_to_drop = [
    'table_dulieu',
    'table_news_temp',
    'table_tinhtrang',
    'table_newsletter'
];

echo "Đang tiến hành dọn dẹp Database...\n";
echo "------------------------------------------\n";

foreach ($tables_to_drop as $table) {
    $sql = "DROP TABLE IF EXISTS `$table`";
    if ($conn->query($sql) === TRUE) {
        echo "✔ Đã xóa bảng: $table\n";
    } else {
        echo "✘ Lỗi khi xóa bảng $table: " . $conn->error . "\n";
    }
}

echo "------------------------------------------\n";
echo "Hoàn tất dọn dẹp.\n";

$conn->close();
?>
