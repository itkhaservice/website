<!-- Inner Banner -->
<section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
    <div class="container">
        <div class="row z-5 align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class="f-700 green"><?=$row_detail['ten_vi']?></h1>
                <span class="green-line bg-green d-none d-md-inline-block"></span>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <nav aria-label="breadcrumb" class="banner-breadcump">
                    <ol class="breadcrumb justify-content-center justify-content-md-end bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.php" class="white"><i class="fas fa-home fs-12 mr-1"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="thu-vien-anh.html" class="white">Thư viện ảnh</a></li>
                        <li class="breadcrumb-item active white" aria-current="page">Album</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Detail Area -->
<section class="gallery-detail-area bg-light-white pt-70 pb-100">
    <div class="container">
        <div class="row mb-40">
            <div class="col-lg-12">
                <?php if(!empty($row_detail['mota_vi'])) { ?>
                    <div class="description text-justify mb-40 p-4 bg-white rounded shadow-sm border-left-primary">
                        <?=$row_detail['mota_vi']?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row popup-gallery">
            <?php if(!empty($ds_photo)) { foreach($ds_photo as $v) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="gallery-item-detail bg-white p-2 rounded shadow-sm overflow-hidden transition-4">
                    <a href="<?=$v['photo']?>" title="<?=$row_detail['ten_vi']?>" class="d-block relative overflow-hidden group">
                        <img src="<?=$v['photo']?>" alt="<?=$row_detail['ten_vi']?>" class="w-100 img-thumbnail-custom transition-4">
                        <div class="img-overlay-zoom flex-center">
                            <i class="fas fa-search-plus text-white fs-30"></i>
                        </div>
                    </a>
                </div>
            </div>
            <?php }} else { ?>
                <div class="col-12 text-center py-5">
                    <img src="<?=get_photo($row_detail['photo'])?>" alt="Cover" class="img-fluid rounded shadow mb-4" style="max-height: 400px;">
                    <p class="text-muted">Album hiện chưa có thêm hình ảnh chi tiết.</p>
                </div>
            <?php } ?>
        </div>

        <div class="row mt-50">
            <div class="col-12 text-center">
                <a href="thu-vien-anh.html" class="btn btn-round-blue"><i class="fas fa-arrow-left mr-2"></i> QUAY LẠI THƯ VIỆN</a>
            </div>
        </div>
    </div>
</section>

<style>
    .border-left-primary { border-left: 5px solid #108042; }
    .gallery-item-detail:hover { transform: scale(1.03); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .img-thumbnail-custom { height: 200px; width: 100%; object-fit: cover; border-radius: 4px; }
    .img-overlay-zoom {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(16, 128, 66, 0.6);
        opacity: 0; transition: 0.3s;
    }
    .group:hover .img-overlay-zoom { opacity: 1; }
    .group:hover img { transform: scale(1.1); }
</style>

<script>
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Đang tải ảnh #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">Ảnh #%curr%</a> không thể hiển thị.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });
</script>

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