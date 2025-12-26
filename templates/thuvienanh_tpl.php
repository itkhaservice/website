<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Thư viện ảnh</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <!-- Breadcrumb hidden as per request -->
            </div>
        </div>
    </div>
</section>

<!-- Gallery List Area -->
<section class="gallery-area bg-light-white pt-70 pb-100">
    <div class="container">
        <div class="row">
            <?php if(!empty($ds_thuvien)) { foreach($ds_thuvien as $v) { 
                $link = 'thu-vien-anh/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
            ?>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="gallery-card bg-white shadow-sm rounded-lg overflow-hidden h-100 transition-4">
                    <div class="gallery-thumb relative overflow-hidden" style="height: 250px;">
                        <a href="<?=$link?>" class="d-block h-100">
                            <img src="<?=get_photo($v['photo'])?>" alt="<?=$v['ten_vi']?>" class="w-100 h-100 object-fit-cover transition-4">
                        </a>
                        <div class="gallery-overlay d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-circle mb-3">
                                <i class="fas fa-images text-white fs-24"></i>
                            </div>
                            <a href="<?=$link?>" class="btn btn-round-blue btn-sm">XEM ALBUM</a>
                        </div>
                    </div>
                    <div class="gallery-info p-4 text-center">
                        <h5 class="f-700 mb-0">
                            <a href="<?=$link?>" class="text-dark hover-green text-split-2"><?=$v['ten_vi']?></a>
                        </h5>
                    </div>
                </div>
            </div>
            <?php }} else { echo '<p class="w-100 text-center">Dữ liệu đang cập nhật...</p>'; } ?>
        </div>

        <!-- Pagination -->
        <?php if(isset($paging) && $paging['total'] > 0) { ?>
        <div class="row mt-40">
            <div class="col-12">
                <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex align-items-center small mb-2 mb-md-0">
                        <span class="text-muted mr-3">Hiển thị</span>
                        <select class="form-control per-page-select shadow-none" style="width: 85px;" onchange="window.location.href='<?=$paging['url']?>?p=1&per_page=' + this.value;">
                            <?php foreach([9, 18, 36, 72] as $p) { ?>
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
    .gallery-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .gallery-thumb img { transition: all 0.6s ease; }
    .gallery-card:hover .gallery-thumb img { transform: scale(1.1); }
    .gallery-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(16, 128, 66, 0.85);
        opacity: 0; visibility: hidden; transition: all 0.4s;
    }
    .gallery-card:hover .gallery-overlay { opacity: 1; visibility: visible; }
    .icon-circle { width: 60px; height: 60px; border: 2px solid rgba(255,255,255,0.5); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
</style>

<!-- CTA Area -->
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