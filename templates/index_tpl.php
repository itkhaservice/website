    <!-- Slider start -->
    <section class="slider-area-2 relative">
        <div class="owl-carousel slider-2">
            <?php if(!empty($ds_slider)) { foreach($ds_slider as $v) { ?>
            <div class="item">
                <div class="silder-img bg-cover" style="background-image: url('<?=!empty($v['photo']) ? $v['photo'] : 'img/banner/banner_3b.jpg'?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-md-10">
                                <div class="slider-content-3 z-10">
                                    <?php if(!empty($v['mota_vi'])) { ?>
                                    <div class="line-head h5-custom-editor">
                                          <?=htmlspecialchars_decode($v['mota_vi'])?>
                                    </div>
                                    <?php } ?>
                                    <div class="banner-head-2 banner-head-3 black f-800 mt-15 mb-35 h1-custom-editor">
                                        <?=htmlspecialchars_decode($v['ten_vi'])?>
                                    </div>
                                    <?php if(!empty($v['link'])) { ?>
                                    <a href="<?=$v['link']?>" class="btn btn-primary-modern">Xem thêm<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
        <div class="slider-control type-3 z-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="dots-slider"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
        .h5-custom-editor p { margin-bottom: 0; display: inline-block; }
        .h1-custom-editor p { margin-bottom: 0; }
        .silder-img {
            height: auto !important;
            aspect-ratio: 1920 / 750;
            background-size: cover !important;
            background-position: center center !important;
            display: flex;
            align-items: center;
        }
    </style>
    <!-- Slider end -->

    <!-- Our features start -->
    <section class="features-area bg-light-white pt-80 pb-80" style="background: #f8fafc;">
        <div class="container">
            <div class="row">
                <?php if(!empty($ds_themanh)) { foreach($ds_themanh as $k => $v) { ?>
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="<?=($k * 0.1)?>s">
                    <div class="feature-card-modern">
                        <div class="icon-circle-modern">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/feature/icon'.($k+1).'.png'?>" alt="<?=$v['ten_vi']?>" style="width:40px; height:40px; object-fit:contain;">
                        </div>
                        <div class="icon-text">
                            <h5><?=$v['ten_vi']?></h5>
                            <p class="mb-0"><?=$v['mota_vi']?></p>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!-- Our features end -->

    <!-- About us start -->
    <section class="about-us pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Image with Depth -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img-wrapper wow fadeInLeft">
                        <img src="<?=!empty($about['photo']) ? $about['photo'] : 'img/about/ceo.jpg'?>" alt="Về Khaservice">
                        
                        <?php if(!empty($about['video'])) { ?>
                        <a href="<?=$about['video']?>" class="popup-video video-btn-modern">
                            <i class="fas fa-play ml-1"></i>
                        </a>
                        <?php } ?>
                    </div>
                </div>

                <!-- Right Column: Content -->
                <div class="col-lg-6">
                    <div class="about-text pl-lg-5 wow fadeInRight">
                        <div class="fancy-head left-al mb-30">
                            <h5 class="line-head mb-15">VỀ CHÚNG TÔI</h5>
                            <h1 class="mb-20" style="font-size: 2.5rem; line-height: 1.2;"><?=$about['ten_vi']?></h1>
                        </div>
                        
                        <div class="description content-main mb-40 text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                            <?=$about['noidung_vi']?>
                        </div>
                        
                        <div class="row mb-40">
                            <div class="col-6 mb-3">
                                <div class="stat-card">
                                    <div class="stat-icon"><i class="fas fa-medal"></i></div>
                                    <h3>10+</h3>
                                    <p>Năm kinh nghiệm</p>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="stat-card">
                                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                                    <h3><span class="counter"><?=number_format($about['sl_nhanvien'])?></span>+</h3>
                                    <p>Nhân sự</p>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="stat-card">
                                    <div class="stat-icon"><i class="fas fa-building"></i></div>
                                    <h3><span class="counter"><?=number_format($about['sl_duan'])?></span>+</h3>
                                    <p>Dự án</p>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="stat-card">
                                    <div class="stat-icon"><i class="fas fa-home"></i></div>
                                    <h3><span class="counter"><?=number_format($about['sl_canho'])?></span>+</h3>
                                    <p>Căn hộ</p>
                                </div>
                            </div>
                        </div>

                        <a href="index.php?com=gioi-thieu" class="btn btn-primary-modern shadow-lg">
                            TÌM HIỂU THÊM <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us end -->

    <!-- Service start -->
    <section class="service-3 pt-100 pb-100" data-overlay="9" style="background-image: url('img/bg/bg_blgng.jpg'); background-attachment: fixed; position: relative;">
        <div class="container" style="position: relative; z-index: 10;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-60">
                        <h5 class="line-head mb-15 wow fadeInDown">DỊCH VỤ CỦA CHÚNG TÔI</h5>
                        <h1 class="white wow fadeInUp">Lĩnh Vực Hoạt Động</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($ds_dichvu)) { foreach($ds_dichvu as $k=>$v){ ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="modern-service-card wow fadeInUp" data-wow-delay="<?=$k*0.1?>s">
                        <div class="modern-service-icon">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/service/'.(($k%4)+1).'.png'?>" 
                                 onerror="this.src='img/feature/icon1.png';" 
                                 alt="<?=$v['ten_vi']?>">
                        </div>
                        <h3 class="modern-service-title"><?=$v['ten_vi']?></h3>
                        <div class="modern-service-desc">
                            <?=strip_tags($v['noidung_vi'])?>
                        </div>
                        <a href="dich-vu/<?=$v['ten_khong_dau']?>.html" class="modern-service-btn">
                            Xem chi tiết <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!-- Service end -->

    <!-- Featured Projects start -->
    <section class="featured-projects bg-light-white pt-100 pb-100">
        <div class="container">
            <div class="row align-items-end mb-60">
                <div class="col-lg-7 text-center text-lg-left">
                    <div class="fancy-head wow fadeInLeft">
                        <h5 class="line-head mb-15">DỰ ÁN</h5>
                        <h1 class="text-uppercase">Dự Án Tiêu Biểu</h1>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-right d-none d-lg-block">
                    <div class="arrow-navigation mb-15">
                        <a href="" class="nav-slide nav-price-left mr-2">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="" class="nav-slide nav-price-right">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel price-slider">
                        <?php if(!empty($ds_duan)) { foreach($ds_duan as $v) { 
                            $link_duan = 'du-an/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                            $img_src = ($v['photo']!='' && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image';
                        ?>
                        <div class="item">
                            <div class="project-corporate-card bg-white wow fadeInUp h-100">
                                <div class="project-thumb">
                                    <a href="<?=$link_duan?>">
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
                                        <a href="<?=$link_duan?>"><?=$v['ten_vi']?></a>
                                    </h4>
                                    <div class="project-desc mb-3">
                                        <?=(!empty($v['mota_vi']) && trim($v['mota_vi']) != '') ? strip_tags($v['mota_vi']) : 'Nội dung đang cập nhật...'?>
                                    </div>
                                    <div class="project-line"></div>
                                    <div class="project-footer d-flex justify-content-between align-items-center">
                                        <span class="text-muted text-xs font-weight-bold text-uppercase">Chi tiết dự án</span>
                                        <a href="<?=$link_duan?>" class="btn-arrow-link"><i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial area start -->
    <style>
        .testimonial-box {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            position: relative;
            margin: 20px 10px;
            transition: all 0.3s ease;
        }
        .testimonial-box:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .quote-icon-bg {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 80px;
            color: rgba(255, 255, 255, 0.05);
            font-family: serif;
            line-height: 1;
        }
        .client-img-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px auto;
            position: relative;
        }
        .client-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #108042;
            padding: 3px;
            background: rgba(255,255,255,0.1);
        }
        .quote-text {
            font-style: italic;
            font-size: 16px;
            line-height: 1.8;
            color: #e0e0e0;
            margin-bottom: 25px;
            min-height: 80px; /* Giữ chiều cao đều nhau */
        }
        .client-name {
            color: #ffffff; /* Trắng tinh tế */
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 5px;
            text-transform: uppercase; /* Giữ in hoa nhưng chỉnh lại spacing */
            letter-spacing: 2px; /* Khoảng cách chữ rộng tạo vẻ sang trọng */
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
            background: linear-gradient(to right, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; /* Hiệu ứng gradient chữ kim loại */
        }
        .client-role {
            font-size: 14px;
            color: #ffffff; /* Chuyển sang trắng mờ */
            opacity: 0.8;
            letter-spacing: 1px;
        }
        /* Custom Owl Nav for Testimonials */
        .testimonial-slider.owl-carousel .owl-nav {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .testimonial-slider.owl-carousel .owl-nav button {
            width: 50px;
            height: 50px;
            border-radius: 50% !important;
            background: rgba(16, 128, 66, 0.2) !important;
            border: 1px solid #108042 !important;
            color: #fff !important;
            font-size: 18px !important;
            transition: all 0.3s ease;
            display: flex !important; /* Owl override */
            align-items: center;
            justify-content: center;
            position: relative;
        }
        /* Ẩn các icon/thẻ a cũ bên trong nếu có để tránh lặp */
        .testimonial-slider.owl-carousel .owl-nav button a,
        .testimonial-slider.owl-carousel .owl-nav button span { 
            display: none !important; 
        }
        /* Tạo icon mới bằng pseudo-element để thống nhất */
        .testimonial-slider.owl-carousel .owl-nav button.owl-prev:after {
            content: "\f060"; /* FontAwesome arrow-left */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }
        .testimonial-slider.owl-carousel .owl-nav button.owl-next:after {
            content: "\f061"; /* FontAwesome arrow-right */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }
        
        .testimonial-slider.owl-carousel .owl-nav button:hover {
            background: #108042 !important;
            transform: scale(1.1);
        }
        @media (max-width: 767px) {
            .testimonial-box {
                padding: 30px 20px;
            }
            .testimonial-slider.owl-carousel .owl-nav {
                margin-top: 20px;
            }
        }
        .stars-custom {
            color: #ffc107;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
    <section class="testimonials pt-55 pb-65" data-overlay="9" style="background-image: url('img/bg/bg-2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40">
                        <h5 class="line-head mb-15 ">
                            <span class="line before "></span>
                            LỜI CHỨNG THỰC
                            <span class="line after"></span>
                        </h5>
                        <h1 class="white">Khách Hàng Nói Về Chúng Tôi</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel owl-theme testimonial-slider" data-nav="true">
                        <?php if(!empty($ds_ykien)) { foreach($ds_ykien as $v) { ?>
                        <div class="item">
                            <div class="testimonial-box text-center">
                                <div class="quote-icon-bg"><i class="fas fa-quote-right"></i></div>
                                
                                <div class="client-img-wrapper">
                                    <?php 
                                        $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://ui-avatars.com/api/?name='.urlencode($v['ten_vi']).'&background=ebebeb&color=666666&size=100';
                                    ?>
                                    <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>">
                                </div>
                                
                                <div class="stars-custom">
                                    <?php for($i=0;$i<$v['rating'];$i++) echo '<i class="fas fa-star"></i>'; ?>
                                    <?php for($i=$v['rating'];$i<5;$i++) echo '<i class="far fa-star" style="opacity:0.3"></i>'; ?>
                                </div>

                                <h4 class="white mb-15 f-700" style="font-size: 20px;">“<?=$v['mota_vi']?>”</h4>
                                
                                <div class="quote-text text-justify">
                                    <?=strip_tags($v['noidung_vi'])?>
                                </div>
                                
                                <div class="client-info pt-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
                                    <div class="client-name"><?=$v['ten_vi']?></div>
                                    <div class="client-role"><?=$v['chucvu']?></div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial area end -->

    <!-- Photo Gallery area start -->
    <?php if(!empty($ds_thuvien)) { ?>
    <section class="gallery-area pt-95 pb-70 bg-light-white">
        <div class="container">
            <div class="row align-items-end text-center text-lg-left mb-45">
                <div class="col-lg-7">
                    <div class="fancy-head left-al">
                        <h5 class="line-head mb-15">
                            <span class="line before d-lg-none"></span>
                            BỘ SƯU TẬP
                            <span class="line after"></span>
                        </h5>
                        <h1>Thư Viện Ảnh</h1>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-right mt-md-20">
                    <a href="thu-vien-anh.html" class="btn btn-square-border">XEM TẤT CẢ<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                </div>
            </div>
            <div class="row">
                <?php foreach($ds_thuvien as $v) { 
                    $link_tv = 'thu-vien-anh/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                ?>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="gallery-card bg-white shadow-sm rounded-lg overflow-hidden h-100 transition-4" style="border-radius: 12px;">
                        <div class="gallery-thumb relative overflow-hidden" style="height: 240px;">
                            <a href="<?=$link_tv?>" class="d-block h-100">
                                <img src="<?=get_photo($v['photo'])?>" alt="<?=$v['ten_vi']?>" class="w-100 h-100 object-fit-cover transition-4">
                            </a>
                            <div class="gallery-overlay d-flex flex-column align-items-center justify-content-center" style="background: rgba(16, 128, 66, 0.8);">
                                <div class="icon-circle mb-3" style="width: 50px; height: 50px; border: 1px solid #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-images text-white"></i>
                                </div>
                                <a href="<?=$link_tv?>" class="btn btn-round-blue btn-sm" style="font-size: 11px; padding: 8px 15px;">XEM ALBUM</a>
                            </div>
                        </div>
                        <div class="gallery-info p-3 text-center">
                            <h6 class="f-700 mb-0">
                                <a href="<?=$link_tv?>" class="text-dark hover-green text-split-2" style="font-size: 15px;"><?=$v['ten_vi']?></a>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Photo Gallery area end -->

    <!-- Blog/news letter area start -->
    <style>
        .each-blog {
            transition: all 0.4s ease;
            border-radius: 12px;
            padding: 15px;
            margin-left: -15px;
            margin-right: -15px;
        }
        .each-blog:hover {
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transform: translateX(10px);
        }
        .blog-date {
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .blog-date img {
            transition: transform 0.6s ease;
        }
        .each-blog:hover .blog-date img {
            transform: scale(1.15);
        }
        .each-blog .blog-text a {
            transition: all 0.3s ease;
            display: block;
        }
        .each-blog:hover .blog-text a {
            color: #108042 !important;
        }
        .blog-meta {
            display: flex;
            align-items: center;
            font-size: 12px;
            color: #777;
            gap: 15px;
        }
        .blog-meta span {
            display: flex;
            align-items: center;
        }
        .blog-meta i {
            margin-right: 6px;
            color: #108042;
            font-size: 11px;
        }
        .blog-meta .entry-cat {
            background: rgba(16, 128, 66, 0.1);
            color: #108042;
            padding: 2px 10px;
            border-radius: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .blog-outer .fancy-head h1 {
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        /* Fix Testimonial Client Image and Before Circle */
        .client-image {
            width: 80px;
            height: 80px;
            margin: 0 auto 40px auto !important;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .client-image:before {
            content: "" !important; /* Loại bỏ content cũ nếu có */
            position: absolute;
            border: 2px solid #108042 !important;
            opacity: 0.6 !important;
            left: -10px !important;
            right: -10px !important;
            top: -10px !important;
            bottom: -10px !important;
            border-radius: 50% !important;
        }
        .client-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            border-radius: 50% !important;
            z-index: 2;
            position: relative;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Blog section start -->
                    <div class="blog-outer pt-95 pb-100 pb-md-60 mr-65 mr-md-00">
                        <div class="fancy-head left-al mb-45">
                            <h5 class="line-head mb-15">
                                News & blogs
                                <span class="line after"></span>
                            </h5>
                            <h1>Tin tức mới nhất</h1>
                        </div>
                        <?php if(!empty($ds_tintuc)) { foreach($ds_tintuc as $v) { ?>
                        <div class="each-blog pb-25 mb-25 d-flex align-items-center">
                            <div class="blog-date text-center transition-4 bg-light-white mr-30" style="width: 100px; height: 80px; overflow: hidden; border-radius: 8px; flex-shrink: 0;">
                                <?php 
                                    $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/400x300/ebebeb/666666?text=Khaservice';
                                ?>
                                <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>" style="width: 100%; height: 100%; object-fit: cover;" />
                            </div>
                            <div class="blog-text">
                                <h6 style="margin-bottom: 8px;">
                                    <?php $link_tintuc = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html'; ?>
                                    <a href="<?=$link_tintuc?>" class="f-700 text-split-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.8em; line-height: 1.4em; transition: 0.3s;"><?=$v['ten_vi']?></a>
                                </h6>
                                <div class="blog-meta">
                                    <span class="entry-date"><i class="far fa-calendar-alt"></i> <?=date('d/m/Y', $v['ngaytao'])?></span>
                                    <span class="entry-cat"><?=($v['ten_danhmuc']!='')?$v['ten_danhmuc']:'Tin tức'?></span>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                    <!-- Blog section end -->
                </div>
                <div class="col-lg-6 mb-md-60 pb-md-60">
                    <!-- subscribe us section start -->
                    <div class="subscribe h-100 pt-95 pb-100 pl-65 pr-65 pl-xs-25 pr-xs-25 " style="background-image: url('img/bg/bg_newsletter.jpg');" data-overlay="9">
                        <div class="fancy-head left-al z-10 mb-40">
                            <h5 class="line-head mb-15">
                                Newsletter
                                <span class="line after"></span>
                            </h5>
                            <h1>Đăng ký nhận tin từ chúng tôi</h1>
                        </div>
                        <div class="subscribe-cotnent z-10">
                            <p class="mb-45 text-justify">Những tin tưc mới nhất sẽ được chúng tôi cập nhật đến bạn quá email nếu bạn để lại cho chúng tôi thông tin và email liên hệ và chúng hoàn toàn tự động. Chúng tôi cam kết không sữ dụng email của bạn vào mục đích nào khác.</p>
                            <form action="#" id="frm-subscribe" onsubmit="return false;">
                                <div class="form-group relative mb-30">
                                    <input type="text" class="form-control input-white" id="name2" placeholder="Họ & Tên">
                                    <i class="far fa-user transform-v-center"></i>
                                </div>
                                <div class="form-group relative mb-30">
                                    <input type="email" class="form-control input-white" id="email2" placeholder="Email">
                                    <i class="far fa-envelope transform-v-center"></i>
                                </div>
                                <button class="btn btn-blue uppercase shadow-2">
                                    Đăng ký
                                    <i class="fas fa-long-arrow-alt-right ml-15"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- subscribe us section end -->
                </div>
            </div>
        </div>
    </section>
    <!-- Blog/news letter area end -->