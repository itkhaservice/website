<!-- inner banner start -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-800 white">Tin tức & Sự kiện</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
        </div>
    </div>
</section>

<!-- blog listing grid area start -->
<section class="blog-grid pt-100 pb-100 bg-light-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="row">
                    <?php if(!empty($ds_tintuc)) { foreach($ds_tintuc as $v) { 
                        $link_v = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                    ?>
                    <div class="col-md-6 mb-4 wow fadeInUp">
                        <div class="news-card-modern">
                            <div class="card-img-wrapper">
                                <a href="<?=$link_v?>">
                                    <?php 
                                        $img_src = (!empty($v['photo']) && file_exists($v['photo'])) ? $v['photo'] : 'https://placehold.co/600x400/ebebeb/666666?text=No+Image';
                                    ?>
                                    <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>" loading="lazy">
                                </a>
                                <div class="blog-date-badge">
                                    <span class="day"><?=date('d', $v['ngaytao'])?></span>
                                    <span class="month">Th<?=date('m', $v['ngaytao'])?></span>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-meta">
                                    <span><i class="fas fa-folder mr-1"></i> <?=($v['ten_danhmuc']!='')?$v['ten_danhmuc']:'Tin tức'?></span>
                                    <span><i class="far fa-eye mr-1"></i> <?=$v['luotxem']?></span>
                                </div>
                                <h3><a href="<?=$link_v?>"><?=$v['ten_vi']?></a></h3>
                                <div class="card-desc">
                                    <?=substr(strip_tags($v['mota_vi']), 0, 150)?>...
                                </div>
                                <div class="card-footer">
                                    <a href="<?=$link_v?>" class="btn-more-link font-weight-bold text-sm">
                                        Đọc tiếp <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} else { echo '<div class="col-12 text-center py-5"><div class="alert alert-info">Đang cập nhật nội dung...</div></div>'; } ?>
                </div>

                <!-- Modern Pagination Footer -->
                <?php if(isset($paging) && $paging['total'] > 0) { ?>
                <div class="pagination-footer-modern wow fadeInUp">
                    <div class="page-selector">
                        <span>Hiển thị</span>
                        <select onchange="window.location.href = '<?=$paging['url']?>' + ( '<?=strpos($paging['url'], '?') !== false ? '&' : '?'?>' ) + 'per_page=' + this.value;">
                            <?php foreach([5, 10, 15, 20, 50] as $p) { ?>
                                <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                            <?php } ?>
                        </select>
                        <span class="d-none d-sm-inline">dòng / trang</span>
                    </div>
                    
                    <nav class="pagination-modern">
                        <ul class="pagination mb-0">
                            <?php 
                                $link_conn = (strpos($paging['url'], '?') !== false) ? '&' : '?';
                                $per_param = ($paging['per_page'] != 5) ? "&per_page=".$paging['per_page'] : "";
                            ?>
                            
                            <?php if($paging['current'] > 1) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url'].$link_conn?>p=1<?=$per_param?>" title="Trang đầu"><i class="fas fa-angle-double-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url'].$link_conn?>p=<?=$paging['current']-1?><?=$per_param?>"><i class="fas fa-angle-left"></i></a></li>
                            <?php } ?>
                            
                            <?php for($i=1; $i<=$paging['last']; $i++) { 
                                if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 2 && $i <= $paging['current'] + 2)) { ?>
                                <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="<?=$paging['url'].$link_conn?>p=<?=$i?><?=$per_param?>"><?=$i?></a></li>
                            <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link">...</span></li>'; } } ?>
                            
                            <?php if($paging['current'] < $paging['last']) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url'].$link_conn?>p=<?=$paging['current']+1?><?=$per_param?>"><i class="fas fa-angle-right"></i></a></li>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url'].$link_conn?>p=<?=$paging['last']?><?=$per_param?>" title="Trang cuối"><i class="fas fa-angle-double-right"></i></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <?php } ?>
            </div>
            
            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0">
                <div class="sidebar-sticky" style="position: sticky; top: 120px;">
                    <!-- Search -->
                    <div class="detail-container p-4 mb-4">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Tìm kiếm</h5>
                        <form action="index.php" method="get" class="position-relative">
                            <input type="hidden" name="com" value="search">
                            <input type="text" name="keyword" class="form-control rounded-pill px-4 border-0 bg-light" placeholder="Nhập từ khóa..." style="height: 45px;">
                            <button type="submit" class="btn text-primary position-absolute" style="right: 15px; top: 5px;"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="detail-container p-4 mb-4">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Danh mục tin</h5>
                        <ul class="list-unstyled mb-0">
                            <?php if(!empty($ds_danhmuc_sidebar)) { foreach($ds_danhmuc_sidebar as $v) { ?>
                            <li class="mb-2">
                                <a href="tin-tuc/<?=($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id'])?>.html" class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light transition-3 text-dark font-weight-bold">
                                    <span><i class="fas fa-chevron-right mr-2 text-primary small"></i> <?=$v['ten_vi']?></span>
                                    <span class="badge badge-primary-light badge-pill"><?=$v['so_bai']?></span>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>

                    <!-- Latest News -->
                    <div class="detail-container p-4">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Tin mới nhất</h5>
                        <?php if(!empty($ds_sidebar)) { foreach($ds_sidebar as $v) { 
                            $link_side = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                        ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded overflow-hidden mr-3" style="width: 70px; height: 70px; flex-shrink: 0;">
                                <img src="<?=$v['photo']?>" alt="<?=$v['ten_vi']?>" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div>
                                <h6 class="mb-1 text-sm"><a href="<?=$link_side?>" class="text-dark font-weight-bold text-split-2"><?=$v['ten_vi']?></a></h6>
                                <span class="text-muted text-xs"><i class="far fa-calendar-alt mr-1"></i> <?=date('d/m/Y', $v['ngaytao'])?></span>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-bg-light:hover { background: #f8fafc; padding-left: 15px !important; color: var(--primary-color) !important; }
    .badge-primary-light { background: rgba(16, 128, 66, 0.1); color: var(--primary-color); font-weight: 700; }
    .text-xs { font-size: 0.75rem; }
    .text-sm { font-size: 0.875rem; }
</style>