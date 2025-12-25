    <!-- Preloader start -->
    <div class="loader-page flex-center">
        <img src="img/loader.gif" alt="">
    </div>
    <!-- Preloader end -->
    <!-- Header start -->
    <!-- Top Header removed as per request -->
    <header class="transperant-head header-style-3 transition-4" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 999; background: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div class="container-fluid px-lg-5">
            <div class="row align-items-center no-gutters justify-content-center">
                <div class="col-auto px-4">
                    <div class="logo transition-4">
                        <a href="index.php">
                            <img src="<?=$row_setting['logoRectangle']?>" class="transition-4" alt="logo" style="max-height: 60px;">
                        </a>
                    </div>
                </div>
                <div class="col-auto px-4">
                    <div class="d-flex align-items-center">
                        <div class="menu-links links-type-3">
                            <nav class="main-menu main-menu-3">
                                <ul>
                                    <li class="<?=$com==''?'active':''?>">
                                        <a href="index.php"><i class="fas fa-home"></i></a>
                                    </li>
                                    <?php
                                        $d->reset();
                                        $sql = "select ten_vi, ten_khong_dau, id from #_gioithieu where hienthi=1 order by stt asc, id asc";
                                        $d->query($sql);
                                        $ds_gioithieu = $d->result_array();
                                    ?>
                                    <li class="<?=$com=='gioi-thieu'?'active':''?>">
                                        <a href="gioi-thieu.html">Giới thiệu <i class="fas fa-angle-down"></i></a>
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
                                        <ul class="submenu">
                                            <li><a href="linh-vuc-hoat-dong/quan-ly.html">Dịch vụ quản lý và vận hành nhà chung cư</a></li>
                                            <li><a href="linh-vuc-hoat-dong/bao-tri.html">Dịch vụ bảo trì máy lạnh, thi công lắp đặt điện</a></li>
                                            <li><a href="linh-vuc-hoat-dong/giu-xe.html">Dịch vụ giữ xe tháng: ôtô, xe gắn máy</a></li>
                                            <li><a href="linh-vuc-hoat-dong/sua-chua.html">Dịch vụ sửa chữa nhà, trang trí nội thất</a></li>
                                            <li><a href="linh-vuc-hoat-dong/bao-ve.html">Dịch vụ bảo vệ</a></li>
                                            <li><a href="linh-vuc-hoat-dong/ve-sinh.html">Dịch vụ giặt ủi</a></li>
                                            <li><a href="linh-vuc-hoat-dong/cay-xanh.html">Dịch vụ cây xanh</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?=$com=='du-an'?'active':''?>">
                                        <a href="du-an.html">Dự án</a>
                                    </li>
                                    <li class="<?=$com=='tin-tuc'?'active':''?>">
                                        <a href="tin-tuc.html">Tin tức <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="tin-tuc/tin-cong-ty.html">Tin công ty</a></li>
                                            <li><a href="tin-tuc/tin-nganh.html">Tin trong ngành</a></li>
                                            <li><a href="tin-tuc/phong-thuy.html">Kiến thức phong thủy</a></li>
                                            <li><a href="tin-tuc/cam-nang.html">Sổ tay cư dân</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?=$com=='tuyen-dung'?'active':''?>"><a href="tuyen-dung.html">Tuyển dụng</a></li>
                                    <li class="<?=$com=='thu-vien-anh'?'active':''?>"><a href="thu-vien-anh.html">Thư viện ảnh</a></li>
                                    <li class="<?=$com=='lien-he'?'active':''?>">
                                        <a href="lien-he.html">Liên hệ</a>
                                    </li>
                                    <li class="d-block d-lg-none">
                                        <a href="#">Phần mềm QLVH</a>
                                        <ul class="submenu">
                                            <li><a href="#" target="_blank">Link phần mềm quản lý</a></li>
                                            <li><a href="#" target="_blank">Nội dung giới thiệu về App Dân Cư</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-auto px-4">
                    <div class="icon-links d-flex align-items-center">
                        <a href="" class="search-icon d-none d-sm-block black mr-20" data-toggle="modal" data-target="#searchModal">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="btn btn-round d-none d-sm-block blob-small btn-dropdown">
                            <span>Phần mềm QLVH <i class="fas fa-angle-down mr-5"></i></span>
                            <ul class="submenu">
                                <li><a href="#" target="_blank">Link phần mềm quản lý</a></li>
                                <li><a href="noi-dung-gioi-thieu-app-dan-cu.html">Nội dung giới thiệu về App Dân Cư</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu-3"></div>
                </div>
            </div>
        </div>

    </header>
    <!-- The search Modal start -->
    <div class="search-popup modal" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group relative">
                            <input type="text" class="form-control input-search" id="search" placeholder="Tìm kiếm...">
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