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
        $table_db = 'themanh'; $title_main = "Thế mạnh"; $folder_upload = 'themanh'; break;
    case 'giatri': 
        $table_db = 'giatri'; $title_main = "Giá trị cốt lõi"; $folder_upload = 'giatri'; break;
    case 'feedback': 
        $table_db = 'feedback'; $title_main = "Khách hàng nói gì"; $folder_upload = 'feedback'; break;
    case 'staff': 
        $table_db = 'staff'; $title_main = "Đội ngũ xuất sắc"; $folder_upload = 'nhanvien'; break;
    case 'dichvu': 
        $table_db = 'dichvu'; $title_main = "Dịch vụ"; $folder_upload = 'dichvu'; break;
    case 'appdancu': 
        $table_db = 'news'; $type = 'app-dan-cu'; $title_main = "Ứng dụng cư dân"; $folder_upload = 'news'; break;
    case 'thuvien': 
        $table_db = 'thuvien'; $type = 'thuvien-anh'; $title_main = "Thư viện ảnh"; $folder_upload = 'thuvien'; break;
    case 'du-an': 
        $table_db = 'duan'; $type = 'du-an'; $title_main = "Dự án"; $folder_upload = 'duan'; break;
    case 'gioi-thieu': 
        $table_db = 'gioithieu'; $type = 'gioi-thieu'; $title_main = "Giới thiệu"; $folder_upload = 'gioithieu'; break;
    case 'news': // tin-tuc
    default:
        if($type=='gioi-thieu'){
            $table_db = 'gioithieu'; 
            $title_main = "Giới thiệu";
            $folder_upload = 'gioithieu';
        } elseif($type=='tuyen-dung'){
            $table_db = 'tuyendung'; 
            $title_main = "Vị trí tuyển dụng";
            $folder_upload = 'tuyendung';
        } else {
            $table_db = 'news'; 
            if($type=='') $type = 'tin-tuc'; 
            $title_main = "Tin tức"; 
            $folder_upload = 'news';
        }
        break;
}

// Global variable for template use
$dir_upload = 'news'; // Default
if($com == 'thuvien') $dir_upload = 'thuvien';
elseif($com == 'du-an') $dir_upload = 'duan';
elseif($com == 'staff') $dir_upload = 'nhanvien';
elseif($com == 'themanh') $dir_upload = 'themanh';
elseif($com == 'giatri') $dir_upload = 'giatri';
elseif($com == 'feedback') $dir_upload = 'feedback';
elseif($com == 'dichvu') $dir_upload = 'dichvu';
elseif($type == 'gioi-thieu') $dir_upload = 'gioithieu';
elseif($type == 'tuyen-dung') $dir_upload = 'tuyendung';
elseif($com == 'appdancu') $dir_upload = 'news';

switch($act){
    case "man":
        get_items();
        $template = ($type=='gioi-thieu' || $type=='tuyen-dung') ? "gioithieu/items" : "news/items";
        break;
    case "add":
        if($com == 'du-an'){
            $d->reset();
            $d->query("select id, ten_vi from #_khuvuc order by stt asc, id desc");
            $regions = $d->result_array();
        }
        if($type == 'tin-tuc'){
            $d->reset();
            $d->query("select id, ten_vi from #_news_cat where type='$type' order by stt asc, id desc");
            $categories = $d->result_array();
        }
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
    global $d, $items, $type, $table_db, $paging, $curPage, $perPage, $regions, $com, $categories, $template, $source;
    
    // Lấy danh sách khu vực để lọc cho module dự án
    if($com == 'du-an'){
        $d->reset();
        $d->query("select id, ten_vi from #_khuvuc order by stt asc, id desc");
        $regions = $d->result_array();
    }

    // Lấy danh sách danh mục để lọc cho module tin tức
    if($type == 'tin-tuc'){
        $d->reset();
        $d->query("select id, ten_vi from #_news_cat where type='$type' order by stt asc, id desc");
        $categories = $d->result_array();
    }

    // Kiểm tra id_khuvuc nếu có
    if(isset($_GET['id_khuvuc']) && (int)$_GET['id_khuvuc'] > 0){
        $id_check = (int)$_GET['id_khuvuc'];
        $d->reset();
        $d->query("select id from #_khuvuc where id='$id_check'");
        if($d->num_rows() == 0) {
            $source = "404"; $template = "404"; return;
        }
    }

    // Kiểm tra id_cat nếu có
    if(isset($_GET['id_cat']) && (int)$_GET['id_cat'] > 0){
        $id_check = (int)$_GET['id_cat'];
        $d->reset();
        $d->query("select id from #_news_cat where id='$id_check'");
        if($d->num_rows() == 0) {
            $source = "404"; $template = "404"; return;
        }
    }

    // Xử lý phân trang
    $curPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($curPage < 1) $curPage = 1;
    
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 5;
    $startpoint = ($curPage * $perPage) - $perPage;
    
    $d->reset();
    $where = "";
    $where_table = "";
    if($com == 'du-an') $where_table = 'table_duan.';
    elseif($table_db == 'news') $where_table = 'table_news.';
    elseif($table_db == 'thuvien') $where_table = 'table_thuvien.';
    elseif($table_db == 'dichvu') $where_table = 'table_dichvu.';
    elseif($table_db == 'tuyendung') $where_table = 'table_tuyendung.';

    if($table_db == 'duan') $where = " where table_duan.type='$type'";

    // Xử lý tìm kiếm theo từ khóa
    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
        $keyword = addslashes($_GET['keyword']);
        $where .= ($where == "") ? " where " : " and ";
        $where .= " " . $where_table . "ten_vi LIKE '%$keyword%' ";
    }

    // Xử lý lọc theo khu vực (Dự án)
    if(isset($_GET['id_khuvuc']) && (int)$_GET['id_khuvuc'] > 0){
        $id_khuvuc = (int)$_GET['id_khuvuc'];
        $where .= ($where == "") ? " where " : " and ";
        $where .= " " . $where_table . "id_khuvuc = '$id_khuvuc' ";
    }

    // Xử lý lọc theo danh mục (Tin tức)
    if(isset($_GET['id_cat']) && (int)$_GET['id_cat'] > 0){
        $id_cat = (int)$_GET['id_cat'];
        $where .= ($where == "") ? " where " : " and ";
        $where .= " " . $where_table . "id_cat = '$id_cat' ";
    }

    // Xử lý lọc theo khoảng thời gian
    if(isset($_GET['tungay']) && $_GET['tungay'] != ''){
        $tungay = strtotime($_GET['tungay'] . ' 00:00:00');
        $where .= ($where == "") ? " where " : " and ";
        $where .= " " . $where_table . "ngaytao >= '$tungay' ";
    }
    if(isset($_GET['denngay']) && $_GET['denngay'] != ''){
        $denngay = strtotime($_GET['denngay'] . ' 23:59:59');
        $where .= ($where == "") ? " where " : " and ";
        $where .= " " . $where_table . "ngaytao <= '$denngay' ";
    }
    
    // Đếm tổng số bản ghi
    $d->query("select count(id) as num from #_$table_db $where");
    $row_count = $d->fetch_array();
    $total_items = $row_count['num'];
    
    // Lấy dữ liệu theo trang
    $d->reset();
    if($com == 'du-an'){
        $sql = "select #_duan.*, #_khuvuc.ten_vi as ten_khuvuc from #_duan left join #_khuvuc on #_duan.id_khuvuc = #_khuvuc.id $where order by #_duan.stt asc, #_duan.id asc limit $startpoint, $perPage";
    } elseif($table_db == 'news' && $type == 'tin-tuc') {
        $sql = "select #_news.*, #_news_cat.ten_vi as ten_danhmuc from #_news left join #_news_cat on #_news.id_cat = #_news_cat.id $where order by #_news.stt asc, #_news.id desc limit $startpoint, $perPage";
    } else {
        $sql = "select * from #_$table_db $where order by stt asc, id asc limit $startpoint, $perPage";
    }
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
    global $d, $item, $table_db, $regions, $categories, $gallery, $template, $source;
    $id = isset($_GET['id']) ? (int)$_GET['id'] : "";
    if(!$id) {
        $source = "404";
        $template = "404";
        return;
    }
    
    // Lấy danh sách khu vực nếu là module dự án
    if($_GET['com'] == 'du-an'){
        $d->reset();
        $d->query("select id, ten_vi from #_khuvuc order by stt asc, id desc");
        $regions = $d->result_array();
    }

    // Lấy danh sách danh mục nếu là module tin tức
    if($_GET['type'] == 'tin-tuc'){
        $d->reset();
        $d->query("select id, ten_vi from #_news_cat where type='tin-tuc' order by stt asc, id desc");
        $categories = $d->result_array();
    }

    $d->reset();
    $sql = "select * from #_$table_db where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) {
        $source = "404";
        $template = "404";
        return;
    }
    $item = $d->fetch_array();

    // Lấy danh sách ảnh Gallery cho Thư viện ảnh
    if($_GET['com'] == 'thuvien'){
        $d->reset();
        $d->query("select * from #_thuvien_photo where id_main='$id' order by stt asc, id desc");
        $gallery = $d->result_array();
    }
}

function save_item(){
    global $d, $type, $table_db, $com;
    
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=$com&act=man&type=$type");
    
    $id = isset($_POST['id']) ? (int)$_POST['id'] : "";
    
    $data['ten_vi'] = $_POST['ten_vi'];
    if(!in_array($table_db, ['feedback', 'themanh', 'giatri'])) {
        $data['ten_khong_dau'] = ($_POST['ten_khong_dau']!='') ? $_POST['ten_khong_dau'] : changeTitle($_POST['ten_vi']);
    }
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
    if(isset($_POST['id_khuvuc'])) $data['id_khuvuc'] = (int)$_POST['id_khuvuc'];
    if(isset($_POST['id_cat'])) $data['id_cat'] = (int)$_POST['id_cat'];
    
    // Xử lý ngày tháng nếu có
    if(isset($_POST['ngaytao']) && $_POST['ngaytao'] != '') {
        $data['ngaytao'] = strtotime($_POST['ngaytao']);
    }

    // Xử lý nổi bật cho các bảng có cột này
    if(in_array($table_db, ['news', 'duan', 'thuvien', 'gioithieu'])) {
        $data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
    }

    // Cột type chỉ dành cho bảng duan (vẫn còn dùng type)
    if($table_db == 'duan') {
        $data['type'] = $type;
    }

    // Xử lý hình ảnh đại diện
    $file_name = fns_Rand_digit(0,9,12);
    $upload_dir = ($com == 'thuvien') ? 'thuvien' : (($table_db == 'news') ? 'news' : $table_db);
    $upload_path_physical = '../upload/' . $upload_dir . '/';
    if (!file_exists($upload_path_physical)) mkdir($upload_path_physical, 0777, true);

    if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPG|PNG|webp|WEBP|jfif|JFIF', $upload_path_physical, $file_name)){
            $data['photo'] = 'upload/' . $upload_dir . '/' . $photo;
            if($id){
                $d->reset(); $d->query("select photo from #_$table_db where id='$id'");
                $row = $d->fetch_array();
                if($row['photo'] != "" && file_exists('../'.$row['photo'])) @unlink('../'.$row['photo']);
            }
        }
    } else {
        if(isset($_POST['photo_from_server']) && $_POST['photo_from_server'] != '') {
            $data['photo'] = str_replace('../', '', $_POST['photo_from_server']);
        }
    }

    $d->reset();
    $d->setTable($table_db);
    if($id){
        $data['ngaysua'] = time();
        $d->setWhere('id', $id);
        $d->update($data);
    }else{
        if(!isset($data['ngaytao'])) $data['ngaytao'] = time();
        $d->insert($data);
        $id = mysqli_insert_id($d->db);
    }

    // XỬ LÝ MULTI-PHOTO GALLERY (Cho Thư viện ảnh)
    if($com == 'thuvien' && $id > 0){
        // ... (phần code gallery)
        if (isset($_FILES['files'])) {
            for($i=0; $i<count($_FILES['files']['name']); $i++) {
                if ($_FILES['files']['name'][$i] != '') {
                    $_FILES['file_temp']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file_temp']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file_temp']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file_temp']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file_temp']['size'] = $_FILES['files']['size'][$i];
                    
                    $file_name_gallery = fns_Rand_digit(0,9,12) . "_" . $i;
                    if($photo_gallery = upload_image("file_temp", 'jpg|png|gif|jpeg|JPG|PNG|webp|WEBP|jfif|JFIF', $upload_path_physical, $file_name_gallery)){
                        $data_gallery['photo'] = 'upload/' . $upload_dir . '/' . $photo_gallery;
                        $data_gallery['id_main'] = $id;
                        $data_gallery['stt'] = (int)$_POST['stt_gallery'][$i];
                        $data_gallery['hienthi'] = 1;
                        $d->reset();
                        $d->setTable('thuvien_photo');
                        $d->insert($data_gallery);
                    }
                }
            }
        }

        // Xử lý ảnh chọn từ Server (Browser)
        if(isset($_POST['files_server']) && !empty($_POST['files_server'])){
            foreach($_POST['files_server'] as $key => $file_path){
                if($file_path != ''){
                    // Đường dẫn từ browser trả về thường là upload/..., ta cần đảm bảo nó sạch
                    $data_gallery_server['photo'] = str_replace('../', '', $file_path);
                    $data_gallery_server['id_main'] = $id;
                    $data_gallery_server['stt'] = (int)$_POST['stt_server'][$key];
                    $data_gallery_server['hienthi'] = 1;
                    
                    $d->reset();
                    $d->setTable('thuvien_photo');
                    $d->insert($data_gallery_server);
                }
            }
        }
        
        if(isset($_POST['delete_gallery']) && !empty($_POST['delete_gallery'])){
            foreach($_POST['delete_gallery'] as $id_gal){
                $d->reset(); $d->query("select photo from #_thuvien_photo where id='$id_gal'");
                $row_gal = $d->fetch_array();
                if($row_gal['photo'] != "" && file_exists('../'.$row_gal['photo'])) @unlink('../'.$row_gal['photo']);
                
                $d->reset();
                $d->setTable('thuvien_photo');
                $d->setWhere('id', $id_gal);
                $d->delete();
            }
        }
    }

    transfer("Lưu dữ liệu thành công", "index.php?com=$com&act=man&type=$type");
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
            transfer("Xóa dữ liệu thành công", "index.php?com=$com&act=man&type=$type");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=$com&act=man&type=$type");
    }else{
        transfer("Không nhận được dữ liệu", "index.php?com=$com&act=man&type=$type");
    }
}

function delete_all_item(){
    global $d, $type, $table_db, $com;
    $listid = explode(",",$_GET['listid']);
    $success = 0;
    foreach($listid as $id){
        $id = (int)$id;
        if($id > 0) {
            $d->reset(); $d->query("select photo from #_$table_db where id='$id'");
            $row = $d->fetch_array();
            if(!empty($row['photo']) && file_exists('../'.$row['photo'])) @unlink('../'.$row['photo']);
            
            $d->reset();
            $d->setTable($table_db);
            $d->setWhere('id', $id);
            if($d->delete()) $success++;
        }
    }
    transfer("Đã xóa thành công $success mục", "index.php?com=$com&act=man&type=$type");
}
?>