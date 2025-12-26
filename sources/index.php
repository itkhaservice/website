<?php
if(!defined('_source')) die("Error");

// 1. About - Về chúng tôi (Trang tĩnh)
$d->reset();
$d->query("select * from #_static where type='ve-chung-toi'");
$about = $d->fetch_array();

// 2. Dịch vụ (Lấy trực tiếp từ bảng table_dichvu)
$d->reset();
$d->query("select * from #_dichvu where hienthi=1 and noibat=1 order by stt asc, id desc limit 0,12");
$ds_dichvu = $d->result_array();

// 3. Team - Đội ngũ (Lấy từ bảng table_staff)
$d->reset();
$d->query("select * from #_staff where hienthi=1 order by stt asc, id desc");
$ds_team = $d->result_array();

// 4. Dự án nổi bật (Lấy từ bảng table_duan có noibat=1)
$d->reset();
$d->query("select a.*, b.ten_vi as ten_khuvuc from #_duan a left join #_khuvuc b on a.id_khuvuc = b.id where a.hienthi=1 and a.noibat=1 order by a.stt asc, a.id desc limit 0,10");
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

// 8. Giá trị cốt lõi (Lấy từ bảng table_giatri)
$d->reset();
$d->query("select * from #_giatri where hienthi=1 order by stt asc, id desc");
$ds_tieuchi = $d->result_array();

// 9. Tin tức nổi bật (Lấy tin có noibat=1)
$d->reset();
$d->query("select a.*, b.ten_vi as ten_danhmuc from #_news a left join #_news_cat b on a.id_cat = b.id where a.hienthi=1 and a.noibat=1 order by a.ngaytao desc limit 0,3");
$ds_tintuc = $d->result_array();

// 10. Thư viện ảnh nổi bật
$d->reset();
$d->query("select * from #_thuvien where hienthi=1 and noibat=1 order by stt asc, id desc limit 0,6");
$ds_thuvien = $d->result_array();
?>