<?php
header("Content-Type: application/xml; charset=utf-8");
session_start();
@define ( '_lib' , './lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";

$d = new database($config['database']);

// Base URL từ config (Tự động nhận diện Localhost/Hosting)
$url_web = $base_url;

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

/**
 * Hàm hỗ trợ tạo thẻ URL
 */
function echo_url($loc, $priority = '0.5', $lastmod = '', $changefreq = 'daily') {
    echo '<url>';
    echo '<loc>' . $loc . '</loc>';
    if($lastmod != '') echo '<lastmod>' . date('Y-m-d', $lastmod) . '</lastmod>';
    else echo '<lastmod>' . date('Y-m-d') . '</lastmod>';
    echo '<changefreq>' . $changefreq . '</changefreq>';
    echo '<priority>' . $priority . '</priority>';
    echo '</url>';
}

// 1. Trang chủ
echo_url($url_web, '1.0', time(), 'daily');

// 2. Các trang tĩnh cố định
echo_url($url_web . 'gioi-thieu.html', '0.8');
echo_url($url_web . 'linh-vuc-hoat-dong.html', '0.8');
echo_url($url_web . 'du-an.html', '0.8');
echo_url($url_web . 'tin-tuc.html', '0.8');
echo_url($url_web . 'tuyen-dung.html', '0.8');
echo_url($url_web . 'thu-vien-anh.html', '0.7');
echo_url($url_web . 'lien-he.html', '0.7');

// 3. Danh mục Tin tức
$d->reset();
$d->query("select ten_khong_dau, ngaytao from #_news_cat where hienthi=1 and type='tin-tuc' order by stt asc");
$news_cats = $d->result_array();
foreach($news_cats as $v) {
    echo_url($url_web . 'tin-tuc/' . $v['ten_khong_dau'] . '.html', '0.7', $v['ngaytao']);
}

// 4. Chi tiết Tin tức
$d->reset();
$d->query("select ten_khong_dau, ngaytao from #_news where hienthi=1 order by ngaytao desc");
$news = $d->result_array();
foreach($news as $v) {
    echo_url($url_web . 'tin-tuc/chi-tiet/' . $v['ten_khong_dau'] . '.html', '0.6', $v['ngaytao']);
}

// 5. Khu vực Dự án
$d->reset();
$d->query("select ten_khong_dau from #_khuvuc where hienthi=1 order by stt asc");
$regions = $d->result_array();
foreach($regions as $v) {
    echo_url($url_web . 'du-an/khu-vuc/' . $v['ten_khong_dau'] . '.html', '0.7');
}

// 6. Chi tiết Dự án
$d->reset();
$d->query("select ten_khong_dau, ngaytao from #_duan where hienthi=1 order by stt asc");
$projects = $d->result_array();
foreach($projects as $v) {
    echo_url($url_web . 'du-an/' . $v['ten_khong_dau'] . '.html', '0.6', $v['ngaytao']);
}

// 7. Chi tiết Dịch vụ / Lĩnh vực
$d->reset();
$d->query("select ten_khong_dau from #_dichvu where hienthi=1 order by stt asc");
$services = $d->result_array();
foreach($services as $v) {
    echo_url($url_web . 'dich-vu/' . $v['ten_khong_dau'] . '.html', '0.7');
}

// 8. Chi tiết Tuyển dụng
$d->reset();
$d->query("select ten_khong_dau, ngaytao from #_tuyendung where hienthi=1 order by stt asc");
$careers = $d->result_array();
foreach($careers as $v) {
    echo_url($url_web . 'tuyen-dung/' . $v['ten_khong_dau'] . '.html', '0.6', $v['ngaytao']);
}

echo '</urlset>';
?>