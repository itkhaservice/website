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
                            <li class="breadcrumb-item"><a href="index.php?com=tin-tuc">Tin tức</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- blog details area start -->
    <section class="service-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <!-- left part -->
                    <div class="left-blog-detail">
                        <div class="blog-by-info">
                            <ul class="list-inline fs-12">
                                <li class="list-inline-item pr-15">
                                    <i class="far fa-calendar mr-10 fs-14 green"></i> <?=date('d M Y', $row_detail['ngaytao'])?>
                                </li>
                                <li class="list-inline-item pr-15">
                                    <i class="far fa-eye mr-10 fs-14 green"></i> <?=$row_detail['luotxem']?> lượt xem
                                </li>
                            </ul>
                        </div>
                        <h1 class="f-700 lh-13 mt-5 mb-10"><?=$row_detail['ten_vi']?></h1>
                        
                        <?php if(!empty($row_detail['mota_vi'])) { ?>
                            <div class="description font-weight-bold text-justify mb-20" style="font-size: 1.1em; color: #555;">
                                <?=nl2br($row_detail['mota_vi'])?>
                            </div>
                        <?php } ?>

                        <div class="content-main mt-20" id="lightgallery-news">
                            <?=clearContent($row_detail['noidung_vi'])?>
                        </div>

                        <!-- LightGallery CSS/JS -->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const container = document.getElementById('lightgallery-news');
                                if(!container) return;

                                // 1. Xử lý dàn hàng ngang cho các đoạn văn có nhiều ảnh
                                const paragraphs = container.querySelectorAll('p');
                                paragraphs.forEach(p => {
                                    const imgs = p.querySelectorAll('img');
                                    if(imgs.length > 1) {
                                        p.classList.add('img-flex-row');
                                    }
                                });

                                // 2. Bọc ảnh vào thẻ <a> giống trang Thư viện để LightGallery hoạt động chuẩn
                                const contentImages = container.querySelectorAll('img');
                                contentImages.forEach(img => {
                                    if(img.naturalWidth > 50 || img.offsetWidth > 50) {
                                        const src = img.getAttribute('src');
                                        const wrapper = document.createElement('a');
                                        wrapper.className = 'lg-item-wrapper';
                                        wrapper.setAttribute('data-src', src);
                                        wrapper.style.cursor = 'zoom-in';
                                        wrapper.style.display = 'block';
                                        
                                        img.parentNode.insertBefore(wrapper, img);
                                        wrapper.appendChild(img);
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
                                    enableSwipe: true
                                });
                            });
                        </script>

                        <style>
                            .content-main { text-align: justify; font-size: 16px; line-height: 1.8; color: #333; }
                            .content-main p { margin-bottom: 20px; }
                            
                            /* Container chứa các ảnh dàn hàng ngang */
                            .img-flex-row { 
                                display: flex !important;
                                flex-direction: row !important;
                                flex-wrap: nowrap !important;
                                justify-content: center !important;
                                align-items: flex-start !important;
                                gap: 15px !important;
                                margin: 30px 0 !important;
                                width: 100% !important;
                            }
                            
                            /* Wrapper thẻ <a> bao quanh ảnh */
                            .lg-item-wrapper {
                                flex: 1 1 0% !important;
                                max-width: 100%;
                            }

                            .lg-item-wrapper img { 
                                width: 100% !important;
                                height: auto !important;
                                border-radius: 8px;
                                object-fit: cover;
                                display: block;
                            }

                            /* Ảnh đơn lẻ (không nằm trong flex-row) */
                            .content-main p:not(.img-flex-row) .lg-item-wrapper {
                                display: block !important;
                                margin: 20px auto;
                                max-width: fit-content;
                            }
                            .content-main p:not(.img-flex-row) .lg-item-wrapper img {
                                width: auto !important;
                                max-width: 100%;
                            }

                            @media (max-width: 767px) {
                                .img-flex-row { 
                                    flex-direction: column !important;
                                    gap: 15px !important;
                                }
                                .lg-item-wrapper { 
                                    width: 100% !important;
                                    flex: none !important;
                                }
                            }
                        </style>

                        <!-- Share buttons removed for simplicity or can be added back -->
                        
                        <!-- next-prev button -->
                        <div class="d-flex pt-25 pb-25 mt-25 justify-content-between next-prev-button">
                            <a href="index.php?com=tin-tuc" class="f-500">
                                <i class="fas fa-long-arrow-alt-left mr-15"></i>Quay lại danh sách
                            </a>
                        </div>

                    </div>
                </div>
                <!-- right-part -->
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
                            <h4>Tin liên quan</h4>
                        </div>
                        <div class="right-box-content mt-10 mb-10">
                            <?php if(!empty($ds_khac)) { foreach($ds_khac as $v) { 
                                $link_khac = 'tin-tuc/chi-tiet/' . ($v['ten_khong_dau']!='' ? $v['ten_khong_dau'] : $v['id']) . '.html';
                            ?>
                            <a href="<?=$link_khac?>" class="popular-post d-flex align-items-center">
                                <div class="popular-post-img mr-20">
                                    <img src="<?=get_photo($v['photo'])?>" alt="<?=$v['ten_vi']?>" style="width:70px; height:70px; object-fit:cover;">
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
    <!-- Blog details area end -->

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