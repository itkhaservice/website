    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Tuyển dụng</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuyển dụng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Job listing area start -->
    <section class="job-list-section bg-light-white pt-90 pb-100">
        <div class="container">
            <div class="row align-items-end  mb-45">
                <div class="col-lg-7 col-md-12 text-center text-lg-left">
                    <div class="fancy-head left-al">
                        <h1 class="mb-sm-10">Các vị trí đang tuyển dụng</h1>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 text-center text-lg-right">
                    <p class="job-found f-500 blue">
                        <span class="green"><?=count($ds_tuyendung)?></span> Công việc
                    </p>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($ds_tuyendung)) { foreach($ds_tuyendung as $v) { 
                    $slug_link = 'index.php?com=tuyen-dung&id=' . (!empty($v['ten_khong_dau']) ? $v['ten_khong_dau'] : $v['id']);
                ?>
                <div class="col-lg-6">
                    <div class="job-list d-flex align-items-center justify-content-between mb-30">
                        <div class="job-detail">
                            <p class="green f-500 mb-5">Vị trí tuyển dụng</p>
                            <h5 class="f-700 fs-19 mb-5"><a href="<?=$slug_link?>"><?=$v['ten_vi']?></a></h5>
                            <div class="fs-13 text-muted mb-2">
                                <?=nl2br($v['mota_vi'])?>
                            </div>
                        </div>
                        <div class="job-apply">
                            <a href="<?=$slug_link?>" class="plus-btn flex-center">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }} else { echo '<p class="w-100 text-center">Hiện chưa có tin tuyển dụng nào.</p>'; } ?>
            </div>
        </div>
    </section>
    <!-- Job listing area end -->

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