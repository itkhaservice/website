    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Tin tức</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- blog listing grid area start -->
    <section class="service-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="row justify-content-center">
                        <?php if(!empty($ds_tintuc)) { foreach($ds_tintuc as $v) { ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-grid bg-light-white transition-4 mb-30">
                                <div class="blog-grid-image relative">
                                    <?php $link_v = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html'; ?>
                                    <a href="<?=$link_v?>">
                                        <?php 
                                            $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image';
                                        ?>
                                        <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>" style="width: 100%; height: 250px; object-fit: cover;">
                                    </a>
                                    <div class="blog-date-2 text-center bg-green">
                                        <h2 class="day white mb-0 fs-28 mt-10 f-900"><?=date('d', $v['ngaytao'])?></h2>
                                        <p class="month white mb-5 fs-12"><?=date('M', $v['ngaytao'])?></p>
                                    </div>
                                </div>
                                <div class="blog-grid-text">
                                    <h5 class="f-700 fs-19 mb-5 lh-15"><a href="<?=$link_v?>"><?=$v['ten_vi']?></a></h5>
                                    <ul class="blog-by-detail mb-5">
                                        <li><a href="javascript:void(0)"><strong><em><?=($v['ten_danhmuc']!='')?$v['ten_danhmuc']:'Tin tức'?></em></strong></a></li>
                                    </ul>
                                    <div class="hr-1 opacity-1 mt-10 mb-10"></div>
                                    <p class="mb-0"><?=substr(strip_tags($v['mota_vi']), 0, 100)?>...</p>
                                </div>
                            </div>
                        </div>
                        <?php }} else { echo '<p class="w-100 text-center">Đang cập nhật...</p>'; } ?>
                    </div>

                    <!-- Pagination -->
                    <?php if(isset($paging) && $paging['total'] > 0) { ?>
                    <div class="row mt-40">
                        <div class="col-12">
                            <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex align-items-center small mb-2 mb-md-0">
                                    <span class="text-muted mr-3">Hiển thị</span>
                                    <select class="form-control per-page-select shadow-none" style="width: 85px;" onchange="window.location.href='<?=$paging['url']?>&per_page=' + this.value;">
                                        <?php foreach([6, 12, 24, 48] as $p) { ?>
                                            <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
                                </div>
                                
                                <nav class="d-inline-block">
                                    <ul class="pagination m-0">
                                        <?php if($paging['current'] > 1) { ?>
                                            <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=1" title="Trang đầu"><i class="fas fa-angle-double-left"></i></a></li>
                                            <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['current']-1?>"><i class="fas fa-angle-left"></i></a></li>
                                        <?php } ?>
                                        
                                        <?php for($i=1; $i<=$paging['last']; $i++) { 
                                            if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="<?=$paging['url']?>&p=<?=$i?>"><?=$i?></a></li>
                                        <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                                        
                                        <?php if($paging['current'] < $paging['last']) { ?>
                                            <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['current']+1?>"><i class="fas fa-angle-right"></i></a></li>
                                            <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['last']?>" title="Trang cuối"><i class="fas fa-angle-double-right"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <!-- right-part (Sidebar) -->
                <div class="col-xl-4 col-lg-5">

                    <div class="right-box bg-light-white mb-30">
                        <div class="right-box-head">
                            <h4>Tìm kiếm</h4>
                        </div>
                        <div class="right-box-content">
                            <form action="index.php" method="get" class="relative mt-10 mb-10">
                                <input type="hidden" name="com" value="search">
                                <input type="text" name="keyword" class="form-control input-white search-white" id="search2" placeholder="Nhập từ khóa..">
                                <i class="fas fa-search transform-v-center green"></i>
                            </form>
                        </div>
                    </div>

                    <div class="right-box bg-light-white mb-30">
                        <div class="right-box-head">
                            <h4>Danh mục</h4>
                        </div>
                        <div class="right-box-content mt-10 mb-10">
                            <ul class="list-unstyled category-list">
                                <?php if(!empty($ds_danhmuc_sidebar)) { foreach($ds_danhmuc_sidebar as $v) { ?>
                                <li class="py-2 border-bottom d-flex justify-content-between align-items-center">
                                    <a href="tin-tuc/<?=($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id'])?>.html" class="text-dark hover-green font-weight-500 d-block w-100">
                                        <i class="fas fa-chevron-right small mr-2 green"></i> <?=$v['ten_vi']?>
                                        <span class="badge badge-pill badge-light border text-muted float-right"><?=$v['so_bai']?></span>
                                    </a>
                                </li>
                                <?php }} ?>
                            </ul>
                        </div>
                    </div>

                    <div class="right-box bg-light-white mb-30">
                        <div class="right-box-head">
                            <h4>Tin mới nhất</h4>
                        </div>
                        <div class="right-box-content mt-10 mb-10">
                            <?php if(!empty($ds_sidebar)) { foreach($ds_sidebar as $v) { 
                                $link_side = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                            ?>
                            <a href="<?=$link_side?>" class="popular-post d-flex align-items-center">
                                <div class="popular-post-img mr-20">
                                    <?php 
                                        $img_sidebar = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/100x100/ebebeb/666666?text=New';
                                    ?>
                                    <img src="<?=$img_sidebar?>" alt="" style="width:70px; height:70px; object-fit:cover;">
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

                </div>
            </div>
            
        </div>
    </section>
    <!-- blog listing grid area end -->

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