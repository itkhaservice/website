    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
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
                    $slug_link = 'tuyen-dung/' . (!empty($v['ten_khong_dau']) ? $v['ten_khong_dau'] : $v['id']) . '.html';
                ?>
                <div class="col-lg-6">
                    <div class="job-list d-flex align-items-center justify-content-between mb-30 transition-4 shadow-hover" style="border-radius: 12px; background: #fff;">
                        <div class="job-detail">
                            <p class="green f-600 mb-5 text-uppercase" style="font-size: 11px; letter-spacing: 1px;">Vị trí tuyển dụng</p>
                            <h5 class="f-700 fs-19 mb-5"><a href="<?=$slug_link?>" class="text-dark hover-green"><?=$v['ten_vi']?></a></h5>
                            <div class="fs-13 text-muted mb-2 text-split-2">
                                <?=strip_tags($v['mota_vi'])?>
                            </div>
                        </div>
                        <div class="job-apply">
                            <a href="<?=$slug_link?>" class="plus-btn flex-center">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }} else { echo '<p class="w-100 text-center py-5 text-muted">Hiện chưa có tin tuyển dụng nào.</p>'; } ?>
            </div>

            <!-- Pagination -->
            <?php if(isset($paging) && $paging['total'] > 0) { ?>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex align-items-center small mb-2 mb-md-0">
                            <span class="text-muted mr-3">Hiển thị</span>
                            <select class="form-control per-page-select shadow-none" style="width: 85px;" onchange="window.location.href='<?=$paging['url']?>?per_page=' + this.value;">
                                <?php foreach([6, 12, 24, 48] as $p) { ?>
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
        .shadow-hover:hover { box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important; transform: translateY(-3px); }
        .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
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