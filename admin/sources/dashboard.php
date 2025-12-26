<?php
if(!defined('_source')) die("Error");

// 1. Thống kê bài viết Tin tức (Bỏ điều kiện type vì bảng không có cột này)
$d->reset();
$d->query("select count(id) as num from #_news where hienthi=1");
$row_news = $d->fetch_array();
$count_news = $row_news['num'];

// 2. Thống kê Dự án
$d->reset();
$d->query("select count(id) as num from #_duan where hienthi=1");
$row_duan = $d->fetch_array();
$count_duan = $row_duan['num'];

// 3. Thống kê Liên hệ mới (chưa xem)
$d->reset();
$d->query("select count(id) as num from #_contact where trangthai=0"); 
$row_contact_new = $d->fetch_array();
$count_contact_new = $row_contact_new['num'];

// 4. Thống kê Tổng liên hệ
$d->reset();
$d->query("select count(id) as num from #_contact");
$row_contact_total = $d->fetch_array();
$count_contact_total = $row_contact_total['num'];

// 5. Lấy danh sách liên hệ mới nhất (5 tin)
$d->reset();
$d->query("select * from #_contact order by ngaytao desc limit 0,5");
$latest_contacts = $d->result_array();

// 6. Thống kê sản phẩm/dịch vụ (nếu cần)
$d->reset();
$d->query("select count(id) as num from #_dichvu where hienthi=1");
$row_dichvu = $d->fetch_array();
$count_dichvu = $row_dichvu['num'];

?>