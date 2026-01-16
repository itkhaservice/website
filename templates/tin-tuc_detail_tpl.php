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

<!-- blog details area start -->
<section class="blog-details pt-100 pb-100 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <!-- left part -->
                <div class="detail-container p-0 shadow-none border-0">
                    <div class="blog-header mb-4">
                        <div class="blog-meta mb-3 d-flex align-items-center text-muted small font-weight-bold">
                            <span class="mr-3"><i class="far fa-calendar-alt text-primary mr-1"></i> <?=date('d/m/Y', $row_detail['ngaytao'])?></span>
                            <span><i class="far fa-eye text-primary mr-1"></i> <?=$row_detail['luotxem']?> lượt xem</span>
                        </div>
                        <h1 class="detail-title mb-4"><?=$row_detail['ten_vi']?></h1>
                        
                        <?php if(!empty($row_detail['mota_vi'])) { ?>
                            <div class="lead font-weight-bold text-justify mb-4 text-dark" style="opacity: 0.8;">
                                <?=nl2br($row_detail['mota_vi'])?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="content-main text-justify" id="lightgallery-news">
                        <?=clearContent($row_detail['noidung_vi'])?>
                    </div>

                    <!-- Tags / Share -->
                    <div class="blog-footer mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php?com=tin-tuc" class="btn btn-outline-primary rounded-pill px-4 font-weight-bold btn-sm">
                                <i class="fas fa-arrow-left mr-2"></i> Quay lại danh sách
                            </a>
                            <div class="share-icons">
                                <span class="font-weight-bold mr-2 text-muted">Chia sẻ:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=getCurrentPageURL()?>" target="_blank" class="text-primary mr-2"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=<?=getCurrentPageURL()?>" target="_blank" class="text-info"><i class="fab fa-twitter fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar (Sticky) -->
            <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0">
                <div class="sidebar-sticky" style="position: sticky; top: 120px;">
                    <!-- Search -->
                    <div class="detail-container p-4 mb-4 bg-light-white border rounded-lg">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Tìm kiếm</h5>
                        <form action="index.php" method="get" class="position-relative">
                            <input type="hidden" name="com" value="search">
                            <input type="text" name="keyword" class="form-control rounded-pill px-4 border-0 bg-white shadow-sm" placeholder="Nhập từ khóa..." style="height: 45px;">
                            <button type="submit" class="btn text-primary position-absolute" style="right: 15px; top: 5px;"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="detail-container p-4 mb-4 bg-light-white border rounded-lg">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Danh mục tin</h5>
                        <ul class="list-unstyled mb-0">
                            <?php if(!empty($ds_danhmuc_sidebar)) { foreach($ds_danhmuc_sidebar as $v) { ?>
                            <li class="mb-2">
                                <a href="tin-tuc/<?=($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id'])?>.html" class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-white transition-3 text-dark font-weight-bold">
                                    <span><i class="fas fa-chevron-right mr-2 text-primary small"></i> <?=$v['ten_vi']?></span>
                                    <span class="badge badge-primary-light badge-pill"><?=$v['so_bai']?></span>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>

                    <!-- Related News -->
                    <div class="detail-container p-4 bg-light-white border rounded-lg">
                        <h5 class="f-700 mb-3 border-bottom pb-2">Tin liên quan</h5>
                        <?php if(!empty($ds_khac)) { foreach($ds_khac as $v) { 
                            $link_khac = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                        ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded overflow-hidden mr-3" style="width: 70px; height: 70px; flex-shrink: 0;">
                                <img src="<?=$v['photo']?>" alt="<?=$v['ten_vi']?>" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div>
                                <h6 class="mb-1 text-sm"><a href="<?=$link_khac?>" class="text-dark font-weight-bold text-split-2 hover-primary"><?=$v['ten_vi']?></a></h6>
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

<!-- LightGallery CSS/JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('lightgallery-news');
        if(!container) return;

        // 1. Xử lý dàn hàng ngang cho các đoạn văn có nhiều ảnh (từ 2 ảnh trở lên)
        const paragraphs = container.querySelectorAll('p');
        paragraphs.forEach(p => {
            const imgs = p.querySelectorAll('img');
            if(imgs.length > 1) {
                p.classList.add('img-flex-row');
            }
        });

        // 2. Bọc ảnh vào thẻ <a> để LightGallery hoạt động
        const contentImages = container.querySelectorAll('img');
        contentImages.forEach(img => {
            // Chỉ xử lý ảnh thực sự (bỏ qua icon nhỏ)
            if(img.naturalWidth > 50 || img.offsetWidth > 50) {
                // Kiểm tra xem ảnh đã được bọc thẻ a chưa
                if (img.parentElement.tagName !== 'A') {
                    const src = img.getAttribute('src');
                    const wrapper = document.createElement('a');
                    wrapper.className = 'lg-item-wrapper';
                    wrapper.setAttribute('data-src', src);
                    wrapper.style.cursor = 'zoom-in';
                    wrapper.style.display = 'block';
                    
                    img.parentNode.insertBefore(wrapper, img);
                    wrapper.appendChild(img);
                } else {
                    // Nếu đã có thẻ a (ví dụ từ CKEditor), thêm class để nhận diện
                    img.parentElement.classList.add('lg-item-wrapper');
                    img.parentElement.setAttribute('data-src', img.getAttribute('src'));
                }
            }
        });

        // 3. Khởi tạo LightGallery
        lightGallery(container, {
            selector: '.lg-item-wrapper',
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
            mode: 'lg-fade',
            download: false,
            counter: true,
            enableDrag: true,
            enableSwipe: true,
            mobileSettings: {
                controls: false,
                showCloseIcon: true,
                download: false
            }
        });
    });
</script>

<style>
    /* Content Styling */
    .content-main { font-size: 1.05rem; line-height: 1.8; color: #334155; }
    .content-main p { margin-bottom: 1.5rem; }
    .content-main h2, .content-main h3, .content-main h4 { color: #1e293b; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; }
    .content-main ul, .content-main ol { margin-bottom: 1.5rem; padding-left: 1.5rem; }
    .content-main li { margin-bottom: 0.5rem; }
    
    /* Responsive Images Logic */
    .img-flex-row { 
        display: flex !important;
        flex-wrap: wrap !important; /* Wrap để xuống dòng nếu ảnh quá to */
        justify-content: center !important;
        gap: 15px !important;
        margin: 30px 0 !important;
    }
    
    .lg-item-wrapper {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s;
    }
    .lg-item-wrapper:hover { transform: scale(1.02); }

    .lg-item-wrapper img { 
        width: 100% !important;
        height: auto !important;
        display: block;
    }

    /* Ảnh đơn lẻ */
    .content-main p:not(.img-flex-row) .lg-item-wrapper {
        margin: 20px auto;
        max-width: 100%; /* Đảm bảo không tràn màn hình */
    }
    
    /* Hover Sidebar Items */
    .hover-bg-white:hover { background: #fff !important; box-shadow: 0 2px 10px rgba(0,0,0,0.05); color: var(--primary-color) !important; padding-left: 15px !important; }
    .hover-primary:hover { color: var(--primary-color) !important; text-decoration: none; }

    @media (max-width: 767px) {
        .img-flex-row { flex-direction: column !important; }
        .lg-item-wrapper { width: 100% !important; margin-bottom: 10px; }
        .detail-title { font-size: 1.8rem; }
    }
</style>