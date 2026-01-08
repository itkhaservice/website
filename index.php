<?php
$time_start = microtime(true); // Đo hiệu năng
session_start();
error_reporting(E_ALL ^ E_NOTICE);

@define ( '_template' , './templates/');
@define ( '_source' , './sources/');
@define ( '_lib' , './lib/');
@define ( '_ajax_folder' , './ajax/' );
@define ( '_upload_folder' , './media/upload/' );

// --- CACHE ENGINE START ---
$cache_time = 600; // 10 phút
$cache_path = './upload/trash/cache/';
if (!is_dir($cache_path)) @mkdir($cache_path, 0777, true);
$cache_file = $cache_path . md5($_SERVER['REQUEST_URI']) . '.html';

// Check localhost
$localhost = 0;
if($_SERVER['SERVER_NAME'] == 'localhost') $localhost = 1;

// Chỉ cache trang GET và không có thông báo chuyển trang
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_SESSION['transfer_msg'])) {
    if (file_exists($cache_file) && (time() - $cache_time < filemtime($cache_file))) {
        echo file_get_contents($cache_file);
        echo "<!-- Cached at " . date('H:i:s', filemtime($cache_file)) . " | Processed in " . round(microtime(true) - $time_start, 4) . "s -->";
        exit;
    }
    ob_start();
}
// --- CACHE ENGINE END ---

include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";

if(!isset($_GET['lang']))
    $_GET['lang'] = 'vi';
$lang = $_GET['lang'];

include_once _source."lang_$lang.php";

include_once _lib."class.database.php";

$d = new database($config['database']);

// Lấy thông tin Setting
$d->reset();
$d->query("select * from #_setting limit 0,1");
$row_setting = $d->fetch_array();

// Global Queries (Menu)
$d->reset();
$d->query("select ten_vi, ten_khong_dau, id from #_khuvuc where hienthi=1 order by stt asc");
$menu_khuvuc = $d->result_array();

$d->reset();
$d->query("select ten_vi, ten_khong_dau, id from #_dichvu where hienthi=1 and noibat=1 order by stt asc");
$menu_dichvu = $d->result_array();

$d->reset();
$d->query("select ten_vi, ten_khong_dau, id from #_news_cat where hienthi=1 and type='tin-tuc' order by stt asc");
$menu_news_cat = $d->result_array();

// Routing
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$template = "index";

// Lấy Banner Trang Con (Inner Banner) tùy theo COM
$banner_type = 'inner-banner'; // Mặc định là trang khác
switch($com){
    case 'gioi-thieu': $banner_type = 'banner-gioithieu'; break;
    case 'linh-vuc-hoat-dong':
    case 'dich-vu': $banner_type = 'banner-linhvuc'; break;
    case 'du-an': $banner_type = 'banner-duan'; break;
    case 'tin-tuc': $banner_type = 'banner-tintuc'; break;
    case 'tuyen-dung': $banner_type = 'banner-tuyendung'; break;
    case 'lien-he': $banner_type = 'banner-lienhe'; break;
    case 'thu-vien-anh': $banner_type = 'inner-banner'; break; // Hoặc tạo type riêng nếu cần
}

$d->reset();
$d->query("select photo from #_photo where type='$banner_type' and hienthi=1 order by stt asc, id desc limit 0,1");
$inner_banner = $d->fetch_array();

// Nếu trang cụ thể chưa có banner, lấy banner mặc định (inner-banner)
if(empty($inner_banner['photo']) && $banner_type != 'inner-banner'){
    $d->reset();
    $d->query("select photo from #_photo where type='inner-banner' and hienthi=1 order by stt asc, id desc limit 0,1");
    $inner_banner = $d->fetch_array();
}

$inner_banner_img = (!empty($inner_banner['photo'])) ? $inner_banner['photo'] : 'img/banner/inner-banner.jpg';

switch($com){
    case 'gioi-thieu':
        $source = "gioi-thieu";
        $template = "gioi-thieu";
        break;
    case 'linh-vuc-hoat-dong':
        $source = "linh-vuc-hoat-dong";
        $template = "linh-vuc-hoat-dong";
        break;
    case 'dich-vu':
        $source = "dich-vu";
        $template = "dich-vu";
        break;
    case 'du-an':
        $source = "du-an";
        $template = "du-an";
        break;
    case 'tin-tuc':
        $source = "tin-tuc";
        $template = "tin-tuc";
        break;
    case 'tuyen-dung':
        $source = "tuyen-dung";
        $template = "tuyen-dung";
        break;
    case 'thu-vien-anh':
        $source = "thuvienanh";
        $template = "thuvienanh"; // Cần kiểm tra file template này có tồn tại không
        break;
    case 'search':
        $source = "search";
        $template = "search";
        break;
    case 'lien-he':
        $source = "contact";
        $template = "contact";
        break;
    case 'thank-you':
        $source = "thankyou";
        $template = "thankyou";
        break;
    case '404':
        $source = "404";
        $template = "404";
        break;
    default:
        if($com != '') {
            $source = "404";
            $template = "404";
        } else {
            $source = "index";
            $template = "index";
        }
        break;
}

if($source != "" && file_exists(_source.$source.".php")) {
    include _source.$source.".php";
} else {
    $source = "404";
    $template = "404";
    if(file_exists(_source.$source.".php")) include _source.$source.".php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?=$base_url?>">
    <title><?=($title_bar!='')?$title_bar:$row_setting['title']?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?=($description_t!='')?$description_t:$row_setting['description']?>">
    <meta name="keywords" content="<?=($keywords_t!='')?$keywords_t:$row_setting['keywords']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Canonical -->
    <link rel="canonical" href="<?=getCurrentPageURL()?>" />
    
    <!-- Open Graph data -->
    <meta property="og:title" content="<?=($title_bar!='')?$title_bar:$row_setting['title']?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?=getCurrentPageURL()?>" />
    <meta property="og:image" content="<?=$base_url?><?=($row_detail['photo']!='')?$row_detail['photo']:$row_setting['logo']?>" />
    <meta property="og:description" content="<?=($description_t!='')?$description_t:$row_setting['description']?>" />
    <meta property="og:site_name" content="<?=$row_setting['ten_vi']?>" />

    <!-- Calling Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=($row_setting['logo']!='') ? $row_setting['logo'] : 'img/favicon.png'?>">
    
    <?php include _template . "layout/css.php"; ?>
</head>

<body>
    <?php include _template . "layout/header.php"; ?>
    
    <?php include _template . $template . "_tpl.php"; ?>

    <?php include _template . "layout/footer.php"; ?>

    <?php include _template . "layout/js.php"; ?>
</body>

</html>
<?php
// --- CACHE SAVE START ---
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_SESSION['transfer_msg'])) {
    $content = ob_get_contents();
    @file_put_contents($cache_file, $content);
    ob_end_flush();
}
echo "<!-- Processed in " . round(microtime(true) - $time_start, 4) . "s -->";
// --- CACHE SAVE END ---
?>