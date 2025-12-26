<?php
if(!defined('_source')) die("Error");

$keyword = addslashes($_GET['keyword']);
if(empty($keyword)) $keyword = addslashes($_GET['kw']); // Hỗ trợ cả 2 param kw và keyword

$title_bar = "Kết quả tìm kiếm: " . $keyword;
$template = 'search';

// Xử lý phân trang
$per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 12;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
if($page < 1) $page = 1;
$startpoint = ($page * $per_page) - $per_page;

// Tìm kiếm trong 3 bảng chính: Tin tức, Dự án, Dịch vụ (Union)
$sql_count = "SELECT count(id) as num FROM (
    SELECT id FROM #_news WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
    UNION ALL
    SELECT id FROM #_duan WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
    UNION ALL
    SELECT id FROM #_dichvu WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
) as total_results";

$d->query($sql_count);
$row_num = $d->fetch_array();
$total_items = $row_num['num'];
$total_pages = ceil($total_items / $per_page);

$sql_data = "SELECT id, ten_vi, ten_khong_dau, photo, mota_vi, ngaytao, 'tin-tuc' as source_type FROM #_news WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
    UNION ALL
    SELECT id, ten_vi, ten_khong_dau, photo, mota_vi, ngaytao, 'du-an' as source_type FROM #_duan WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
    UNION ALL
    SELECT id, ten_vi, ten_khong_dau, photo, mota_vi, ngaytao, 'dich-vu' as source_type FROM #_dichvu WHERE hienthi=1 AND ten_vi LIKE '%$keyword%'
    ORDER BY ngaytao DESC LIMIT $startpoint, $per_page";

$d->query($sql_data);
$ds_search = $d->result_array();

// Tạo mảng phân trang
$paging = array(
    'total' => $total_items,
    'per_page' => $per_page,
    'current' => $page,
    'last' => $total_pages,
    'url' => getCurrentPageURL()
);
?>