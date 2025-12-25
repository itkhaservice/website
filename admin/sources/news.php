<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "man";
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "news";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";

// Tự động xác định Bảng và Tiêu đề dựa trên COM
$table_db = 'news'; // Default table

switch($com){
    case 'themanh': 
    case 'the-manh':
        $table_db = 'themanh'; $title_main = "Thế mạnh"; break;
    case 'giatri': 
        $table_db = 'giatri'; $title_main = "Giá trị cốt lõi"; break;
    case 'feedback': 
        $table_db = 'feedback'; $title_main = "Khách hàng nói gì"; break;
    case 'staff': 
        $table_db = 'staff'; $title_main = "Đội ngũ xuất sắc"; break;
    case 'dichvu': 
        $table_db = 'dichvu'; $title_main = "Dịch vụ"; break;
    case 'appdancu': 
        $table_db = 'news'; $type = 'app-dan-cu'; $title_main = "Ứng dụng cư dân"; break;
    case 'thuvien': 
        $table_db = 'news'; $type = 'thuvien-anh'; $title_main = "Thư viện ảnh"; break;
    case 'du-an': 
        $table_db = 'news'; $type = 'du-an'; $title_main = "Dự án"; break;
    case 'gioi-thieu': 
        $table_db = 'gioithieu'; $type = 'gioi-thieu'; $title_main = "Giới thiệu"; break;
    case 'news': // tin-tuc
    default:
        if($type=='gioi-thieu'){
            $table_db = 'gioithieu'; 
            $title_main = "Giới thiệu";
        } elseif($type=='tuyen-dung'){
            $table_db = 'tuyendung'; 
            $title_main = "Vị trí tuyển dụng";
        } else {
            $table_db = 'news'; 
            if($type=='') $type = 'tin-tuc'; 
            $title_main = "Tin tức"; 
        }
        break;
}

switch($act){
    case "man":
        get_items();
        $template = ($type=='gioi-thieu' || $type=='tuyen-dung') ? "gioithieu/items" : "news/items";
        break;
    case "add":
        $template = ($type=='gioi-thieu' || $type=='tuyen-dung') ? "gioithieu/item_add" : "news/item_add";
        break;
    case "edit":
        get_item();
        $template = ($type=='gioi-thieu' || $type=='tuyen-dung') ? "gioithieu/item_add" : "news/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    case "delete_all":
        delete_all_item();
        break;
    default:
        get_items();
        $template = ($type=='gioi-thieu' || $type=='tuyen-dung') ? "gioithieu/items" : "news/items";
}

function get_items(){
    global $d, $items, $type, $table_db, $paging, $curPage, $perPage;
    
    // Xử lý phân trang
    $curPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($curPage < 1) $curPage = 1;
    
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 5;
    $startpoint = ($curPage * $perPage) - $perPage;
    
    $d->reset();
    $where = "";
    if($table_db == 'news' && $type != "") $where = " where type='$type'";
    
    // Đếm tổng số bản ghi
    $d->query("select count(id) as num from #_$table_db $where");
    $row_count = $d->fetch_array();
    $total_items = $row_count['num'];
    
    // Lấy dữ liệu theo trang
    $sql = "select * from #_$table_db $where order by stt asc, id asc limit $startpoint, $perPage";
    $d->query($sql);
    $items = $d->result_array();
    
    // Tính tổng số trang
    $total_pages = ceil($total_items / $perPage);
    $paging = array(
        'total' => $total_items,
        'per_page' => $perPage,
        'current' => $curPage,
        'last' => $total_pages
    );
}

function get_item(){
    global $d, $item, $table_db;
    $id = isset($_GET['id']) ? (int)$_GET['id'] : "";
    if(!$id)
        transfer("Không tìm thấy dữ liệu", "index.php?com=".$_GET['com']."&act=man&type=".$_GET['type']);
    
    $d->reset();
    $sql = "select * from #_$table_db where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=".$_GET['com']."&act=man&type=".$_GET['type']);
    $item = $d->fetch_array();
}

function save_item(){
    global $d, $type, $table_db, $com;
    
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=$com&act=man&type=$type");
    
    $id = isset($_POST['id']) ? (int)$_POST['id'] : "";
    
    $data['ten_vi'] = $_POST['ten_vi'];
    if(isset($_POST['ten_khong_dau'])) $data['ten_khong_dau'] = ($_POST['ten_khong_dau']!='') ? $_POST['ten_khong_dau'] : changeTitle($_POST['ten_vi']);
    if(isset($_POST['mota_vi'])) $data['mota_vi'] = $_POST['mota_vi'];
    
    // Các trường chung
    if(isset($_POST['noidung_vi'])) $data['noidung_vi'] = $_POST['noidung_vi'];
    if(isset($_POST['stt'])) $data['stt'] = $_POST['stt'];
    $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
    
    // Các trường SEO
    if(isset($_POST['title'])) $data['title'] = $_POST['title'];
    if(isset($_POST['keywords'])) $data['keywords'] = $_POST['keywords'];
    if(isset($_POST['description'])) $data['description'] = $_POST['description'];
    
    // Các trường đặc thù
    if(isset($_POST['chucvu'])) $data['chucvu'] = $_POST['chucvu'];
    if(isset($_POST['rating'])) $data['rating'] = (int)$_POST['rating'];
    if(isset($_POST['id_cat'])) $data['id_cat'] = (int)$_POST['id_cat'];
    
    // Cột type chỉ dành cho bảng news
    if($table_db == 'news') {
        $data['type'] = $type;
        $data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
    }

    // Xử lý hình ảnh
    $file_name = fns_Rand_digit(0,9,12);
    
    // 1. Xác định đường dẫn vật lý để upload (Admin đang ở thư mục /admin/ nên cần ../)
    $upload_path_physical = '../upload/' . $table_db . '/';
    if (!file_exists($upload_path_physical)) mkdir($upload_path_physical, 0777, true);

    // 2. Ưu tiên file tải lên mới từ máy tính
    if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPG|PNG|webp|WEBP', $upload_path_physical, $file_name)){
            // Lưu vào DB đường dẫn tương đối tính từ gốc website
            $data['photo'] = 'upload/' . $table_db . '/' . $photo;
            
            if($id){
                $d->reset(); $d->query("select photo from #_$table_db where id='$id'");
                $row = $d->fetch_array();
                if($row['photo'] != "" && file_exists('../'.$row['photo'])) @unlink('../'.$row['photo']);
            }
        }
    } else {
        // 3. Nếu không tải file mới, kiểm tra ảnh chọn từ server (Browser)
        if(isset($_POST['photo_from_server']) && $_POST['photo_from_server'] != '') {
            // Đảm bảo không có ../ trong DB
            $data['photo'] = str_replace('../', '', $_POST['photo_from_server']);
        }
    }

    $d->reset();
    $d->setTable($table_db);
    if($id){
        $data['ngaysua'] = time();
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=$com&act=man&type=$type");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=$com&act=man&type=$type");
    }else{
        $data['ngaytao'] = time();

        if($d->insert($data))
            redirect("index.php?com=$com&act=man&type=$type");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=$com&act=man&type=$type");
    }
}

function delete_item(){
    global $d, $type, $table_db, $com;
    
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        
        $d->reset(); $d->query("select photo from #_$table_db where id='$id'");
        $row = $d->fetch_array();
        if($row['photo'] != "") @unlink($row['photo']);
        
        $d->reset();
        $d->setTable($table_db);
        $d->setWhere('id', $id);
        if($d->delete())
            redirect("index.php?com=$com&act=man&type=$type");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=$com&act=man&type=$type");
    }else{
        transfer("Không nhận được dữ liệu", "index.php?com=$com&act=man&type=$type");
    }
}

function delete_all_item(){
    global $d, $type, $table_db, $com;
    $listid = explode(",",$_GET['listid']);
    foreach($listid as $id){
        $id = (int)$id;
        $d->reset(); $d->query("select photo from #_$table_db where id='$id'");
        $row = $d->fetch_array();
        if($row['photo'] != "") @unlink($row['photo']);
        
        $d->reset();
        $d->setTable($table_db);
        $d->setWhere('id', $id);
        $d->delete();
    }
    redirect("index.php?com=$com&act=man&type=$type");
}
?>