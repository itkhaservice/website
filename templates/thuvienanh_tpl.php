<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Thư viện ảnh</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <!-- Breadcrumb hidden -->
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
                <div class="gallery-card bg-white h-100">
                    <div class="gallery-thumb">
                        <a href="<?=$link?>" class="d-block h-100">
                            <img src="<?=get_photo($v['photo'])?>" alt="<?=$v['ten_vi']?>">
                        </a>
                        <div class="gallery-overlay">
                            <a href="<?=$link?>" class="icon-btn"><i class="fas fa-search-plus"></i></a>
                        </div>
                        <div class="gallery-date">
                            <span class="day"><?=date('d', $v['ngaytao'])?></span>
                            <span class="month">Th<?=date('m', $v['ngaytao'])?></span>
                            <span class="year"><?=date('Y', $v['ngaytao'])?></span>
                        </div>
                    </div>
                    <div class="gallery-content">
                        <h3 class="title">
                            <a href="<?=$link?>" class="text-split-2"><?=$v['ten_vi']?></a>
                        </h3>
                        <a href="<?=$link?>" class="read-more">Xem album <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
            <?php }} else { echo '<div class="col-12 text-center"><p>Dữ liệu đang cập nhật...</p></div>'; } ?>
        </div>

        <!-- Pagination -->
        <?php if(isset($paging) && $paging['total'] > 0) { ?>
        <div class="row mt-40">
            <div class="col-12">
                <div class="pagination-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex align-items-center small mb-2 mb-md-0 text-muted">
                        <?php 
                            $start_index = ($paging['current'] - 1) * $paging['per_page'] + 1;
                            $end_index = $start_index + $paging['per_page'] - 1;
                            if($end_index > $paging['total']) $end_index = $paging['total'];
                        ?>
                        <span>Hiển thị <b><?=$start_index?> - <?=$end_index?></b> trên tổng số <b><?=$paging['total']?></b> album</span>
                        <select class="form-control per-page-select shadow-none ml-2" style="width: 70px; height: 30px; padding: 0 5px;" onchange="var url = new URL(window.location.href); url.searchParams.set('per_page', this.value); url.searchParams.set('p', '1'); window.location.href = url.toString();">
                            <?php foreach([9, 18, 36, 72] as $p) { ?>
                                <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <nav class="d-inline-block">
                        <ul class="pagination m-0">
                            <?php if($paging['current'] > 1) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=<?=$paging['current']-1?>"><i class="fas fa-angle-left"></i></a></li>
                            <?php } ?>
                            
                            <?php for($i=1; $i<=$paging['last']; $i++) { 
                                if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                                <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="<?=$paging['url']?>?p=<?=$i?>"><?=$i?></a></li>
                            <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                            
                            <?php if($paging['current'] < $paging['last']) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>?p=<?=$paging['current']+1?>"><i class="fas fa-angle-right"></i></a></li>
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
    /* Gallery Card Styles */
    .gallery-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        position: relative;
        top: 0;
    }
    .gallery-card:hover {
        top: -5px;
        box-shadow: 0 15px 30px rgba(16, 128, 66, 0.15);
        border-color: transparent;
    }
    
    .gallery-thumb {
        position: relative;
        height: 240px;
        overflow: hidden;
    }
    .gallery-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .gallery-card:hover .gallery-thumb img {
        transform: scale(1.1);
    }
    
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
    }
    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }
    
    .icon-btn {
        width: 50px; height: 50px;
        background: #fff;
        color: #108042;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
        transform: translateY(20px);
        transition: 0.3s;
    }
    .gallery-card:hover .icon-btn {
        transform: translateY(0);
    }
    
    .gallery-date {
        position: absolute;
        top: 15px; left: 15px;
        background: #fff;
        padding: 5px 10px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        min-width: 50px;
    }
    .gallery-date .day {
        display: block;
        font-weight: 700;
        font-size: 18px;
        color: #108042;
        line-height: 1;
    }
    .gallery-date .month {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        color: #666;
        font-weight: 600;
        line-height: 1.2;
    }
    .gallery-date .year {
        display: block;
        font-size: 10px;
        color: #999;
        font-weight: 500;
    }
    
    .gallery-content {
        padding: 20px;
        position: relative;
    }
    .gallery-content .title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .gallery-content .title a {
        color: #333;
        transition: 0.2s;
    }
    .gallery-content .title a:hover {
        color: #108042;
        text-decoration: none;
    }
    
    .read-more {
        font-size: 13px;
        font-weight: 600;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: 0.2s;
    }
    .read-more:hover {
        color: #108042;
        text-decoration: none;
    }
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