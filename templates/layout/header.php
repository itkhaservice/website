<!-- Preloader start -->
    <div class="loader-page flex-center">
        <img src="img/loader.gif" alt="">
    </div>
    <!-- Preloader end -->
    <!-- Header start -->
    <!-- Top Header removed as per request -->
    <header class="transperant-head header-style-3 transition-4" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 999; background: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <style>
            .main-menu-3 ul li a {
                font-weight: 700 !important; /* Làm đậm chữ */
                text-transform: uppercase; /* Viết hoa để nghiêm túc hơn */
                font-size: 14px; /* Tinh chỉnh kích thước */
                letter-spacing: 0.5px;
            }
            .main-menu-3 ul li .submenu li a {
                font-weight: 600 !important;
                text-transform: none; /* Submenu không cần viết hoa hết */
                font-size: 13px;
            }
            .main-menu-3 ul li.active > a {
                color: #108042 !important; /* Màu xanh thương hiệu khi active */
            }

            /* --- FIX MOBILE MENU EXPAND BUTTON --- */
            @media (max-width: 991px) {
                /* Đồng nhất chiều cao toàn bộ dòng menu là 40px */
                .mobile-menu-3.mean-container .mean-nav ul li a {
                    padding: 0 15px !important;
                    line-height: 40px !important;
                    height: 40px !important;
                    font-size: 13px !important;
                }

                /* Chỉnh nút + / - khớp khít với dòng menu */
                .mobile-menu-3.mean-container .mean-nav ul li a.mean-expand {
                    height: 40px !important;
                    line-height: 40px !important;
                    width: 40px !important;
                    padding: 0 !important;
                    text-align: center !important;
                    border: none !important;
                    border-left: 1px solid rgba(0,0,0,0.05) !important;
                    background: transparent !important;
                    top: 0 !important;
                    right: 0 !important;
                }

                /* Padding bên phải cho text để không bị nút đè */
                .mobile-menu-3.mean-container .mean-nav ul li a:not(.mean-expand) {
                    padding-right: 45px !important;
                }

                /* Thụt lề cho menu con để nhận biết cấp bậc */
                .mobile-menu-3.mean-container .mean-nav ul li li a {
                    padding-left: 30px !important; /* Menu cấp 2 */
                    background: #fdfdfd !important;
                    font-size: 12.5px !important;
                    font-weight: 500 !important;
                }
                .mobile-menu-3.mean-container .mean-nav ul li li li a {
                    padding-left: 45px !important; /* Menu cấp 3 */
                }

                /* Ẩn mục Trang chủ (icon ngôi nhà) trên mobile cho gọn */
                .mobile-menu-3.mean-container .mean-nav > ul > li:first-child {
                    display: none !important;
                }
            }
        </style>
        <div class="container-fluid px-lg-5">
            <div class="row align-items-center no-gutters justify-content-between header-row">
                <!-- Mobile Left Placeholder (to balance if needed, but we use absolute centering for logo) -->
                <div class="col-auto d-lg-none" style="width: 40px;"></div>

                <!-- Logo Section -->
                <div class="col-auto px-lg-4 logo-col">
                    <div class="logo transition-4 text-center">
                        <a href="index.php">
                            <img src="<?=$row_setting['logoRectangle']?>" class="transition-4" alt="logo" style="max-height: 60px;">
                        </a>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="col-auto px-4 d-none d-lg-block">
                    <div class="d-flex align-items-center">
                        <div class="menu-links links-type-3">
                            <nav class="main-menu main-menu-3">
                                <ul>
                                    <li class="<?=$com==''?'active':''?>">
                                        <a href="index.php"><i class="fas fa-home"></i></a>
                                    </li>
                                    <?php
                                        $d->reset();
                                        // Chỉ lấy bài viết Nổi bật (noibat=1) để hiển thị lên menu
                                        $sql = "select ten_vi, ten_khong_dau, id from #_gioithieu where hienthi=1 and noibat=1 order by stt asc, id asc";
                                        $d->query($sql);
                                        $ds_gioithieu = $d->result_array();
                                    ?>
                                    <li class="<?=$com=='gioi-thieu'?'active':''?>">
                                        <a href="index.php?com=gioi-thieu">Giới thiệu <i class="fas fa-angle-down"></i></a>
                                        <?php if(count($ds_gioithieu) > 0) { ?>
                                        <ul class="submenu">
                                            <?php foreach($ds_gioithieu as $v) { ?>
                                                <li><a href="gioi-thieu/<?=$v['ten_khong_dau']?>.html"><?=$v['ten_vi']?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="<?=$com=='linh-vuc-hoat-dong'?'active':''?>">
                                        <a href="linh-vuc-hoat-dong.html">Lĩnh vực hoạt động <i class="fas fa-angle-down"></i></a>
                                        <?php if(!empty($menu_dichvu)) { ?>
                                        <ul class="submenu">
                                            <?php foreach($menu_dichvu as $v) { ?>
                                                <li><a href="dich-vu/<?=$v['ten_khong_dau']?>.html"><?=$v['ten_vi']?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="<?=$com=='du-an'?'active':''?>">
                                        <a href="du-an.html">Dự án <i class="fas fa-angle-down"></i></a>
                                        <?php if(!empty($menu_khuvuc)) { ?>
                                        <ul class="submenu">
                                            <?php foreach($menu_khuvuc as $v) { 
                                                $link_kv = ($v['ten_khong_dau']!='') ? 'du-an/khu-vuc/'.$v['ten_khong_dau'].'.html' : 'du-an.html?id_khuvuc='.$v['id'];
                                            ?>
                                                <li><a href="<?=$link_kv?>"><?=$v['ten_vi']?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="<?=$com=='tin-tuc'?'active':''?>">
                                        <a href="tin-tuc.html">Tin tức <i class="fas fa-angle-down"></i></a>
                                        <?php if(!empty($menu_news_cat)) { ?>
                                        <ul class="submenu">
                                            <?php foreach($menu_news_cat as $v) { ?>
                                                <li><a href="tin-tuc/<?=$v['ten_khong_dau']?>.html"><?=$v['ten_vi']?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li class="<?=$com=='tuyen-dung'?'active':''?>"><a href="tuyen-dung.html">Tuyển dụng</a></li>
                                    <li class="<?=$com=='thu-vien-anh'?'active':''?>"><a href="thu-vien-anh.html">Thư viện ảnh</a></li>
                                    <li class="<?=$com=='lien-he'?'active':''?>">
                                        <a href="lien-he.html">Liên hệ</a>
                                    </li>
                                    <li class="d-block d-lg-none">
                                        <a href="javascript:void(0)">Phần mềm QLVH</a>
                                        <ul class="submenu">
                                            <li><a href="<?=$row_setting['link_phanmem']?>" target="_blank">Link phần mềm quản lý</a></li>
                                            <li><a href="<?=$row_setting['link_gioithieu_app']?>">Nội dung giới thiệu về App Dân Cư</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Desktop/Mobile Icons -->
                <div class="col-auto px-3 px-lg-4 icon-col d-flex align-items-center icon-col-desktop">
                    <div class="icon-links d-flex align-items-center">
                        <a href="" class="search-icon d-none d-lg-block black mr-20" data-toggle="modal" data-target="#searchModal">
                            <i class="fas fa-search"></i>
                        </a>
                        <!-- Fix alignment and Remove Debug -->
                        <div class="btn btn-round d-none d-lg-inline-flex align-items-center justify-content-center blob-small btn-dropdown ml-3" style="height: 40px; white-space: nowrap;">
                            <span>Phần mềm QLVH <i class="fas fa-angle-down ml-1"></i></span>
                            <ul class="submenu">
                                <li><a href="<?=$row_setting['link_phanmem']?>" target="_blank">Link phần mềm quản lý</a></li>
                                <li><a href="<?=$row_setting['link_gioithieu_app']?>">Nội dung giới thiệu về App Dân Cư</a></li>
                            </ul>
                        </div>
                        <!-- Mobile Menu Reveal Placeholder -->
                        <div class="d-lg-none mobile-menu-reveal-placeholder" style="width: 40px; height: 40px;"></div>
                    </div>
                </div>

                <!-- Mobile Menu Container -->
                <div class="mobile-menu-3 d-lg-none"></div>
            </div>
        </div>

    </header>
    <!-- The search Modal start -->
    <div class="search-popup modal" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="index.php" method="get">
                        <input type="hidden" name="com" value="search">
                        <div class="form-group relative">
                            <input type="text" class="form-control input-search" name="keyword" id="search" placeholder="Tìm kiếm..." required>
                            <i class="fas fa-search transform-v-center"></i>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <i class="fas fa-times close-search-modal" data-dismiss="modal" aria-label="Close"></i>
    </div>
    <!-- The search Modal end -->
    <!-- Header end -->