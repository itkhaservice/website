<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "capnhat";

switch($act){
    case "capnhat":
        get_item();
        $template = "setting/item";
        break;
    case "save":
        save_item();
        break;
    default:
        $template = "index";
}

function get_item(){
    global $d, $item;
    $d->reset();
    $sql = "select * from #_setting limit 0,1";
    $d->query($sql);
    $item = $d->fetch_array();
}

function save_item(){
    global $d;
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
    
    $data['longName'] = $_POST['longName'];
    $data['nationalName'] = $_POST['nationalName'];
    $data['shortName'] = $_POST['shortName'];
    $data['diachi_vi'] = $_POST['diachi_vi'];
    $data['taxCode'] = $_POST['taxCode'];
    $data['dienthoai'] = $_POST['dienthoai'];
    $data['hotline'] = $_POST['hotline'];
    $data['email'] = $_POST['email'];
    $data['fanpage'] = $_POST['fanpage'];
    $data['tiktok'] = $_POST['tiktok'];
    $data['youtube'] = $_POST['youtube'];
    $data['youtubeInfo'] = $_POST['youtubeInfo'];
    $data['video_intro'] = $_POST['video_intro'];
    $data['google_map'] = $_POST['google_map'];
    $data['description'] = $_POST['description'];
    
    // Xử lý hình ảnh
    $file_name = fns_Rand_digit(0,9,12);
    $upload_path_physical = '../upload/caidat/';
    if (!file_exists($upload_path_physical)) mkdir($upload_path_physical, 0777, true);

    // Xử lý Logo vuông (dùng làm favicon)
    if(isset($_FILES['logo_file']) && $_FILES['logo_file']['name'] != ''){
        if($photo = upload_image("logo_file", 'jpg|png|gif|jpeg|JPG|PNG|ico|ICO', $upload_path_physical, $file_name.'_v')){
            $data['logo'] = 'upload/caidat/' . $photo;
        }
    } else {
        if(isset($_POST['logo_from_server']) && $_POST['logo_from_server'] != '') {
            $data['logo'] = str_replace('../', '', $_POST['logo_from_server']);
        }
    }

    // Xử lý Logo ngang
    if(isset($_FILES['logoRectangle_file']) && $_FILES['logoRectangle_file']['name'] != ''){
        if($photo = upload_image("logoRectangle_file", 'jpg|png|gif|jpeg|JPG|PNG', $upload_path_physical, $file_name.'_n')){
            $data['logoRectangle'] = 'upload/caidat/' . $photo;
        }
    } else {
        if(isset($_POST['logoRectangle_from_server']) && $_POST['logoRectangle_from_server'] != '') {
            $data['logoRectangle'] = str_replace('../', '', $_POST['logoRectangle_from_server']);
        }
    }

    // Cap nhat luon ten_vi cho dong bo code cu
    $data['ten_vi'] = $_POST['longName'];
    
    $d->reset();
    $d->setTable('setting');
    if($d->update($data)){
        redirect("index.php?com=setting&act=capnhat");
    }else{
        transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
    }
}
?>