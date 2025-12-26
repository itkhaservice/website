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
                            <li class="breadcrumb-item"><a href="index.php?com=tin-tuc">Tin tức</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- blog details area start -->
    <section class="service-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <!-- left part -->
                    <div class="left-blog-detail">
                        <div class="blog-by-info">
                            <ul class="list-inline fs-12">
                                <li class="list-inline-item pr-15">
                                    <i class="far fa-calendar mr-10 fs-14 green"></i> <?=date('d M Y', $row_detail['ngaytao'])?>
                                </li>
                                <li class="list-inline-item pr-15">
                                    <i class="far fa-eye mr-10 fs-14 green"></i> <?=$row_detail['luotxem']?> lượt xem
                                </li>
                            </ul>
                        </div>
                        <h1 class="f-700 lh-13 mt-5 mb-10"><?=$row_detail['ten_vi']?></h1>
                        
                        <div class="content-main mt-20">
                            <?=clearContent($row_detail['noidung_vi'])?>
                        </div>

                        <!-- Share buttons removed for simplicity or can be added back -->
                        
                        <!-- next-prev button -->
                        <div class="d-flex pt-25 pb-25 mt-25 justify-content-between next-prev-button">
                            <a href="index.php?com=tin-tuc" class="f-500">
                                <i class="fas fa-long-arrow-alt-left mr-15"></i>Quay lại danh sách
                            </a>
                        </div>

                    </div>
                </div>
                <!-- right-part -->
                <div class="col-xl-4 col-lg-5">

                    <div class="right-box bg-light-white mb-30">
                        <div class="right-box-head">
                            <h4>Tin liên quan</h4>
                        </div>
                        <div class="right-box-content mt-10 mb-10">
                            <?php if(!empty($ds_khac)) { foreach($ds_khac as $v) { ?>
                            <a href="index.php?com=tin-tuc&id=<?=$v['id']?>" class="popular-post d-flex align-items-center">
                                <div class="popular-post-img mr-20">
                                    <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/blog/pplr-1.png'?>" alt="" style="width:70px; height:70px; object-fit:cover;">
                                    <div class="full-cover bg-green-op-8 transition-4">
                                        <i class="fas fa-external-link-alt transform-center"></i>
                                    </div>
                                </div>
                                <div class="popular-post-text">
                                    <p class="mb-5"><?=substr($v['ten_vi'], 0, 40)?>...</p>
                                    <span><?=date('d/m/Y', $v['ngaytao'])?></span>
                                </div>
                            </a>
                            <?php }} ?>
                        </div>
                    </div>

                    <div class="right-box ad-banner bg-light-white mb-30">
                        <a href="" class="d-block ">
                            <img src="img/service/ad-banner.jpg" class="w-100" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog details area end -->

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