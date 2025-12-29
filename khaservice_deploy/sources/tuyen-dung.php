<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // CHI TIẾT TUYỂN DỤNG (Theo ID hoặc Slug)
    $d->reset();
    $d->query("select * from #_tuyendung where (id='$id' or ten_khong_dau='$id') and hienthi=1");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php?com=tuyen-dung");
    }
    
    $title_bar = $row_detail['ten_vi'];
    $template = "tuyen-dung_detail";
    
    // Lấy các vị trí tuyển dụng khác
    $d->reset();
    $d->query("select id, ten_vi, ten_khong_dau, ngaytao from #_tuyendung where id<>'".$row_detail['id']."' and hienthi=1 order by stt asc, id desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // --- TRANG DANH SÁCH TUYỂN DỤNG ---
    $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 6;
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($page < 1) $page = 1;
    $startpoint = ($page * $per_page) - $per_page;

    // Đếm tổng số
    $d->reset();
    $d->query("select count(id) as num from #_tuyendung where hienthi=1");
    $row_num = $d->fetch_array();
    $total_items = $row_num['num'];
    $total_pages = ceil($total_items / $per_page);

    // Lấy dữ liệu
    $d->reset();
    $d->query("select * from #_tuyendung where hienthi=1 order by stt asc, id desc limit $startpoint, $per_page");
    $ds_tuyendung = $d->result_array();
    
    // Tạo mảng phân trang cho View
    $paging = array(
        'total' => $total_items,
        'per_page' => $per_page,
        'current' => $page,
        'last' => $total_pages,
        'url' => 'tuyen-dung.html'
    );
    
    $title_bar = "Tuyển dụng";
    $template = "tuyen-dung";
}
?>