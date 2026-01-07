<script>document.title = "<?=$row_setting['shortName']?>";</script>
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
                                    <?php if(!empty($v['mota_vi'])) { ?>
                                    <div class="line-head h5-custom-editor">
                                          <?=htmlspecialchars_decode($v['mota_vi'])?>
                                        <span class="line after"></span>
                                    </div>
                                    <?php } ?>
                                    <div class="banner-head-2 banner-head-3 black f-700 mt-15 mb-35 mt-xs-20 mb-xs-30 h1-custom-editor">
                                        <?=htmlspecialchars_decode($v['ten_vi'])?>
                                    </div>
                                    <?php if(!empty($v['link'])) { ?>
                                    <a href="<?=$v['link']?>" class="btn btn-square-border">Xem thêm<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                                    <?php } ?>
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
                                    <div class="line-head">
                                        1000+ Happy Clients
                                        <span class="line after"></span>
                                    </div>
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
    
    <style>
        /* Fix styles for CKEditor content in Slider */
        .h5-custom-editor { position: relative; display: inline-block; font-size: 1.25rem; font-weight: 500; }
        .h5-custom-editor p { margin-bottom: 0; display: inline-block; }
        .h5-custom-editor .line { position: absolute; top: 50%; transform: translateY(-50%); }
        
        .h1-custom-editor { font-size: 3rem; line-height: 1.2; }
        .h1-custom-editor p { margin-bottom: 0; }
        
        /* Cấu trúc Slider mới: Tự động chiều cao theo chiều rộng */
        .silder-img {
            height: auto !important;
            min-height: auto !important;
            aspect-ratio: 1920 / 750; /* Tỷ lệ vàng cho banner desktop */
            background-size: cover !important;
            background-position: center center !important;
            display: flex;
            align-items: center;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            /* Tự động tính chiều cao theo tỷ lệ ảnh gốc để không bị mất hình (1920x750) */
            .silder-img { 
                aspect-ratio: 1920 / 750 !important;
                background-position: center center !important;
            }
            
            /* Ẩn hoàn toàn nội dung chữ trên mobile theo yêu cầu */
            .slider-content-3 {
                display: none !important;
            }
        }
    </style>
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
                            <p class="text-justify"><?=$v['mota_vi']?></p>
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
                        <?php if(!empty($about['video'])) { ?>
                        <div class="blob green transform-center">
                            <a href="<?=$about['video']?>" class="popup-video"> <i class="fas fa-play"></i></a>
                        </div>
                        <?php } ?>
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
                        <div class="description content-main mb-20">
                            <?=$about['noidung_vi']?>
                        </div>
                        <p><a href="index.php?com=gioi-thieu" class="btn-more-link">Xem thêm</a></p>
                        
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
                    <div class="service-list-3 shadow-2 transition-4 img-lined z-5 no-mar wow zoomIn h-100 bg-white p-4">
                        <div class="service-icon-wrapper z-10 mx-auto mb-3">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/service/'.(($k%4)+1).'.png'?>" 
                                 onerror="this.src='img/feature/icon1.png';" 
                                 style="width:100%; max-width:100px; height:80px; object-fit:contain;" alt="<?=$v['ten_vi']?>">
                        </div>
                        <div class="service-text-3 transition-4 mt-10 z-10">
                            <h4 class="f-700 mb-15 text-split-2 green" style="min-height: 2.8em; font-size: 18px;"><?=$v['ten_vi']?></h4>
                            <div class="mb-25 text-split-3 text-muted text-justify" style="min-height: 4.5em; font-size: 14px; line-height: 1.6;"><?=strip_tags($v['noidung_vi'])?></div>
                            <a href="dich-vu/<?=$v['ten_khong_dau']?>.html" class="btn btn-border-blue mb-10 px-4 rounded-pill">
                                XEM CHI TIẾT<i class="fas fa-long-arrow-alt-right ml-15"></i>
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
                        <img src="<?=!empty($about['photo']) ? $about['photo'] : 'img/feature/office_video.jpg'?>" class="opacity-5 img-100" alt="">
                        <div class="video-text transform-center">
                            <?php 
                            if(!empty($about['video'])) { 
                                // Xử lý link Youtube để lấy ID chuẩn, tránh lỗi popup
                                $video_url = $about['video'];
                                $video_id = '';
                                
                                // Pattern bắt link youtube các kiểu (ngắn, dài, embed...)
                                if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match)) {
                                    $video_id = $match[1];
                                }
                                
                                // Nếu lấy được ID thì tạo link chuẩn, không thì giữ nguyên link gốc (dự phòng)
                                $final_url = ($video_id != '') ? 'https://www.youtube.com/watch?v=' . $video_id : $video_url;
                            ?>
                            <div class="blob green video-blob">
                                <a href="<?=$final_url?>" class="popup-video"> <i class="fas fa-play"></i></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="feature-all mt-md-60">
                        <div class="fancy-head left-al text-left mb-30 wow fadeInDown">
                            <h5 class="line-head mb-15">
                                TẠI SAO CHỌN CHÚNG TÔI?
                                <span class="line after"></span>
                            </h5>
                            <h1>Giá Trị Cốt Lõi</h1>
                        </div>
                        <div class="feature-list wow fadeInRight">
                            <ul class="feature-list-all">
                                <?php if(!empty($ds_tieuchi)) { foreach($ds_tieuchi as $k => $v) { ?>
                                <li class="mb-20">
                                    <div class="d-flex align-items-center justify-content-start text-left">
                                        <div class="feature-num mr-25">
                                            <span class="flex-center bg-light-white"><?=sprintf("%02d", $k+1)?></span>
                                        </div>
                                        <div class="feature-detail">
                                            <h5 class="f-700"><?=$v['ten_vi']?></h5>
                                            <p class="text-justify"><?=$v['mota_vi']?></p>
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
                    <form id="frm-callback" class="relative z-5 wow fadeInUp" onsubmit="return false;">
                        <div class="row">
                            <div class="col-xl-10 col-lg-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group relative">
                                            <input type="text" class="form-control input-white shadow-2" id="cb_name" placeholder="Họ & Tên" required>
                                            <i class="far fa-user transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group relative">
                                            <input type="text" class="form-control input-white shadow-2" id="cb_phone" placeholder="Số Điện Thoại" required>
                                            <i class="fas fa-mobile-alt transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group relative">
                                            <input type="email" class="form-control input-white shadow-2" id="cb_email" placeholder="Email (Tùy chọn)">
                                            <i class="far fa-envelope transform-v-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group relative">
                                            <select class="form-control input-white shadow-2" id="cb_topic">
                                                <option value="">Dịch vụ quan tâm</option>
                                                <option value="Tư vấn quản lý vận hành">Quản lý vận hành</option>
                                                <option value="Dịch vụ kỹ thuật - Bảo trì">Kỹ thuật - Bảo trì</option>
                                                <option value="Dịch vụ vệ sinh công nghiệp">Vệ sinh công nghiệp</option>
                                                <option value="Dịch vụ an ninh - Bảo vệ">An ninh - Bảo vệ</option>
                                                <option value="Chăm sóc cảnh quan">Cảnh quan cây xanh</option>
                                                <option value="Tuyển dụng">Tuyển dụng</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                            <i class="fas fa-chevron-down transform-v-center"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <button type="button" id="btn-callback" class="btn btn-blue btn-block request-btn uppercase shadow-2">Gửi Ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Alert Modal -->
    <div id="custom-alert-overlay" class="custom-alert-overlay">
        <div class="custom-alert-box">
            <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
            <h4 id="custom-alert-title">Thông báo</h4>
            <p id="custom-alert-message">Nội dung thông báo</p>
            <button id="custom-alert-close" class="alert-btn">Đóng</button>
        </div>
    </div>

    <style>
        /* Tăng padding để text không đè lên icon */
        #frm-callback .input-white {
            padding-right: 50px !important;
        }
        /* Style Nice Select */
        #frm-callback .nice-select.input-white {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border: none !important;
            color: #fff !important;
            width: 100%;
            height: 50px;
            line-height: 50px;
            padding-left: 25px;
            border-radius: 0;
            float: none;
        }
        #frm-callback .nice-select.input-white:after { display: none; }
        #frm-callback .nice-select.input-white .current { color: #fff; }
        #frm-callback .nice-select.input-white .list {
            background-color: #fff;
            color: #333;
            width: 100%;
            border-radius: 0;
            margin-top: 1px;
            z-index: 99;
        }
        #frm-callback .nice-select.input-white .option:hover, 
        #frm-callback .nice-select.input-white .option.focus, 
        #frm-callback .nice-select.input-white .option.selected.focus {
            background-color: #108042;
            color: #fff;
        }
        #frm-callback .form-group i { z-index: 10; pointer-events: none; }
        
        /* Custom Alert CSS */
        .custom-alert-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6); z-index: 99999;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden; transition: all 0.3s;
        }
        .custom-alert-overlay.active { opacity: 1; visibility: visible; }
        .custom-alert-box {
            background: #fff; width: 90%; max-width: 400px;
            border-radius: 8px; padding: 30px; text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transform: translateY(-20px); transition: all 0.3s;
        }
        .custom-alert-overlay.active .custom-alert-box { transform: translateY(0); }
        .alert-icon { font-size: 50px; margin-bottom: 20px; color: #ffc107; } /* Màu vàng cảnh báo */
        .custom-alert-box h4 { margin-bottom: 10px; font-weight: 700; color: #333; }
        .custom-alert-box p { margin-bottom: 25px; color: #666; font-size: 15px; }
        .alert-btn {
            background: #108042; color: #fff; border: none;
            padding: 10px 35px; border-radius: 5px; cursor: pointer;
            transition: background 0.3s; font-weight: 600; text-transform: uppercase;
        }
        .alert-btn:hover { background: #0a5c2e; }

        @media (max-width: 991px) {
            #frm-callback .col-md-3 { margin-bottom: 15px; }
            #frm-callback .request-btn { margin-top: 5px; }
        }
    </style>
    <script>
        window.addEventListener('load', function() {
            if($.fn.niceSelect) {
                $('#cb_topic').niceSelect();
            }

            // Hàm hiển thị thông báo Custom
            function showCustomAlert(message) {
                $('#custom-alert-message').text(message);
                $('#custom-alert-overlay').addClass('active');
            }

            // Đóng thông báo alert
            $('#custom-alert-close, #custom-alert-overlay').click(function(e){
                if(e.target === this) {
                    $('#custom-alert-overlay').removeClass('active');
                }
            });

            $('#btn-callback').click(function(){
                var name = $('#cb_name').val();
                var phone = $('#cb_phone').val();
                var email = $('#cb_email').val();
                var topic = $('#cb_topic').val();

                if(name == '' || phone == ''){
                    showCustomAlert('Vui lòng nhập đầy đủ Họ tên và Số điện thoại!');
                    return false;
                }

                var btn = $(this);
                btn.text('Đang gửi...');
                btn.prop('disabled', true);

                $.ajax({
                    url: 'ajax/ajax_callback.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {name: name, phone: phone, email: email, topic: topic},
                    success: function(res){
                        if(res.status == 'success'){
                            // Chuyển hướng sang trang liên hệ có thông báo cảm ơn
                            window.location.href = 'lien-he.html?status=success';
                        } else {
                            showCustomAlert(res.message);
                            btn.text('Gửi Ngay');
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error){
                        showCustomAlert('Có lỗi xảy ra khi kết nối server.');
                        btn.text('Gửi Ngay');
                        btn.prop('disabled', false);
                    }
                });
            });

            // Xử lý form đăng ký nhận tin
            $('#frm-subscribe button').click(function(){
                var name = $('#name2').val();
                var email = $('#email2').val();

                if(email == ''){
                    showCustomAlert('Vui lòng nhập Email!');
                    return false;
                }

                var btn = $(this);
                var originalText = btn.html();
                btn.text('Đang gửi...');
                btn.prop('disabled', true);

                $.ajax({
                    url: 'ajax/ajax_subscribe.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {name: name, email: email},
                    success: function(res){
                        showCustomAlert(res.message);
                        if(res.status == 'success'){
                            $('#name2').val('');
                            $('#email2').val('');
                        }
                        btn.html(originalText);
                        btn.prop('disabled', false);
                    },
                    error: function(xhr, status, error){
                        showCustomAlert('Có lỗi xảy ra khi kết nối server.');
                        btn.html(originalText);
                        btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
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
                <div class="col-lg-5 text-lg-right d-none d-lg-block">
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

    <!-- Featured Projects start -->
    <section class="featured-projects bg-light-white pt-95 pb-100">
        <div class="container">
            <div class="row align-items-end text-center text-lg-left mb-45">
                <div class="col-lg-7 text-center text-lg-left">
                    <div class="fancy-head left-al wow fadeInLeft">
                        <h5 class="line-head mb-15">
                            <span class="line before d-lg-none"></span>
                            DỰ ÁN
                            <span class="line after"></span>
                        </h5>
                        <h1 class="text-uppercase" style="font-weight: 800; letter-spacing: 1px;">Dự Án Tiêu Biểu</h1>
                    </div>
                </div>
                <div class="col-lg-5 mt-md-25 text-lg-right d-none d-lg-block">
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
                        <?php if(!empty($ds_duan)) { foreach($ds_duan as $v) { 
                            $link_duan = 'du-an/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                            $img_src = ($v['photo']!='' && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image';
                        ?>
                        <div class="item">
                            <div class="project-corporate-card bg-white wow fadeInUp">
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
                                    <div class="project-line"></div>
                                    <div class="project-footer d-flex justify-content-between align-items-center">
                                        <span class="text-muted text-sm text-uppercase font-weight-bold">Chi tiết dự án</span>
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

        /* Phần hình ảnh */
        .project-thumb {
            position: relative;
            overflow: hidden;
            height: 240px; /* Chiều cao cố định cho ảnh gọn gàng */
        }
        
        .project-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .project-corporate-card:hover .project-thumb img {
            transform: scale(1.05); /* Zoom rất nhẹ, không quá lố */
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
        }
        .location-badge i { color: #108042; margin-right: 5px; }

        /* Phần nội dung */
        .project-body {
            padding: 25px;
            text-align: left;
            position: relative;
        }
        
        .project-title {
            margin-bottom: 15px;
            min-height: 3em; /* Đảm bảo đều dòng */
        }
        
        .project-title a {
            color: #222;
            font-weight: 700;
            font-size: 18px;
            text-transform: uppercase; /* Nghiêm túc hơn */
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

        /* Đường kẻ trang trí */
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

        /* Footer card */
        .btn-arrow-link {
            width: 35px;
            height: 35px;
            border: 1px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%; /* Tròn nhỏ tinh tế */
            color: #999;
            transition: all 0.3s;
        }
        
        .project-corporate-card:hover .btn-arrow-link {
            background-color: #108042;
            border-color: #108042;
            color: #fff;
        }
        
        .text-sm { font-size: 12px; letter-spacing: 0.5px; }
    </style>
    <!-- Featured Projects end -->

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