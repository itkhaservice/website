<!-- inner banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('img/banner/inner-banner.jpg');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Thư viện ảnh</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thư viện ảnh</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- inner banner end -->

    <!-- Album list start -->
    <section class="gallery-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <?php if(!empty($tintuc)) { foreach($tintuc as $v) { ?>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="album-item relative img-lined shadow-1 transition-4">
                        <a href="thu-vien-anh/<?=$v['ten_khong_dau']?>.html">
                            <div class="album-thumb">
                                <img src="<?=!empty($v['photo']) ? $v['photo'] : 'img/service/'.(rand(1,4)).'.png'?>" alt="<?=$v['ten_vi']?>" class="w-100" style="height: 250px; object-fit: cover;">
                            </div>
                            <div class="album-content p-20 bg-white">
                                <h5 class="f-700 mb-10 text-uppercase" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?=$v['ten_vi']?></h5>
                                <p class="mb-0 text-muted f-500"><i class="far fa-calendar-alt mr-5"></i> <?=date('d/m/Y', $v['ngaytao'])?></p>
                            </div>
                            <div class="album-overlay flex-center">
                                <span class="btn btn-square-green"><i class="fas fa-search"></i> Xem Album</span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }} else { ?>
                    <div class="col-12 text-center">
                        <p>Đang cập nhật dữ liệu...</p>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-40">
                <div class="col-12">
                    <div class="pagination-area text-center">
                        <?=$paging['paging']?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Album list end -->
    
    <style>
        .album-item { overflow: hidden; display: block; }
        .album-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 250px; /* Khớp chiều cao ảnh */
            background: rgba(40, 47, 65, 0.6);
            opacity: 0;
            transition: all 0.4s ease;
        }
        .album-item:hover .album-overlay { opacity: 1; }
        .album-item:hover { transform: translateY(-5px); }
    </style>