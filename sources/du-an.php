<?php
if(!defined('_source')) die("Error");

// Cấu hình phân trang
$per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 6; // Số dự án trên 1 trang
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
if($page < 1) $page = 1;
$startpoint = ($page * $per_page) - $per_page;

$id = isset($_GET['id']) ? addslashes($_GET['id']) : "";
$slug = isset($_GET['slug']) ? addslashes($_GET['slug']) : "";

if($id && !is_numeric($id)){
    $slug = $id;
    $id = "";
}

if($id || $slug){
    // TRANG CHI TIẾT DỰ ÁN
    $d->reset();
    $where = "a.hienthi=1";
    if($slug) $where .= " and a.ten_khong_dau='$slug'";
    else $where .= " and a.id='$id'";
    
    $d->query("select a.*, b.ten_vi as ten_khuvuc from #_duan a left join #_khuvuc b on a.id_khuvuc = b.id where $where");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)){
        redirect("du-an.html");
    }
    
    // Cập nhật lượt xem
    $d->query("update #_duan set luotxem=luotxem+1 where id='".$row_detail['id']."'");
    
    $title_bar = $row_detail['ten_vi'];
    $title_t = $row_detail['title'];
    $keywords_t = $row_detail['keywords'];
    $description_t = $row_detail['description'];
    
    // Lấy bài viết liên quan (cùng khu vực hoặc cùng danh mục)
    $d->reset();
    $sql_other = "select id, ten_vi, ten_khong_dau, photo, ngaytao from #_duan where hienthi=1 and id!='".$row_detail['id']."'";
    if($row_detail['id_khuvuc'] > 0) $sql_other .= " and id_khuvuc='".$row_detail['id_khuvuc']."'";
    $sql_other .= " order by stt asc, id desc limit 0,4";
    $d->query($sql_other);
    $duan_khac = $d->result_array();
    
    $template = "du-an_detail";
    
} else {
    // TRANG DANH SÁCH DỰ ÁN
    $where = " #_duan.hienthi=1";
    $per_page = 100; // Hiển thị tối đa 100 dự án (không phân trang)
    $startpoint = 0;
    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
        $keyword = addslashes($_GET['keyword']);
        $where .= " and #_duan.ten_vi LIKE '%$keyword%'";
    }
    
    // Xử lý lọc theo Slug Khu vực (SEO)
    if(isset($_GET['khuvuc']) && $_GET['khuvuc'] != ''){
        $slug_khuvuc = addslashes($_GET['khuvuc']);
        $d->reset();
        $d->query("select id from #_khuvuc where ten_khong_dau='$slug_khuvuc' limit 0,1");
        $row_slug_kv = $d->fetch_array();
        if(!empty($row_slug_kv)){
            $where .= " and #_duan.id_khuvuc = " . $row_slug_kv['id'];
            $_GET['id_khuvuc'] = $row_slug_kv['id']; // Gán lại để hiển thị selected trong dropdown
        }
    }
    // Xử lý lọc theo ID Khu vực (Legacy/Filter Form)
    else if(isset($_GET['id_khuvuc']) && (int)$_GET['id_khuvuc'] > 0){
        $where .= " and #_duan.id_khuvuc = " . (int)$_GET['id_khuvuc'];
    }

    if(isset($_GET['type_filter']) && $_GET['type_filter'] == 'noibat'){
        $where .= " and #_duan.noibat = 1";
    }

    // Đếm tổng số để phân trang
    $d->reset();
    $d->query("select count(id) as num from #_duan where $where");
    $row_num = $d->fetch_array();
    $total_items = $row_num['num'];
    $total_pages = ceil($total_items / $per_page);

    // Lấy dữ liệu
    $d->reset();
    $d->query("select #_duan.*, #_khuvuc.ten_vi as ten_khuvuc from #_duan left join #_khuvuc on #_duan.id_khuvuc = #_khuvuc.id where $where order by #_duan.stt asc, #_duan.id desc limit $startpoint, $per_page");
    $ds_duan = $d->result_array();
    
    // Lấy danh sách khu vực để tạo Dropdown lọc
    $d->reset();
    $d->query("select id, ten_vi, ten_khong_dau from #_khuvuc where hienthi=1 order by stt asc");
    $ds_khuvuc = $d->result_array();
    
    $title_bar = "Dự án";
    $template = "du-an";
    
    // Tạo mảng phân trang cho View
    $paging = array(
        'total' => $total_items,
        'per_page' => $per_page,
        'current' => $page,
        'last' => $total_pages,
        'url' => 'du-an.html' // URL gốc
    );

    // Lấy thông tin thống kê (About Us)
    $d->reset();
    $d->query("select * from #_static where type='ve-chung-toi' limit 0,1");
    $about = $d->fetch_array();

    // Lấy danh sách đối tác
    $d->reset();
    $d->query("select ten_vi, photo, link from #_photo where type='doi-tac' and hienthi=1 order by stt asc, id desc");
    $ds_doitac = $d->result_array();
}
?>