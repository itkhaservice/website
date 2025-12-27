    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">        <div class="container">
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
                    <div class="service-list-3 shadow-2 transition-4 img-lined z-5 no-mar wow zoomIn h-100" style="border-radius: 15px; background: #fff; padding: 30px 20px;">
                        <div class="icon-bg-white flex-center z-10 mx-auto" style="width: 100px; height: 100px; background: #f8fafc; border-radius: 50%; border: 1px solid #eee;">
                            <img src="<?=get_photo($v['photo'])?>" 
                                 style="width:60px; height:60px; object-fit:contain;" alt="<?=$v['ten_vi']?>">
                        </div>
                        <div class="service-text-3 transition-4 mt-20 z-10">
                            <h4 class="f-700 mb-15 text-split-2" style="min-height: 2.8em; font-size: 18px; color: #1e293b;"><?=$v['ten_vi']?></h4>
                            <p class="mb-25 text-split-3 text-muted" style="min-height: 4.5em; font-size: 14px; line-height: 1.6;"><?=strip_tags($v['noidung_vi'])?></p>
                            <a href="dich-vu/<?=$v['ten_khong_dau']?>.html" class="btn btn-border-blue mb-10 px-4 rounded-pill">
                                XEM CHI TIẾT<i class="fas fa-long-arrow-alt-right ml-15"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }} else { echo '<p class="w-100 text-center py-5">Đang cập nhật...</p>'; } ?>
            </div>

            <!-- Pagination -->
            <?php if(isset($paging) && $paging['total'] > 0) { ?>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex align-items-center small mb-2 mb-md-0">
                            <span class="text-muted mr-3">Hiển thị</span>
                            <select class="form-control per-page-select shadow-none" style="width: 85px;" onchange="window.location.href='<?=$paging['url']?>?per_page=' + this.value;">
                                <?php foreach([8, 16, 32, 64] as $p) { ?>
                                    <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                                <?php } ?>
                            </select>
                            <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
                        </div>
                        
                        <nav class="d-inline-block">
                            <ul class="pagination m-0">
                                <?php if($paging['current'] > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=1" title="Trang đầu"><i class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=<?=$paging['current']-1?>"><i class="fas fa-angle-left"></i></a></li>
                                <?php } ?>
                                
                                <?php for($i=1; $i<=$paging['last']; $i++) { 
                                    if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                                    <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="<?=$paging['url']?>?p=<?=$i?>"><?=$i?></a></li>
                                <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                                
                                <?php if($paging['current'] < $paging['last']) { ?>
                                    <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=<?=$paging['current']+1?>"><i class="fas fa-angle-right"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=<?=$paging['last']?>" title="Trang cuối"><i class="fas fa-angle-double-right"></i></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <style>
        .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .text-split-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
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