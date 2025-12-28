<?php
session_start();
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true) die("Access Denied");
$dir = isset($_GET['dir']) ? $_GET['dir'] : '';
$field = isset($_GET['field']) ? $_GET['field'] : '';
$ckFuncNum = isset($_GET['CKEditorFuncNum']) ? $_GET['CKEditorFuncNum'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trình quản lý tệp tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { --primary: #108042; --bg: #f8fafc; }
        body { background: var(--bg); padding: 20px; font-family: 'Plus Jakarta Sans', sans-serif; color: #1e293b; overflow-x: hidden; }
        .browser-container { background: #fff; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); min-height: calc(100vh - 40px); padding: 25px; border: 1px solid #e2e8f0; position: relative; }
        .browser-toolbar { background: #fff; border-bottom: 1px solid #f1f5f9; padding-bottom: 20px; margin-bottom: 20px; }
        
        .view-grid .item-wrapper { display: flex; flex-wrap: wrap; margin: 0 -10px; }
        .view-grid .browser-item { width: 12.5%; padding: 10px; position: relative; }
        .view-grid .item-card { border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px; transition: 0.2s; cursor: pointer; background: #fff; height: 100%; display: flex; flex-direction: column; align-items: center; text-align: center; position: relative; }
        .view-grid .item-card:hover { border-color: var(--primary); transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .view-grid .item-card.selected { border-color: var(--primary); background-color: #f0fff4; box-shadow: 0 0 0 2px var(--primary); }
        .view-grid .item-thumb { width: 100%; height: 90px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; border-radius: 8px; overflow: hidden; background: #f8fafc; }
        .view-grid .item-thumb img { width: 100%; height: 100%; object-fit: cover; }
        .view-grid .item-name { font-size: 12px; font-weight: 700; width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 2px; }
        .view-grid .item-info-detail { display: none; font-size: 10px; color: #64748b; line-height: 1.2; }
        .view-grid .item-card:hover .item-info-detail { display: block; }
        
        /* Checkbox & Actions */
        .view-grid .item-checkbox { position: absolute; top: 10px; left: 10px; z-index: 10; transform: scale(1.1); cursor: pointer; display: none; }
        .view-grid .item-card:hover .item-checkbox, .view-grid .item-checkbox:checked, .view-grid .item-card.selected .item-checkbox { display: block; }
        
        .view-grid .item-actions { position: absolute; top: 5px; right: 5px; opacity: 0; transition: 0.2s; z-index: 5; display: flex; }
        .view-grid .item-card:hover .item-actions { opacity: 1; }

        /* Force checkbox visible in gallery mode */
        .mode-gallery .view-grid .item-checkbox { display: block !important; }
        .mode-gallery .item-actions { display: none !important; } /* Hide single actions in gallery mode */

        .view-list .item-wrapper { display: block; }
        .view-list .item-card { display: flex; align-items: center; padding: 10px 15px; border-radius: 10px; border: 1px solid transparent; cursor: pointer; transition: 0.2s; margin-bottom: 5px; position: relative; }
        .view-list .item-card:hover { background: #f1f5f9; border-color: #e2e8f0; }
        .view-list .item-thumb { width: 40px; height: 40px; margin-right: 15px; display: flex; align-items: center; justify-content: center; }
        .view-list .item-thumb img { width: 40px; height: 40px; object-fit: cover; border-radius: 6px; } 
        .view-list .item-name { font-size: 14px; font-weight: 600; flex: 1; }
        .view-list .item-meta { font-size: 13px; color: #64748b; width: 150px; text-align: left; }       
        .view-list .item-checkbox { margin-right: 15px; transform: scale(1.2); }
        .view-list .item-actions { width: 150px; text-align: right; display: flex; justify-content: flex-end; }

        .btn-action-mini { width: 24px; height: 24px; padding: 0; font-size: 10px; display: flex; align-items: center; justify-content: center; border-radius: 4px; background: #fff; border: 1px solid #e2e8f0; margin-left: 2px; }
        .btn-action-mini:hover { background: #f8fafc; color: var(--primary); border-color: var(--primary); }

        .breadcrumb { border-radius: 10px; background: #f8fafc; border: 1px solid #f1f5f9; }
        .breadcrumb-item { cursor: pointer; color: var(--primary); font-weight: 600; font-size: 13px; }  
        .breadcrumb-item + .breadcrumb-item::before { content: "\f105"; font-family: "Font Awesome 5 Free"; font-weight: 900; padding: 0 10px; color: #cbd5e1; }

        .sticky-bottom-bar { position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%); background: #1e293b; color: #fff; padding: 12px 25px; border-radius: 50px; display: none; z-index: 1000; box-shadow: 0 10px 25px rgba(0,0,0,0.2); align-items: center; }
        .clipboard-status { background: #3b82f6; color: #fff; padding: 5px 15px; border-radius: 20px; font-size: 12px; margin-right: 15px; display: none; align-items: center; }

        @media (max-width: 1400px) { .view-grid .browser-item { width: 16.66%; } }
        @media (max-width: 1100px) { .view-grid .browser-item { width: 20%; } }
        @media (max-width: 768px) { .view-grid .browser-item { width: 33.33%; } .view-list .item-meta { display: none; } }
    </style>
</head>
<body class="<?=($field=='gallery')?'mode-gallery':''?>">

<div class="browser-container">
    <div class="browser-toolbar">
        <div class="row align-items-center">
            <div class="col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
                <h5 class="mb-0 font-weight-bold mr-3">
                    <?php if($field=='gallery') { ?>
                        <i class="fas fa-check-double mr-2 text-success"></i>Chọn ảnh cho Gallery
                    <?php } else { ?>
                        <i class="fas fa-images mr-2 text-success"></i>Media Browser
                    <?php } ?>
                </h5>
                <div id="loader" class="spinner-border spinner-border-sm text-success" style="display:none;"></div>
            </div>
            <div class="col-lg-8 text-right d-flex justify-content-end align-items-center flex-wrap">
                <div id="clipboard-info" class="clipboard-status">
                    <i class="fas fa-paste mr-2"></i> <span id="clipboard-text"></span>
                    <button class="btn btn-success btn-sm ml-3 py-0 px-3 rounded-pill" onclick="pasteFromClipboard()">DÁN VÀO ĐÂY</button>
                    <button class="btn btn-link btn-sm text-white ml-1 p-0" onclick="clearClipboard()"><i class="fas fa-times-circle"></i></button>
                </div>

                <div class="custom-control custom-checkbox mr-4 d-flex align-items-center">
                    <input type="checkbox" class="custom-control-input" id="select-all-main">
                    <label class="custom-control-label font-weight-bold text-sm" for="select-all-main">Chọn tất cả</label>
                </div>
                
                <div class="btn-group mr-3 shadow-sm">
                    <button class="btn btn-light btn-sm" onclick="sortItems('name')" title="Sắp xếp A-Z"><i class="fas fa-sort-alpha-down"></i></button>
                    <button class="btn btn-light btn-sm" onclick="sortItems('date')" title="Mới nhất"><i class="fas fa-calendar-alt"></i></button>
                </div>
                <div class="view-toggle btn-group mr-3 shadow-sm">
                    <button class="btn btn-light btn-sm" onclick="switchView('grid')" id="btn-grid"><i class="fas fa-th-large"></i></button>
                    <button class="btn btn-light btn-sm active" onclick="switchView('list')" id="btn-list"><i class="fas fa-list"></i></button>
                </div>

                <div class="d-flex shadow-sm rounded overflow-hidden">
                    <input type="file" id="upload-input" style="display:none;" accept="image/*" multiple>
                    <button class="btn btn-primary btn-sm px-3 border-0" id="btn-upload"><i class="fas fa-cloud-upload-alt mr-1"></i> Tải lên</button>
                    <button class="btn btn-dark btn-sm px-3 border-0" onclick="createNewFolder()"><i class="fas fa-folder-plus mr-1"></i> Thư mục</button>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4" id="path-breadcrumb"></ol>
    </nav>

    <div id="browser-content-parent" class="view-list">
        <div class="item-wrapper" id="browser-content"></div>
    </div>
</div>

<!-- Thanh tác vụ dưới cùng -->
<div class="sticky-bottom-bar" id="bulk-actions-bar">
    <span class="mr-4"><i class="fas fa-check-circle mr-2 text-success"></i>Đã chọn <strong id="selected-count">0</strong> mục</span>
    
    <?php if($field == 'gallery') { ?>
        <button class="btn btn-success btn-sm rounded-pill px-4 font-weight-bold" onclick="sendSelectedToGallery()">
            <i class="fas fa-plus-circle mr-1"></i> THÊM VÀO ALBUM
        </button>
    <?php } else { ?>
        <div class="btn-group">
            <button class="btn btn-outline-light btn-sm rounded-pill px-3 mr-2" id="btn-bulk-copy" onclick="addToClipboard('copy')"><i class="fas fa-copy mr-1"></i>Copy</button>
            <button class="btn btn-outline-light btn-sm rounded-pill px-3 mr-2" id="btn-bulk-move" onclick="addToClipboard('move')"><i class="fas fa-cut mr-1"></i>Di chuyển</button>
            <button class="btn btn-outline-light btn-sm rounded-pill px-3 mr-2 text-success" id="btn-bulk-restore" onclick="bulkRestore()" style="display:none;"><i class="fas fa-trash-restore mr-1"></i>Khôi phục</button>
            <button class="btn btn-danger btn-sm rounded-pill px-3" id="btn-bulk-delete" onclick="bulkDelete()"><i class="fas fa-trash-alt mr-1"></i>Xóa</button>
        </div>
    <?php } ?>
    
    <button class="btn btn-link btn-sm text-white ml-2" onclick="deselectAll()">Hủy</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var currentDir = '<?=$dir?>';
    var targetField = '<?=$field?>';
    var ckFuncNum = '<?=$ckFuncNum?>';
    var currentView = localStorage.getItem('browser_view') || 'list';
    var rawData = { folders: [], files: [], is_trash: false };
    var sortField = 'name';
    var sortOrder = 1;
    var clipboard = JSON.parse(localStorage.getItem('browser_clipboard')) || { action: null, files: [], sourceDir: '' };

    function switchView(view) {
        currentView = view;
        localStorage.setItem('browser_view', view);
        $('.view-toggle .btn').removeClass('active');
        $('#btn-' + view).addClass('active');
        $('#browser-content-parent').removeClass('view-grid view-list').addClass('view-' + view);
        renderContent();
    }

    function sortItems(field) {
        if(sortField === field) sortOrder *= -1;
        else { sortField = field; sortOrder = 1; }
        renderContent();
    }

    function loadFolder(dir) {
        $('#loader').show();
        currentDir = dir;
        $.ajax({
            url: 'ajax/media_manager.php',
            type: 'GET',
            data: { act: 'list', dir: dir },
            dataType: 'json',
            success: function(data) {
                rawData = data;
                renderContent();
                updateBreadcrumb(dir);
                updateClipboardUI();
                updateToolbarUI();
                updateSelectionUI();
            },
            complete: function() { $('#loader').hide(); }
        });
    }

    function updateToolbarUI() {
        if (rawData.is_trash) {
            $('#btn-upload').hide();
            $('button[onclick="createNewFolder()"]') .hide();
            // Tùy chỉnh thêm tiêu đề nếu cần
        } else {
            $('#btn-upload').show();
            $('button[onclick="createNewFolder()"]') .show();
        }
    }

    function renderContent() {
        var folders = [...rawData.folders];
        var files = [...rawData.files];
        var isTrash = rawData.is_trash;

        var compare = (a, b) => {
            var valA = a[sortField];
            var valB = b[sortField];
            if(sortField === 'date') { valA = a.timestamp; valB = b.timestamp; }
            if(valA < valB) return -1 * sortOrder;
            if(valA > valB) return 1 * sortOrder;
            return 0;
        };
        folders.sort(compare);
        files.sort(compare);

        var html = '';
        if(currentView === 'list') {
            html += `<div class="item-card bg-light border-0 mb-2 cursor-default" style="pointer-events:none;">
                <div style="width: 70px;"></div>
                <div class="item-name text-muted small uppercase font-weight-bold">Tên tệp tin / Thư mục</div>
                <div class="item-meta text-muted small uppercase font-weight-bold">Kích thước</div>      
                <div class="item-meta text-muted small uppercase font-weight-bold">Ngày cập nhật</div>   
                <div class="item-actions text-muted small uppercase font-weight-bold">Thao tác</div>     
            </div>`;
        }

        folders.forEach(function(f) { html += getItemHtml(f, true, isTrash); });
        files.forEach(function(f) { html += getItemHtml(f, false, isTrash); });

        $('#browser-content').html(html || '<div class="col-12 text-center text-muted py-5"><img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" style="width:64px; opacity:0.2; margin-bottom:15px;"><p>Thư mục trống</p></div>');
        updateSelectionUI();
    }

    function getItemHtml(item, isFolder, isTrash) {
        var isTrashFolderItem = (item.name === 'trash' && !isTrash && isFolder);
        var checkbox = isTrashFolderItem ? '' : `<input type="checkbox" class="item-checkbox" data-name="${item.name}" data-path="${item.path}" onclick="event.stopPropagation(); updateSelectionUI();">`;
        
        var onClick = '';
        if(isFolder) {
            onClick = `loadFolder('${item.path}')`;
        } else {
            if(targetField === 'gallery') onClick = `toggleItemSelection(this)`;
            else onClick = isTrash ? '' : `selectFile('${item.path}')`;
        }

        var actions = '';
        if (isTrash) {
            actions = `
                <div class="item-actions">
                    <button class="btn-action-mini text-success" onclick="event.stopPropagation(); restoreItem('${item.name}')" title="Khôi phục"><i class="fas fa-trash-restore"></i></button>
                    <button class="btn-action-mini text-danger" onclick="event.stopPropagation(); deleteItem('${item.name}', ${isFolder}, true)" title="Xóa vĩnh viễn"><i class="fas fa-times"></i></button>
                </div>
            `;
        } else if (!isTrashFolderItem) {
            actions = `
                <div class="item-actions">
                    <button class="btn-action-mini text-primary" onclick="event.stopPropagation(); singleClipboard('${item.name}', 'copy')" title="Copy"><i class="fas fa-copy"></i></button>
                    <button class="btn-action-mini text-info" onclick="event.stopPropagation(); singleClipboard('${item.name}', 'move')" title="Di chuyển"><i class="fas fa-cut"></i></button>
                    <button class="btn-action-mini text-warning" onclick="event.stopPropagation(); renameItem('${item.name}')" title="Đổi tên"><i class="fas fa-edit"></i></button>
                    <button class="btn-action-mini text-danger" onclick="event.stopPropagation(); deleteItem('${item.name}', ${isFolder}, false)" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                </div>
            `;
        }

        var icon = isFolder ? '<i class="fas fa-folder fa-3x text-warning"></i>' : `<img src="${item.url}?v=${Date.now()}" onerror="this.src='https://placehold.co/150x150?text=File'">`;
        if (isTrashFolderItem) icon = '<i class="fas fa-trash-alt fa-3x text-danger"></i>';

        var metaInfo = isTrash && item.original_path ? `<div class="item-info-detail text-muted" style="font-size:9px;">Từ: ${item.original_path}</div>` : '';

        if(currentView === 'grid') {
            return `<div class="browser-item">
                ${checkbox}
                <div class="item-card shadow-xs" onclick="${onClick}">
                    <div class="item-thumb">${icon}</div>
                    <span class="item-name" title="${item.name}">${item.name}</span>
                    <div class="item-info-detail">${item.size || ''}</div>
                    <div class="item-info-detail">${item.date || ''}</div>
                    ${metaInfo}
                    ${actions}
                </div>
            </div>`;
        } else {
            return `<div class="browser-item">
                <div class="item-card shadow-xs" onclick="${onClick}">
                    ${checkbox}
                    <div class="item-thumb" style="${isTrashFolderItem?'color:#dc3545':''}">${isFolder ? (isTrashFolderItem ? '<i class="fas fa-trash-alt fa-2x"></i>' : '<i class="fas fa-folder fa-2x text-warning"></i>') : `<img src="${item.url}?v=${Date.now()}" onerror="this.src='https://placehold.co/150x150?text=File'">`}</div>
                    <div class="item-name">
                        ${item.name}
                        ${isTrash && item.original_path ? `<div class="text-muted small" style="font-size:10px;">Gốc: ${item.original_path}</div>` : ''}
                    </div>
                    <div class="item-meta">${item.size || ''}</div>
                    <div class="item-meta">${item.date || ''}</div>
                    ${actions}
                </div>
            </div>`;
        }
    }

    function toggleItemSelection(card) {
        var checkbox = $(card).parent().find('.item-checkbox');
        checkbox.prop('checked', !checkbox.prop('checked'));
        if(checkbox.prop('checked')) $(card).addClass('selected');
        else $(card).removeClass('selected');
        updateSelectionUI();
    }

    function updateSelectionUI() {
        var count = $('.item-checkbox:checked').length;
        $('#selected-count').text(count);
        
        $('.browser-item').each(function() {
            if($(this).find('.item-checkbox').is(':checked')) $(this).find('.item-card').addClass('selected');
            else $(this).find('.item-card').removeClass('selected');
        });

        if(count > 0) {
            $('#bulk-actions-bar').css('display', 'flex');
            if (rawData.is_trash) {
                $('#btn-bulk-copy').hide();
                $('#btn-bulk-move').hide();
                $('#btn-bulk-restore').show();
                $('#btn-bulk-delete').html('<i class="fas fa-times mr-1"></i>Xóa vĩnh viễn');
            } else {
                $('#btn-bulk-copy').show();
                $('#btn-bulk-move').show();
                $('#btn-bulk-restore').hide();
                $('#btn-bulk-delete').html('<i class="fas fa-trash-alt mr-1"></i>Xóa');
            }
        } else {
            $('#bulk-actions-bar').hide();
        }
        
        $('#select-all-main').prop('checked', count > 0 && count === $('.item-checkbox').length);
    }

    function deselectAll() { $('.item-checkbox').prop('checked', false); updateSelectionUI(); }
    $('#select-all-main').change(function() { $('.item-checkbox').prop('checked', this.checked); updateSelectionUI(); });

    function updateBreadcrumb(dir) {
        var parts = dir.split('/').filter(Boolean);
        var html = '<li class="breadcrumb-item" onclick="loadFolder(\'\')"><i class="fas fa-home mr-1"></i>upload</li>';
        var currentPath = '';
        parts.forEach(function(p) {
            currentPath += (currentPath ? '/' : '') + p;
            var label = p;
            if (p === 'trash') label = 'Thùng rác';
            html += `<li class="breadcrumb-item" onclick="loadFolder('${currentPath}')">${label}</li>`;  
        });
        $('#path-breadcrumb').html(html);
    }

    function selectFile(path) {
        if (window.opener && !window.opener.closed) {
            var urlForReturn = 'upload/' + path;
            if(ckFuncNum != '') { window.opener.CKEDITOR.tools.callFunction(ckFuncNum, '../' + urlForReturn); window.close(); }
            else if (typeof window.opener.updateImagePath === 'function') { window.opener.updateImagePath(targetField, urlForReturn); window.close(); }
        }
    }

    // --- GALLERY MULTI SELECT ---
    function sendSelectedToGallery() {
        if (window.opener && !window.opener.closed && typeof window.opener.updateImagePath === 'function') {
            $('.item-checkbox:checked').each(function() {
                var path = 'upload/' + $(this).data('path');
                window.opener.updateImagePath('gallery', path);
            });
            window.close();
        } else {
            alert('Không tìm thấy cửa sổ cha!');
        }
    }

    // --- CLIPBOARD & ACTIONS ---
    function addToClipboard(action) {
        var files = [];
        $('.item-checkbox:checked').each(function() { files.push($(this).data('name')); });
        if(files.length === 0) return;
        clipboard = { action: action, files: files, sourceDir: currentDir };
        localStorage.setItem('browser_clipboard', JSON.stringify(clipboard));
        deselectAll();
        updateClipboardUI();
        Swal.fire({ icon: 'info', title: 'Đã ghi nhớ ' + files.length + ' mục', timer: 1500, showConfirmButton: false });
    }

    function singleClipboard(name, action) {
        clipboard = { action: action, files: [name], sourceDir: currentDir };
        localStorage.setItem('browser_clipboard', JSON.stringify(clipboard));
        updateClipboardUI();
        Swal.fire({ icon: 'info', title: 'Đã ghi nhớ 1 mục', timer: 1000, showConfirmButton: false });
    }

    function updateClipboardUI() {
        if(clipboard.action && clipboard.files.length > 0) {
            $('#clipboard-text').text('Đang giữ ' + clipboard.files.length + ' mục (' + (clipboard.action == 'copy' ? 'Copy' : 'Di chuyển') + ')');
            $('#clipboard-info').css('display', 'flex');
        } else {
            $('#clipboard-info').hide();
        }
    }

    function clearClipboard() {
        clipboard = { action: null, files: [], sourceDir: '' };
        localStorage.removeItem('browser_clipboard');
        updateClipboardUI();
    }

    function pasteFromClipboard() {
        if(!clipboard.action) return;
        if(currentDir === clipboard.sourceDir && clipboard.action === 'move') {
            Swal.fire({ icon: 'warning', title: 'Thư mục đích trùng với nguồn!' });
            return;
        }
        Swal.fire({ title: 'Đang xử lý...', didOpen: () => { Swal.showLoading() } });
        var act = (clipboard.action === 'copy' ? 'copy_multiple' : 'move_multiple');
        $.post('ajax/media_manager.php?act=' + act + '&dir=' + clipboard.sourceDir, { 
            files: clipboard.files, dest_dir: currentDir 
        }, function(res) {
            Swal.close();
            if(res.status == 1) {
                loadFolder(currentDir);
                if(clipboard.action === 'move') clearClipboard();
                Swal.fire({ icon: 'success', title: 'Hoàn tất!' });
            } else {
                Swal.fire({ icon: 'error', title: 'Lỗi', text: res.msg });
            }
        }, 'json');
    }

    function createNewFolder() {
        Swal.fire({ title: 'Tạo thư mục', input: 'text', showCancelButton: true, confirmButtonText: 'Tạo', confirmButtonColor: '#108042' }).then((result) => {
            if (result.value) {
                $.post('ajax/media_manager.php?act=mkdir&dir=' + currentDir, { name: result.value }, function(res) {
                    if(res.status == 1) loadFolder(currentDir);
                    else Swal.fire({ icon: 'error', text: res.msg });
                }, 'json');
            }
        });
    }

    function renameItem(oldName) {
        Swal.fire({ title: 'Đổi tên', input: 'text', inputValue: oldName, showCancelButton: true, confirmButtonText: 'Lưu', confirmButtonColor: '#108042' }).then((result) => {
            if (result.value && result.value !== oldName) {
                $.post('ajax/media_manager.php?act=rename&dir=' + currentDir, { old_name: oldName, new_name: result.value }, function(res) {
                    if(res.status == 1) loadFolder(currentDir);
                    else Swal.fire({ icon: 'error', text: res.msg });
                }, 'json');
            }
        });
    }

    function deleteItem(name, isFolder, isPermanent) {
        Swal.fire({ title: 'Xác nhận xóa?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', confirmButtonText: 'Xóa' }).then((result) => {
            if (result.isConfirmed) {
                $.post('ajax/media_manager.php?act=delete&dir=' + currentDir, { file: name }, function(res) {
                    if(res.status == 1) loadFolder(currentDir);
                    else Swal.fire({ icon: 'error', text: res.msg });
                }, 'json');
            }
        });
    }

    function restoreItem(name) {
        $.post('ajax/media_manager.php?act=restore&dir=' + currentDir, { file: name }, function(res) {
            if(res.status == 1) loadFolder(currentDir);
        }, 'json');
    }

    function bulkDelete() {
        var files = []; $('.item-checkbox:checked').each(function() { files.push($(this).data('name')); });
        if(files.length === 0) return;
        Swal.fire({ title: 'Xóa ' + files.length + ' mục?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', confirmButtonText: 'Xóa' }).then((result) => {
            if (result.isConfirmed) {
                $.post('ajax/media_manager.php?act=delete_multiple&dir=' + currentDir, { files: files }, function(res) {
                    loadFolder(currentDir);
                }, 'json');
            }
        });
    }
    
    function bulkRestore() {
        var files = []; $('.item-checkbox:checked').each(function() { files.push($(this).data('name')); });
        if(files.length === 0) return;
        $.post('ajax/media_manager.php?act=restore_multiple&dir=' + currentDir, { files: files }, function(res) {
            loadFolder(currentDir);
        }, 'json');
    }

    // --- UPLOAD ---
    $('#btn-upload').click(function() { $('#upload-input').trigger('click'); });
    $('#upload-input').change(function() {
        var files = this.files; if(files.length === 0) return;
        Swal.fire({ title: 'Đang tải lên...', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });
        var total = files.length; 
        function uploadOneByOne(index) {
            if(index >= total) { loadFolder(currentDir); Swal.close(); return; }
            var formData = new FormData(); formData.append('file', files[index]);
            $.ajax({ url: 'ajax/media_manager.php?act=upload&dir=' + currentDir, type: 'POST', data: formData, processData: false, contentType: false, dataType: 'json',
                complete: function() { uploadOneByOne(index + 1); }
            });
        }
        uploadOneByOne(0);
    });

    $(document).ready(function() { loadFolder(currentDir); });
</script>
</body>
</html>