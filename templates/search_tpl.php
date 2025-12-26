<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green">Tìm kiếm</h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <nav aria-label="breadcrumb" class="banner-breadcump">
                    <ol class="breadcrumb justify-content-center justify-content-md-end bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.php" class="white"><i class="fas fa-home fs-12 mr-1"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item active white" aria-current="page">Kết quả tìm kiếm</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Search Results Area -->
<section class="search-results-area bg-light-white pt-70 pb-100">
    <div class="container">
        <div class="row mb-40">
            <div class="col-12">
                <div class="fancy-head left-al">
                    <h5 class="line-head mb-15">KẾT QUẢ TÌM KIẾM</h5>
                    <h1>Từ khóa: "<?=htmlspecialchars($_GET['keyword'] ? $_GET['keyword'] : $_GET['kw'])?>"</h1>
                    <p class="text-muted mt-2">Tìm thấy <strong><?=$paging['total']?></strong> kết quả phù hợp.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(!empty($ds_search)) { foreach($ds_search as $v) { 
                $img_src = get_photo($v['photo']);
                
                // Xác định đường dẫn dựa trên loại bài viết
                if($v['source_type'] == 'du-an') {
                    $link = 'du-an/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                    $type_label = "Dự án";
                } elseif($v['source_type'] == 'dich-vu') {
                    $link = 'dich-vu/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                    $type_label = "Dịch vụ";
                } else {
                    $link = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                    $type_label = "Tin tức";
                }
            ?>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="project-item bg-white shadow-sm rounded-lg overflow-hidden h-100 transition-4 shadow-hover">
                    <div class="project-thumb relative overflow-hidden" style="height: 220px;">
                        <a href="<?=$link?>" class="d-block h-100 w-100">
                            <img src="<?=$img_src?>" alt="<?=$v['ten_vi']?>" class="w-100 h-100 object-fit-cover transition-4">
                        </a>
                        <span class="badge badge-success position-absolute" style="top: 10px; right: 10px; background-color: #108042; font-size: 11px;"><?=$type_label?></span>
                    </div>
                    <div class="project-content p-3">
                        <h5 class="mb-2" style="font-size: 16px;">
                            <a href="<?=$link?>" class="text-dark f-700 hover-green text-split-2"><?=$v['ten_vi']?></a>
                        </h5>
                        <div class="text-muted small mb-2 text-split-3" style="line-height: 1.5;">
                            <?=strip_tags($v['mota_vi'])?>
                        </div>
                        <div class="border-top pt-2 mt-2">
                            <a href="<?=$link?>" class="text-green font-weight-bold small">Chi tiết <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} else { ?>
                <div class="col-12 text-center py-5">
                    <img src="img/icons/empty.svg" style="max-width: 150px; opacity: 0.5;" class="mb-3">
                    <p class="text-muted f-16">Rất tiếc, chúng tôi không tìm thấy nội dung nào khớp với từ khóa của bạn.</p>
                    <a href="index.php" class="btn btn-outline-success rounded-pill mt-3">Quay lại trang chủ</a>
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
                        <select class="form-control per-page-select shadow-none" style="width: 85px;" onchange="window.location.href='<?=$paging['url']?>&per_page=' + this.value;">
                            <?php foreach([12, 24, 48, 96] as $p) { ?>
                                <option value="<?=$p?>" <?=($paging['per_page']==$p)?'selected':''?>><?=$p?></option>
                            <?php } ?>
                        </select>
                        <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
                    </div>
                    
                    <nav class="d-inline-block">
                        <ul class="pagination m-0">
                            <?php if($paging['current'] > 1) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=1"><i class="fas fa-angle-double-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['current']-1?>"><i class="fas fa-angle-left"></i></a></li>
                            <?php } ?>
                            
                            <?php for($i=1; $i<=$paging['last']; $i++) { 
                                if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                                <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="<?=$paging['url']?>&p=<?=$i?>"><?=$i?></a></li>
                            <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                            
                            <?php if($paging['current'] < $paging['last']) { ?>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['current']+1?>"><i class="fas fa-angle-right"></i></a></li>
                                <li class="page-item"><a class="page-link" href="<?=$paging['url']?>&p=<?=$paging['last']?>"><i class="fas fa-angle-double-right"></i></a></li>
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
    .shadow-hover:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .text-split-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
</style>