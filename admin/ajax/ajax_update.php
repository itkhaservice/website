<?php
session_start();
@define ( '_lib' , '../../lib/');
@define ( '_IN_ADMIN' , true );

if (file_exists(_lib."config.php")) {
    include_once _lib."config.php";
    include_once _lib."class.database.php";
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
    // Xử lý riêng cho trường hợp Banner (chỉ cho phép 1 cái hiển thị)
    if($table == 'photo' && $field == 'hienthi' && $value == 1) {
        $d->reset();
        $d->query("select type from #_photo where id = $id");
        $row_type = $d->fetch_array();
        if($row_type && strpos($row_type['type'], 'banner') !== false) {
            $current_type = $row_type['type'];
            $d->query("update #_photo set hienthi = 0 where type = '$current_type'");
        }
    }

    $d->reset();
    $d->setTable($table);
    $d->setWhere('id', $id);
    $data[$field] = $value;
    
    if($d->update($data)){
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>