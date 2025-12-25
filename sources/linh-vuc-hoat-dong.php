<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // TRANG CHI TIẾT - Chấp nhận cả ID (số) hoặc Slug (chuỗi)
    $d->reset();
    if(is_numeric($id)) {
        $d->query("select * from #_news where type='dich-vu' and id='$id' and hienthi=1");
    } else {
        $d->query("select * from #_news where type='dich-vu' and ten_khong_dau='$id' and hienthi=1");
    }
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php");
    }
    
    $title_bar = $row_detail['ten_vi'];
    $template = "linh-vuc-hoat-dong_detail";
    
    // Lấy các dịch vụ khác (để làm phần Next/Prev hoặc liên quan)
    $d->reset();
    $d->query("select * from #_news where type='dich-vu' and id<>'$id' and hienthi=1 order by stt asc, id desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // TRANG DANH SÁCH
    $d->reset();
    $d->query("select * from #_news where type='dich-vu' and hienthi=1 order by stt asc, id desc");
    $ds_dichvu = $d->result_array();
    
    $title_bar = "Lĩnh vực hoạt động";
    $template = "linh-vuc-hoat-dong";
}
?>