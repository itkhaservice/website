<?php
session_start();

// --- CUSTOM ERROR HANDLER ---
function customShutdownHandler() {
    $error = error_get_last();
    if ($error && ($error['type'] === E_ERROR || $error['type'] === E_PARSE || $error['type'] === E_CORE_ERROR || $error['type'] === E_COMPILE_ERROR)) {
        // Xóa output buffer hiện tại để tránh hiển thị HTML dở dang
        while (ob_get_level()) {
            ob_end_clean();
        }
        
        $error_msg = $error['message'] . " in " . $error['file'] . " on line " . $error['line'];
        
        // Include giao diện lỗi đẹp
        include 'templates/error_tpl.php';
        exit();
    }
}
register_shutdown_function('customShutdownHandler');
ob_start(); // Bắt đầu buffer để có thể clear nếu lỗi
// ----------------------------

@define ( '_IN_ADMIN' , true );
@define ( '_template' , './templates/');
@define ( '_source' , './sources/');
@define ( '_lib' , '../lib/'); // Trỏ ra thư mục lib của Khaservice_v5

// Check localhost
$localhost = 0;
if($_SERVER['SERVER_NAME'] == 'localhost') $localhost = 1;

include_once _lib."config.php";
include_once _lib."class.database.php";
include_once _lib."functions.php"; // Có thể cần sửa file này nếu nó chứa logic cũ quá nhiều

$d = new database($config['database']);

// Lấy thông tin Setting
$d->reset();
$d->query("select * from #_setting limit 0,1");
$row_setting = $d->fetch_array();

// Kiểm tra đăng nhập
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true){
    // Nếu chưa login thì include file login.php và exit
    include "login.php";
    exit();
}

$com = (isset($_GET['com'])) ? addslashes($_GET['com']) : "index";
$act = (isset($_GET['act'])) ? addslashes($_GET['act']) : "";

switch($com){
    case 'index':
    case 'dashboard':
        $source = "dashboard";
        $template = "dashboard";
        break;
    case 'static':
        $source = "static";
        $template = "static/item";
        break;
    case 'contact':
        $source = "contact";
        $template = "contact/items";
        break;
    case 'news':
    case 'tuyendung':
    case 'themanh':
    case 'giatri':
    case 'feedback':
    case 'staff':
    case 'dichvu':
    case 'appdancu':
    case 'thuvien':
    case 'du-an':
        $source = "news";
        $template = "news/items";
        break;
    case 'news_cat':
        $source = "news_cat";
        $template = "news_cat/items";
        break;
    case 'photo':
        $source = "photo";
        $template = "photo/items";
        break;
    case 'setting':
        $source = "setting";
        $template = "setting/item";
        break;
    case 'user':
        $source = "user";
        $template = "user/items";
        break;
    case 'log':
        $source = "log";
        $template = "log/items";
        break;
    case 'logout':
        unset($_SESSION['admin_logined']);
        header("Location: index.php");
        exit();
        break;
    default:
        $source = "404";
        $template = "404";
        break;
}

if($source != "" && file_exists(_source.$source.".php")) {
    include _source.$source.".php";
} else {
    $source = "404";
    $template = "404";
    include _source.$source.".php";
}

// Include Layout chính
include _template."layout.php";
?>