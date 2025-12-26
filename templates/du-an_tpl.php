<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Dự án</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <!-- Breadcrumb hidden as per request -->
            </div>
        </div>
    </div>
</section>

<!-- Project List Area -->
<section class="pricong-area bg-light-white pt-70 pb-100">
    <div class="container">
        <!-- Filter Bar -->
        <div class="row mb-40">
            <div class="col-lg-12">
                <div class="bg-white p-4 shadow-sm rounded-lg border-0 d-flex flex-wrap align-items-center justify-content-between">
                    <h4 class="mb-0 text-dark font-weight-bold d-none d-md-block mr-4">Dự án tiêu biểu</h4>
                    
                    <form action="du-an.html" method="GET" class="d-flex flex-wrap flex-grow-1 justify-content-end align-items-center search-form">
                        <div class="form-group mb-0 mr-2 position-relative" style="min-width: 250px;">
                            <input type="text" name="keyword" class="form-control rounded-pill pl-4 pr-5 border-light bg-light" placeholder="Tìm kiếm dự án..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>">
                            <button type="submit" class="btn position-absolute text-muted" style="right: 5px; top: 0; background: none; border: none;"><i class="fas fa-search"></i></button>
                        </div>
                        
                        <div class="form-group mb-0 mr-2">
                            <select name="id_khuvuc" class="form-control rounded-pill border-light bg-light nice-select-reset" onchange="this.form.submit()">
                                <option value="0">Toàn bộ khu vực</option>
                                <?php if(!empty($ds_khuvuc)) { foreach($ds_khuvuc as $k){ ?>
                                    <option value="<?=$k['id']?>" <?=isset($_GET['id_khuvuc']) && $_GET['id_khuvuc']==$k['id'] ? 'selected' : ''?>><?=$k['ten_vi']?></option>
                                <?php }} ?>
                            </select>
                        </div>
                        
                        <?php if(isset($_GET['keyword']) || isset($_GET['id_khuvuc'])) { ?>
                            <a href="du-an.html" class="btn btn-sm btn-light text-danger font-weight-bold ml-2 rounded-pill"><i class="fas fa-times mr-1"></i> Xóa lọc</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Data -->
        <div class="row">
            <?php if(!empty($ds_duan)) { foreach($ds_duan as $v){ 
                // Xử lý hình ảnh mặc định
                $img_src = get_photo($v['photo']);
                $link = 'du-an/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : 'bai-viet-'.$v['id']) . '.html';
            ?>
            <div class="col-xl-4 col-md-6 mb-30">
                <div class="price-each relative img-lined text-center wow fadeInUp transition-4" style="background: url('<?=$img_src?>') center center / cover no-repeat; min-height: 480px; border-radius: 8px; overflow: hidden;">
                    <!-- Overlay to make text clearer and look more refined -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0) 40%, rgba(0,0,0,0.7) 100%); z-index: 6;"></div>
                    
                    <div class="price-head z-8 underlined" style="position: relative; z-index: 8;">
                        <?php if(!empty($v['ten_khuvuc'])) { ?>
                            <span class="badge badge-success px-3 py-2 mt-3 shadow" style="background-color: #108042; font-size: 11px; font-weight: 600; text-transform: uppercase; border-radius: 20px;"><?=$v['ten_khuvuc']?></span>
                        <?php } ?>
                    </div>
                    
                    <a href="<?=$link?>" class="btn btn-round wide z-8 text-uppercase" style="position: absolute; bottom: 45px; left: 35px; right: 35px; font-size: 13px; letter-spacing: 1px; padding: 12px 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; z-index: 8;" title="<?=$v['ten_vi']?>">
                        <?=$v['ten_vi']?>
                    </a>
                </div>
            </div>
            <?php }} else { ?>
                <div class="col-12 text-center py-5">
                    <img src="img/icons/empty.svg" style="max-width: 150px; opacity: 0.5;" class="mb-3">
                    <p class="text-muted f-16">Không tìm thấy dự án nào phù hợp với tiêu chí tìm kiếm.</p>
                    <a href="du-an.html" class="btn btn-outline-success rounded-pill mt-3">Quay lại danh sách</a>
                </div>
            <?php } ?>
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
    .nice-select-reset {
        height: 45px;
        line-height: 45px;
        border: none;
        background-color: #f8f9fa;
        padding-left: 20px;
        font-size: 14px;
        color: #495057;
    }
    .project-item:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important; }
    .project-thumb img { transition: all 0.5s ease; }
    .project-item:hover .project-thumb img { transform: scale(1.1); }
    .project-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(16, 128, 66, 0.7);
        opacity: 0; visibility: hidden; transition: all 0.3s;
    }
    .project-item:hover .project-overlay { opacity: 1; visibility: visible; }
    .object-fit-cover { object-fit: cover; }
    .hover-green:hover { color: #108042 !important; }
    .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .text-split-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
</style>