    <!-- Footer area start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row mb-sm-50 mb-xs-00">
                <div class="col-lg-4 z-5">
                    <div class="contact-area relative h-100 mr-lg-20 mr-md-00">
                        <div class="footer-logo mb-35">
                            <img src="<?=$row_setting['logoRectangle']?>" alt="logo footer" style="max-height: 60px;">
                        </div>
                        <div class="contact-options mb-35">
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt green"></i><?=$row_setting['diachi_vi']?>
                                </li>
                                <?php if(!empty($row_setting['taxCode'])) { ?>
                                <li>
                                    <i class="fas fa-info green"></i> MST: <?=$row_setting['taxCode']?>
                                </li>
                                <?php } ?>
                                <li>
                                    <i class="fas fa-phone green"></i><?=$row_setting['dienthoai']?>
                                </li>
                                <li>
                                    <i class="fas fa-mobile-alt green"></i><?=$row_setting['hotline']?>
                                </li>
                                <li>
                                    <i class="fas fa-envelope green"></i><?=$row_setting['email']?>
                                </li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <ul class="social-icons">
                                <?php if(!empty($row_setting['fanpage'])) { ?>
                                    <li>
                                        <a href="<?=$row_setting['fanpage']?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 14px; fill: white;"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if(!empty($row_setting['youtube'])) { ?>
                                    <li>
                                        <a href="<?=$row_setting['youtube']?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 18px; fill: white;"><path d="M549.65 124.08c-6.28-23.72-24.99-42.43-48.71-48.71C458.11 64 288 64 288 64S117.89 64 75.06 75.37c-23.72 6.28-42.43 24.99-48.71 48.71C16 166.91 16 256 16 256s0 89.09 10.35 131.92c6.28 23.72 24.99 42.43 48.71 48.71C117.89 448 288 448 288 448s170.11 0 212.94-11.37c23.72-6.28 42.43-24.99 48.71-48.71C560 345.09 560 256 560 256s0-89.09-10.35-131.92zM224 336V176l144 80-144 80z"/></svg>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if(!empty($row_setting['tiktok'])) { ?>
                                    <li>
                                        <a href="<?=$row_setting['tiktok']?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 16px; fill: white;"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4">
                    <div class="footer-links pt-85 pb-85 pt-md-50 mb-sm-70">
                        <h5 class="green f-700 mb-35">Liên kết</h5>
                        <ul class="links-list">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="gioi-thieu.html">Giới thiệu</a></li>
                            <li><a href="linh-vuc-hoat-dong.html">Lĩnh vực hoạt động</a></li>
                            <li><a href="du-an.html">Dự án</a></li>
                            <li><a href="tin-tuc.html">Tin tức</a></li>
                            <li><a href="tuyen-dung.html">Tuyển dụng</a></li>
                            <li><a href="thu-vien-anh.html">Thư viện ảnh</a></li>
                            <li><a href="lien-he.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-8">
                    <div class="footer-links pt-85 pb-85 pt-md-50 mb-sm-70">
                        <h5 class="green f-700 mb-35">Lĩnh vực hoạt động</h5>
                        <ul class="links-list">
                            <li><a href="linh-vuc-hoat-dong/quan-ly.html">Quản lý và vận hành nhà chung cư</a></li>
                            <li><a href="linh-vuc-hoat-dong/bao-tri.html">Bảo trì máy lạnh, thi công lắp đặt điện</a></li>
                            <li><a href="linh-vuc-hoat-dong/giu-xe.html">Giữ xe tháng: ôtô, xe gắn máy</a></li>
                            <li><a href="linh-vuc-hoat-dong/sua-chua.html">Sửa chữa nhà, trang trí nội thất</a></li>
                            <li><a href="linh-vuc-hoat-dong/bao-ve.html">Dịch vụ bảo vệ</a></li>
                            <li><a href="linh-vuc-hoat-dong/ve-sinh.html">Dịch vụ giặt ủi</a></li>
                            <li><a href="linh-vuc-hoat-dong/cay-xanh.html">Dịch vụ cây xanh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="copyright pt-25 pb-25">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <p class="mb-0">© 2025 KHASERVICE. All rights reserved.</p>
                    </div>
                    <div class="col-xl-4 text-right">
                        <a href="" class="btn scroll-btn f-right flex-center z-25 opacity-0">
                            <i class="fas fa-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- Footer area end -->