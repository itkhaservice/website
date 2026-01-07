<?php
if(!defined('_source')) die("Error");

$id = (isset($_GET['id'])) ? addslashes($_GET['id']) : "";
$cat_slug = (isset($_GET['type'])) ? addslashes($_GET['type']) : "";

if($id){
    // CHI TIẾT TIN TỨC
    $d->reset();
    $where = "hienthi=1 and ngaytao <= ".time();
    if(is_numeric($id)) $where .= " and id='$id'";
    else $where .= " and ten_khong_dau='$id'";
    
    $d->query("select * from #_news where $where");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("tin-tuc.html");
    }
    
    // Cập nhật lượt xem
    $d->query("update #_news set luotxem=luotxem+1 where id='".$row_detail['id']."'");
    
    $title_bar = $row_detail['ten_vi'];
    $title_t = $row_detail['title'];
    $keywords_t = $row_detail['keywords'];
    $description_t = $row_detail['description'];
    
    $template = "tin-tuc_detail";
    
    // Tin liên quan
    $d->reset();
    $d->query("select * from #_news where id<>'".$row_detail['id']."' and hienthi=1 and ngaytao <= ".time()." order by ngaytao desc limit 0,5");
    $ds_khac = $d->result_array();
    
} else {
    // DANH SÁCH TIN TỨC (Có thể lọc theo danh mục hoặc tìm kiếm)
    $where = " where n.hienthi=1 and n.ngaytao <= ".time()." ";
    
    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
        $keyword = addslashes($_GET['keyword']);
        $where .= " and n.ten_vi LIKE '%$keyword%'";
    }

    if($cat_slug != ""){
        $d->reset();
        $d->query("select id, ten_vi from #_news_cat where ten_khong_dau='$cat_slug' limit 0,1");
        $row_cat = $d->fetch_array();
        if(!empty($row_cat)){
            $where .= " and n.id_cat='".$row_cat['id']."' ";
            $title_bar = $row_cat['ten_vi'];
        }
    } else {
        $title_bar = "Tin tức";
    }

    // Xử lý phân trang
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($page < 1) $page = 1;
    $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 6;
    $startpoint = ($page * $per_page) - $per_page;

    // Đếm tổng số để phân trang
    $d->reset();
    $d->query("select count(n.id) as num from #_news n $where");
    $row_num = $d->fetch_array();
    $total_items = $row_num['num'];
    $total_pages = ceil($total_items / $per_page);

    $d->reset();
    $d->query("select n.id, n.ten_vi, n.ten_khong_dau, n.photo, n.mota_vi, n.ngaytao, n.luotxem, n.id_cat, c.ten_vi as ten_danhmuc from #_news n left join #_news_cat c on n.id_cat = c.id $where order by n.ngaytao desc limit $startpoint, $per_page");
    $ds_tintuc = $d->result_array();
    
    // Tạo mảng phân trang cho View
    $paging = array(
        'total' => $total_items,
        'per_page' => $per_page,
        'current' => $page,
        'last' => $total_pages,
        'url' => getCurrentPageURL()
    );
    
    $template = "tin-tuc";
}

// Lấy danh sách tin mới nhất cho Sidebar
$d->reset();
$d->query("select id, ten_vi, ten_khong_dau, photo, ngaytao from #_news where hienthi=1 and ngaytao <= ".time()." order by ngaytao desc limit 0,5");
$ds_sidebar = $d->result_array();

// Lấy danh sách danh mục và đếm số bài viết
$d->reset();
$d->query("select c.ten_vi, c.ten_khong_dau, c.id, (select count(id) from #_news where id_cat=c.id and hienthi=1 and ngaytao <= ".time().") as so_bai from #_news_cat c where c.hienthi=1 and c.type='tin-tuc' order by c.stt asc, c.id desc");
$ds_danhmuc_sidebar = $d->result_array();
?>