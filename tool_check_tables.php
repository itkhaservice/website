<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaservice_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách bảng
$sql = "SHOW TABLES";
$result = $conn->query($sql);

echo "Danh sách các bảng trong database '$dbname':\n";
echo "------------------------------------------\n";

$count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        echo $row[0] . "\n";
        $count++;
    }
} else {
    echo "Không tìm thấy bảng nào.";
}
echo "------------------------------------------\n";
echo "Tổng cộng: $count bảng.\n";

$conn->close();
?>
