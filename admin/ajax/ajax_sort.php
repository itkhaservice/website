<?php
session_start();
error_reporting(0);

@define ( '_lib' , '../../lib/');
@define ( '_source' , '../../sources/');

// Check localhost
$localhost = 0;
if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') $localhost = 1;

include_once _lib."config.php";
include_once _lib."class.database.php";
include_once _lib."functions.php";

$d = new database($config['database']);

// Kiểm tra đăng nhập
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    die("0");
}

$table = isset($_POST['table']) ? (string)$_POST['table'] : "";
$listid = isset($_POST['listid']) ? $_POST['listid'] : null;

// Validate tên bảng để tránh SQL Injection cơ bản (chỉ cho phép chữ cái, số và gạch dưới)
if(!preg_match('/^[a-zA-Z0-9_]+$/', $table)){
    die("Invalid table");
}

if($table != "" && !empty($listid) && is_array($listid)){
    // Duyệt qua mảng ID gửi lên. 
    // Mảng này đã được sắp xếp theo thứ tự mới từ giao diện kéo thả
    $count = 1;
    foreach($listid as $id){
        $id = (int)$id;
        if($id > 0){
            $data['stt'] = $count;
            
            $d->reset();
            $d->setTable($table);
            $d->setWhere('id', $id);
            $d->update($data);
            
            $count++;
        }
    }
    echo "1";
} else {
    echo "0";
}
?>