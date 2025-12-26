<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";
$cat_slug = (isset($_GET['type'])) ? addslashes($_GET['type']) : "";

if($id){
    // CHI TIẾT TIN TỨC (Hỗ trợ cả ID và Slug nếu cần, nhưng HTACCESS đang truyền id)
    $d->reset();
    if(is_numeric($id)) {
        $d->query("select * from #_news where id='$id' and hienthi=1");
    } else {
        $d->query("select * from #_news where ten_khong_dau='$id' and hienthi=1");
    }
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("index.php?com=tin-tuc");
    }
    
    // Cập nhật lượt xem
    $d->reset();
    $d->query("update #_news set luotxem=luotxem+1 where id='".$row_detail['id']."'");
    
    $title_bar = $row_detail['ten_vi'];
    $template = "tin-tuc_detail";
    
    // Tin liên quan
    $d->reset();
    $d->query("select * from #_news where id<>'".$row_detail['id']."' and hienthi=1 order by ngaytao desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // DANH SÁCH TIN TỨC (Có thể lọc theo danh mục)
    $where = " where hienthi=1 ";
    
    if($cat_slug != ""){
        $d->reset();
        $d->query("select id, ten_vi from #_news_cat where ten_khong_dau='$cat_slug' limit 0,1");
        $row_cat = $d->fetch_array();
        if(!empty($row_cat)){
            $where .= " and id_cat='".$row_cat['id']."' ";
            $title_bar = $row_cat['ten_vi'];
        }
    } else {
        $title_bar = "Tin tức";
    }

    $d->reset();
    $d->query("select * from #_news $where order by ngaytao desc");
    $ds_tintuc = $d->result_array();
    
    $template = "tin-tuc";
}

// Lấy danh sách tin mới nhất cho Sidebar
$d->reset();
$d->query("select * from #_news where hienthi=1 order by ngaytao desc limit 0,5");
$ds_sidebar = $d->result_array();
?>