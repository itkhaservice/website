<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";

if($id){
    // TRANG CHI TIẾT DỰ ÁN
    $d->reset();
    $d->query("select a.*, b.ten_vi as ten_khuvuc from #_duan a left join #_khuvuc b on a.id_khuvuc = b.id where a.id='$id' and a.hienthi=1");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php");
    }
    
    $title_bar = $row_detail['ten_vi'];
    $template = "du-an_detail";
    
} else {
    // TRANG DANH SÁCH DỰ ÁN
    $d->reset();
    $d->query("select #_duan.*, #_khuvuc.ten_vi as ten_khuvuc from #_duan left join #_khuvuc on #_duan.id_khuvuc = #_khuvuc.id where #_duan.hienthi=1 order by #_duan.stt asc, #_duan.id desc");
    $ds_duan = $d->result_array();
    
    $title_bar = "Dự án";
    $template = "du-an";
}
?>