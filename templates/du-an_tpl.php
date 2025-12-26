    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Dự án</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dự án</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- immer banner end -->

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
            </div>
            <div class="row">
                <?php if(!empty($ds_duan)) { foreach($ds_duan as $v){ ?>
                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="price-each relative img-lined text-center wow fadeInUp" style="background: url('<?=!empty($v['photo']) ? $v['photo'] : 'img/price/lan-phuong-mhbr-tower-keenlandcomvn-1.jpg'?>') center center / cover no-repeat; height:300px;">
                        <div class="price-head z-8 underlined">
                            <?php if(!empty($v['ten_khuvuc'])) { ?>
                                <span class="badge badge-success px-3 py-2 mt-3 shadow" style="background-color: #108042; font-size: 13px; font-weight: 600; text-transform: uppercase;"><?=$v['ten_khuvuc']?></span>
                            <?php } ?>
                        </div>
                        <a href="index.php?com=du-an&id=<?=$v['id']?>" class="btn btn-round wide mt-10 z-8"><?=$v['ten_vi']?></a>
                    </div>
                </div>
                <?php }} else { echo '<p class="text-center w-100">Dữ liệu đang cập nhật...</p>'; } ?>
            </div>
        </div>
    </section>
    <!-- Pricing area end -->

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