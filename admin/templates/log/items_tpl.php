<div class="content-header mb-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold" style="font-size: 1.6rem; color: #1e293b;">Nhật ký hoạt động</h1>
                <p class="text-muted small mb-0">Theo dõi lịch sử thao tác hệ thống</p>
            </div>
            <div class="col-sm-6">
                <!-- Breadcrumb nếu cần -->
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        
        <!-- Filter Block -->
        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
            <div class="card-body py-3 px-4">
                <form action="index.php" method="get" id="filter-form">
                    <input type="hidden" name="com" value="log">
                    <input type="hidden" name="act" value="man">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8 mb-2 mb-lg-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0 bg-light pl-3 pr-2" style="border-radius: 8px 0 0 8px;"><i class="fas fa-search text-muted"></i></span>
                                </div>
                                <input type="text" name="keyword" class="form-control border-0 bg-light" placeholder="Tìm kiếm tài khoản, hành động, module..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>" style="height: 42px; border-radius: 0 8px 8px 0;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button class="btn btn-primary btn-block font-weight-bold shadow-sm" type="submit" style="height: 42px; border-radius: 8px; background-color: #108042; border-color: #108042;">
                                <i class="fas fa-filter mr-1"></i> Lọc dữ liệu
                            </button>
                        </div>
                        <?php if(isset($_GET['keyword']) && $_GET['keyword']!='') { ?>
                        <div class="col-lg-2 col-md-12 mt-2 mt-lg-0">
                            <a href="index.php?com=log&act=man" class="btn btn-light text-danger font-weight-bold btn-block" style="height: 42px; border-radius: 8px; line-height: 28px;">
                                <i class="fas fa-times mr-1"></i> Xóa lọc
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card shadow-sm border-0" style="border-radius: 16px; overflow: hidden;">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: #f8fafc;">
                            <tr>
                                <th style="width: 60px;" class="text-center py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">STT</th>
                                <th style="width: 160px;" class="py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">Thời gian</th>
                                <th style="width: 150px;" class="py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">Tài khoản</th>
                                <th style="width: 120px;" class="py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">Module</th>
                                <th style="width: 120px;" class="text-center py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">Hành động</th>
                                <th class="py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">Nội dung chi tiết</th>
                                <th style="width: 130px;" class="text-center py-3 text-secondary border-bottom-0 text-uppercase font-size-xs">IP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0, $count=count($items); $i<$count; $i++){ ?>
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td class="text-center align-middle font-weight-bold text-muted"><?=$i+1?></td>
                                <td class="align-middle">
                                    <div class="text-dark font-weight-bold"><?=date('d/m/Y', $items[$i]['ngaytao'])?></div>
                                    <div class="text-muted small"><i class="far fa-clock mr-1"></i><?=date('H:i:s', $items[$i]['ngaytao'])?></div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle mr-2 bg-light text-primary font-weight-bold d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border-radius: 50%;">
                                            <?=strtoupper(substr($items[$i]['username'], 0, 1))?>
                                        </div>
                                        <span class="font-weight-bold text-dark"><?=$items[$i]['username']?></span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <span class="badge badge-light border px-2 py-1" style="font-weight: 500;"><?=$items[$i]['module']?></span>
                                </td>
                                <td class="text-center align-middle">
                                    <?php 
                                        $color = 'info';
                                        $icon = 'info-circle';
                                        $hanhdong = $items[$i]['hanhdong'];
                                        
                                        if(stripos($hanhdong, 'thêm') !== false) { $color = 'success'; $icon = 'plus-circle'; }
                                        elseif(stripos($hanhdong, 'xóa') !== false) { $color = 'danger'; $icon = 'trash'; }
                                        elseif(stripos($hanhdong, 'cập nhật') !== false || stripos($hanhdong, 'sửa') !== false) { $color = 'warning'; $icon = 'edit'; }
                                        elseif(stripos($hanhdong, 'đăng nhập') !== false) { $color = 'primary'; $icon = 'sign-in-alt'; }
                                    ?>
                                    <span class="badge badge-soft-<?=$color?> px-3 py-2 rounded-pill" style="min-width: 90px;">
                                        <i class="fas fa-<?=$icon?> mr-1 small"></i> <?=$hanhdong?>
                                    </span>
                                </td>
                                <td class="align-middle text-muted" style="white-space: normal; line-height: 1.5;">
                                    <?=htmlspecialchars($items[$i]['noidung'])?>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="text-monospace small bg-light px-2 py-1 rounded border"><?=$items[$i]['ip']?></span>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if(count($items) == 0) { ?>
                                <tr><td colspan="7" class="text-center py-5 text-muted">
                                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/search-result-not-found-2130361-1800925.png" alt="No data" style="width: 120px; opacity: 0.6;">
                                    <p class="mt-3 mb-0">Chưa có dữ liệu nhật ký hoạt động</p>
                                </td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <?php if($paging['last'] > 1) { ?>
            <div class="card-footer bg-white border-top-0 py-3">
                <div class="row align-items-center">
                    <div class="col-md-6 text-muted small">
                        Hiển thị trang <strong><?=$paging['current']?></strong> / <strong><?=$paging['last']?></strong>
                    </div>
                    <div class="col-md-6">
                        <ul class="pagination pagination-sm m-0 justify-content-end">
                            <?php for($p=1; $p<=$paging['last']; $p++) { ?>
                                <li class="page-item <?=($p==$paging['current'])?'active':''?>">
                                    <a class="page-link border-0 rounded-circle mx-1 text-center font-weight-bold <?=($p==$paging['current'])?'bg-primary text-white':''?>" 
                                       href="index.php?com=log&act=man&p=<?=$p?><?=(isset($_GET['keyword']))?'&keyword='.$_GET['keyword']:''?>"
                                       style="width: 32px; height: 32px; line-height: 32px; padding: 0;">
                                        <?=$p?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
    .font-size-xs { font-size: 0.75rem; letter-spacing: 0.5px; }
    .badge-soft-success { background-color: #d1fae5; color: #065f46; }
    .badge-soft-danger { background-color: #fee2e2; color: #b91c1c; }
    .badge-soft-warning { background-color: #fef3c7; color: #92400e; }
    .badge-soft-info { background-color: #e0f2fe; color: #075985; }
    .badge-soft-primary { background-color: #dbeafe; color: #1e40af; }
    .page-link:focus { box-shadow: none; }
    .avatar-circle { font-size: 14px; background: #e2e8f0; }
</style>