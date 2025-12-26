<div class="content-header mb-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold" style="font-size: 1.8rem;">Tổng quan</h1>
                <p class="text-muted small mb-0">Chào mừng trở lại, chúc bạn một ngày làm việc hiệu quả!</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-secondary">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Tin tức -->
    <div class="col-lg-3 col-6 mb-4">
        <div class="small-box box-info h-100">
            <div class="inner">
                <h3><?=$count_news?></h3>
                <p>Bài viết Tin tức</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="index.php?com=news&act=man&type=tin-tuc" class="small-box-footer">
                Xem chi tiết <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
    
    <!-- Dự án -->
    <div class="col-lg-3 col-6 mb-4">
        <div class="small-box box-success h-100">
            <div class="inner">
                <h3><?=$count_duan?></h3>
                <p>Dự án & Công trình</p>
            </div>
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="index.php?com=du-an&act=man" class="small-box-footer">
                Xem chi tiết <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    <!-- Dịch vụ -->
    <div class="col-lg-3 col-6 mb-4">
        <div class="small-box box-warning h-100">
            <div class="inner">
                <h3><?=$count_dichvu?></h3>
                <p>Dịch vụ cung cấp</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <a href="index.php?com=dichvu&act=man" class="small-box-footer">
                Xem chi tiết <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    <!-- Liên hệ mới -->
    <div class="col-lg-3 col-6 mb-4">
        <div class="small-box box-danger h-100">
            <div class="inner">
                <h3><?=$count_contact_new?></h3>
                <p>Liên hệ mới</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <a href="index.php?com=contact&act=man" class="small-box-footer">
                Xem chi tiết <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Cột trái: Liên hệ mới nhất -->
    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header border-0 bg-white d-flex align-items-center justify-content-between pt-4 pb-0">
                <h3 class="card-title mb-0">Liên hệ gần đây</h3>
                <a href="index.php?com=contact&act=man" class="btn btn-sm btn-light text-primary font-weight-bold">Xem tất cả</a>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="border-top: none;">
                        <thead class="bg-light">
                            <tr>
                                <th class="pl-4 border-0 rounded-left">Khách hàng</th>
                                <th class="border-0">Thông tin</th>
                                <th class="border-0">Thời gian</th>
                                <th class="pr-4 border-0 rounded-right text-right">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($latest_contacts)) { 
                                foreach($latest_contacts as $v) { ?>
                                <tr>
                                    <td class="pl-4 border-0">
                                        <div class="font-weight-bold text-dark"><?=$v['ten']?></div>
                                    </td>
                                    <td class="border-0">
                                        <div class="text-muted small"><i class="fas fa-envelope mr-1"></i> <?=$v['email']?></div>
                                        <div class="text-muted small"><i class="fas fa-phone mr-1"></i> <?=$v['dienthoai']?></div>
                                    </td>
                                    <td class="border-0 text-muted small">
                                        <?=date('d/m', $v['ngaytao'])?> <br> <?=date('H:i', $v['ngaytao'])?>
                                    </td>
                                    <td class="pr-4 border-0 text-right">
                                        <?php if($v['trangthai']==1) { ?>
                                            <span class="badge badge-success bg-light text-success border border-success px-3">Đã xử lý</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger bg-light text-danger border border-danger px-3">Mới</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } } else { ?>
                                <tr><td colspan="4" class="text-center py-4 text-muted">Không có liên hệ nào mới.</td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột phải: Thông tin hệ thống -->
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header border-0 bg-white pt-4 pb-2">
                <h3 class="card-title mb-0">Thông tin hệ thống</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3">
                        <span class="text-muted"><i class="fab fa-php mr-2 text-primary fa-lg"></i> PHP Version</span>
                        <span class="font-weight-bold text-dark"><?=phpversion()?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3 border-top">
                        <span class="text-muted"><i class="fas fa-database mr-2 text-warning fa-lg"></i> Database</span>
                        <span class="font-weight-bold text-dark">MySQL</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3 border-top">
                        <span class="text-muted"><i class="fas fa-server mr-2 text-info fa-lg"></i> IP Address</span>
                        <span class="font-weight-bold text-dark"><?=$_SERVER['SERVER_ADDR']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3 border-top">
                        <span class="text-muted"><i class="fas fa-laptop-code mr-2 text-success fa-lg"></i> Framework</span>
                        <span class="font-weight-bold text-dark">Admin Panel V5</span>
                    </li>
                </ul>
                
                <div class="mt-4 p-4 rounded bg-light text-center border border-light">
                    <p class="mb-2 text-muted small">Bạn cần hỗ trợ kỹ thuật?</p>
                    <a href="mailto:support@khaservice.com" class="btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-headset mr-2"></i> Liên hệ Support</a>
                </div>
            </div>
        </div>
    </div>
</div>