<?php
if(!defined('_source')) die("Error");

$title_bar = "Thư viện ảnh";
$id = isset($_GET['id']) ? addslashes($_GET['id']) : "";

if($id != ""){
    // --- TRANG CHI TIẾT ALBUM ---
    $d->reset();
    $d->query("select * from #_thuvien where ten_khong_dau='$id' and hienthi=1");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)) {
        redirect("thu-vien-anh.html");
    }

    $title_bar = $row_detail['ten_vi'];
    $title_detail = $row_detail['ten_vi'];

    // Giả lập danh sách ảnh
    $ds_anh = array();
    $ds_anh[] = array('photo' => (!empty($row_detail['photo']) ? $row_detail['photo'] : 'img/service/1.png'), 'ten_vi' => $row_detail['ten_vi']);
    
    $template = "thuvienanh_detail";

} else {
    // --- TRANG DANH SÁCH ALBUM ---
    $d->reset();
    $d->query("select * from #_thuvien where hienthi=1 order by stt asc, id desc");
    $tintuc = $d->result_array();

    // Phân trang
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = "thu-vien-anh.html";
    $maxR = 12;
    $maxP = 5;
    $paging = paging($tintuc, $url, $curPage, $maxR, $maxP); 
    $tintuc = $paging['source'];
    $template = "thuvienanh";
}
?>