<!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Lĩnh vực hoạt động</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lĩnh vực hoạt động</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- immer banner end -->

    <!-- Service start -->
    <section class="service-3 pt-95 pb-70 bg-light-white">
        <div class="container">
            <div class="row align-items-end text-center text-lg-left mb-45">
                <div class="col-lg-7 text-center text-lg-left">
                    <div class="fancy-head left-al wow fadeInLeft">
                        <h5 class="line-head mb-15">
                            <span class="line before d-lg-none"></span>
                            Dịch vụ
                            <span class="line after"></span>
                        </h5>
                        <h1>Lĩnh Vực Hoạt Động</h1>
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
                            <p class="mb-20 text-split-3" style="min-height: 4.5em;"><?=strip_tags($v['noidung_vi'] ?: $v['mota_vi'])?></p>
                            <a href="dich-vu/<?=$v['ten_khong_dau']?>.html" class="btn btn-border-blue mb-30">
                                Xem thêm<i class="fas fa-long-arrow-alt-right ml-15"></i>
                            </a>
                            <span class="bg-green undeline-3"></span>
                        </div>
                    </div>
                </div>
                <?php }} else { echo '<p class="text-center w-100 py-5">Dữ liệu đang được cập nhật...</p>'; } ?>
            </div>
        </div>
    </section>
    <!-- Service end -->

    <style>
        .text-split-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-align: justify; }
        .service-list-3 { background: #fff; border-radius: 10px; padding: 40px 30px; }
        .icon-bg-white { width: 110px; height: 110px; background: #fff; border-radius: 50%; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    </style>

    <!-- cta area start -->
    <section class="cta pt-50 pb-50" style="background-image: url('img/bg/bg_cta.jpg');" data-overlay="9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-5 mb-md-20 text-center text-lg-left">
                    <h3 class="z-5 white f-700 lh-18 wow fadeInLeft">Bạn đang có nhu cầu về dịch vụ nào? 
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