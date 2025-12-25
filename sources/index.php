<?php
if(!defined('_source')) die("Error");

// 1. About - Về chúng tôi (Trang tĩnh)
$d->reset();
$d->query("select * from #_static where type='ve-chung-toi'");
$about = $d->fetch_array();

// 2. Dịch vụ (Lấy từ bảng table_news loại dich-vu)
$d->reset();
$d->query("select * from #_news where type='dich-vu' and hienthi=1 order by stt asc, id desc limit 0,12");
$ds_dichvu = $d->result_array();

// 3. Team - Đội ngũ (Lấy từ bảng table_staff)
$d->reset();
$d->query("select * from #_staff where hienthi=1 order by stt asc, id desc");
$ds_team = $d->result_array();

// 4. Dự án (Vẫn lấy từ bảng table_news theo type du-an)
$d->reset();
$d->query("select * from #_news where type='du-an' and hienthi=1 order by stt asc, id desc limit 0,10");
$ds_duan = $d->result_array();

// 5. Testimonial - Khách hàng nói gì (Lấy từ bảng table_feedback)
$d->reset();
$d->query("select * from #_feedback where hienthi=1 order by stt asc, id desc");
$ds_ykien = $d->result_array();

// 6. Slider (Từ bảng table_photo)
$d->reset();
$d->query("select * from #_photo where type='slideshow' and hienthi=1 order by stt asc, id desc");
$ds_slider = $d->result_array();

// 7. Thế mạnh (Lấy từ bảng table_themanh)
$d->reset();
$d->query("select * from #_themanh where hienthi=1 order by stt asc, id desc limit 0,3");
$ds_themanh = $d->result_array();

// 8. Giá trị cốt lõi (Từ bảng table_news loại tieu-chi)
$d->reset();
$d->query("select * from #_news where type='tieu-chi' and hienthi=1 order by stt asc, id desc");
$ds_tieuchi = $d->result_array();

// 9. Tin tức mới nhất (Từ bảng table_news loại tin-tuc)
$d->reset();
$d->query("select * from #_news where type='tin-tuc' and hienthi=1 order by ngaytao desc limit 0,3");
$ds_tintuc = $d->result_array();
?>