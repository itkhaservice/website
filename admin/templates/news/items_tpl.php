<style>
    /* --- CSS TÙY CHỈNH CHO MODULE NÀY --- */
    
    /* Tổng quan */
    .content-header h1 { font-size: 1.5rem; font-weight: 700; color: #343a40; }
    .btn-custom-add { background: #28a745; color: #fff; border-radius: 6px; padding: 8px 16px; font-weight: 600; box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2); border: none; }
    .btn-custom-add:hover { background: #218838; color: #fff; transform: translateY(-1px); }
    
    /* Thanh lọc (Filter Bar) */
    .filter-box { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e9ecef; }
    .filter-input { height: 40px; border-radius: 6px; border: 1px solid #dee2e6; padding-left: 15px; font-size: 14px; color: #495057; }
    .filter-input:focus { border-color: #80bdff; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.1); }
    .input-group-text-custom { background: #f8f9fa; border: 1px solid #dee2e6; border-right: none; border-radius: 6px 0 0 6px; color: #6c757d; }
    
    /* Bảng dữ liệu */
    .card-table { border: none; box-shadow: 0 0 15px rgba(0,0,0,0.05); border-radius: 8px; background: #fff; overflow: hidden; }
    .table-custom th { background-color: #f8f9fa; border-bottom: 2px solid #e9ecef !important; border-top: none; color: #6c757d; font-size: 12px; text-transform: uppercase; font-weight: 700; padding: 15px 10px; vertical-align: middle; }
    .table-custom td { padding: 12px 10px; vertical-align: middle; border-top: 1px solid #f1f5f9; color: #343a40; font-size: 14px; }
    .table-custom tr:hover { background-color: #fcfcfc; }
    
    /* Hình ảnh thumbnail */
    .thumb-img-wrapper { 
        width: <?=(in_array($com, ['themanh', 'giatri', 'staff'])) ? '50px' : '70px'?>; 
        height: <?=(in_array($com, ['themanh', 'giatri'])) ? '50px' : ($com=='du-an' ? '90px' : ($com=='staff' ? '65px' : '50px'))?>;
        overflow: hidden;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        padding: 2px;
        background: #fff;
        display: inline-block;
    }
    .thumb-img { width: 100%; height: 100%; object-fit: cover; border-radius: 2px; }
    
    /* Input STT */
    .input-stt { width: 50px; text-align: center; border: 1px solid #e9ecef; border-radius: 4px; padding: 4px; font-weight: 600; color: #495057; }
    .input-stt:focus { border-color: #28a745; outline: none; }

    /* Các nút hành động */
    .action-btn { width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; transition: all 0.2s; border: 1px solid transparent; }
    .btn-edit { color: #007bff; background: rgba(0, 123, 255, 0.1); }
    .btn-edit:hover { background: #007bff; color: #fff; }
    .btn-delete { color: #dc3545; background: rgba(220, 53, 69, 0.1); }
    .btn-delete:hover { background: #dc3545; color: #fff; }

    /* Phân trang */
    .pagination-wrapper { padding: 15px 20px; border-top: 1px solid #f1f5f9; background: #fff; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
    .custom-pagination .page-link { border: none; border-radius: 6px; margin: 0 3px; color: #6c757d; font-weight: 600; min-width: 36px; text-align: center; height: 36px; line-height: 22px; }
    .custom-pagination .page-item.active .page-link { background-color: #28a745; color: #fff; box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3); }
    .custom-pagination .page-link:hover:not(.active) { background-color: #e9ecef; color: #28a745; }
    .page-info { font-size: 14px; color: #6c757d; }
    
    /* Loading Overlay */
    .table-loading-overlay {
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255, 255, 255, 0.7); z-index: 10;
        display: flex; justify-content: center; align-items: center;
        border-radius: 8px; backdrop-filter: blur(1px);
    }
</style>

<?php
    // Helper function để tạo URL phân trang giữ nguyên bộ lọc
    function get_admin_paging_url($page, $per_page_val = null) {
        global $com, $type, $perPage;
        $params = $_GET;
        $params['com'] = $com;
        $params['act'] = 'man';
        $params['type'] = $type;
        $params['p'] = $page;
        $params['per_page'] = ($per_page_val) ? $per_page_val : $perPage;
        
        // Loại bỏ các tham số không cần thiết nếu có
        unset($params['id']);
        unset($params['listid']);
        
        return 'index.php?' . http_build_query($params);
    }
    
    $show_filters = in_array($com, ['du-an', 'news', 'staff', 'thuvien', 'dichvu', 'themanh', 'giatri', 'feedback', 'appdancu']);
?>

<!-- Header -->
<div class="row mb-3 align-items-center">
    <div class="col-md-6">
        <h1 class="m-0"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 text-md-right mt-2 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn-custom-add">
            <i class="fas fa-plus mr-1"></i> Thêm mới
        </a>
        <button type="button" id="delete-all" class="btn btn-outline-danger font-weight-bold ml-2" disabled style="border-radius: 6px; height: 40px; padding: 0 16px;">
            <i class="fas fa-trash-alt mr-1"></i> Xóa (<span id="selected-count">0</span>)
        </button>
    </div>
</div>

<!-- Filter Bar -->
<?php if($show_filters) { ?>
<div class="filter-box mb-4">
    <div class="row">
        <!-- Từ khóa -->
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text-custom bg-white"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" id="keyword" class="form-control filter-input" style="border-left:none" placeholder="Tìm kiếm..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>">
            </div>
        </div>

        <!-- Khu vực (Nếu có) -->
        <?php if($com == 'du-an') { ?>
        <div class="col-lg-2 col-md-4 mb-2">
            <select id="id_khuvuc" class="form-control filter-input" onchange="onSearch()">
                <option value="0">Khu vực</option>
                <?php if(!empty($regions)) { foreach($regions as $r) { ?>
                    <option value="<?=$r['id']?>" <?=($_GET['id_khuvuc']==$r['id'])?'selected':''?>><?=$r['ten_vi']?></option>
                <?php } } ?>
            </select>
        </div>
        <?php } ?>

        <!-- Danh mục (Chỉ Tin tức) -->
        <?php if($type == 'tin-tuc') { ?>
        <div class="col-lg-2 col-md-4 mb-2">
            <select id="id_cat" class="form-control filter-input" onchange="onSearch()">
                <option value="0">Danh mục</option>
                <?php if(!empty($categories)) { foreach($categories as $c) { ?>
                    <option value="<?=$c['id']?>" <?=($_GET['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                <?php } } ?>
            </select>
        </div>
        <?php } ?>

        <!-- Thời gian -->
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="d-flex align-items-center">
                <input type="date" id="tungay" class="form-control filter-input mr-1" value="<?=isset($_GET['tungay'])?$_GET['tungay']:''?>">
                <span class="text-muted mx-1">-</span>
                <input type="date" id="denngay" class="form-control filter-input ml-1" value="<?=isset($_GET['denngay'])?$_GET['denngay']:''?>">
            </div>
        </div>

        <!-- Nút Lọc -->
        <div class="col-lg-auto col-md-12 mb-2 text-right ml-auto">
            <button class="btn btn-primary font-weight-bold px-4" type="button" onclick="onSearch()" style="border-radius: 6px; height: 40px; background: #343a40; border-color: #343a40;">
                <i class="fas fa-filter mr-1"></i> Lọc
            </button>
            <?php if(isset($_GET['keyword']) || isset($_GET['id_khuvuc']) || isset($_GET['id_cat']) || isset($_GET['tungay'])) { ?>
                <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-light border ml-1 text-danger" title="Xóa lọc" style="height: 40px; border-radius: 6px; width: 40px; padding: 0; line-height: 38px; text-align: center;"><i class="fas fa-times"></i></a>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function onSearch() {
        var keyword = document.getElementById('keyword').value;
        var id_khuvuc = document.getElementById('id_khuvuc') ? document.getElementById('id_khuvuc').value : 0;
        var id_cat = document.getElementById('id_cat') ? document.getElementById('id_cat').value : 0;
        var tungay = document.getElementById('tungay').value;
        var denngay = document.getElementById('denngay').value;
        var url = "index.php?com=<?=$com?>&act=man&type=<?=$type?>";
        if(keyword != '') url += "&keyword=" + encodeURIComponent(keyword);
        if(id_khuvuc > 0) url += "&id_khuvuc=" + id_khuvuc;
        if(id_cat > 0) url += "&id_cat=" + id_cat;
        if(tungay != '') url += "&tungay=" + tungay;
        if(denngay != '') url += "&denngay=" + denngay;
        window.location.href = url;
    }
</script>
<?php } ?>

<!-- Bảng Dữ liệu -->
<div class="card-table position-relative" id="ajax-table-container">
    <div class="table-responsive">
        <table class="table table-custom mb-0">
            <thead>
                <tr>
                    <th style="width: 40px" class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all"></label>
                        </div>
                    </th>
                    <th style="width: 30px"></th> <!-- Drag -->
                    <th style="width: 70px" class="text-center align-middle text-uppercase text-muted small font-weight-bold">STT</th>
                    <?php if($type != 'gioi-thieu') { ?>
                        <th style="width: 90px" class="text-center align-middle text-uppercase text-muted small font-weight-bold">Hình</th>
                    <?php } ?>
                    <?php if($com == 'du-an') { ?>
                        <th style="width: 150px" class="align-middle text-uppercase text-muted small font-weight-bold">Khu vực</th>
                        <th style="width: 250px" class="align-middle text-uppercase text-muted small font-weight-bold">Mô tả ngắn</th>
                    <?php } ?>
                    <th>THÔNG TIN</th>
                    <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                        <th style="width: 100px" class="text-center">NỔI BẬT</th>
                    <?php } ?>
                    <th style="width: 100px" class="text-center">HIỂN THỊ</th>
                    <th style="width: 110px" class="text-center">THAO TÁC</th>
                </tr>
            </thead>
            <tbody id="sortable-list" data-table="<?=$table_db?>">
                <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                <tr data-id="<?=$v['id']?>">
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input select-item" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                            <label class="custom-control-label" for="select-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center cursor-move text-black-50" title="Kéo thả để sắp xếp">
                        <i class="fas fa-bars fa-sm"></i>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center update-stt mx-auto font-weight-bold border-0 bg-light" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px;">
                    </td>
                    <?php if($type != 'gioi-thieu') { ?>
                    <td class="text-center">
                        <div class="thumb-img-wrapper">
                            <img src="../<?=$v['photo']?>" class="thumb-img" onerror="this.src='https://placehold.co/100x100?text=IMG'">
                        </div>
                    </td>
                    <?php } ?>
                    <?php if($com == 'du-an') { ?>
                    <td class="align-middle">
                        <span class="badge badge-info px-2 py-1 shadow-sm" style="font-size: 0.85rem; background-color: #17a2b8; color: white;">
                            <?=($v['ten_khuvuc']) ? $v['ten_khuvuc'] : 'Chưa chọn'?>
                        </span>
                    </td>
                    <td class="align-middle">
                        <div class="text-muted text-split-2" style="font-size: 0.85rem; max-width: 250px;">
                            <?=($v['mota_vi'] != '') ? strip_tags($v['mota_vi']) : '<em>(Chưa có mô tả)</em>'?>
                        </div>
                    </td>
                    <?php } ?>
                    <td>
                        <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="text-dark font-weight-bold text-decoration-none" style="font-size: 15px; display:block; margin-bottom: 4px;"><?=$v['ten_vi']?></a>
                        <div class="text-muted small">
                            <?php if(($com == 'news' && $type == 'tin-tuc') || $com == 'thuvien') { ?>
                                <span class="mr-3"><i class="far fa-clock"></i> Cập nhật: <?=($v['ngaysua'] > 0) ? date('d/m/Y H:i', $v['ngaysua']) : date('d/m/Y H:i', $v['ngaytao'])?></span>
                                <span><i class="far fa-calendar-plus"></i> Đăng: <?=date('d/m/Y', $v['ngaytao'])?></span>
                                <?php if(isset($v['ten_danhmuc']) && $v['ten_danhmuc']) { ?>
                                    <span class="text-primary ml-2"><i class="fas fa-folder-open"></i> <?=$v['ten_danhmuc']?></span>
                                <?php } ?>
                            <?php } else { ?>
                                <i class="far fa-clock"></i> <?=date('d/m/Y H:i', ($v['ngaysua']>0?$v['ngaysua']:$v['ngaytao']))?>
                            <?php } ?>
                        </div>
                    </td>
                    
                    <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input checkbox-noibat" id="noibat-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['noibat']==1)?'checked':''?>>
                            <label class="custom-control-label" for="noibat-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <?php } ?>

                    <td class="text-center">
                        <div class="custom-control custom-switch custom-switch-success">
                            <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                            <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="action-btn btn-edit mr-1" title="Sửa"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="action-btn btn-delete btn-delete-item" title="Xóa"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="100%" class="text-center py-5 text-muted">Không có dữ liệu nào.</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="pagination-wrapper">
        <div class="page-info mb-2 mb-md-0">
            Hiển thị 
            <select class="form-control-sm border shadow-none mx-1" style="width: 55px; display:inline-block; border-radius:4px" onchange="loadTableAjax('<?=get_admin_paging_url(1)?>&per_page=' + this.value)">
                <?php foreach([5, 10, 20, 50, 100] as $p) { ?>
                    <option value="<?=$p?>" <?=($perPage==$p)?'selected':''?>><?=$p?></option>
                <?php } ?>
            </select>
            / <strong><?=$paging['total']?></strong> kết quả
        </div>
        
        <?php if($paging['last'] > 1) { ?>
        <nav>
            <ul class="pagination custom-pagination m-0">
                <li class="page-item <?=($paging['current']<=1)?'disabled':''?>">
                    <a class="page-link" href="<?=get_admin_paging_url($paging['current']-1)?>">
                        <i class="fas fa-chevron-left fa-xs"></i>
                    </a>
                </li>
                <?php for($i=1; $i<=$paging['last']; $i++) { 
                    if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                    <li class="page-item <?=($i==$paging['current'])?'active':''?>">
                        <a class="page-link" href="<?=get_admin_paging_url($i)?>"><?=$i?></a>
                    </li>
                <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link">...</span></li>'; } } ?>
                <li class="page-item <?=($paging['current']>=$paging['last'])?'disabled':''?>">
                    <a class="page-link" href="<?=get_admin_paging_url($paging['current']+1)?>">
                        <i class="fas fa-chevron-right fa-xs"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <?php } ?>
    </div>
</div>

<script>
    // AJAX Pagination Script
    function loadTableAjax(url) {
        if(!url) return;
        
        // 1. Show Loading
        var $container = $('#ajax-table-container');
        var $overlay = $('<div class="table-loading-overlay"><div class="spinner-border text-primary" role="status"></div></div>');
        $container.append($overlay);

        // 2. Fetch Data
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                // 3. Parse and Replace
                var $html = $(data);
                var $newContent = $html.find('#ajax-table-container').html();
                
                if($newContent) {
                    $container.html($newContent);
                    
                    // 4. Update URL
                    window.history.pushState(null, '', url);
                    
                    // 5. Scroll slightly up if needed
                    $('html, body').animate({
                        scrollTop: $container.offset().top - 100
                    }, 400);
                } else {
                    window.location.href = url; // Fallback
                }
            },
            error: function() { window.location.href = url; }
        });
    }

    // Bind click event for pagination links (Delegation)
    $(document).on('click', '.custom-pagination .page-link', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadTableAjax(url);
    });

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
                deleteAllButton.disabled = false;
                deleteAllButton.classList.remove('btn-outline-danger');
                deleteAllButton.classList.add('btn-danger', 'text-white', 'shadow-sm');
            } else {
                deleteAllButton.disabled = true;
                deleteAllButton.classList.add('btn-outline-danger');
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
        document.querySelector('.card-table').addEventListener('change', function(e) {
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
                if (checkedItems.length === 0) return;

                let listid = [];
                checkedItems.forEach(cb => listid.push(cb.value));

                // Check for SweetAlert2 availability (loaded in layout)
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Xóa ' + checkedItems.length + ' mục đã chọn?',
                        text: "Dữ liệu sẽ không thể khôi phục!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Đồng ý xóa!',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=' + listid.join(',');
                        }
                    });
                } else {
                    if (confirm('Xóa ' + checkedItems.length + ' mục đã chọn? Hành động này không thể hoàn tác!')) {
                        window.location.href = 'index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=' + listid.join(',');
                    }
                }
            });
        }
    });

    // jQuery dependent code (loaded later)
    window.addEventListener('load', function() {
        if (typeof $ !== 'undefined') {
            // AJAX Cập nhật STT nhanh
            $(document).on('change', '.update-stt', function() {
                var id = $(this).data('id');
                var table = $(this).data('table');
                var value = $(this).val();
                $.ajax({
                    url: 'ajax/ajax_update.php',
                    type: 'POST',
                    data: {id: id, table: table, value: value, field: 'stt'},
                    success: function(res) {
                        if(res == 1) toastr.success('Đã cập nhật STT');
                        else toastr.error('Lỗi cập nhật');
                    }
                });
            });
        }
    });
</script>