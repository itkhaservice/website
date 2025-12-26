<?php
if(!defined('_source')) die("Error");

$id = isset($_GET['id']) ? addslashes($_GET['id']) : "";

if($id != "") {
    // Lấy chi tiết bài viết theo Slug (ten_khong_dau)
    $d->reset();
    $d->query("select * from #_gioithieu where ten_khong_dau='$id' and hienthi=1");
    $row_detail = $d->fetch_array();
} else {
    // Nếu không có Slug, lấy bài viết từ bảng static (Về chúng tôi)
    $d->reset();
    $d->query("select * from #_static where type='ve-chung-toi' limit 0,1");
    $row_detail = $d->fetch_array();
}

// Lấy danh sách Team (Từ bảng table_staff)
$d->reset();
$d->query("select * from #_staff where hienthi=1 order by stt asc, id desc");
$ds_team = $d->result_array();

// Lấy danh sách Testimonials (Ý kiến khách hàng - Từ bảng table_feedback)
$d->reset();
$d->query("select * from #_feedback where hienthi=1 order by stt asc, id desc");
$ds_ykien = $d->result_array();

// Title Bar
$title_bar = $row_detail['ten_vi'];
?>