<style>
    /* --- CSS TÙY CHỈNH CHO MODULE NÀY (PHIÊN BẢN CARD DESIGN) --- */
    
    /* Tổng quan */
    .content-header h1 { font-size: 1.6rem; font-weight: 800; color: #1e293b; letter-spacing: -0.5px; }
    .btn-custom-add { background: #108042; color: #fff; border-radius: 8px; padding: 10px 20px; font-weight: 600; box-shadow: 0 4px 6px rgba(16, 128, 66, 0.2); border: none; transition: all 0.3s; }
    .btn-custom-add:hover { background: #0d6a36; color: #fff; transform: translateY(-2px); box-shadow: 0 6px 12px rgba(16, 128, 66, 0.25); }
    
    /* Thanh lọc (Filter Bar) */
    .filter-box { background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); border: none; margin-bottom: 25px; }
    .filter-input { height: 42px; border-radius: 8px; border: 1px solid #e2e8f0; padding-left: 15px; font-size: 14px; color: #475569; background: #f8fafc; transition: all 0.2s; }
    .filter-input:focus { border-color: #108042; background: #fff; box-shadow: 0 0 0 3px rgba(16, 128, 66, 0.1); }
    .input-group-text-custom { background: #f8fafc; border: 1px solid #e2e8f0; border-right: none; border-radius: 8px 0 0 8px; color: #94a3b8; }
    
    /* Bảng dữ liệu - Card Style */
    .card-table { border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 16px; background: #fff; overflow: hidden; }
    .table-custom thead th { 
        background-color: #f8fafc; 
        border-bottom: 1px solid #e2e8f0; 
        border-top: none; 
        color: #64748b; 
        font-size: 11px; 
        text-transform: uppercase; 
        font-weight: 700; 
        padding: 16px 10px; 
        letter-spacing: 0.5px;
        vertical-align: middle;
    }
    .table-custom td { padding: 16px 10px; vertical-align: middle; border-top: 1px solid #f1f5f9; color: #334155; font-size: 14px; }
    .table-custom tr { transition: background 0.2s; }
    .table-custom tr:hover { background-color: #f8fafc; }
    
    /* Cột Hình ảnh */
    .thumb-img-wrapper { 
        width: 80px; 
        height: 60px;
        overflow: hidden;
        border-radius: 6px;
        border: 1px solid #f1f5f9;
        padding: 2px;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .thumb-img { width: 100%; height: 100%; object-fit: cover; border-radius: 4px; }
    
    /* Input STT */
    .input-stt { width: 50px; text-align: center; border: 1px solid #e2e8f0; border-radius: 6px; padding: 6px; font-weight: 700; color: #64748b; background: #f8fafc; }
    .input-stt:focus { border-color: #108042; background: #fff; outline: none; }

    /* Thông tin chính */
    .item-title { font-size: 15px; font-weight: 700; color: #1e293b; display: block; margin-bottom: 4px; text-decoration: none; transition: color 0.2s; }
    .item-title:hover { color: #108042; text-decoration: none; }
    .item-meta { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; font-size: 12px; color: #94a3b8; }
    .item-meta span { display: inline-flex; align-items: center; }
    .item-meta i { margin-right: 4px; }
    
    /* Buttons */
    .action-btn { width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; transition: all 0.2s; border: 1px solid transparent; }
    .btn-edit { color: #3b82f6; background: #eff6ff; }
    .btn-edit:hover { background: #3b82f6; color: #fff; transform: translateY(-1px); }
    .btn-delete { color: #ef4444; background: #fef2f2; }
    .btn-delete:hover { background: #ef4444; color: #fff; transform: translateY(-1px); }

    /* Phân trang */
    .pagination-wrapper { padding: 20px 25px; border-top: 1px solid #f1f5f9; background: #fff; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
    .custom-pagination .page-link { border: none; border-radius: 50%; margin: 0 4px; color: #64748b; font-weight: 600; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; transition: all 0.2s; }
    .custom-pagination .page-item.active .page-link { background-color: #108042; color: #fff; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.2); }
    .custom-pagination .page-link:hover:not(.active) { background-color: #f1f5f9; color: #108042; }
    .page-info { font-size: 13px; color: #94a3b8; font-weight: 500; }
    
    /* Helper Classes */
    .text-split { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.5; color: #64748b; }
    .badge-custom { padding: 5px 10px; border-radius: 6px; font-weight: 600; font-size: 11px; letter-spacing: 0.3px; }
    
    /* Loading Overlay */
    .table-loading-overlay {
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255, 255, 255, 0.8); z-index: 10;
        display: flex; justify-content: center; align-items: center;
        border-radius: 16px; backdrop-filter: blur(2px);
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
<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h1 class="m-0"><?=$title_main?></h1>
        <p class="text-muted small m-0 mt-1">Quản lý danh sách dữ liệu hệ thống</p>
    </div>
    <div class="col-md-6 text-md-right mt-3 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn-custom-add shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>Thêm mới
        </a>
        <button type="button" id="delete-all" class="btn btn-outline-danger font-weight-bold ml-2 shadow-sm border-0 bg-white" disabled style="border-radius: 8px; height: 44px; padding: 0 20px;">
            <i class="fas fa-trash-alt mr-2"></i>Xóa (<span id="selected-count">0</span>)
        </button>
    </div>
</div>

<!-- Filter Bar -->
<?php if($show_filters) { ?>
<div class="filter-box">
    <div class="row align-items-center">
        <!-- Từ khóa -->
        <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text input-group-text-custom bg-light border-0"><i class="fas fa-search text-muted"></i></span>
                </div>
                <input type="text" id="keyword" class="form-control filter-input border-0 bg-light" placeholder="Nhập từ khóa tìm kiếm..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>">
            </div>
        </div>

        <!-- Khu vực (Nếu có) -->
        <?php if($com == 'du-an') { ?>
        <div class="col-lg-2 col-md-4 mb-2 mb-lg-0">
            <select id="id_khuvuc" class="form-control filter-input" onchange="onSearch()">
                <option value="0">Tất cả Khu vực</option>
                <?php if(!empty($regions)) { foreach($regions as $r) { ?>
                    <option value="<?=$r['id']?>" <?=($_GET['id_khuvuc']==$r['id'])?'selected':''?>><?=$r['ten_vi']?></option>
                <?php } } ?>
            </select>
        </div>
        <?php } ?>

        <!-- Danh mục (Chỉ Tin tức) -->
        <?php if($type == 'tin-tuc') { ?>
        <div class="col-lg-2 col-md-4 mb-2 mb-lg-0">
            <select id="id_cat" class="form-control filter-input" onchange="onSearch()">
                <option value="0">Tất cả Danh mục</option>
                <?php if(!empty($categories)) { foreach($categories as $c) { ?>
                    <option value="<?=$c['id']?>" <?=($_GET['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                <?php } } ?>
            </select>
        </div>
        <?php } ?>

        <!-- Nút Lọc -->
        <div class="col-lg-auto col-md-12 text-right ml-auto">
            <button class="btn btn-dark font-weight-bold px-4 shadow-sm" type="button" onclick="onSearch()" style="border-radius: 8px; height: 42px; background: #1e293b; border: none;">
                <i class="fas fa-filter mr-1"></i> Lọc
            </button>
            <?php if(isset($_GET['keyword']) || isset($_GET['id_khuvuc']) || isset($_GET['id_cat']) || isset($_GET['tungay'])) { ?>
                <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-light ml-2 text-danger font-weight-bold" title="Xóa lọc" style="height: 42px; border-radius: 8px; padding: 0 15px; line-height: 42px; background: #fff;"><i class="fas fa-sync-alt mr-1"></i> Reset</a>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function onSearch() {
        var keyword = document.getElementById('keyword').value;
        var id_khuvuc = document.getElementById('id_khuvuc') ? document.getElementById('id_khuvuc').value : 0;
        var id_cat = document.getElementById('id_cat') ? document.getElementById('id_cat').value : 0;
        var url = "index.php?com=<?=$com?>&act=man&type=<?=$type?>";
        if(keyword != '') url += "&keyword=" + encodeURIComponent(keyword);
        if(id_khuvuc > 0) url += "&id_khuvuc=" + id_khuvuc;
        if(id_cat > 0) url += "&id_cat=" + id_cat;
        window.location.href = url;
    }
    document.getElementById('keyword').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') onSearch();
    });
</script>
<?php } ?>

<!-- Bảng Dữ liệu -->
<div class="card-table position-relative" id="ajax-table-container">
    <div class="table-responsive">
        <table class="table table-custom mb-0">
            <thead>
                <tr>
                    <th style="width: 50px" class="text-center py-3">
                        <div class="custom-control custom-checkbox ml-1">
                            <input type="checkbox" class="custom-control-input cursor-pointer" id="select-all">
                            <label class="custom-control-label cursor-pointer" for="select-all"></label>
                        </div>
                    </th>
                    <th style="width: 70px" class="text-center">STT</th>
                    <?php if($type != 'gioi-thieu' && $com != 'feedback') { ?>
                        <th style="width: 100px" class="text-center">Hình ảnh</th>
                    <?php } ?>
                    <th style="min-width: 250px;">Thông tin chi tiết</th>
                    <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                        <th style="width: 100px" class="text-center">Nổi bật</th>
                    <?php } ?>
                    <th style="width: 130px" class="text-center">Ngày cập nhật</th>
                    <th style="width: 100px" class="text-center">Hiển thị</th>
                    <th style="width: 110px" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody id="sortable-list" data-table="<?=$table_db?>">
                <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                <tr data-id="<?=$v['id']?>" class="cursor-move">
                    <td class="text-center py-3">
                        <div class="custom-control custom-checkbox ml-1">
                            <input type="checkbox" class="custom-control-input select-item cursor-pointer" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                            <label class="custom-control-label cursor-pointer" for="select-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center update-stt mx-auto shadow-none" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px;">
                    </td>
                    
                    <?php if($type != 'gioi-thieu' && $com != 'feedback') { ?>
                    <td class="text-center">
                        <div class="thumb-img-wrapper">
                            <img src="../<?=$v['photo']?>" class="thumb-img" onerror="this.src='https://placehold.co/100x75/f1f5f9/cbd5e1?text=NO+IMG'">
                        </div>
                    </td>
                    <?php } ?>

                    <td class="align-middle">
                        <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="item-title"><?=$v['ten_vi']?></a>
                        
                        <div class="item-meta mt-1">
                            <?php if(($com == 'news' && $type == 'tin-tuc') || $com == 'thuvien') { ?>
                                <span><i class="far fa-calendar-alt"></i> <?=date('d/m/Y', $v['ngaytao'])?></span>
                                <?php if(isset($v['ten_danhmuc']) && $v['ten_danhmuc']) { ?>
                                    <span class="text-primary font-weight-bold"><i class="fas fa-folder-open"></i> <?=$v['ten_danhmuc']?></span>
                                <?php } ?>
                            <?php } ?>

                            <?php if($com == 'du-an') { ?>
                                <span class="badge badge-custom badge-info bg-info text-white"><i class="fas fa-map-marker-alt mr-1"></i> <?=($v['ten_khuvuc']) ? $v['ten_khuvuc'] : 'Chưa chọn khu vực'?></span>
                            <?php } ?>
                            
                            <?php if($com == 'feedback') { ?>
                                <span><i class="fas fa-user-circle"></i> <?=($v['chucvu']) ? $v['chucvu'] : 'Khách hàng'?></span>
                            <?php } ?>
                        </div>

                        <?php if($v['mota_vi'] != '' && $com != 'feedback') { ?>
                        <div class="text-split mt-2 small">
                            <?=strip_tags($v['mota_vi'])?>
                        </div>
                        <?php } ?>
                    </td>
                    
                    <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input checkbox-noibat" id="noibat-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['noibat']==1)?'checked':''?>>
                            <label class="custom-control-label" for="noibat-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <?php } ?>

                    <td class="text-center small text-muted">
                        <?=($v['ngaysua'] > 0) ? date('d/m/Y H:i', $v['ngaysua']) : date('d/m/Y H:i', $v['ngaytao'])?>
                    </td>

                    <td class="text-center">
                        <div class="custom-control custom-switch custom-switch-success">
                            <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                            <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="action-btn btn-edit mr-2" title="Chỉnh sửa"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="action-btn btn-delete btn-delete-item" title="Xóa"><i class="fas fa-trash fa-xs"></i></a>
                        </div>
                    </td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="100%" class="text-center py-5 text-muted">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" style="width: 150px; opacity: 0.5;">
                    <p class="mt-3 font-weight-bold">Chưa có dữ liệu nào</p>
                    <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-sm btn-primary mt-2">Thêm mới ngay</a>
                </td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="pagination-wrapper">
        <div class="page-info mb-2 mb-md-0">
            Hiển thị 
            <select class="form-control-sm border shadow-none mx-1 bg-light font-weight-bold text-primary" style="width: 60px; display:inline-block; border-radius:6px; text-align:center" onchange="loadTableAjax('<?=get_admin_paging_url(1)?>&per_page=' + this.value)">
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

                    // Reset Select All checkbox
                    $('#select-all').prop('checked', false);
                    updateActions();
                } else {
                    window.location.href = url; // Fallback
                }
            },
            error: function() { window.location.href = url; }
        });
    }

    // Bind click event for pagination links (Delegation) - Wrapped in load event
    window.addEventListener('load', function() {
        if (typeof $ === 'undefined') { console.error('jQuery is not loaded!'); return; }

        $(document).on('click', '.custom-pagination .page-link', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            loadTableAjax(url);
        });

        // Helper function for UI updates
        function updateActions() {
            var $checkedItems = $('.select-item:checked');
            var count = $checkedItems.length;
            var $deleteAllButton = $('#delete-all');
            
            $('#selected-count').text(count);
            
            if (count > 0) {
                $deleteAllButton.prop('disabled', false);
                $deleteAllButton.removeClass('btn-outline-danger shadow-sm border-0 bg-white').addClass('btn-danger text-white shadow-sm');
            } else {
                $deleteAllButton.prop('disabled', true);
                $deleteAllButton.addClass('btn-outline-danger shadow-sm border-0 bg-white').removeClass('btn-danger text-white shadow-sm');
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
            var checkedItems = $('.select-item:checked');
            if (checkedItems.length === 0) return;

            var listid = [];
            checkedItems.each(function() {
                listid.push($(this).val());
            });

            var confirmMsg = 'Xóa ' + listid.length + ' mục đã chọn?';
            
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: confirmMsg,
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
                if (confirm(confirmMsg + ' Hành động này không thể hoàn tác!')) {
                    window.location.href = 'index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=' + listid.join(',');
                }
            }
        });

        // Fast update STT and other fields
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
    });
</script>