<div class="row mb-4 align-items-center">
    <div class="col-md-6 col-sm-12">
        <h1 class="m-0 text-dark text-center text-md-left" style="font-size: 1.6rem; font-weight: 800; color: #1e293b !important; letter-spacing: -0.5px;"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 col-sm-12 text-center text-md-right mt-3 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-sm btn-save shadow-sm mr-2 px-3 py-2"><i class="fas fa-plus-circle mr-1"></i> Thêm mới</a>
        <a href="#" id="delete-all" class="btn btn-sm btn-outline-danger shadow-sm px-3 py-2 border-0 bg-white"><i class="fas fa-trash-alt mr-1"></i> Xóa mục chọn <span id="selected-count" class="badge badge-danger ml-1 d-none">0</span></a>
    </div>
</div>

<div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px; background: #fff;">
    <div class="card-body py-3 px-4">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                <div class="search-group d-flex align-items-center bg-light rounded-pill px-3 py-1" style="height: 42px;">
                    <i class="fas fa-search text-muted mr-2"></i>
                    <input type="text" id="keyword" class="form-control border-0 bg-transparent shadow-none" placeholder="Tìm kiếm tên bài viết..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>" style="font-size: 14px;">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 d-flex align-items-center justify-content-md-start">
                <button class="btn btn-sm btn-dark px-4 rounded-pill shadow-sm" type="button" onclick="onSearch()" style="background: #1e293b; height: 42px;"><i class="fas fa-filter mr-1"></i> Lọc</button>
                <?php if(isset($_GET['keyword']) && $_GET['keyword'] != '') { ?>
                    <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-sm text-danger font-weight-bold ml-3" title="Xóa bộ lọc"><i class="fas fa-sync-alt"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function onSearch() {
        var keyword = document.getElementById('keyword').value;
        var url = "index.php?com=<?=$com?>&act=man&type=<?=$type?>";
        if(keyword != '') url += "&keyword=" + encodeURIComponent(keyword);
        window.location.href = url;
    }
    document.getElementById('keyword').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') onSearch();
    });
</script>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; background: #fff;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                        <th style="width: 50px" class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input cursor-pointer" id="select-all">
                                <label class="custom-control-label cursor-pointer" for="select-all"></label>
                            </div>
                        </th>
                        <th style="width: 40px" class="text-center"></th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-bold small text-muted">STT</th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-bold small text-muted">ID</th>
                        <th class="text-uppercase font-weight-bold small text-muted">Tiêu đề bài viết</th>
                        <th style="width: 100px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Nổi bật</th>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Hiển thị</th>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="sortable-list" data-table="<?=$table_db?>">
                    <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                    <tr data-id="<?=$v['id']?>" class="ui-sortable-handle align-middle">
                        <td class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input select-item cursor-pointer" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                                <label class="custom-control-label cursor-pointer" for="select-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center cursor-move text-muted">
                            <i class="fas fa-grip-vertical opacity-25"></i>
                        </td>
                        <td class="text-center">
                            <input type="number" class="form-control form-control-sm text-center update-stt mx-auto border-0 bg-light" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px; border-radius: 8px; font-weight: 600;">
                        </td>
                        <td class="text-center"><span class="badge badge-light px-2 py-1 text-muted border" style="font-weight: 500;">#<?=$v['id']?></span></td>
                        <td class="py-3">
                            <div class="font-weight-bold text-dark mb-1" style="font-size: 0.95rem;"><?=$v['ten_vi']?></div>
                            <div class="text-muted small">
                                <i class="far fa-calendar-alt mr-1"></i> 
                                <?php 
                                    $display_date = ($v['ngaysua'] > 0) ? $v['ngaysua'] : $v['ngaytao'];
                                    echo ($display_date > 0) ? date('d/m/Y H:i', $display_date) : date('d/m/Y H:i'); 
                                ?>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch custom-switch-md">
                                <input type="checkbox" class="custom-control-input checkbox-noibat cursor-pointer" id="noibat-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['noibat']==1)?'checked':''?>>
                                <label class="custom-control-label cursor-pointer" for="noibat-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi cursor-pointer" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label cursor-pointer" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group shadow-xs rounded">
                                <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-primary border-right" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa bài viết"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="10" class="text-center py-5 text-muted">Chưa có dữ liệu nào trong danh sách này.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3 px-4">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center small">
                <span class="text-muted mr-3">Hiển thị</span>
                <select class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" style="width: 70px;" onchange="window.location.href='index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=' + this.value;">
                    <?php foreach([5, 10, 20, 50, 100] as $p) { ?>
                        <option value="<?=$p?>" <?=($perPage==$p)?'selected':''?>><?=$p?></option>
                    <?php } ?>
                </select>
                <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
            </div>
            <div class="col-md-6 text-right">
                <nav class="d-inline-block">
                    <ul class="pagination pagination-sm m-0">
                        <?php if($paging['current'] > 1) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle mr-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']-1?>"><i class="fas fa-chevron-left small"></i></a></li>
                        <?php } ?>
                        <?php for($i=1; $i<=$paging['last']; $i++) { 
                            if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link border-0 rounded-circle mx-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                        <?php if($paging['current'] < $paging['last']) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle ml-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']+1?>"><i class="fas fa-chevron-right small"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-save { background: #108042; color: #fff; border: none; font-weight: 600; border-radius: 8px; transition: all 0.3s ease; }
    .btn-save:hover { background: #0d6a36; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(16, 128, 66, 0.2); color: #fff; text-decoration: none; }
    .card { border-radius: 16px !important; border: none !important; box-shadow: 0 10px 30px rgba(0,0,0,0.04) !important; }
    .table thead th { background: #f8fafc; color: #64748b; font-size: 11px; letter-spacing: 1px; border-top: none; padding: 15px; border-bottom: 1px solid #f1f5f9; }
    .table tbody td { vertical-align: middle !important; padding: 18px 15px; border-top: 1px solid #f1f5f9; }
    .table tbody tr:hover { background-color: #f8fafc !important; }
    .cursor-move { cursor: grab; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; color: #108042; }
    .search-group { border: 1px solid transparent; transition: 0.3s; }
    .search-group:focus-within { background: #fff !important; border-color: #108042; box-shadow: 0 0 0 3px rgba(16, 128, 66, 0.1); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Vanilla JS for Select All Logic to avoid jQuery loading order issues
        const selectAllCheckbox = document.getElementById('select-all');
        const deleteAllButton = document.getElementById('delete-all');
        const selectedCountSpan = document.getElementById('selected-count');

        function updateActions() {
            const checkedItems = document.querySelectorAll('.select-item:checked');
            const count = checkedItems.length;
            selectedCountSpan.textContent = count;
            
            if (count > 0) {
                selectedCountSpan.classList.remove('d-none');
                deleteAllButton.classList.remove('btn-outline-danger', 'bg-white', 'border-0');
                deleteAllButton.classList.add('btn-danger', 'text-white', 'shadow-sm');
            } else {
                selectedCountSpan.classList.add('d-none');
                deleteAllButton.classList.add('btn-outline-danger', 'bg-white', 'border-0');
                deleteAllButton.classList.remove('btn-danger', 'text-white', 'shadow-sm');
            }
        }

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                const checkboxes = document.querySelectorAll('.select-item');
                checkboxes.forEach(cb => {
                    cb.checked = isChecked;
                });
                updateActions();
            });
        }

        // Event delegation for .select-item
        document.querySelector('tbody').addEventListener('change', function(e) {
            if (e.target.classList.contains('select-item')) {
                const totalItems = document.querySelectorAll('.select-item').length;
                const checkedItems = document.querySelectorAll('.select-item:checked').length;
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = (totalItems > 0 && totalItems === checkedItems);
                }
                updateActions();
            }
        });

        if (deleteAllButton) {
            deleteAllButton.addEventListener('click', function(e) {
                e.preventDefault();
                const checkedItems = document.querySelectorAll('.select-item:checked');
                if (checkedItems.length === 0) {
                    // Fallback alert if SweetAlert not loaded
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({ icon: 'info', title: 'Thông báo', text: 'Bạn chưa chọn bài viết nào để xóa!', confirmButtonColor: '#108042' });
                    } else {
                        alert('Bạn chưa chọn bài viết nào để xóa!');
                    }
                    return;
                }

                let listid = [];
                checkedItems.forEach(cb => listid.push(cb.value));

                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Xóa ' + checkedItems.length + ' mục đã chọn?',
                        text: "Dữ liệu sau khi xóa sẽ không thể khôi phục!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#108042',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý, xóa ngay!',
                        cancelButtonText: 'Hủy bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=" + listid.join(',');
                        }
                    });
                } else {
                    if (confirm('Xóa ' + checkedItems.length + ' mục đã chọn? Hành động này không thể hoàn tác!')) {
                        window.location.href = "index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=" + listid.join(',');
                    }
                }
            });
        }
    });

    // jQuery dependent code (loaded later) for AJAX
    window.addEventListener('load', function() {
        if (typeof $ !== 'undefined') {
            // Cập nhật STT nhanh
            $(document).on('change', '.update-stt', function() {
                var id = $(this).data('id');
                var table = $(this).data('table');
                var value = $(this).val();
                $.ajax({
                    url: 'ajax/ajax_update.php',
                    type: 'POST',
                    data: {id: id, table: table, value: value, field: 'stt'},
                    success: function(res) {
                        if(res == 1) toastr.success('Đã cập nhật số thứ tự');
                        else toastr.error('Lỗi cập nhật');
                    }
                });
            });

            // Cập nhật Hiển thị/Nổi bật nhanh
            $(document).on('change', '.checkbox-hienthi, .checkbox-noibat', function() {
                var id = $(this).data('id');
                var table = $(this).data('table');
                var field = $(this).hasClass('checkbox-hienthi') ? 'hienthi' : 'noibat';
                var value = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: 'ajax/ajax_update.php',
                    type: 'POST',
                    data: {id: id, table: table, value: value, field: field},
                    success: function(res) {
                        if(res == 1) toastr.success('Đã cập nhật trạng thái');
                        else toastr.error('Lỗi cập nhật');
                    }
                });
            });
        }
    });
</script>