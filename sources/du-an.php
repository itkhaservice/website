<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // TRANG CHI TIẾT DỰ ÁN
    $d->reset();
    $d->query("select * from #_news where type='du-an' and id='$id' and hienthi=1");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php");
    }
    
    $title_bar = $row_detail['ten_vi'];
    $template = "du-an_detail";
    
} else {
    // TRANG DANH SÁCH DỰ ÁN
    $d->reset();
    $d->query("select * from #_news where type='du-an' and hienthi=1 order by stt asc, id desc");
    $ds_duan = $d->result_array();
    
    $title_bar = "Dự án";
    $template = "du-an";
}
?>