    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Chi tiết tuyển dụng</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết tuyển dụng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- career top area start -->
    <section class="top-career bg-light-white pt-60 pb-60">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 text-center text-lg-left">
                    <p class="green f-500 mb-5">Toàn thời gian</p>
                    <h2 class="f-700 mb-5 lh-13"><?=$row_detail['ten_vi']?></h2>
                    <ul class="list-inline fs-12">
                        <li class="list-inline-item pr-15">
                            <i class="fas fa-map-marker-alt mr-10 fs-14 green"></i> TP.HCM
                        </li>
                        <li class="list-inline-item pr-15">
                            <i class="fas fa-dollar-sign mr-10 fs-14 green"></i> Thỏa thuận
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 text-center text-lg-right">
                    <p class="mb-5 fs-13">Đăng ngày: <?=date('d/m/Y', $row_detail['ngaytao'])?></p>
                    <a href="mailto:<?=$row_setting['email']?>" class="btn btn-square blob-small mb-10 mt-lg-20">Ứng tuyển ngay<i class="fas fa-long-arrow-alt-right ml-20"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- career top area end -->

    <!-- career detail start -->
    <section class="career-detail pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="career-left">
                        <div class="content-main">
                            <?=$row_detail['noidung_vi']?>
                        </div>
                        
                        <div class="row align-items-center mt-35 mb-md-60">
                            <div class="col-md-6">
                                <a href="mailto:<?=$row_setting['email']?>" class="btn btn-square blob-small">Ứng tuyển ngay
                                    <i class="fas fa-long-arrow-alt-right ml-20"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="right-box bg-light-white mb-30">
                        <div class="right-box-head">
                            <h4>Thông tin liên hệ</h4>
                        </div>
                        <div class="right-box-content">
                            <ul class="mt-10 mb-10">
                                <li>
                                    <div class="d-flex">
                                        <div class="icon-round-box">
                                            <div class="icon-round-box-icon">
                                                <i class="fas fa-phone-volume green"></i>
                                            </div>
                                        </div>
                                        <div class="icon-round-box-text">
                                            <p><span>Phone:</span> <?=$row_setting['dienthoai']?></p>
                                            <p><span>Hotline:</span> <?=$row_setting['hotline']?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="icon-round-box">
                                            <div class="icon-round-box-icon">
                                                <i class="far fa-envelope green"></i>
                                            </div>
                                        </div>
                                        <div class="icon-round-box-text">
                                            <p><?=$row_setting['email']?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="icon-round-box">
                                            <div class="icon-round-box-icon">
                                                <i class="fas fa-map-marker-alt green"></i>
                                            </div>
                                        </div>
                                        <div class="icon-round-box-text">
                                            <p><?=$row_setting['diachi_vi']?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- career detail end -->

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