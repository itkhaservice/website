    <!-- inner banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green"><?=$title_detail?></h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="thu-vien-anh.html">Thư viện ảnh</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title_detail?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- inner banner end -->

    <!-- Gallery Detail start -->
    <section class="gallery-detail-area pt-100 pb-100">
        <div class="container">
            <div class="row mb-40">
                <div class="col-12">
                    <h3 class="f-700 mb-20"><?=$row_detail['ten_vi']?></h3>
                    <div class="description">
                        <?=$row_detail['mota_vi']?>
                    </div>
                </div>
            </div>
            
            <div class="row" id="lightgallery">
                <?php if(!empty($ds_anh)) { foreach($ds_anh as $k => $v) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                    <div class="gallery-item relative img-lined shadow-1 transition-4">
                        <a href="<?=$v['photo']?>" class="popup-image" title="<?=$v['ten_vi']?>">
                            <img src="<?=$v['photo']?>" alt="<?=$v['ten_vi']?>" class="w-100" style="height: 200px; object-fit: cover;">
                            <div class="gallery-overlay flex-center flex-column">
                                <i class="fas fa-search-plus f-700 white mb-10 fa-2x"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }} ?>
            </div>
            
            <div class="row mt-30">
                <div class="col-12 text-center">
                    <a href="thu-vien-anh.html" class="btn btn-border-green"><i class="fas fa-arrow-left mr-10"></i> Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Detail end -->
    
    <style>
        .gallery-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(9, 188, 138, 0.8);
            opacity: 0;
            transition: all 0.4s ease;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }
    </style>
    
    <script>
        // Kích hoạt Magnific Popup (nếu đã có thư viện trong js/main.js hoặc footer)
        // $(document).ready(function() {
        //     $('.popup-image').magnificPopup({
        //         type: 'image',
        //         gallery: { enabled: true }
        //     });
        // });
    </script>