    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Giới thiệu</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$row_detail['ten_vi']?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- immer banner end -->

    <!-- About us start -->
    <section class="about-us pt-100 pb-100">
        <div class="container">
            <div class="row align-items-xl-center">
                <?php if(!empty($row_detail['photo'])) { ?>
                <div class="col-lg-6">
                    <div class="relative img-lined bg-blue mx-auto shadow-1 mb-md-30">
                        <img src="<?=$row_detail['photo']?>" alt="<?=$row_detail['ten_vi']?>" class="w-100">
                        <?php 
                            if(!empty($row_setting['video_intro'])) { 
                                $video_url = $row_setting['video_intro'];
                                // Đảm bảo link sạch để popup nhận diện đúng
                                if(strpos($video_url, '&') !== false) {
                                    $video_parts = explode('&', $video_url);
                                    $video_url = $video_parts[0];
                                }
                        ?>
                            <div class="blob green transform-center">
                                <a href="<?=$video_url?>" class="popup-video"> <i class="fas fa-play"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                <?php } else { ?>
                <div class="col-lg-12">
                <?php } ?>
                    <div class="about-text text-center text-lg-left">
                        <div class="fancy-head left-al mb-10">
                            <h5 class="line-head mb-15">
                                <span class="line before d-lg-none"></span>
                                    Giới thiệu
                                <span class="line after"></span>
                            </h5>
                            <h1><?=$row_detail['ten_vi']?></h1>
                        </div>
                        <?php if(!empty($row_detail['mota_vi'])) { ?>
                            <div class="short-desc mb-30 font-weight-bold italic" style="font-size: 1.1rem; color: #555; border-left: 4px solid #108042; padding-left: 20px;">
                                <?=$row_detail['mota_vi']?>
                            </div>
                        <?php } ?>
                        <div class="description content-main">
                            <?=str_replace('src="../upload/', 'src="upload/', $row_detail['noidung_vi'])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us end -->
    
    <style>
        .content-main { text-align: justify; }
        .content-main img { max-width: 100% !important; height: auto !important; margin: 20px auto; display: block; }
        .content-main table { width: 100% !important; }
        @media (max-width: 767px) {
            .inner-banner { padding: 40px 0 !important; }
            .about-us { padding: 50px 0 !important; }
        }
    </style>

    <!-- Team area start -->
    <section class="team-area pt-95 pb-100">
        <div class="container">
            <div class="row align-items-end text-center text-lg-left  mb-45">
                <div class="col-lg-7">
                    <div class="fancy-head left-al">
                        <h5 class="line-head mb-15">
                            <span class="line before d-lg-none"></span>
                            ĐỘI NGŨ
                            <span class="line after"></span>
                        </h5>
                        <h1>Nhân Sự Của Chúng Tôi</h1>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-right">
                    <div class="arrow-navigation mb-15 mt-md-20">
                        <a href="" class="nav-slide slide-left">
                            <img src="img/icons/ar_lt.png" alt="">
                        </a>
                        <a href="" class="nav-slide slide-right">
                            <img src="img/icons/ar_rt.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel team-slider">
                        <?php if(!empty($ds_team)) { foreach($ds_team as $v) { ?>
                        <div class="item">
                            <div class="team-each">
                                <div class="team-image relative img-lined">
                                    <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/team/team1.jpg'?>" alt="">
                                </div>
                                <div class="team-info text-center transition-4">
                                    <h5>
                                        <a href="#" class="f-700"><?=$v['ten_vi']?></a>
                                    </h5>
                                    <p class="mb-0"><?=$v['chucvu']?></p>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team area end -->

    <!-- Testimonial area start -->
    <section class="testimonials-2 bg-light-white pt-95 pb-95">
        <div class="container">
            <div class="row align-items-end mb-45">
                <div class="col-lg-7 col-md-12 text-center text-lg-left">
                    <div class="fancy-head left-al">
                        <h5 class="line-head mb-15">
                          <span class="line before d-lg-none"></span>
                            Lời chứng thực
                          <span class="line after"></span>
                        </h5>
                        <h1>Khách Hàng Nói Về Chúng Tôi</h1>
                    </div>
                </div>
                <div class="col-lg-5 text-center text-lg-right">
                    <div class="arrow-navigation mb-15 mt-md-20">
                        <a href="" class="nav-slide slide-left testi-2">
                            <img src="img/icons/ar_lt.png" alt="">
                        </a>
                        <a href="" class="nav-slide slide-right testi-2">
                            <img src="img/icons/ar_rt.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="hr-2 bg-blue opacity-1 mt-45"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel owl-theme testimonial-2-slide">
                        <?php if(!empty($ds_ykien)) { foreach($ds_ykien as $v) { ?>
                        <div class="item">
                            <div class="each-quote-2 pr-40 pr-sm-00">
                                <ul class="stars-rate mb-5" data-starsactive="<?=$v['rating']?>">
                                    <li class="text-md-left text-center">
                                        <?php for($i=0; $i<$v['rating']; $i++) echo '<i class="fas fa-star"></i>'; ?>
                                    </li>
                                </ul>
                                <h4 class="italic f-700 mb-20"><?=$v['mota_vi']?></h4>
                                <p class="mb-35"><?=$v['noidung_vi']?></p>
                                <div class="client-2-img d-flex align-items-center justify-content-md-start justify-content-center">
                                    <div class="img-div mr-30 pb-10">
                                        <div class="client-image">
                                            <?php 
                                                $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://ui-avatars.com/api/?name='.urlencode($v['ten_vi']).'&background=ebebeb&color=666666&size=100';
                                            ?>
                                            <img src="<?=$img_src?>" class="rounded-circle shadow-sm" style="width:70px; height:70px; object-fit:cover;" alt="<?=$v['ten_vi']?>">
                                        </div>
                                    </div>
                                    <div class="client-text-2 mb-10">
                                        <h6 class="client-name green fs-17 f-700"><?=$v['ten_vi']?></h6>
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
    <!-- Testimonial area end -->

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
                        <i class="fas fa-envelope mr-15" style="font-size: 0.85em;"></i><?=$row_setting['email']?>
                    </a>
                    <a href="tel:<?=str_replace(' ', '', $row_setting['hotline'])?>" class="btn btn-square-green d-block d-sm-inline-block blob-small wow fadeInUp">
                        <i class="fas fa-phone mr-15"></i><?=$row_setting['hotline']?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta area end -->