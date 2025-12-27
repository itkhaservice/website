<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaservice_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = "table_news";
$sql = "SHOW COLUMNS FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Cấu trúc bảng '$table':\n";
    echo "-----------------------\n";
    while($row = $result->fetch_assoc()) {
        echo $row["Field"] . " - " . $row["Type"] . "\n";
    }
} else {
    echo "Không tìm thấy bảng $table";
}
$conn->close();
?>