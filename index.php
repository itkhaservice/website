<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

@define ( '_template' , './templates/');
@define ( '_source' , './sources/');
@define ( '_lib' , './lib/');
@define ( '_ajax_folder' , './ajax/' );
@define ( '_upload_folder' , './media/upload/' );

// Check localhost
$localhost = 0;
if($_SERVER['SERVER_NAME'] == 'localhost') $localhost = 1;

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

// Routing
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$template = "index";

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
    case 'lien-he':
        $source = "contact";
        $template = "contact";
        break;
    default:
        $source = "index";
        $template = "index";
        break;
}

if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=($title_bar!='')?$title_bar:$row_setting['title']?></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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