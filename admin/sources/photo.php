<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "slider";

switch($type){
    case 'slider': $title_main = "Slider Trang chủ"; break;
    case 'doi-tac': $title_main = "Đối tác"; break;
    default: $title_main = "Hình ảnh"; break;
}

switch($act){
    case "man":
        get_items();
        $template = "photo/items";
        break;
    case "add":
        $template = "photo/item_add";
        break;
    case "edit":
        get_item();
        $template = "photo/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    default:
        get_items();
        $template = "photo/items";
}

function get_items(){
    global $d, $items, $type;
    
    $d->reset();
    $sql = "select * from #_photo where type='$type' order by stt asc, id desc";
    $d->query($sql);
    $items = $d->result_array();
}

function get_item(){
    global $d, $item;
    $id = isset($_GET['id']) ? (int)$_GET['id'] : "";
    if(!$id)
        transfer("Không tìm thấy dữ liệu", "index.php?com=photo&act=man&type=".$_GET['type']);
    
    $d->reset();
    $sql = "select * from #_photo where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man&type=".$_GET['type']);
    $item = $d->fetch_array();
}

function save_item(){
    global $d, $type;
    
    $file_name = fns_Rand_digit(0,9,12);
    
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man&type=".$type);
    
    $id = isset($_POST['id']) ? (int)$_POST['id'] : "";
    
    $data['ten_vi'] = $_POST['ten_vi'];
    $data['link'] = $_POST['link'];
    $data['mota_vi'] = $_POST['mota_vi'];
    $data['stt'] = $_POST['stt'];
    $data['type'] = $type;
    $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
    
    // Xử lý hình ảnh
    // Lưu ý: Đường dẫn upload có thể khác nhau tùy loại ảnh, nhưng tạm thời gom chung vào thư mục upload/hinhanh/
    $upload_path = _upload_hinhanh_l; 
    
    // Nếu là slider thì dùng path slider (nếu có config riêng)
    if($type == 'slider') $upload_path = _upload_hinhanh_l; // Dùng chung cho tiện
    
    if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPG|PNG', $upload_path, $file_name)){
        $data['photo'] = $upload_path . $photo;
        if($id){
            $d->reset();
            $d->query("select photo from #_photo where id='".$id."'");
            $row = $d->fetch_array();
            if($row['photo'] != "") @unlink($row['photo']);
        }
    }
    
    if($id){ // Cập nhật
        $d->reset();
        $d->setTable('photo');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=photo&act=man&type=".$type);
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man&type=".$type);
            
    }else{ // Thêm mới
        $data['ngaytao'] = time();
        $d->reset();
        $d->setTable('photo');
        if($d->insert($data))
            redirect("index.php?com=photo&act=man&type=".$type);
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man&type=".$type);
    }
}

function delete_item(){
    global $d, $type;
    
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        
        $d->reset();
        $d->query("select photo from #_photo where id='".$id."'");
        $row = $d->fetch_array();
        if($row['photo'] != "") @unlink($row['photo']);
        
        $d->reset();
        $d->setTable('photo');
        $d->setWhere('id', $id);
        if($d->delete())
            redirect("index.php?com=photo&act=man&type=".$type);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man&type=".$type);
    }else{
        transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man&type=".$type);
    }
}
?>