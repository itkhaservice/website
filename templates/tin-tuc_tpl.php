<style>
    /* --- NÂNG CẤP GIAO DIỆN BLOG --- */
    
    .blog-card {
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        top: 0;
    }
    
    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(16, 128, 66, 0.15); /* Bóng xanh đặc trưng */
        border-color: rgba(16, 128, 66, 0.3);
    }
    
    .blog-card-image {
        position: relative;
        overflow: hidden;
        border-radius: 16px 16px 0 0;
    }
    
    .blog-card-image img {
        transition: transform 0.6s ease;
        transform-origin: center;
    }
    
    .blog-card:hover .blog-card-image img {
        transform: scale(1.1); /* Zoom mượt */
    }
    
    /* Ngày tháng 3D */
    .blog-date-badge {
        position: absolute;
        top: 20px; left: 20px;
        background: #fff;
        padding: 8px 12px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        z-index: 2;
        text-align: center;
        min-width: 65px;
        border-bottom: 3px solid #108042; /* Điểm nhấn chân */
        transition: 0.3s;
    }
    .blog-card:hover .blog-date-badge {
        transform: scale(1.05);
    }
    
    .blog-date-badge .day {
        font-weight: 900;
        font-size: 24px;
        color: #108042;
        line-height: 1;
        letter-spacing: -1px;
    }
    .blog-date-badge .month {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        color: #333;
        margin-top: 2px;
    }
    .blog-date-badge .year {
        font-size: 11px;
        color: #888;
        font-weight: 500;
    }
    
    /* Label danh mục */
    .blog-category-label {
        position: absolute;
        bottom: 20px; right: 20px;
        background: linear-gradient(45deg, #108042, #0d6a36);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        padding: 5px 15px;
        border-radius: 30px;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(16, 128, 66, 0.3);
    }
    
    /* Nội dung */
    .blog-card-content { padding: 25px; }
    
    .blog-card-content .title a {
        color: #1e293b;
        transition: 0.3s;
        line-height: 1.4;
        display: block;
    }
    .blog-card-content .title a:hover {
        color: #108042 !important;
        background: linear-gradient(to right, #108042 0%, #108042 100%);
        background-size: 100% 1px;
        background-position: 0 100%;
        background-repeat: no-repeat;
    }
    
    .read-more-btn {
        color: #108042;
        letter-spacing: 0.5px;
        transition: 0.3s;
        position: relative;
        display: inline-block;
    }
    .read-more-btn::after {
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #108042;
        transition: width 0.3s;
    }
    .read-more-btn:hover::after {
        width: 100%;
    }
    .read-more-btn:hover {
        text-decoration: none;
        color: #0c6434;
    }
    .read-more-btn i {
        transition: 0.3s;
    }
    .read-more-btn:hover i {
        transform: translateX(5px);
    }
    
    /* Cắt chữ chuẩn */
    .text-split-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
        height: 2.8em;
    }
    .text-split-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.6;
        height: 4.8em;
    }
    
    /* Sidebar đẹp hơn */
    .right-box {
        border-radius: 16px;
        overflow: hidden;
        border: none;
        padding: 30px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }
    .category-list li { transition: 0.3s; padding: 12px 0 !important; }
    .category-list li:hover { padding-left: 10px !important; background: #f9fdfa; border-radius: 8px; }
    .category-list li a:hover { color: #108042 !important; text-decoration: none; }
    
    .popular-post:hover .popular-post-img img { transform: scale(1.1); }
    .group-hover-green:hover { color: #108042 !important; }
</style>

<!-- immer banner start -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Tin tức</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <!-- Breadcrumb hidden -->
            </div>
        </div>
    </div>
</section>

<!-- blog listing grid area start -->
<section class="service-details pt-100 pb-100 bg-light-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="row justify-content-center">
                    <?php if(!empty($ds_tintuc)) { foreach($ds_tintuc as $v) { 
                        $link_v = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                    ?>
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="blog-card h-100">
                            <div class="blog-card-image relative overflow-hidden">
                                <a href="<?=$link_v?>" class="d-block h-100">
                                    <?php 
                                        $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image';
                                    ?>
                                    <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>" class="w-100 transition-4" style="height: 240px; object-fit: cover;" loading="lazy">
                                </a>
                                <div class="blog-date-badge">
                                    <span class="day"><?=date('d', $v['ngaytao'])?></span>
                                    <span class="month">Th<?=date('m', $v['ngaytao'])?></span>
                                    <span class="year"><?=date('Y', $v['ngaytao'])?></span>
                                </div>
                                <div class="blog-category-label">
                                    <?=($v['ten_danhmuc']!='')?$v['ten_danhmuc']:'Tin tức'?>
                                </div>
                            </div>
                            <div class="blog-card-content p-4 text-left">
                                <h3 class="title mb-15">
                                    <a href="<?=$link_v?>" class="text-dark text-split-2 f-700 fs-18 transition-2"><?=$v['ten_vi']?></a>
                                </h3>
                                <p class="excerpt text-muted mb-20 text-split-3 fs-14">
                                    <?=substr(strip_tags($v['mota_vi']), 0, 120)?>...
                                </p>
                                <div class="blog-footer border-top pt-15 d-flex align-items-center justify-content-between">
                                    <a href="<?=$link_v?>" class="read-more-btn font-weight-bold fs-13 text-uppercase">
                                        Xem chi tiết <i class="fas fa-long-arrow-alt-right ml-1"></i>
                                    </a>
                                    <div class="views-count small text-muted">
                                        <i class="far fa-eye mr-1"></i> <?=$v['luotxem']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} else { echo '<p class="w-100 text-center">Đang cập nhật...</p>'; } ?>
                </div>

                <!-- Pagination -->
                <?php if(isset($paging) && $paging['total'] > 0) { ?>
                <div class="row mt-40">
                    <div class="col-12">
                        <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center small mb-2 mb-md-0 text-muted">
                                <?php 
                                    $start_index = ($paging['current'] - 1) * $paging['per_page'] + 1;
                                    $end_index = $start_index + $paging['per_page'] - 1;
                                    if($end_index > $paging['total']) $end_index = $paging['total'];
                                ?>
                                <span>Hiển thị <b><?=$start_index?> - <?=$end_index?></b> trên tổng số <b><?=$paging['total']?></b> tin tức</span>
                                <select class="form-control per-page-select shadow-none ml-2" style="width: 70px; height: 30px; padding: 0 5px;" onchange="updatePerPage(this)">
                                    <?php foreach([6, 12, 24, 48] as $p) { ?>
                                        <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <nav class="d-inline-block">
                                <ul class="pagination m-0">
                                    <?php 
                                        // Xác định dấu nối tham số (? hoặc &)
                                        $link_connector = (strpos($paging['url'], '?') !== false) ? '&' : '?';
                                        $per_page_param = ($paging['per_page'] != 6) ? "&per_page=".$paging['per_page'] : ""; // Mặc định 6 thì không cần param
                                    ?>
                                    
                                    <?php if($paging['current'] > 1) { ?>
                                        <li class="page-item"><a class="page-link shadow-sm mx-1 border-0 rounded-circle" href="<?=$paging['url'].$link_connector?>p=<?=$paging['current']-1?><?=$per_page_param?>"><i class="fas fa-angle-left"></i></a></li>
                                    <?php } ?>
                                    
                                    <?php for($i=1; $i<=$paging['last']; $i++) { 
                                        if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                                        <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link shadow-sm mx-1 border-0 rounded-circle font-weight-bold" href="<?=$paging['url'].$link_connector?>p=<?=$i?><?=$per_page_param?>"><?=$i?></a></li>
                                    <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                                    
                                    <?php if($paging['current'] < $paging['last']) { ?>
                                        <li class="page-item"><a class="page-link shadow-sm mx-1 border-0 rounded-circle" href="<?=$paging['url'].$link_connector?>p=<?=$paging['current']+1?><?=$per_page_param?>"><i class="fas fa-angle-right"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <script>
                    function updatePerPage(selectObject) {
                        var value = selectObject.value;
                        var currentUrl = new URL(window.location.href);
                        
                        // Cập nhật tham số per_page
                        currentUrl.searchParams.set('per_page', value);
                        
                        // Reset về trang 1 khi đổi số lượng hiển thị
                        currentUrl.searchParams.set('p', '1');
                        
                        window.location.href = currentUrl.toString();
                    }
                </script>
                <?php } ?>
            </div>
            
            <!-- right-part (Sidebar) -->
            <div class="col-xl-4 col-lg-5">

                <div class="right-box mb-30 shadow-sm">
                    <div class="right-box-head">
                        <h4>Tìm kiếm</h4>
                    </div>
                    <div class="right-box-content">
                        <form action="index.php" method="get" class="relative mt-10 mb-10">
                            <input type="hidden" name="com" value="search">
                            <input type="text" name="keyword" class="form-control border-0 bg-light px-3" placeholder="Nhập từ khóa.." style="height: 45px; border-radius: 8px;">
                            <button type="submit" class="btn p-0 position-absolute" style="top: 50%; right: 15px; transform: translateY(-50%); background: transparent;">
                                <i class="fas fa-search green"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="right-box mb-30 shadow-sm">
                    <div class="right-box-head">
                        <h4>Danh mục</h4>
                    </div>
                    <div class="right-box-content mt-10 mb-10">
                        <ul class="list-unstyled category-list">
                            <?php if(!empty($ds_danhmuc_sidebar)) { foreach($ds_danhmuc_sidebar as $v) { ?>
                            <li class="py-2 border-bottom d-flex justify-content-between align-items-center">
                                <a href="tin-tuc/<?=($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id'])?>.html" class="text-dark hover-green font-weight-500 d-block w-100 text-decoration-none">
                                    <i class="fas fa-chevron-right small mr-2 green"></i> <?=$v['ten_vi']?>
                                    <span class="badge badge-pill badge-light border text-muted float-right px-2 py-1"><?=$v['so_bai']?></span>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>

                <div class="right-box mb-30 shadow-sm">
                    <div class="right-box-head">
                        <h4>Tin mới nhất</h4>
                    </div>
                    <div class="right-box-content mt-10 mb-10">
                        <?php if(!empty($ds_sidebar)) { foreach($ds_sidebar as $v) { 
                            $link_side = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                        ?>
                        <a href="<?=$link_side?>" class="popular-post d-flex align-items-center mb-20 text-decoration-none group">
                            <div class="popular-post-img mr-20 overflow-hidden rounded shadow-xs" style="width:75px; height:75px; flex-shrink: 0;">
                                <?php 
                                    $img_sidebar = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/100x100/ebebeb/666666?text=New';
                                ?>
                                <img src="<?=$img_sidebar?>" alt="" class="w-100 h-100 object-fit-cover transition-4" loading="lazy">
                            </div>
                            <div class="popular-post-text">
                                <h6 class="mb-5 text-dark f-700 fs-14 text-split-2 group-hover-green transition-2"><?=$v['ten_vi']?></h6>
                                <span class="small text-muted"><i class="far fa-calendar-alt mr-1"></i> <?=date('d/m/Y', $v['ngaytao'])?></span>
                            </div>
                        </a>
                        <?php }} ?>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>
<!-- blog listing grid area end -->

<!-- cta area start -->
<section class="cta pt-50 pb-50" style="background-image: url('img/bg/bg_cta.jpg');" data-overlay="9">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5 mb-md-20 text-center text-lg-left">
                <h3 class="z-5 white f-700 lh-18 wow fadeInLeft">
                    Bạn đang có nhu cầu về dịch vụ nào?
                    <span class="green italic">Liên hệ ngay</span>
                </h3>
            </div>
            <div class="col-xl-8 col-lg-7 text-center text-lg-right z-5">
                <a href="mailto:<?=$row_setting['email']?>" class="btn btn-square-white mr-20 mr-xs-00 d-block d-sm-inline-block mb-xs-15 wow fadeInUp">
                    <i class="fas fa-envelope mr-15"></i><?=$row_setting['email']?>
                </a>
                <a href="tel:<?=$row_setting['hotline']?>" class="btn btn-square-green d-block d-sm-inline-block blob-small wow fadeInUp">
                    <i class="fas fa-phone mr-15"></i><?=$row_setting['hotline']?>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- cta area end -->