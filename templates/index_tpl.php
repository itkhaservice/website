    <!-- Slider start -->
    <section class="slider-area-2 relative">
        <div class="owl-carousel slider-2">
            <?php if(!empty($ds_slider)) { foreach($ds_slider as $v) { ?>
            <div class="item">
                <div class="silder-img bg-cover" style="background-image: url('<?=!empty($v['photo']) ? $v['photo'] : 'img/banner/banner_3b.jpg'?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-md-8">
                                <div class="slider-content-3 z-10">
                                    <h5 class="line-head">
                                          <?=!empty($v['mota_vi']) ? $v['mota_vi'] : 'Khaservice'?>
                                        <span class="line  after"></span>
                                      </h5>
                                    <h1 class="banner-head-2 banner-head-3 black f-700 mt-15 mb-35 mt-xs-20 mb-xs-30"><?=$v['ten_vi']?></h1>
                                    <a href="index.php?com=gioi-thieu" class="btn btn-square-border">Xem thêm<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} else { ?>
            <!-- Fallback Slider if empty -->
            <div class="item">
                <div class="silder-img bg-cover" style="background-image: url('img/banner/banner_3a.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-md-8">
                                <div class="slider-content-3 z-10">
                                    <h5 class="line-head">
                              1000+ Happy Clients
                            <span class="line  after"></span>
                          </h5>
                                    <h1 class="banner-head-2 banner-head-3 black f-700 mt-15 mb-35 mt-xs-20 mb-xs-30">Let's <span class="green">Make Something Awesome Together</span> with the Right People.</h1>
                                    <a href="" class="btn btn-square-border">Learn More<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="slider-control type-3 z-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="dots-slider">

                        </div>
                    </div>
                    <div class="col-lg-6 text-right d-none d-lg-block">
                        <div class="nav-slider d-flex justify-content-end">
                            <a href="" class="slider-btn slides-left flex-center">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="" class="slider-btn slides-right flex-center">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider end -->

    <!-- Our features start -->
    <section class="features-area bg-light-white pt-40 pb-40 pb-xs-00">
        <div class="container">
            <div class="row">
                <?php if(!empty($ds_themanh)) { foreach($ds_themanh as $k => $v) { ?>
                <div class="col-sm-4 text-center text-lg-left mb-3">
                    <div class="icon-box d-flex flex-column flex-lg-row">
                        <div class="icon-img mr-20 mr-md-00 mb-md-10">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/feature/icon'.($k+1).'.png'?>" alt="<?=$v['ten_vi']?>" style="width:56px; height:56px; object-fit:contain;">
                        </div>
                        <div class="icon-text">
                            <h5 class="f-700"><?=$v['ten_vi']?></h5>
                            <p style="text-align: justify;"><?=$v['mota_vi']?></p>
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
            <div class="row align-items-xl-center">
                <div class="col-lg-5">
                    <div class="ceo-video relative img-lined mx-auto shadow-1 wow fadeInLeft">
                        <img src="<?=!empty($about['photo']) ? $about['photo'] : 'img/about/ceo.jpg'?>" alt="">
                        <!-- <div class="blob green transform-center">
                            <a href="https://www.youtube.com/watch?v=qtQgbdmIO30" class="popup-video"> <i class="fas fa-play"></i></a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-text mt-md-60 text-center text-lg-left wow fadeInRight">
                        <div class="fancy-head left-al  mb-10">
                            <h5 class="line-head mb-10">
                                <span class="line before d-lg-none"></span>
                                Về chúng tôi
                                <span class="line  after"></span>
                            </h5>
                            <h1><?=$about['ten_vi']?></h1>
                        </div>
                        <div class="description" style="text-align: justify;">
                            <?=$about['noidung_vi']?>
                        </div>
                        <p><a href="index.php?com=gioi-thieu">Xem thêm</a></p>
                        
                        <div class="hr-line mb-30 mt-30"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($about['sl_nhanvien'])?></span>+</h3>
                                    <p>Nhân viên</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp" data-wow-delay=".2s">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($about['sl_duan'])?></span>+</h3>
                                    <p>Dự án</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="count-box wow fadeInUp" data-wow-delay=".4s">
                                    <h3 class="f-900 mb-10"><span class="counter"><?=number_format($about['sl_canho'])?></span>+</h3>
                                    <p>Tổng số căn hộ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About us end -->

    <!-- Service start -->
    <section class="service-3 pt-95" data-overlay="9" style="background-image: url('img/bg/bg_blgng.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-45">
                        <h5 class="line-head mb-15 wow fadeInDown" >
                          <span class="line before "></span>
                                DỊCH VỤ CỦA CHÚNG TÔI
                          <span class="line after"></span>
                        </h5>
                        <h1 class="white wow fadeInUp" >Lĩnh Vực Hoạt Động</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($ds_dichvu)) { foreach($ds_dichvu as $k=>$v){ ?>
                <div class="col-xl-3 col-md-6 text-center mb-4">
                    <div class="service-list-3 shadow-2 transition-4 img-lined z-5 no-mar wow zoomIn h-100">
                        <div class="icon-bg-white flex-center z-10">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/service/'.(($k%4)+1).'.png'?>" 
                                 onerror="this.src='img/feature/icon1.png';" 
                                 style="width:70px; height:70px; object-fit:contain;" alt="<?=$v['ten_vi']?>">
                        </div>
                        <div class="service-text-3 transition-4 mt-15 z-10">
                            <h4 class="f-700 mb-10 text-split-3" style="min-height: 4.5em;"><?=$v['ten_vi']?></h4>
                            <p class="mb-20 text-split-3" style="min-height: 4.5em;"><?=strip_tags($v['noidung_vi'])?></p>
                            <a href="dich-vu/<?=$v['ten_khong_dau']?>.html" class="btn btn-border-blue mb-30">
                                Xem thêm<i class="fas fa-long-arrow-alt-right ml-15"></i>
                            </a>
                            <span class="bg-green undeline-3"></span>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!-- Service end -->

    <!-- Count area start -->
    <section class="count-3 pt-100 pb-70">
    </section>
    <!-- Count area end -->

    <!-- Features list start -->
    <section class="feature-list-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-lg-6">
                    <div class="video-present relative img-lined shadow-1 bg-blue wow fadeInLeft">
                        <img src="img/feature/office_video.jpg" class="opacity-5 img-100" alt="">
                        <div class="video-text transform-center">
                            <div class="blob green video-blob">
                                <a href="https://www.youtube.com/watch?v=qtQgbdmIO30" class="popup-video"> <i class="fas fa-play"></i></a>
                            </div>
                            <h4 class="white f-700 mt-15">Video Presentation</h4>
                            <p class="white mt-5 mb-0">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="feature-all mt-md-60">
                        <div class="fancy-head left-al text-left text-md-center text-lg-left mb-30 wow fadeInDown">
                            <h5 class="line-head mb-15">
                                <span class="line before d-sm-none d-md-block d-lg-none"></span>
                                TẠI SAO CHỌN CHÚNG TÔI?
                                <span class="line after"></span>
                            </h5>
                            <h1>Giá Trị Cốt Lõi</h1>
                        </div>
                        <div class="feature-list wow fadeInRight">
                            <ul class="feature-list-all">
                                <?php if(!empty($ds_tieuchi)) { foreach($ds_tieuchi as $k => $v) { ?>
                                <li class="mb-20">
                                    <div class="d-flex align-items-center justify-content-lg-start justify-content-center text-lg-left text-center">
                                        <div class="feature-num mr-25">
                                            <span class="flex-center bg-light-white"><?=sprintf("%02d", $k+1)?></span>
                                        </div>
                                        <div class="feature-detail">
                                            <h5 class="f-700"><?=$v['ten_vi']?></h5>
                                            <p style="text-align: justify;"><?=$v['mota_vi']?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features list end -->

    <!-- Request callback start -->
    <section class="callback-area pt-95 pb-85" style="background-image: url('img/banner/banner_1.jpg');" data-overlay="9">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40 wow fadeInDown">
                        <h5 class="line-head mb-15 white">
                            <span class="line before bg-white"></span>
                                LIÊN HỆ
                            <span class="line after bg-white"></span>
                        </h5>
                        <h1 class="white">Để lại thông tin và chúng tôi sẽ gọi lại cho bạn</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <form action="#" class="relative z-5  wow fadeInUp">
                        <div class="row">
                            <div class="col-xl-10 col-lg-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group relative">
                                            <input type="text" class="form-control input-white shadow-2" id="name" placeholder="Họ & Tên">
                                            <i class="far fa-user transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group relative">
                                            <input type="email" class="form-control input-white shadow-2" id="email" placeholder="Email">
                                            <i class="far fa-envelope transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group relative">
                                            <input type="text" class="form-control input-white shadow-2" id="phone" placeholder="Số Điện Thoại">
                                            <i class="fas fa-mobile-alt transform-v-center"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <button class="btn btn-blue btn-block request-btn uppercase shadow-2">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Request callback end -->

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

    <!-- Pricing area start -->
    <section class="pricong-area bg-light-white pt-95 pb-100">
        <div class="container">
            <div class="row align-items-end text-center text-lg-left mb-45">
                <div class="col-lg-7 text-center text-lg-left">
                    <div class="fancy-head left-al wow fadeInLeft">
                        <h5 class="line-head mb-15">
                            <span class="line before d-lg-none"></span>
                            Dự án
                            <span class="line after"></span>
                        </h5>
                        <h1>Dự Án Tiêu Biểu</h1>
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
                    <div class="owl-carousel price-slider">
                        <?php if(!empty($ds_duan)) { foreach($ds_duan as $v) { ?>
                        <div class="item">
                            <div class="price-each relative img-lined text-center wow fadeInUp" style="background: url('<?=($v['photo']!='' && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image'?>') center center / cover no-repeat;">
                                <div class="price-head z-8 underlined">
                                    <?php if(!empty($v['ten_khuvuc'])) { ?>
                                        <span class="badge badge-success px-3 py-2 mt-3 shadow" style="background-color: #108042; font-size: 12px; font-weight: 600; text-transform: uppercase;"><?=$v['ten_khuvuc']?></span>
                                    <?php } ?>
                                </div>
                                <a href="index.php?com=du-an&id=<?=$v['id']?>" class="btn btn-round wide mt-10 z-8 text-uppercase"><?=$v['ten_vi']?></a>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing area end -->

    <!-- Testimonial area start -->
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
                    <div class="owl-carousel owl-theme testimonial-slider">
                        <?php if(!empty($ds_ykien)) { foreach($ds_ykien as $v) { ?>
                        <div class="item">
                            <div class="testimonial-div text-center">
                                <div class="client-image">
                                    <?php 
                                        $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://ui-avatars.com/api/?name='.urlencode($v['ten_vi']).'&background=ebebeb&color=666666&size=100';
                                    ?>
                                    <img src="<?=$img_src?>" class="mt-10 mb-45 rounded-circle shadow-sm" style="width:70px; height:70px; object-fit:cover; margin: auto;" alt="<?=$v['ten_vi']?>">
                                </div>
                                <div class="client-texts">
                                    <h3 class="green mb-20 f-700 italic">“<?=$v['mota_vi']?>”</h3>
                                    <p class="white mb-20"><?=strip_tags($v['noidung_vi'])?></p>
                                </div>
                                <div class="client-info">
                                    <ul class="stars-rate" data-starsactive="<?=$v['rating']?>">
                                        <li class=" text-center text-warning">
                                            <?php for($i=0;$i<$v['rating'];$i++) echo '<i class="fas fa-star"></i>'; ?>
                                        </li>
                                    </ul>
                                    <h6 class="client-name green f-700"><?=$v['ten_vi']?></h6>
                                    <p class="white mb-0"><?=$v['chucvu']?></p>
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

    <!-- Blog/news letter area start -->
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
                                <h6 style="margin-bottom: 5px;">
                                    <a href="index.php?com=tin-tuc&id=<?=$v['id']?>" class="f-700 text-split-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.8em; line-height: 1.4em;"><?=$v['ten_vi']?></a>
                                </h6>
                                <p class="f-500 mb-0 small text-muted"><?=date('d/m/Y', $v['ngaytao'])?> / <?=($v['ten_danhmuc']!='')?$v['ten_danhmuc']:'Tin tức'?></p>
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
                            <p class="mb-45">Những tin tưc mới nhất sẽ được chúng tôi cập nhật đến bạn quá email nếu bạn để lại cho chúng tôi thông tin và email liên hệ và chúng hoàn toàn tự động. Chúng tôi cam kết không sữ dụng email của bạn vào mục đích nào khác.</p>
                            <form action="#">
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