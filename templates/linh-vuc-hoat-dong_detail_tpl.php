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
                            <li class="breadcrumb-item"><a href="linh-vuc-hoat-dong.html">Lĩnh vực hoạt động</a></li>
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
                    <div class="about-text text-center text-lg-left">
                        <div class="fancy-head left-al mb-20">
                            <h5 class="line-head mb-15">
                                <span class="line before d-lg-none"></span>
                                    Lĩnh vực hoạt động
                                <span class="line after"></span>
                            </h5>
                            <h1 class="mb-20"><?=$row_detail['ten_vi']?></h1>
                        </div>

                        <?php if(!empty($row_detail['mota_vi'])) { ?>
                            <div class="short-desc mb-40" style="font-size: 1.15rem; color: #444; border-left: 5px solid #108042; padding: 15px 25px; background: #f9f9f9; line-height: 1.6; font-style: italic; font-weight: 500;">
                                <?=$row_detail['mota_vi']?>
                            </div>
                        <?php } ?>

                        <div class="content-main mt-30">
                            <?=clearContent($row_detail['noidung_vi'])?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row align-items-center mt-50">
                <div class="col-md-6 text-center text-md-left">
                    <div class="d-flex share-case justify-content-center justify-content-md-start">
                        <p class="fs-16 mr-20 mb-0">Chia sẻ:</p>
                        <ul class="social-icons black mb-sm-30">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=getCurrentPageURL()?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="next-prev-caser">
                        <a class="f-600 btn btn-square-border" href="linh-vuc-hoat-dong.html"><i class="fas fa-long-arrow-alt-left mr-15"></i> QUAY LẠI DANH SÁCH</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .content-main { text-align: justify; font-size: 16px; line-height: 1.8; color: #333; }
        .content-main img { max-width: 100% !important; height: auto !important; border-radius: 8px; margin: 20px 0; }
        .content-main table { width: 100% !important; border-collapse: collapse; margin: 20px 0; }
        .content-main table td, .content-main table th { padding: 12px; border: 1px solid #eee; }
        .content-main p { margin-bottom: 20px; }
        @media (max-width: 767px) {
            .case-details { padding: 50px 0 !important; }
            .short-desc { font-size: 1rem !important; padding: 10px 15px !important; }
        }
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