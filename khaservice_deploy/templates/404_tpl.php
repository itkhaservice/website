<!-- 404 area start -->
<section class="not-found pt-100 pb-100 bg-light-white" style="background-image: url('<?=$inner_banner_img?>'); background-size: cover;" data-overlay="9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="area-not-found z-5">
                    <div class="mb-40">
                        <img src="<?=$row_setting['logoRectangle']?>" alt="Logo" style="max-height: 100px;">
                    </div>
                    <h1 class="head-404 primary-color mb-35">
                        4<span class="green">0</span>4
                      </h1>
                    <h5 class="fs-19 mb-25 primary-color font-weight-bold">Rất tiếc! Trang bạn yêu cầu hiện không tồn tại hoặc đã bị di chuyển.</h5>
                    
                    <form action="index.php" method="get" class="search-not-found mx-auto" style="max-width: 500px;">
                        <input type="hidden" name="com" value="search">
                        <div class="form-group relative mb-25" style="position: relative;">
                            <input type="text" name="keyword" class="form-control input-lg shadow-sm" placeholder="Tìm kiếm nội dung khác..." style="border-radius: 30px; border: 1px solid #eee; padding-left: 25px; height: 55px;">
                            <button type="submit" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0;">
                                <i class="fas fa-search green" style="font-size: 18px;"></i>
                            </button>
                        </div>
                    </form>
                    
                    <p class="mb-35 primary-color">Hoặc quay trở lại <a href="index.php" class="underline green font-weight-bold">Trang chủ</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 404 area end -->

<style>
    .primary-color { color: #108042 !important; }
    .head-404 { font-size: 150px; line-height: 1; font-weight: 900; }
    .area-not-found { position: relative; z-index: 10; }
</style>