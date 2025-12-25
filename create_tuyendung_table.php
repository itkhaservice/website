<?php
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) die("Connection failed");

    // 1. Tạo bảng table_tuyendung
    $sql_create = "CREATE TABLE IF NOT EXISTS khaservice_db.table_tuyendung (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ten_vi` varchar(255) DEFAULT NULL,
      `ten_khong_dau` varchar(255) DEFAULT NULL,
      `photo` varchar(255) DEFAULT NULL,
      `mota_vi` text,
      `noidung_vi` text,
      `stt` int(11) DEFAULT '1',
      `hienthi` int(1) DEFAULT '1',
      `ngaytao` int(11) DEFAULT NULL,
      `ngaysua` int(11) DEFAULT NULL,
      `title` varchar(255) DEFAULT NULL,
      `keywords` text,
      `description` text,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
    $conn->query($sql_create);

    // 2. Xóa dữ liệu tạm đã lỡ chèn vào table_news trước đó
    $conn->query("DELETE FROM khaservice_db.table_news WHERE type='tuyen-dung'");

    // 3. Chuyển dữ liệu từ company_info.recruit sang table_tuyendung
    $conn->query("TRUNCATE TABLE khaservice_db.table_tuyendung");
    $result = $conn->query("SELECT * FROM company_info.recruit");
    
    if ($result && $result->num_rows > 0) {
        $count = 0;
        while($row = $result->fetch_assoc()) {
            $ten_vi = $conn->real_escape_string($row['name']);
            $noidung_vi = $conn->real_escape_string($row['description']);
            $mota_vi = $conn->real_escape_string("Địa điểm: " . $row['locate'] . "\nMức lương: " . $row['salary'] . "\nHạn nộp: " . $row['eta']);
            $hienthi = $row['status'];
            $stt = $count + 1;
            $ngaytao = time();
            
            $sql_ins = "INSERT INTO khaservice_db.table_tuyendung (ten_vi, mota_vi, noidung_vi, hienthi, ngaytao, stt) 
                        VALUES ('$ten_vi', '$mota_vi', '$noidung_vi', '$hienthi', '$ngaytao', '$stt')";
            $conn->query($sql_ins);
            $count++;
        }
        echo "Da tao bang table_tuyendung và chuyen $count ban ghi thanh cong!";
    }
    $conn->close();
?>