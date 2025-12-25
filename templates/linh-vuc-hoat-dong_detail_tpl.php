    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green"><?=$row_detail['ten_vi']?></h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="index.php?com=linh-vuc-hoat-dong">Lĩnh vực hoạt động</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- portfolio deetails area start -->
    <section class="case-details pt-90 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-main">
                        <?=$row_detail['noidung_vi']?>
                    </div>
                </div>
            </div>
            
            <div class="row align-items-center mt-50">
                <div class="col-md-6 text-center text-md-left">
                    <div class="d-flex share-case justify-content-center justify-content-md-start">
                        <p class="fs-16 mr-20 mb-0">Chia sẻ:</p>
                        <ul class="social-icons black mb-sm-30">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="next-prev-caser">
                        <a class="f-600" href="index.php?com=linh-vuc-hoat-dong"><i class="fas fa-long-arrow-alt-left mr-25"></i> QUAY LẠI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio deetails area end -->

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