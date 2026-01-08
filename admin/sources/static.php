<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "capnhat";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "gioi-thieu";

switch($type){
    case 've-chung-toi': $title_main = "Về chúng tôi"; break;
    case 'gioi-thieu': $title_main = "Giới thiệu"; break;
    case 'the-manh': $title_main = "Thế mạnh"; break;
    case 'giatri': $title_main = "Giá trị cốt lõi"; break;
    case 'tuyen-dung': $title_main = "Thông tin liên hệ tuyển dụng"; break;
    default: $title_main = "Trang tĩnh"; break;
}

switch($act){
    case "capnhat":
        get_item();
        $template = "static/item";
        break;
    case "save":
        save_item();
        break;
    default:
        $template = "index";
}

function get_item(){
    global $d, $item, $type;
    $d->reset();
    $sql = "select * from #_static where type='$type' limit 0,1";
    $d->query($sql);
    $item = $d->fetch_array();
}

function save_item(){
    global $d, $type;
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=static&act=capnhat&type=".$type);
    
    $file_name = fns_Rand_digit(0,9,12);

    $data['ten_vi'] = $_POST['ten_vi'];
    $data['mota_vi'] = $_POST['mota_vi'];
    $data['noidung_vi'] = $_POST['noidung_vi'];
    if(isset($_POST['video'])) $data['video'] = $_POST['video'];
    if(isset($_POST['sl_nhanvien'])) $data['sl_nhanvien'] = (int)$_POST['sl_nhanvien'];
    if(isset($_POST['sl_duan'])) $data['sl_duan'] = (int)$_POST['sl_duan'];
    if(isset($_POST['sl_canho'])) $data['sl_canho'] = (int)$_POST['sl_canho'];
    if(isset($_POST['sl_khachhang'])) $data['sl_khachhang'] = (int)$_POST['sl_khachhang'];
    if(isset($_POST['sl_giaithuong'])) $data['sl_giaithuong'] = (int)$_POST['sl_giaithuong'];
    if(isset($_POST['sl_doitac'])) $data['sl_doitac'] = (int)$_POST['sl_doitac'];
    if(isset($_POST['mota_solieu'])) $data['mota_solieu'] = $_POST['mota_solieu'];
    if(isset($_POST['mota_doitac'])) $data['mota_doitac'] = $_POST['mota_doitac'];
    if(isset($_POST['tamnhin'])) $data['tamnhin'] = $_POST['tamnhin'];
    if(isset($_POST['sumenh'])) $data['sumenh'] = $_POST['sumenh'];
    $data['type'] = $type;
    
    // Xử lý hình ảnh
    $upload_dir = '../upload/vechungtoi/';
    $upload_db = 'upload/vechungtoi/';
    
    if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

    if($photo = upload_image("file", 'JPG|PNG|GIF|JPEG', $upload_dir, $file_name)){
        $data['photo'] = $upload_db . $photo;
        // Xóa ảnh cũ
        $d->reset();
        $d->query("select photo from #_static where type='$type'");
        $row = $d->fetch_array();
        if($row['photo'] != "" && file_exists('../'.$row['photo'])) @unlink('../'.$row['photo']);
    } elseif(isset($_POST['photo_from_server']) && $_POST['photo_from_server'] != '') {
        $data['photo'] = $_POST['photo_from_server'];
    }

    $d->reset();
    $d->query("select id from #_static where type='$type'");
    if($d->num_rows() > 0){
        $d->setTable('static');
        $d->setWhere('type', $type);
        if($d->update($data)) {
            ghiLogAdmin('Trang tĩnh', 'Cập nhật', 'Loại: ' . $type);
        }
    }else{
        $d->setTable('static');
        if($d->insert($data)) {
            ghiLogAdmin('Trang tĩnh', 'Thêm mới', 'Loại: ' . $type);
        }
    }
    transfer("Cập nhật dữ liệu thành công", "index.php?com=static&act=capnhat&type=".$type);
}
?>