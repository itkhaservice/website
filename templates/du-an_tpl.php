<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Dự án</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <!-- Breadcrumb hidden as per request -->
            </div>
        </div>
    </div>
</section>

<!-- Project List Area & Filter -->
<section class="project-filter-area bg-light-white pt-50 pb-50">
    <div class="container">
        <div class="row mb-40">
            <div class="col-lg-12">
                <div class="bg-white p-4 shadow-sm rounded-lg border-0 d-flex flex-wrap align-items-center justify-content-between">
                    <h4 class="mb-0 text-dark font-weight-bold d-none d-md-block mr-4">Bộ lọc dự án</h4>
                    
                    <form action="du-an.html" method="GET" class="d-flex flex-wrap flex-grow-1 justify-content-end align-items-center search-form">
                        <!-- Lọc theo loại -->
                        <div class="form-group mb-2 mb-md-0 mr-md-2">
                            <select name="type_filter" class="form-control rounded-pill border-light bg-light nice-select-reset" onchange="this.form.submit()">
                                <option value="">Tất cả dự án</option>
                                <option value="noibat" <?=isset($_GET['type_filter']) && $_GET['type_filter']=='noibat' ? 'selected' : ''?>>Dự án tiêu biểu</option>
                            </select>
                        </div>

                        <!-- Lọc theo khu vực -->
                        <div class="form-group mb-2 mb-md-0 mr-md-2">
                            <select name="id_khuvuc" class="form-control rounded-pill border-light bg-light nice-select-reset" onchange="this.form.submit()">
                                <option value="0">Toàn bộ khu vực</option>
                                <?php if(!empty($ds_khuvuc)) { foreach($ds_khuvuc as $k){ ?>
                                    <option value="<?=$k['id']?>" <?=isset($_GET['id_khuvuc']) && $_GET['id_khuvuc']==$k['id'] ? 'selected' : ''?>><?=$k['ten_vi']?></option>
                                <?php }} ?>
                            </select>
                        </div>
                        
                        <div class="form-group mb-0 position-relative" style="min-width: 200px;">
                            <input type="text" name="keyword" class="form-control rounded-pill pl-4 pr-5 border-light bg-light" placeholder="Tìm tên dự án..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>">
                            <button type="submit" class="btn position-absolute text-muted" style="right: 5px; top: 0; background: none; border: none;"><i class="fas fa-search"></i></button>
                        </div>
                        
                        <?php if(isset($_GET['keyword']) || (isset($_GET['id_khuvuc']) && $_GET['id_khuvuc']>0) || !empty($_GET['type_filter'])) { ?>
                            <a href="du-an.html" class="btn btn-sm btn-light text-danger font-weight-bold ml-2 rounded-pill"><i class="fas fa-times mr-1"></i> Xóa lọc</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing area start (Project Slider) -->
<section class="pricong-area bg-light-white pb-100">
    <div class="container">
        <div class="row align-items-end text-center text-lg-left mb-45">
            <div class="col-lg-7 text-center text-lg-left">
                <div class="fancy-head left-al wow fadeInLeft">
                    <h5 class="line-head mb-15">
                        <span class="line before d-lg-none"></span>
                        Danh sách
                        <span class="line after"></span>
                    </h5>
                    <h1><?=isset($_GET['type_filter']) && $_GET['type_filter']=='noibat' ? 'Dự Án Tiêu Biểu' : 'Các Dự Án Của Chúng Tôi'?></h1>
                </div>
            </div>
            <div class="col-lg-5 mt-md-25 text-lg-right">
                <div class="arrow-navigation mb-15 mt-md-20">
                    <a href="" class="nav-slide nav-price-left">
                        <img src="img/icons/ar_lt.png" alt="">
                    </a>
                    <a href="" class="nav-slide nav-price-right">
                        <img src="img/icons/ar_rt.png" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <?php if(!empty($ds_duan)) { ?>
                <div class="owl-carousel price-slider">
                    <?php foreach($ds_duan as $v){ 
                        $img_src = get_photo($v['photo']);
                        $link = 'du-an/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : 'bai-viet-'.$v['id']) . '.html';
                    ?>
                    <div class="item">
                        <div class="project-corporate-card bg-white wow fadeInUp">
                            <div class="project-thumb">
                                <a href="<?=$link?>">
                                    <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>">
                                </a>
                                <?php if(!empty($v['ten_khuvuc'])) { ?>
                                <span class="location-badge">
                                    <i class="fas fa-map-marker-alt"></i> <?=$v['ten_khuvuc']?>
                                </span>
                                <?php } ?>
                            </div>
                            <div class="project-body">
                                <h4 class="project-title">
                                    <a href="<?=$link?>"><?=$v['ten_vi']?></a>
                                </h4>
                                <div class="project-line"></div>
                                <div class="project-footer d-flex justify-content-between align-items-center">
                                    <span class="text-muted text-sm text-uppercase font-weight-bold">Chi tiết dự án</span>
                                    <a href="<?=$link?>" class="btn-arrow-link"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } else { ?>
                    <div class="text-center py-5">
                        <p class="text-muted">Không tìm thấy dự án nào phù hợp với bộ lọc.</p>
                        <a href="du-an.html" class="btn btn-primary rounded-pill">Xem tất cả dự án</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Pricing area end -->

<!-- Experience Cta start (Company Stats) -->
<section class="experience-cta pt-100 pb-100" style="background-image: url('img/bg/bg-2.jpg');" data-overlay="9">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 z-5 text-center text-lg-left wow fadeIn">
                <div class="exp-cta pr-50 pr-lg-00">
                    <div class="white mb-55 mb-md-30 pr-60 pr-md-00 stat-description">
                        <?=!empty($about['mota_solieu']) ? htmlspecialchars_decode($about['mota_solieu']) : 'Chúng tôi tự hào mang đến giải pháp quản lý vận hành chuyên nghiệp.'?>
                    </div>
                    <a href="linh-vuc-hoat-dong.html" class="btn btn-square ">
                        Lĩnh vực hoạt động
                        <i class="fas fa-long-arrow-alt-right ml-20"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 mt-md-60">
                <div class="row no-gutters">
                    <div class="col-sm-6 text-center">
                        <div class="each-count-up shade z-5 wow fadeIn" data-wow-delay=".2s">
                            <h2 class="fs-40 f-900 green mb-20 mt-5"><span class="counter"><?=!empty($about['sl_khachhang']) ? $about['sl_khachhang'] : 3000?></span>+</h2>
                            <p class="uppercase white mb-0">Khách hàng</p>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="each-count-up z-5 wow fadeIn" data-wow-delay=".4s">
                            <h2 class="fs-40 f-900 green mb-20 mt-5"><span class="counter"><?=!empty($about['sl_giaithuong']) ? $about['sl_giaithuong'] : 250?></span>+</h2>
                            <p class="uppercase white mb-0">Giải thưởng</p>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="each-count-up z-5 wow fadeIn" data-wow-delay=".6s">
                            <h2 class="fs-40 f-900 green mb-20 mt-5"><span class="counter"><?=!empty($about['sl_doitac']) ? $about['sl_doitac'] : 350?></span>+</h2>
                            <p class="uppercase white mb-0">Đối tác</p>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="each-count-up z-5 shade wow fadeIn" data-wow-delay=".8s">
                            <h2 class="fs-40 f-900 green mb-20 mt-5"><span class="counter"><?=!empty($about['sl_duan']) ? $about['sl_duan'] : 5300?></span>+</h2>
                            <p class="uppercase white mb-0">Dự án hoàn thành</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Experience Cta end -->

<!-- Client logos area start (Partners) -->
<section class="client-list bg-light-white pt-100 pb-70">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-xl-5 text-center text-lg-left">
                <div class="clients-left-part">
                    <div class="fancy-head left-al">
                        <h5 class="line-head mb-15">
                          <span class="line before d-lg-none"></span>
                            Khách hàng của chúng tôi
                          <span class="line after"></span>
                        </h5>
                        <div class="mb-35 pr-45 pr-md-00 partner-description">
                            <?=!empty($about['mota_doitac']) ? htmlspecialchars_decode($about['mota_doitac']) : 'Được tin tưởng bởi các Tập đoàn lớn. Sự hài lòng của khách hàng là thước đo thành công của chúng tôi.'?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-md-60 offset-xl-1 offset-lg-0">
                <div class="row">
                    <?php if(!empty($ds_doitac)) { foreach($ds_doitac as $k=>$v) { 
                        $delay = 0.2 * (($k % 3) + 1); // Hiệu ứng delay nhẹ
                    ?>
                    <div class="col-sm-6" data-wow-delay="<?=$delay?>s">
                        <div class="each-logo flex-center transition-4 mb-30" style="height: 120px; background: #fff; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                            <a href="<?=$v['link']?>" target="_blank" title="<?=$v['ten_vi']?>">
                                <img src="<?=get_photo($v['photo'])?>" alt="<?=$v['ten_vi']?>" style="max-height: 80px; max-width: 90%;">
                            </a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Client logos area end -->

<style>
    /* Corporate Project Card Style */
    .project-corporate-card {
        border: 1px solid #e5e5e5;
        transition: all 0.4s ease;
        position: relative;
        background: #fff;
        height: 100%;
    }
    
    .project-corporate-card:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        transform: translateY(-5px);
        border-color: transparent;
    }

    .project-thumb {
        position: relative;
        overflow: hidden;
        height: 240px;
    }
    
    .project-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .project-corporate-card:hover .project-thumb img {
        transform: scale(1.05);
    }

    .location-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.95);
        color: #333;
        padding: 5px 12px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        z-index: 10;
    }
    .location-badge i { color: #108042; margin-right: 5px; }

    .project-body {
        padding: 25px;
        text-align: left;
        position: relative;
    }
    
    .project-title {
        margin-bottom: 15px;
        min-height: 3em;
    }
    
    .project-title a {
        color: #222;
        font-weight: 700;
        font-size: 18px;
        text-transform: uppercase;
        line-height: 1.4;
        transition: color 0.3s;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .project-corporate-card:hover .project-title a {
        color: #108042;
    }

    .project-line {
        width: 40px;
        height: 3px;
        background-color: #e5e5e5;
        margin-bottom: 20px;
        transition: width 0.4s ease, background-color 0.4s ease;
    }
    
    .project-corporate-card:hover .project-line {
        width: 100%;
        background-color: #108042;
    }

    .btn-arrow-link {
        width: 35px;
        height: 35px;
        border: 1px solid #e5e5e5;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #999;
        transition: all 0.3s;
    }
    
    .project-corporate-card:hover .btn-arrow-link {
        background-color: #108042;
        border-color: #108042;
        color: #fff;
    }
    
    .text-sm { font-size: 12px; letter-spacing: 0.5px; }

    .nice-select-reset { border-radius: 20px !important; height: 45px; line-height: 45px; }
    .stat-description p, .partner-description p { color: inherit; margin-bottom: 10px; }
    .stat-description, .partner-description { font-size: 1.1rem; }
    @media (max-width: 767px) {
        .search-form { justify-content: center !important; }
        .search-form .form-group { width: 100%; }
        .search-form .btn-light { margin-top: 10px; width: 100%; }
    }
</style>