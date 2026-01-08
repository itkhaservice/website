<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "man";

switch($act){
    case "man":
        get_items();
        $template = "user/items";
        break;
    case "add":
        $template = "user/item_add";
        break;
    case "edit":
        get_item();
        $template = "user/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    default:
        $template = "index";
}

function get_items(){
    global $d, $items, $paging;
    
    if(!empty($_POST)){
        $multi=$_POST['del'];
        $id=$_POST['id'];
        if($multi){
            foreach($multi as $mt){
                $sql = "delete from #_user where id='".$mt."' and id<>'1'"; // Không xóa Super Admin ID 1
                $d->query($sql);
            }
        }
    }
    
    $d->reset();
    $sql = "select * from #_user where role >= 1 order by username";
    $d->query($sql);
    $items = $d->result_array();
}

function get_item(){
    global $d, $item;
    $id = isset($_GET['id']) ? (int)$_GET['id'] : "";
    if(!$id)
        transfer("Không tìm thấy dữ liệu", "index.php?com=user&act=man");
    
    $d->reset();
    $sql = "select * from #_user where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=user&act=man");
    $item = $d->fetch_array();
}

function save_item(){
    global $d;
    
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
    $id = isset($_POST['id']) ? (int)$_POST['id'] : "";
    
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['ten'] = $_POST['ten'];
    $data['role'] = (int)$_POST['role'];
    $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
    
    // Xử lý mật khẩu
    if($_POST['password'] != ""){
        // Sử dụng chuẩn bảo mật mới Bcrypt
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    
    if($id){ // Cập nhật
        $d->reset();
        $d->setTable('user');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=user&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=user&act=man");
    }else{ // Thêm mới
        // Kiểm tra trùng username
        $d->reset();
        $d->query("select id from #_user where username='".$data['username']."'");
        if($d->num_rows() > 0){
            transfer("Tài khoản đã tồn tại", "index.php?com=user&act=add");
        }
        
        if($_POST['password'] == ""){
            transfer("Chưa nhập mật khẩu", "index.php?com=user&act=add");
        }
        
        $d->reset();
        $d->setTable('user');
        if($d->insert($data))
            redirect("index.php?com=user&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=user&act=man");
    }
}

function delete_item(){
    global $d;
    
    if(isset($_GET['id'])){
        $id =  (int)$_GET['id'];
        
        // Không cho xóa chính mình hoặc Super Admin
        if($id == 1 || $id == $_SESSION['login']['id']){
            transfer("Không thể xóa tài khoản này", "index.php?com=user&act=man");
        }
        
        $d->reset();
        $sql = "delete from #_user where id='".$id."'";
        if($d->query($sql))
            redirect("index.php?com=user&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=user&act=man");
    }else{
        transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
    }
}
?>