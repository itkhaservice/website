<?php
session_start();
@define ( '_lib' , '../../lib/');
@define ( '_IN_ADMIN' , true );

if (file_exists(_lib."config.php")) {
    include_once _lib."config.php";
    include_once _lib."class.database.php";
    include_once _lib."functions.php";
} else {
    die("0");
}

// Kiểm tra đăng nhập
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    die("0");
}

$d = new database($config['database']);

$id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
$table = (isset($_POST['table'])) ? addslashes($_POST['table']) : "";
$field = (isset($_POST['field'])) ? addslashes($_POST['field']) : "hienthi"; // Mặc định là hienthi
$value = (isset($_POST['value'])) ? (int)$_POST['value'] : 0;

if($id > 0 && $table != ""){
    // Lấy tên để ghi log
    $d->reset();
    $d->query("select * from #_$table where id = $id");
    $item_log = $d->fetch_array();
    $name_log = isset($item_log['ten_vi']) ? $item_log['ten_vi'] : (isset($item_log['username']) ? $item_log['username'] : "ID: $id");

    // Xử lý riêng cho trường hợp Banner (chỉ cho phép 1 cái hiển thị)
    if($table == 'photo' && $field == 'hienthi' && $value == 1) {
        if(isset($item_log['type']) && strpos($item_log['type'], 'banner') !== false) {
            $current_type = $item_log['type'];
            $d->query("update #_photo set hienthi = 0 where type = '$current_type'");
        }
    }

    $d->reset();
    $d->setTable($table);
    $d->setWhere('id', $id);
    $data[$field] = $value;
    
    if($d->update($data)){
        $action_name = ($value == 1) ? 'Hiện' : 'Ẩn';
        ghiLogAdmin("Cập nhật nhanh ($table)", $action_name, "$field: $name_log");
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>