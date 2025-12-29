<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // TRANG CHI TIẾT - Chấp nhận cả ID (số) hoặc Slug (chuỗi)
    $d->reset();
    if(is_numeric($id)) {
        $d->query("select * from #_dichvu where id='$id' and hienthi=1");
    } else {
        $d->query("select * from #_dichvu where ten_khong_dau='$id' and hienthi=1");
    }
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php");
    }
    
    $title_bar = $row_detail['ten_vi'];
    $template = "linh-vuc-hoat-dong_detail";
    
    // Lấy các dịch vụ khác
    $d->reset();
    $d->query("select * from #_dichvu where id<>'$id' and hienthi=1 order by stt asc, id desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // --- TRANG DANH SÁCH DỊCH VỤ ---
    $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 8;
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($page < 1) $page = 1;
    $startpoint = ($page * $per_page) - $per_page;

    // Đếm tổng số
    $d->reset();
    $d->query("select count(id) as num from #_dichvu where hienthi=1");
    $row_num = $d->fetch_array();
    $total_items = $row_num['num'];
    $total_pages = ceil($total_items / $per_page);

    // Lấy dữ liệu
    $d->reset();
    $d->query("select * from #_dichvu where hienthi=1 order by stt asc, id desc limit $startpoint, $per_page");
    $ds_dichvu = $d->result_array();
    
    // Tạo mảng phân trang cho View
    $paging = array(
        'total' => $total_items,
        'per_page' => $per_page,
        'current' => $page,
        'last' => $total_pages,
        'url' => 'linh-vuc-hoat-dong.html'
    );
    
    $title_bar = "Lĩnh vực hoạt động";
    $template = "linh-vuc-hoat-dong";
}
?>