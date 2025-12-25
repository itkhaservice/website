<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // CHI TIẾT TIN TỨC
    $d->reset();
    $d->query("select * from #_news where type='tin-tuc' and id='$id' and hienthi=1");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php?com=tin-tuc");
    }
    
    // Cập nhật lượt xem
    $d->reset();
    $d->query("update #_news set luotxem=luotxem+1 where id='$id'");
    
    $title_bar = $row_detail['ten_vi'];
    $template = "tin-tuc_detail";
    
    // Tin liên quan (cùng type, khác id)
    $d->reset();
    $d->query("select * from #_news where type='tin-tuc' and id<>'$id' and hienthi=1 order by ngaytao desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // DANH SÁCH TIN TỨC
    $d->reset();
    $d->query("select * from #_news where type='tin-tuc' and hienthi=1 order by ngaytao desc");
    $ds_tintuc = $d->result_array();
    
    $title_bar = "Tin tức";
    $template = "tin-tuc";
}

// Lấy danh sách tin mới nhất cho Sidebar (dùng chung cho cả 2 view)
$d->reset();
$d->query("select * from #_news where type='tin-tuc' and hienthi=1 order by ngaytao desc limit 0,5");
$ds_sidebar = $d->result_array();
?>