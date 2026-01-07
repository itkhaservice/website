<?php
if(!defined('_source')) die("Error");

// 1. About - Về chúng tôi
$d->reset();
$d->query("select ten_vi, noidung_vi, photo, video, sl_nhanvien, sl_duan, sl_canho from #_static where type='ve-chung-toi'");
$about = $d->fetch_array();

// 2. Dịch vụ
$d->reset();
$d->query("select ten_vi, ten_khong_dau, photo, noidung_vi, id from #_dichvu where hienthi=1 and noibat=1 order by stt asc, id desc limit 0,12");
$ds_dichvu = $d->result_array();

// 3. Team - Đội ngũ
$d->reset();
$d->query("select ten_vi, chucvu, photo from #_staff where hienthi=1 order by stt asc, id desc");
$ds_team = $d->result_array();

// 4. Dự án nổi bật
$d->reset();
$d->query("select a.id, a.ten_vi, a.ten_khong_dau, a.photo, b.ten_vi as ten_khuvuc from #_duan a left join #_khuvuc b on a.id_khuvuc = b.id where a.hienthi=1 and a.noibat=1 order by a.stt asc, a.id desc limit 0,10");
$ds_duan = $d->result_array();

// 5. Testimonial
$d->reset();
$d->query("select ten_vi, chucvu, photo, mota_vi, noidung_vi, rating from #_feedback where hienthi=1 order by stt asc, id desc");
$ds_ykien = $d->result_array();

// 6. Slider
$d->reset();
$d->query("select ten_vi, photo, mota_vi, link from #_photo where type='slideshow' and hienthi=1 order by stt asc, id desc");
$ds_slider = $d->result_array();

// 7. Thế mạnh
$d->reset();
$d->query("select ten_vi, photo, mota_vi from #_themanh where hienthi=1 order by stt asc, id desc limit 0,3");
$ds_themanh = $d->result_array();

// 8. Giá trị cốt lõi
$d->reset();
$d->query("select ten_vi, mota_vi from #_giatri where hienthi=1 order by stt asc, id desc");
$ds_tieuchi = $d->result_array();

// 9. Tin tức mới nhất
$d->reset();
$d->query("select a.id, a.ten_vi, a.ten_khong_dau, a.photo, a.ngaytao, b.ten_vi as ten_danhmuc from #_news a left join #_news_cat b on a.id_cat = b.id where a.hienthi=1 and a.noibat=1 and a.ngaytao <= ".time()." order by a.ngaytao desc limit 0,4");
$ds_tintuc = $d->result_array();

// 10. Thư viện ảnh nổi bật
$d->reset();
$d->query("select id, ten_vi, ten_khong_dau, photo from #_thuvien where hienthi=1 and noibat=1 order by stt asc, id desc limit 0,6");
$ds_thuvien = $d->result_array();
?>