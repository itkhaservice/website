    <!-- Footer area start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-4">
                    <div class="contact-area h-100">
                        <div class="footer-logo mb-4">
                            <img src="<?=$row_setting['logoRectangle']?>" alt="logo footer" style="max-height: 50px;">
                        </div>
                        <div class="contact-options mb-4">
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                                    <span class="text-muted text-sm"><?=$row_setting['diachi_vi']?></span>
                                </li>
                                <?php if(!empty($row_setting['taxCode'])) { ?>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-file-invoice mt-1 mr-3 text-primary"></i>
                                    <span class="text-muted text-sm">MST: <?=$row_setting['taxCode']?></span>
                                </li>
                                <?php } ?>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-phone-alt mt-1 mr-3 text-primary"></i>
                                    <span class="text-muted text-sm"><?=$row_setting['dienthoai']?></span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-envelope mt-1 mr-3 text-primary"></i>
                                    <span class="text-muted text-sm"><?=$row_setting['email']?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <ul class="social-icons list-unstyled d-flex mb-0">
                                <?php if(!empty($row_setting['fanpage'])) { ?>
                                    <li class="mr-2">
                                        <a href="<?=$row_setting['fanpage']?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if(!empty($row_setting['youtube'])) { ?>
                                    <li class="mr-2">
                                        <a href="<?=$row_setting['youtube']?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.65 124.08c-6.28-23.72-24.99-42.43-48.71-48.71C458.11 64 288 64 288 64S117.89 64 75.06 75.37c-23.72 6.28-42.43 24.99-48.71 48.71C16 166.91 16 256 16 256s0 89.09 10.35 131.92c6.28 23.72 24.99 42.43 48.71 48.71C117.89 448 288 448 288 448s170.11 0 212.94-11.37c23.72-6.28 42.43-24.99 48.71-48.71C560 345.09 560 256 560 256s0-89.09-10.35-131.92zM224 336V176l144 80-144 80z"/></svg>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4">
                    <div class="footer-links pt-40">
                        <h5 class="f-700 text-primary">Liên kết nhanh</h5>
                        <ul class="links-list list-unstyled">
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
                    <div class="footer-links pt-40">
                        <h5 class="f-700 text-primary">Lĩnh vực hoạt động</h5>
                        <ul class="links-list list-unstyled row">
                            <?php if(!empty($menu_dichvu)) { foreach($menu_dichvu as $v) { ?>
                                <li class="col-md-6"><a href="dich-vu/<?=$v['ten_khong_dau']?>.html"><?=$v['ten_vi']?></a></li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <p class="mb-0">© <?=date('Y')?> KHASERVICE. Toàn bộ bản quyền được bảo lưu.</p>
                    </div>
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <a href="#" class="scroll-btn d-inline-flex">
                            <i class="fas fa-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer area end -->
    <!-- Footer area end -->