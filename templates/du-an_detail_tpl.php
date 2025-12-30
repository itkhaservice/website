    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Dự án</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="du-an.html">Dự án</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- portfolio deetails area start -->
    <section class="case-details pt-90 pb-100">
        <div class="container">
            <div class="row mb-40">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center flex-wrap">
                        <?php if(!empty($row_detail['ten_khuvuc'])) { ?>
                            <span class="badge badge-success px-3 py-2 mr-3" style="background-color: #108042; font-size: 14px;"><?=$row_detail['ten_khuvuc']?></span>
                        <?php } ?>
                        

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="f-700 lh-13 mt-5 mb-20"><?=$row_detail['ten_vi']?></h1>
                    
                    <?php if(!empty($row_detail['mota_vi'])) { ?>
                        <div class="description font-weight-bold text-justify mb-30" style="font-size: 1.1em; color: #444; border-left: 4px solid #108042; padding-left: 20px;">
                            <?=nl2br($row_detail['mota_vi'])?>
                        </div>
                    <?php } ?>

                    <div class="content-main" id="lightgallery-project">
                        <?=clearContent($row_detail['noidung_vi'])?>
                    </div>

                    <!-- LightGallery CSS/JS -->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const container = document.getElementById('lightgallery-project');
                            if(!container) return;

                            // 1. Xử lý dàn hàng ngang cho các đoạn văn có nhiều ảnh
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
                        .content-main table { width: 100% !important; border-collapse: collapse; margin: 20px 0; }
                        .content-main table td, .content-main table th { padding: 12px; border: 1px solid #eee; }
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
                </div>
            </div>
            
            <div class="row align-items-center mt-50">
                <div class="col-md-6 text-center text-md-left">
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="next-prev-caser">
                        <a class="f-600" href="du-an.html"><i class="fas fa-long-arrow-alt-left mr-25"></i> QUAY LẠI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio deetails area end -->

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