<?php
session_start();
if(!isset($_SESSION['admin_logined']) || $_SESSION['admin_logined'] !== true) die("Access Denied");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trình quản lý tệp tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root { --primary: #108042; }
        body { background: #f3f4f6; padding: 15px; font-family: 'Inter', sans-serif; }
        .browser-container { background: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); min-height: 550px; padding: 20px; }
        .folder-item, .file-item { 
            border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px; margin-bottom: 15px; 
            transition: all 0.2s; cursor: pointer; position: relative; text-align: center; background: #fff;
        }
        .folder-item:hover, .file-item:hover { border-color: var(--primary); background: #f8fafc; transform: translateY(-2px); }
        .file-item img { width: 100%; height: 100px; object-fit: cover; border-radius: 6px; margin-bottom: 8px; border: 1px solid #f1f5f9; }
        .file-name { font-size: 11px; font-weight: 600; display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #475569; }
        
        .item-actions { position: absolute; top: 5px; right: 5px; opacity: 0; transition: 0.2s; z-index: 10; }
        .folder-item:hover .item-actions, .file-item:hover .item-actions { opacity: 1; }
        
        .breadcrumb { border-radius: 8px; background: #f8fafc; padding: 0.75rem 1rem; }
        .breadcrumb-item { cursor: pointer; color: var(--primary); font-weight: 600; }
        .upload-zone { border: 2px dashed #e2e8f0; border-radius: 10px; padding: 15px; text-align: center; margin-bottom: 20px; background: #fafafa; }
        .btn-primary { background-color: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background-color: #0d6b35; border-color: #0d6b35; }
    </style>
</head>
<body>

<div class="browser-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 font-weight-bold text-dark"><i class="fas fa-folder-open mr-2 text-success"></i>Quản lý tệp tin máy chủ</h5>
        <div id="loader" class="spinner-border spinner-border-sm text-success" style="display:none;"></div>
    </div>

    <!-- Toolbar -->
    <div class="upload-zone d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <input type="file" id="upload-input" style="display:none;" accept="image/*" multiple>
            <button class="btn btn-primary btn-sm px-3 mr-2" onclick="$('#upload-input').click()"><i class="fas fa-upload mr-1"></i> Tải lên</button>
            <button class="btn btn-outline-dark btn-sm px-3" onclick="createNewFolder()"><i class="fas fa-folder-plus mr-1"></i> Thư mục mới</button>
        </div>
        <span class="text-muted text-sm" id="upload-status">Sẵn sàng</span>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" id="path-breadcrumb">
            <!-- Breadcrumb via JS -->
        </ol>
    </nav>

    <div class="row" id="browser-content">
        <!-- Content loaded via JS -->
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var currentDir = '<?=(isset($_GET['dir'])) ? $_GET['dir'] : ''?>';
    var targetField = '<?=$_GET['field']?>';

    function loadFolder(dir) {
        $('#loader').show();
        currentDir = dir;
        $.ajax({
            url: 'ajax/ajax_browser.php',
            type: 'GET',
            data: { act: 'list', dir: dir },
            dataType: 'json',
            success: function(data) {
                var html = '';
                // Render Folders
                if(data.folders) {
                    data.folders.forEach(function(f) {
                        html += `<div class="col-md-2 col-4">
                            <div class="folder-item">
                                <div onclick="loadFolder('${f.path}')">
                                    <i class="fas fa-folder fa-3x text-warning mb-2"></i>
                                    <span class="file-name">${f.name}</span>
                                </div>
                                <div class="item-actions">
                                    <button class="btn btn-xs btn-light text-primary border shadow-sm mr-1" onclick="renameItem('${f.name}')" title="Đổi tên"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-xs btn-light text-danger border shadow-sm" onclick="deleteItem('${f.name}')" title="Xóa"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>`;
                    });
                }

                // Render Files
                if(data.files) {
                    data.files.forEach(function(f) {
                        html += `<div class="col-md-2 col-4 text-center">
                            <div class="file-item">
                                <div onclick="selectFile('${f.path}')">
                                    <div class="d-flex align-items-center justify-content-center" style="height: 100px;">
                                        <img src="${f.url}" onerror="this.src='https://placehold.co/100x100?text=File'" alt="" class="img-fluid rounded shadow-sm border">
                                    </div>
                                    <span class="file-name">${f.name}</span>
                                </div>
                                <div class="item-actions">
                                    <button class="btn btn-xs btn-light text-primary border shadow-sm mr-1" onclick="renameItem('${f.name}')" title="Đổi tên"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-xs btn-light text-danger border shadow-sm" onclick="deleteItem('${f.name}')" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>`;
                    });
                }

                $('#browser-content').html(html || '<div class="col-12 text-center text-muted py-5">Thư mục trống</div>');
                updateBreadcrumb(dir);
            },
            error: function(xhr) {
                alert("Lỗi kết nối máy chủ! Nội dung: " + xhr.responseText);
                console.log(xhr.responseText);
            },
            complete: function() {
                $('#loader').hide();
            }
        });
    }

    function createNewFolder() {
        var name = prompt("Nhập tên thư mục mới (không dấu, không khoảng cách):");
        if(name) {
            $.post('ajax/ajax_browser.php?act=mkdir&dir=' + currentDir, { name: name }, function(res) {
                if(res == 1) loadFolder(currentDir);
                else alert("Lỗi khi tạo thư mục!");
            });
        }
    }

    function renameItem(oldName) {
        var newName = prompt("Nhập tên mới:", oldName);
        if(newName && newName != oldName) {
            $.post('ajax/ajax_browser.php?act=rename&dir=' + currentDir, { old_name: oldName, new_name: newName }, function(res) {
                if(res == 1) loadFolder(currentDir);
                else alert("Lỗi khi đổi tên!");
            });
        }
    }

    function deleteItem(name) {
        if(confirm('Xóa mục "' + name + '"?')) {
            $.post('ajax/ajax_browser.php?act=delete&dir=' + currentDir, { file: name }, function(res) {
                if(res == 1) loadFolder(currentDir);
                else alert('Không thể xóa! (Có thể thư mục không rỗng)');
            });
        }
    }

    function updateBreadcrumb(dir) {
        var parts = dir.split('/').filter(Boolean);
        var html = '<li class="breadcrumb-item" onclick="loadFolder(\'\')">Upload</li>';
        var currentPath = '';
        parts.forEach(function(p) {
            currentPath += (currentPath ? '/' : '') + p;
            html += `<li class="breadcrumb-item" onclick="loadFolder('${currentPath}')">${p}</li>`;
        });
        $('#path-breadcrumb').html(html);
    }

    function selectFile(path) {
        if (window.opener && !window.opener.closed) {
            window.opener.updateImagePath(targetField, 'upload/' + path);
            window.close();
        }
    }

    $('#upload-input').change(function() {
        var files = this.files;
        if(files.length === 0) return;

        $('#upload-status').text('Đang tải lên (' + files.length + ' file)...').addClass('text-primary');
        var count = 0;
        var errorCount = 0;

        for(var i=0; i<files.length; i++) {
            var formData = new FormData();
            formData.append('file', files[i]);
            $.ajax({
                url: 'ajax/ajax_browser.php?act=upload&dir=' + currentDir,
                type: 'POST',
                data: formData,
                processData: false, 
                contentType: false,
                success: function(res) {
                    if(res == 1) count++; else errorCount++;
                },
                error: function() { errorCount++; },
                complete: function() {
                    if((count + errorCount) === files.length) {
                        if(errorCount == 0) {
                            $('#upload-status').text('Tải lên xong!').removeClass('text-primary').addClass('text-success');
                        } else {
                            $('#upload-status').text('Tải lên xong (Lỗi ' + errorCount + ' file)').removeClass('text-primary').addClass('text-danger');
                        }
                        loadFolder(currentDir);
                        setTimeout(() => $('#upload-status').text('Sẵn sàng').removeClass('text-success text-danger'), 3000);
                    }
                }
            });
        }
    });

    $(document).ready(function() { loadFolder(currentDir); });
</script>
</body>
</html>