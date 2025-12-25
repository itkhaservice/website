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
    
} else {
    // DANH SÁCH TUYỂN DỤNG
    $d->reset();
    $d->query("select * from #_tuyendung where hienthi=1 order by stt asc, id asc");
    $ds_tuyendung = $d->result_array();
    
    $title_bar = "Tuyển dụng";
    $template = "tuyen-dung";
}
?>