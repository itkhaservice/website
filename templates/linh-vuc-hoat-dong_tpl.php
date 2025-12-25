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
    <section class="service-page pt-95 pb-70 bg-light-white">
        <div class="container">
            <div class="row">
                <?php if(!empty($ds_dichvu)) { foreach($ds_dichvu as $k=>$v){ ?>
                <div class="col-xl-3 col-md-6 text-center">
                    <div class="service-list-3 no-mar shadow-5 transition-4 img-lined z-5 no-mar wow zoomIn" style="margin-bottom:30px !important;">
                        <div class="icon-bg-white flex-center z-10">
                            <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/service/'.(($k%4)+1).'.png'?>" class="" alt="<?=$v['ten_vi']?>">
                        </div>
                        <div class="service-text-3 transition-4 mt-15 z-10">
                            <h4 class="f-700 mb-10"><?=$v['ten_vi']?></h4>
                            <p class="mb-20"><?=substr(strip_tags($v['mota_vi']), 0, 80)?>...</p>
                            <a href="index.php?com=linh-vuc-hoat-dong&id=<?=$v['id']?>" class="btn btn-border-blue mb-30">
                                Xem thêm<i class="fas fa-long-arrow-alt-right ml-15"></i>
                            </a>
                            <span class="bg-green undeline-3"></span>
                        </div>
                    </div>
                </div>
                <?php }} else { echo '<p class="text-center w-100">Dữ liệu đang cập nhật...</p>'; } ?>
            </div>
        </div>
    </section>
    <!-- Service end -->

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