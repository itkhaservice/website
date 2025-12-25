<?php
if(!defined('_source')) die("Error");

$title_bar = "Thư viện ảnh";
$id = isset($_GET['id']) ? addslashes($_GET['id']) : "";

if($id != ""){
    // --- TRANG CHI TIẾT ALBUM ---
    
    // Lấy thông tin Album
    $d->reset();
    $d->query("select * from #_news where ten_khong_dau='$id' and type='thu-vien-anh'");
    $row_detail = $d->fetch_array();
    
    if(empty($row_detail)) {
        header("Location: thu-vien-anh.html");
        exit;
    }

    $title_bar = $row_detail['ten_vi'];
    $title_detail = $row_detail['ten_vi'];

    // Lấy danh sách ảnh của Album này (Giả sử lưu trong table_news_photo hoặc table_photo liên kết id_news - nhưng hiện tại chưa có bảng này, nên ta giả lập lấy ảnh từ chính nó hoặc query demo)
    // TẠM THỜI: Lấy chính nó làm 1 ảnh, và các ảnh demo khác.
    // Thực tế sẽ cần bảng `table_news_photo` -> `id_news` = $row_detail['id']
    
    // Giả lập danh sách ảnh để test giao diện
    $ds_anh = array();
    // Ảnh đại diện
    $ds_anh[] = array('photo' => (!empty($row_detail['photo']) ? $row_detail['photo'] : 'img/service/1.png'), 'ten_vi' => $row_detail['ten_vi']);
    // Fake thêm vài ảnh
    $ds_anh[] = array('photo' => 'img/service/2.png', 'ten_vi' => 'Ảnh 2');
    $ds_anh[] = array('photo' => 'img/service/3.png', 'ten_vi' => 'Ảnh 3');
    $ds_anh[] = array('photo' => 'img/service/4.png', 'ten_vi' => 'Ảnh 4');
    
    $template = "thuvienanh_detail"; // Cần tạo file template này

} else {
    // --- TRANG DANH SÁCH ALBUM ---
    
    $d->reset();
    $d->query("select * from #_news where type='thu-vien-anh' and hienthi=1 order by stt asc, id desc");
    $tintuc = $d->result_array();

    // Phân trang
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = "thu-vien-anh.html";
    $maxR = 12;
    $maxP = 5;
    $paging = paging($tintuc, $url, $curPage, $maxR, $maxP); 
    $tintuc = $paging['source'];
}
?>