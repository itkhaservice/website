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
                    <input type="text" id="keyword" class="form-control border-0 bg-transparent shadow-none" placeholder="Tìm kiếm tên danh mục..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>" style="font-size: 14px;">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 d-flex align-items-center justify-content-md-start">
                <button class="btn btn-sm btn-dark px-4 rounded-pill shadow-sm" type="button" onclick="onSearch()" style="background: #1e293b; height: 42px;"><i class="fas fa-filter mr-1"></i> Lọc dữ liệu</button>
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
                        <th class="text-uppercase font-weight-bold small text-muted">Tên danh mục</th>
                        <th class="text-uppercase font-weight-bold small text-muted">Đường dẫn (Slug)</th>
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
                        <td>
                            <div class="font-weight-bold text-dark" style="font-size: 1rem;"><?=$v['ten_vi']?></div>
                        </td>
                        <td>
                            <?php if($v['ten_khong_dau'] != '') { ?>
                                <span class="text-muted small font-italic"><?=$v['ten_khong_dau']?></span>
                            <?php } else { ?>
                                <span class="badge badge-danger">Chưa có link</span>
                            <?php } ?>
                        </td>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi cursor-pointer" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label cursor-pointer" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group shadow-xs rounded">
                                <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-primary border-right" title="Sửa danh mục"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa mục này"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="6" class="text-center py-5 text-muted">Chưa có dữ liệu nào trong danh sách này.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-save { background: #108042; color: #fff; border: none; font-weight: 600; border-radius: 8px; transition: all 0.3s ease; }
    .btn-save:hover { background: #0d6a36; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(16, 128, 66, 0.2); color: #fff; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; color: #108042; }
    .cursor-move { cursor: grab; }
    .cursor-move:active { cursor: grabbing; }
    .ui-state-highlight { height: 60px; background: #f0fdf4; border: 1px dashed #108042; visibility: visible !important; }
    .search-group { transition: all 0.3s ease; border: 1px solid transparent; }
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
                        Swal.fire({ icon: 'info', title: 'Thông báo', text: 'Bạn chưa chọn mục nào để xóa!', confirmButtonColor: '#108042' });
                    } else {
                        alert('Bạn chưa chọn mục nào để xóa!');
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

            // Cập nhật Hiển thị nhanh
            $(document).on('change', '.checkbox-hienthi', function() {
                var id = $(this).data('id');
                var table = $(this).data('table');
                var value = $(this).is(':checked') ? 1 : 0;
                $.ajax({
                    url: 'ajax/ajax_update.php',
                    type: 'POST',
                    data: {id: id, table: table, value: value, field: 'hienthi'},
                    success: function(res) {
                        if(res == 1) toastr.success('Đã cập nhật trạng thái');
                        else toastr.error('Lỗi cập nhật');
                    }
                });
            });
        }
    });
</script>