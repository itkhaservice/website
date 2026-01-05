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

    <!-- About us start (Giống trang chủ) -->
    <section class="about-us pt-100 pb-100">
        <div class="container">
            <div class="row align-items-xl-center">
                <?php if($com == 'gioi-thieu' && empty($_GET['id'])) { ?>
                <div class="col-lg-5">
                    <div class="ceo-video relative img-lined mx-auto shadow-1 wow fadeInLeft">
                        <?php 
                            $about_img = (!empty($row_detail['photo'])) ? $row_detail['photo'] : 'img/about/ceo.jpg';
                            $video_url = (!empty($row_detail['video'])) ? $row_detail['video'] : '';
                        ?>
                        <img src="<?=$about_img?>" alt="<?=$row_detail['ten_vi']?>" class="w-100">
                        <?php if(!empty($video_url)) { 
                             // Xử lý link Youtube để lấy ID chuẩn
                             $video_id = '';
                             if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match)) {
                                 $video_id = $match[1];
                             }
                             $final_url = ($video_id != '') ? 'https://www.youtube.com/watch?v=' . $video_id : $video_url;
                        ?>
                        <div class="blob green transform-center">
                            <a href="<?=$final_url?>" class="popup-video"> <i class="fas fa-play"></i></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-7">
                <?php } else { ?>
                <div class="col-lg-12">
                <?php } ?>
                    <div class="about-text mt-md-60 text-center text-lg-left wow fadeInRight">
                        <div class="fancy-head left-al  mb-10">
                            <h5 class="line-head mb-10">
                                <span class="line before d-lg-none"></span>
                                Về chúng tôi
                                <span class="line  after"></span>
                            </h5>
                            <h1><?=$row_detail['ten_vi']?></h1>
                        </div>
                        <div class="description content-main mb-20" id="lightgallery-about">
                            <?=str_replace('src="../upload/', 'src="upload/', $row_detail['noidung_vi'])?>
                        </div>
                        
                        <?php if($com == 'gioi-thieu' && empty($_GET['id'])) { ?>
                        <div class="hr-line mb-30 mt-30"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($row_detail['sl_nhanvien'])?></span>+</h3>
                                    <p>Nhân viên</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp" data-wow-delay=".2s">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($row_detail['sl_duan'])?></span>+</h3>
                                    <p>Dự án</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp" data-wow-delay=".4s">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($row_detail['sl_canho'])?></span>+</h3>
                                    <p>Tổng số căn hộ</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us end -->

    <!-- Mission and vision area start -->
    <?php if(($com == 'gioi-thieu' && empty($_GET['id'])) && (!empty($row_detail['tamnhin']) || !empty($row_detail['sumenh']))) { ?>
    <section class="mission-vision bg-light-white pt-100 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pr-50 pr-sm-15 mb-md-30">
                    <h2 class="fancy-2 f-700 mb-25">Tầm Nhìn</h2>
                    <div class="description text-justify">
                        <?=str_replace('src="../upload/', 'src="upload/', $row_detail['tamnhin'])?>
                    </div>
                </div>
                
                <div class="col-lg-6 pr-50 pr-sm-15">
                    <h2 class="fancy-2 f-700 mb-25">Sứ Mệnh</h2>
                    <div class="description text-justify">
                        <?=str_replace('src="../upload/', 'src="upload/', $row_detail['sumenh'])?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Mission and vision area end -->

    <!-- Team area start -->
    <?php if($com == 'gioi-thieu' && empty($_GET['id'])) { ?>
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
                                <div class="mb-35 text-justify"><?=strip_tags($v['noidung_vi'])?></div>
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
                                        <p class="mb-0 fs-13 f-500"><?=$v['chucvu']?></p>
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
    <?php } ?>
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

    <!-- LightGallery CSS/JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('lightgallery-about');
            if(!container) return;

            // Bọc ảnh vào thẻ <a> để LightGallery hoạt động
            const contentImages = container.querySelectorAll('img');
            contentImages.forEach(img => {
                if(img.naturalWidth > 50 || img.offsetWidth > 50) {
                    const src = img.getAttribute('src');
                    const wrapper = document.createElement('a');
                    wrapper.className = 'lg-item-wrapper';
                    wrapper.setAttribute('data-src', src);
                    wrapper.style.cursor = 'zoom-in';
                    wrapper.style.display = 'block';
                    
                    img.parentNode.insertBefore(wrapper, img);
                    wrapper.appendChild(img);
                }
            });

            // Khởi tạo LightGallery
            lightGallery(container, {
                selector: '.lg-item-wrapper',
                plugins: [lgZoom, lgThumbnail],
                speed: 500,
                mode: 'lg-fade',
                download: false,
                counter: true,
                enableDrag: true,
                enableSwipe: true
            });
        });
    </script>

    <style>
        .content-main { text-align: justify; }
        .content-main img { max-width: 100% !important; height: auto !important; margin: 20px auto; display: block; }
        .content-main table { width: 100% !important; }
        .big-p.blue { font-size: 1.15rem; line-height: 1.6; margin-bottom: 25px; font-weight: 500; }
        .mission-vision h2.fancy-2 { display: flex; align-items: center; margin-bottom: 25px; white-space: nowrap; }
        .mission-vision h2.fancy-2:after { content: ""; position: static; display: inline-block; width: 80px; height: 2px; background: #108042; margin-left: 20px; opacity: 0.6; }
        
        @media (max-width: 767px) {
            .inner-banner { padding: 40px 0 !important; }
            .about-us { padding: 50px 0 !important; }
        }
    </style>
