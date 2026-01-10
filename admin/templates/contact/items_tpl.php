<?php $is_admin = (isset($_SESSION['login']['role']) && $_SESSION['login']['role'] > 1); ?>
<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h1 class="m-0 text-dark" style="font-size: 1.6rem; font-weight: 800; color: #1e293b !important; letter-spacing: -0.5px;">Liên hệ - Đăng ký</h1>
    </div>
    <div class="col-md-6 text-right">
        <?php if($is_admin) { ?>
        <a href="#" id="delete-all" class="btn btn-sm btn-outline-danger shadow-sm px-3 py-2 border-0 bg-white"><i class="fas fa-trash-alt mr-1"></i> Xóa mục chọn <span id="selected-count" class="badge badge-danger ml-1 d-none">0</span></a>
        <?php } ?>
    </div>
</div>

<!-- Filter Bar -->
<div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px; background: #fff;">
    <div class="card-body py-3 px-4">
        <form action="index.php" method="get" id="filter-form">
            <input type="hidden" name="com" value="contact">
            <input type="hidden" name="act" value="man">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 mb-2 mb-lg-0">
                    <div class="input-group input-group-sm bg-light rounded-pill px-3 py-1">
                        <input type="text" name="keyword" class="form-control border-0 bg-transparent shadow-none" placeholder="Tên, Email, Điện thoại..." value="<?=$_GET['keyword']?>">
                        <div class="input-group-append">
                            <span class="text-muted flex-center"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mb-2 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <input type="date" name="start_date" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" value="<?=$_GET['start_date']?>" title="Từ ngày">
                        <span class="mx-2 text-muted">-</span>
                        <input type="date" name="end_date" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" value="<?=$_GET['end_date']?>" title="Đến ngày">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 d-flex align-items-center justify-content-lg-end mt-2 mt-lg-0">
                    <button class="btn btn-sm btn-dark px-4 rounded-pill shadow-sm" type="submit" style="background: #1e293b;"><i class="fas fa-filter mr-1"></i> Lọc</button>
                    <?php if($_GET['keyword'] != '' || $_GET['start_date'] != '' || $_GET['end_date'] != '') { ?>
                        <a href="index.php?com=contact&act=man" class="btn btn-sm text-danger font-weight-bold ml-3" title="Xóa tất cả bộ lọc"><i class="fas fa-sync-alt mr-1"></i> Làm mới</a>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; background: #fff;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                        <?php if($is_admin) { ?>
                        <th style="width: 50px" class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label class="custom-control-label" for="select-all"></label>
                            </div>
                        </th>
                        <?php } ?>
                        <th style="width: 60px" class="text-center text-uppercase font-weight-800 small text-muted">ID</th>
                        <th class="text-uppercase font-weight-800 small text-muted">Khách hàng</th>
                        <th class="text-uppercase font-weight-800 small text-muted">Nội dung liên hệ</th>
                        <th style="width: 150px" class="text-center text-uppercase font-weight-800 small text-muted">Ngày gửi</th>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Trạng thái</th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                    <tr class="align-middle">
                        <?php if($is_admin) { ?>
                        <td class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input select-item" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                                <label class="custom-control-label" for="select-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <?php } ?>
                        <td class="text-center"><span class="badge badge-light px-2 py-1 text-muted border">#<?=$v['id']?></span></td>
                        <td class="py-3">
                            <div class="font-weight-bold text-dark mb-1"><?=$v['ten']?></div>
                            <div class="text-muted small"><i class="fas fa-phone-alt mr-1"></i> <?=$v['dienthoai']?></div>
                            <div class="text-muted small"><i class="far fa-envelope mr-1"></i> <?=$v['email']?></div>
                        </td>
                        <td>
                            <div class="text-muted text-split-2" style="font-size: 0.9rem; max-width: 400px;"><?=($v['noidung']!='')?$v['noidung']:'(Không có nội dung)'?></div>
                        </td>
                        <td class="text-center text-sm text-muted">
                            <div><?=date('d/m/Y', $v['ngaytao'])?></div>
                            <div class="small font-italic"><?=date('H:i:s', $v['ngaytao'])?></div>
                        </td>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi" id="trangthai-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="contact" data-field="trangthai" <?=($v['trangthai']==1)?'checked':''?> <?=$is_admin?'':'disabled'?>>
                                <label class="custom-control-label small cursor-pointer" for="trangthai-<?=$v['id']?>"><?=($v['trangthai']==1)?'Đã xem':'Chưa xem'?></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <?php if($is_admin) { ?>
                            <a href="index.php?com=contact&act=delete&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item shadow-xs" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                            <?php } else { echo '-'; } ?>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="7" class="text-center py-5 text-muted">Chưa có dữ liệu nào phù hợp.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination Footer -->
    <div class="card-footer bg-white border-0 py-3 px-4">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center small">
                <span class="text-muted mr-3">Hiển thị</span>
                <select class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" style="width: 70px;" onchange="window.location.href='index.php?com=contact&act=man&per_page=' + this.value;">
                    <?php foreach([10, 20, 50, 100] as $p) { ?>
                        <option value="<?=$p?>" <?=($perPage==$p)?'selected':''?>><?=$p?></option>
                    <?php } ?>
                </select>
                <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
            </div>
            <div class="col-md-6 text-right">
                <nav class="d-inline-block">
                    <ul class="pagination pagination-sm m-0">
                        <?php if($paging['current'] > 1) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle mr-1" href="index.php?com=contact&act=man&p=<?=$paging['current']-1?><?=isset($_GET['keyword'])?'&keyword='.$_GET['keyword']:''?><?=isset($_GET['start_date'])?'&start_date='.$_GET['start_date']:''?><?=isset($_GET['end_date'])?'&end_date='.$_GET['end_date']:''?>"><i class="fas fa-chevron-left small"></i></a></li>
                        <?php } ?>
                        
                        <?php for($i=1; $i<=$paging['last']; $i++) { 
                            if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link border-0 rounded-circle mx-1" href="index.php?com=contact&act=man&p=<?=$i?><?=isset($_GET['keyword'])?'&keyword='.$_GET['keyword']:''?><?=isset($_GET['start_date'])?'&start_date='.$_GET['start_date']:''?><?=isset($_GET['end_date'])?'&end_date='.$_GET['end_date']:''?>"><?=$i?></a></li>
                        <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                        
                        <?php if($paging['current'] < $paging['last']) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle ml-1" href="index.php?com=contact&act=man&p=<?=$paging['current']+1?><?=isset($_GET['keyword'])?'&keyword='.$_GET['keyword']:''?><?=isset($_GET['start_date'])?'&start_date='.$_GET['start_date']:''?><?=isset($_GET['end_date'])?'&end_date='.$_GET['end_date']:''?>"><i class="fas fa-chevron-right small"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .font-weight-800 { font-weight: 800; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; }
    .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .flex-center { display: flex; align-items: center; justify-content: center; }
</style>

<script>
    window.addEventListener('load', function() {
        if (typeof $ === 'undefined') { console.error('jQuery is not loaded!'); return; }

        function updateActions() {
            var $checkedItems = $('.select-item:checked');
            var count = $checkedItems.length;
            var $deleteAllButton = $('#delete-all');
            var $selectedCountSpan = $('#selected-count');
            
            $selectedCountSpan.text(count);
            
            if (count > 0) {
                $selectedCountSpan.removeClass('d-none');
                $deleteAllButton.removeClass('btn-outline-danger bg-white disabled').addClass('btn-danger text-white shadow-sm').removeAttr('disabled');
            } else {
                $selectedCountSpan.addClass('d-none');
                $deleteAllButton.addClass('btn-outline-danger bg-white disabled').removeClass('btn-danger text-white shadow-sm').attr('disabled', 'disabled');
            }
        }

        var lastChecked = null;

        // Use Delegation for Select All
        $(document).on('change', '#select-all', function() {
            var isChecked = $(this).prop('checked');
            $('.select-item').prop('checked', isChecked);
            updateActions();
        });

        // Use Delegation for Item Selection (including Shift+Click)
        $(document).on('click', '.select-item', function(e) {
            var $checkboxes = $('.select-item');
            
            if (e.shiftKey && lastChecked) {
                var start = $checkboxes.index(this);
                var end = $checkboxes.index(lastChecked);
                
                $checkboxes.slice(Math.min(start, end), Math.max(start, end) + 1).prop('checked', lastChecked.checked);
            }
            
            lastChecked = this;

            // Update Select All state
            var totalItems = $checkboxes.length;
            var checkedItems = $('.select-item:checked').length;
            $('#select-all').prop('checked', (totalItems > 0 && totalItems === checkedItems));
            
            updateActions();
        });

        // Delete All Action
        $(document).on('click', '#delete-all', function(e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return;
            
            var checkedItems = $('.select-item:checked');
            if (checkedItems.length === 0) return;

            var listid = [];
            checkedItems.each(function() {
                listid.push($(this).val());
            });

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Xóa ' + listid.length + ' mục đã chọn?',
                    text: "Dữ liệu sẽ không thể khôi phục!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Đồng ý xóa!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?com=contact&act=delete_all&listid=' + listid.join(',');
                    }
                });
            } else {
                if (confirm('Xóa ' + listid.length + ' mục đã chọn? Hành động này không thể hoàn tác!')) {
                    window.location.href = 'index.php?com=contact&act=delete_all&listid=' + listid.join(',');
                }
            }
        });
    });
</script>