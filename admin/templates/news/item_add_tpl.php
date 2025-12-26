<?php
    // Cấu hình các trường hiển thị theo module
    $config_fields = [
        'staff' => ['ten', 'chucvu', 'photo', 'stt', 'hienthi'],
        'themanh' => ['ten', 'mota', 'photo', 'stt', 'hienthi'],
        'giatri' => ['ten', 'mota', 'photo', 'stt', 'hienthi'],
        'feedback' => ['ten', 'chucvu', 'mota', 'noidung', 'photo', 'rating', 'stt', 'hienthi'],
        'dichvu' => ['ten', 'slug', 'mota', 'noidung', 'photo', 'noibat', 'stt', 'hienthi', 'seo'],
        'news' => ['ten', 'slug', 'id_cat', 'mota', 'noidung', 'photo', 'noibat', 'stt', 'hienthi', 'seo'],
        'du-an' => ['ten', 'slug', 'id_khuvuc', 'mota', 'noidung', 'photo', 'noibat', 'rating', 'stt', 'hienthi', 'seo'],
    ];

    $fields = isset($config_fields[$com]) ? $config_fields[$com] : $config_fields['news'];
    $has_tabs = in_array('noidung', $fields) || in_array('seo', $fields);
?>

<!-- Header -->
<form method="post" action="index.php?com=<?=$com?>&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.25rem; font-weight: 700; color: #1e293b !important;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-sm btn-primary shadow-sm mr-2 px-3" style="font-weight: 600;"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-sm btn-light border shadow-sm px-3 text-secondary" style="font-weight: 600;"><i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$item['id']?>">
    
    <div class="row">
        <div class="col-md-9">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                <?php if($has_tabs) { ?>
                <div class="card-header p-0 border-bottom">
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold px-4 py-3 border-0" id="info-tab" data-toggle="tab" href="#info" role="tab">Thông tin chung</a>
                        </li>
                        <?php if(in_array('noidung', $fields)) { ?>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="content-tab" data-toggle="tab" href="#content" role="tab">Nội dung chi tiết</a>
                        </li>
                        <?php } ?>
                        <?php if(in_array('seo', $fields)) { ?>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="seo-tab" data-toggle="tab" href="#seo" role="tab">SEO</a>
                        </li>
                        <?php } ?>
                        <?php if($com == 'thuvien') { ?>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="album-tab" data-toggle="tab" href="#album" role="tab">Album hình ảnh</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>

                <div class="card-body">
                    <div class="tab-content">
                        <!-- Tab Album (Multi Upload) -->
                        <?php if($com == 'thuvien') { ?>
                        <div class="tab-pane fade" id="album" role="tabpanel">
                            <div class="form-group mb-4">
                                <label class="font-weight-600">Chọn nhiều hình ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="files[]" id="gallery-files" multiple accept="image/*">
                                    <label class="custom-file-label" for="gallery-files">Chọn các tệp ảnh từ máy tính...</label>
                                </div>
                                <small class="text-muted mt-2 d-block font-italic">Nhấn giữ phím <b>Ctrl</b> để chọn nhiều tệp cùng lúc.</small>
                            </div>
                            
                            <div id="gallery-preview" class="row">
                                <?php if(!empty($gallery)) { foreach($gallery as $g) { ?>
                                    <div class="col-md-3 col-sm-4 col-6 mb-4 gallery-item text-center">
                                        <div class="bg-light p-2 rounded border shadow-xs position-relative">
                                            <img src="../<?=$g['photo']?>" class="img-fluid rounded mb-2" style="height: 120px; object-fit: cover;">
                                            <input type="number" name="stt_existing[<?=$g['id']?>]" class="form-control form-control-sm text-center mb-2 mx-auto" value="<?=$g['stt']?>" style="width: 60px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="del-gal-<?=$g['id']?>" name="delete_gallery[]" value="<?=$g['id']?>">
                                                <label class="custom-control-label text-danger small cursor-pointer" for="del-gal-<?=$g['id']?>">Xóa ảnh này</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Tab Thông tin chung -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row">
                                <?php if(in_array('id_khuvuc', $fields)) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-600 small">Khu vực</label>
                                        <select name="id_khuvuc" class="form-control form-control-sm">
                                            <option value="0">-- Chọn khu vực --</option>
                                            <?php if(!empty($regions)) { foreach($regions as $r){ ?>
                                                <option value="<?=$r['id']?>" <?=($item['id_khuvuc']==$r['id'])?'selected':''?>><?=$r['ten_vi']?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if(in_array('id_cat', $fields)) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-600 small">Danh mục</label>
                                        <select name="id_cat" class="form-control form-control-sm">
                                            <option value="0">-- Chọn danh mục --</option>
                                            <?php if(!empty($categories)) { foreach($categories as $c){ ?>
                                                <option value="<?=$c['id']?>" <?=($item['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if(in_array('rating', $fields)) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-600 small">Đánh giá sao</label>
                                        <select name="rating" class="form-control form-control-sm">
                                            <?php for($i=1; $i<=5; $i++) { ?>
                                                <option value="<?=$i?>" <?=($item['rating']==$i)?'selected':''?>><?=$i?> Sao</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-600 small">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" name="ten_vi" id="ten_vi" class="form-control form-control-sm" value="<?=$item['ten_vi']?>" required>
                            </div>

                            <?php if(in_array('slug', $fields)) { ?>
                            <div class="form-group">
                                <label class="font-weight-600 small">Đường dẫn (Slug)</label>
                                <input type="text" name="ten_khong_dau" id="ten_khong_dau" class="form-control form-control-sm" value="<?=$item['ten_khong_dau']?>">
                            </div>
                            <?php } ?>

                            <?php if(in_array('chucvu', $fields)) { ?>
                            <div class="form-group">
                                <label class="font-weight-600 small">Chức vụ / Vị trí</label>
                                <input type="text" name="chucvu" class="form-control form-control-sm" value="<?=$item['chucvu']?>">
                            </div>
                            <?php } ?>

                            <?php if(in_array('mota', $fields)) { ?>
                            <div class="form-group mb-0">
                                <label class="font-weight-600 small">Mô tả ngắn</label>
                                <textarea name="mota_vi" id="mota_vi" class="form-control" rows="5"><?=$item['mota_vi']?></textarea>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Tab Nội dung -->
                        <?php if(in_array('noidung', $fields)) { ?>
                        <div class="tab-pane fade" id="content" role="tabpanel">
                            <div class="form-group mb-0">
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control" rows="15"><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Tab SEO -->
                        <?php if(in_array('seo', $fields)) { ?>
                        <div class="tab-pane fade" id="seo" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-600 small">SEO Title</label>
                                <input type="text" name="title" class="form-control form-control-sm shadow-none border" value="<?=$item['title']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-600 small">SEO Keywords</label>
                                <textarea name="keywords" class="form-control shadow-none border" rows="3"><?=$item['keywords']?></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label class="font-weight-600 small">SEO Description</label>
                                <textarea name="description" class="form-control shadow-none border" rows="3"><?=$item['description']?></textarea>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <?php if(in_array('photo', $fields)) { 
                // Xác định kích thước khuyến nghị
                $size_info = "800x600px";
                if($com == 'du-an') $size_info = "600x800px";
                if($com == 'staff') $size_info = "400x500px";
                if(in_array($com, ['themanh', 'giatri'])) $size_info = "100x100px hoặc 800x600px";
            ?>
            <div class="card mb-4 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center py-3 text-xs uppercase">
                    <span>Hình ảnh</span>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary px-2 py-1">DUYỆT</button>
                </div>
                <div class="card-body text-center bg-light-50">
                    <?php $img_src = ($item['photo'] != '' && file_exists('../'.$item['photo'])) ? '../'.$item['photo'] : 'https://placehold.co/300x300?text=No+Image'; ?>
                    <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded mb-3 shadow-xs border" style="max-height: 150px; cursor: pointer;" onclick="openBrowser('photo')">
                    <div class="custom-file text-left text-xs">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Tải ảnh mới...</label>
                    </div>
                    <small class="text-danger mt-2 d-block">Kích thước khuyến nghị: <b><?=$size_info?></b> (.jpg, .png, .webp)</small>
                    <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">
                </div>
            </div>
            <?php } ?>

            <div class="card mb-4 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white font-weight-bold py-3 text-xs uppercase">Thiết lập</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-600 small">Số thứ tự</label>
                        <input type="number" name="stt" class="form-control form-control-sm" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 80px;">
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label class="custom-control-label small cursor-pointer" for="hienthi">Hiển thị</label>
                    </div>
                    <?php if(in_array('noibat', $fields)) { ?>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="noibat" name="noibat" <?=($item['noibat']==1)?'checked':''?>>
                        <label class="custom-control-label small cursor-pointer" for="noibat">Nổi bật</label>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; }
    .nav-tabs .nav-link { color: #64748b; font-size: 13px; }
    .nav-tabs .nav-link.active { color: #108042 !important; border-bottom: 2px solid #108042 !important; background: transparent !important; font-weight: bold; }
    .font-weight-600 { font-weight: 600; color: #475569; }
</style>

<!-- Sử dụng bản FULL để đảm bảo có đầy đủ Plugin -->
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

<script>
    var dir = '<?=isset($folder_upload)?$folder_upload:$table_db?>';

    function initCK(id, h) {
        if(!document.getElementById(id)) return;
        
        // Xóa instance cũ nếu tồn tại để tránh lỗi
        if (CKEDITOR.instances[id]) {
            CKEDITOR.instances[id].destroy(true);
        }

        var editor = CKEDITOR.replace(id, {
            height: h,
            language: 'vi',
            allowedContent: true,
            versionCheck: false,
            filebrowserBrowseUrl: 'browser.php?dir=' + dir,
            filebrowserImageBrowseUrl: 'browser.php?dir=' + dir,
            filebrowserUploadUrl: 'ck_upload.php?dir=' + dir,
            filebrowserImageUploadUrl: 'ck_upload.php?dir=' + dir,
            // Thêm các Plugin quan trọng cho Styles và Định dạng
            extraPlugins: 'image,filebrowser,justify,colorbutton,font,panelbutton,floatpanel,button,colordialog',
            stylesSet: [
                { name: 'Ảnh rộng 100%', element: 'img', attributes: { 'class': 'img-100' } },
                { name: 'Ảnh rộng 75%', element: 'img', attributes: { 'class': 'img-75' } },
                { name: 'Ảnh rộng 50%', element: 'img', attributes: { 'class': 'img-50' } }
            ]
        });

        // Tính năng Alt + Lăn chuột
        editor.on('instanceReady', function() {
            var editable = editor.editable();
            editable.attachListener(editable, 'wheel', function(evt) {
                var target = evt.data.getTarget();
                if (target.is('img') && (evt.data.$.altKey || evt.data.$.ctrlKey)) {
                    evt.data.preventDefault();
                    var currentWidth = parseInt(target.$.style.width) || target.$.width || 100;
                    if(currentWidth > 100) currentWidth = 100;
                    var step = evt.data.$.deltaY > 0 ? -5 : 5;
                    var newWidth = currentWidth + step;
                    if (newWidth >= 10 && newWidth <= 100) {
                        target.setStyle('width', newWidth + '%');
                        target.setStyle('height', 'auto');
                        target.removeAttribute('width');
                        target.removeAttribute('height');
                    }
                }
            });
        });
    }

    // Cơ chế khởi tạo cưỡng bức (Force Init)
    function forceInitEditors() {
        if (typeof CKEDITOR === 'undefined') {
            setTimeout(forceInitEditors, 200);
            return;
        }
        initCK('noidung_vi', 450);
        if('<?=in_array($com, ["news", "du-an", "dichvu"])?>') {
            initCK('mota_vi', 150);
        }
    }

    // Chạy ngay khi file được nạp xong
    forceInitEditors();

    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=' + dir, 'Browser', 'width=1000,height=600');
    }

    function updateImagePath(field, path) {
        var input = document.getElementById('input-' + field);
        var preview = document.getElementById('preview-' + field);
        if(input) input.value = path;
        if(preview) preview.src = '../' + path;
    }

    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('custom-file-input')) {
            var fileName = e.target.value.split("\\").pop();
            if(e.target.nextElementSibling) e.target.nextElementSibling.innerHTML = fileName;
        }

        // Preview cho Multi Upload Gallery
        if(e.target && e.target.id === 'gallery-files') {
            var preview = document.getElementById('gallery-preview');
            var files = e.target.files;
            
            for(var i=0; i<files.length; i++) {
                (function(file, index) {
                    var reader = new FileReader();
                    reader.onload = function(re) {
                        var html = '<div class="col-md-3 col-sm-4 col-6 mb-4 text-center">' +
                                   '<div class="bg-light p-2 rounded border shadow-xs border-success">' +
                                   '<img src="' + re.target.result + '" class="img-fluid rounded mb-2" style="height: 120px; object-fit: cover;">' +
                                   '<input type="number" name="stt_gallery[]" class="form-control form-control-sm text-center mb-2 mx-auto" value="1" style="width: 60px;">' +
                                   '<span class="badge badge-success px-2 py-1">Mới</span>' +
                                   '</div></div>';
                        preview.insertAdjacentHTML('beforeend', html);
                    }
                    reader.readAsDataURL(file);
                })(files[i], i);
            }
        }
    });
</script>