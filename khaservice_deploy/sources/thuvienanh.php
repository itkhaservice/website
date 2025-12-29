<?php
if(!defined('_source')) die("Error");

$title_bar = "Thư viện ảnh";
$id = isset($_GET['id']) ? addslashes($_GET['id']) : "";

if($id != ""){
    // --- TRANG CHI TIẾT ALBUM ---
    $d->reset();
    $where = "hienthi=1";
    if(is_numeric($id)) $where .= " and id='$id'";
    else $where .= " and ten_khong_dau='$id'";
    
    $d->query("select * from #_thuvien where $where");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)) {
        redirect("thu-vien-anh.html");
    }

    $title_bar = $row_detail['ten_vi'];
    
    // Lấy danh sách ảnh trong Album
    $d->reset();
    $d->query("select * from #_thuvien_photo where id_main='".$row_detail['id']."' and hienthi=1 order by stt asc, id desc");
    $ds_photo = $d->result_array();
    
    $template = "thuvienanh_detail";

} else {
    // --- TRANG DANH SÁCH ALBUM ---
    $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 9; // Số album trên 1 trang
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($page < 1) $page = 1;
    $startpoint = ($page * $per_page) - $per_page;

    // Đếm tổng số
    $d->reset();
    $d->query("select count(id) as num from #_thuvien where hienthi=1");
    $row_num = $d->fetch_array();
    $total_items = $row_num['num'];
    $total_pages = ceil($total_items / $per_page);

    // Lấy dữ liệu
    $d->reset();
    $d->query("select * from #_thuvien where hienthi=1 order by stt asc, id desc limit $startpoint, $per_page");
    $ds_thuvien = $d->result_array();
    
    // Tạo mảng phân trang cho View
    $paging = array(
        'total' => $total_items,
        'per_page' => $per_page,
        'current' => $page,
        'last' => $total_pages,
        'url' => 'thu-vien-anh.html'
    );
    
    $template = "thuvienanh";
}
?>