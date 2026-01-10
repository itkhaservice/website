<?php
    // Cấu hình các trường hiển thị theo module
    $config_fields = [
        'staff' => ['ten', 'chucvu', 'photo', 'stt', 'hienthi'],
        'themanh' => ['ten', 'mota', 'photo', 'stt', 'hienthi'],
        'giatri' => ['ten', 'mota', 'photo', 'stt', 'hienthi'],
        'feedback' => ['ten', 'chucvu', 'mota', 'noidung', 'photo', 'rating', 'stt', 'hienthi'],
        'dichvu' => ['ten', 'slug', 'mota', 'noidung', 'photo', 'noibat', 'stt', 'hienthi', 'seo'],
        'news' => ['ten', 'slug', 'id_cat', 'mota', 'noidung', 'photo', 'noibat', 'stt', 'hienthi', 'seo', 'ngaytao'],
        'thuvien' => ['ten', 'slug', 'photo', 'noibat', 'stt', 'hienthi', 'seo', 'ngaytao'],
        'du-an' => ['ten', 'slug', 'id_khuvuc', 'mota', 'noidung', 'photo', 'noibat', 'rating', 'stt', 'hienthi', 'seo'],
    ];

    $fields = isset($config_fields[$com]) ? $config_fields[$com] : $config_fields['news'];
    $has_tabs = in_array('noidung', $fields) || in_array('seo', $fields);

    // Check Permission
    $is_admin = (isset($_SESSION['login']['role']) && $_SESSION['login']['role'] > 1);
?>

<!-- Header -->
<form method="post" action="index.php?com=<?=$com?>&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.25rem; font-weight: 700; color: #1e293b !important;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <?php if($is_admin) { ?>
            <button type="submit" class="btn btn-sm btn-primary shadow-sm mr-2 px-3" style="font-weight: 600;"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <?php } ?>
            <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-sm btn-light border shadow-sm px-3 text-secondary" style="font-weight: 600;"><i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$item['id']?>">
    
    <?php $readonly_attr = $is_admin ? '' : 'disabled readonly'; ?>

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
                            <?php if($is_admin) { ?>
                            <div class="form-group mb-4">
                                <label class="font-weight-600">Chọn nhiều hình ảnh</label>
                                <div class="d-flex align-items-center">
                                    <div class="custom-file mr-3" style="max-width: 400px;">
                                        <input type="file" class="custom-file-input" name="files[]" id="gallery-files" multiple accept="image/*, .jfif">
                                        <label class="custom-file-label" for="gallery-files">Tải ảnh từ máy tính...</label>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary shadow-sm font-weight-bold" onclick="openBrowser('gallery')">
                                        <i class="fas fa-folder-open mr-1"></i> Chọn từ Server
                                    </button>
                                </div>
                                <small class="text-muted mt-2 d-block font-italic">Nhấn giữ phím <b>Ctrl</b> để chọn nhiều tệp cùng lúc (khi tải từ máy).</small>
                            </div>
                            <?php } ?>
                            
                            <div id="gallery-preview" class="row">
                                <?php if(!empty($gallery)) { foreach($gallery as $g) { ?>
                                    <div class="col-md-3 col-sm-4 col-6 mb-4 gallery-item text-center">
                                        <div class="bg-light p-2 rounded border shadow-xs position-relative">
                                            <img src="../<?=$g['photo']?>" class="img-fluid rounded mb-2" style="height: 120px; object-fit: cover;">
                                            <input type="number" name="stt_existing[<?=$g['id']?>]" class="form-control form-control-sm text-center mb-2 mx-auto" value="<?=$g['stt']?>" style="width: 60px;" <?=$readonly_attr?>>
                                            <?php if($is_admin) { ?>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="del-gal-<?=$g['id']?>" name="delete_gallery[]" value="<?=$g['id']?>">
                                                <label class="custom-control-label text-danger small cursor-pointer" for="del-gal-<?=$g['id']?>">Xóa ảnh này</label>
                                            </div>
                                            <?php } ?>
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
                                        <select name="id_khuvuc" class="form-control form-control-sm" <?=$readonly_attr?>>
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
                                        <select name="id_cat" class="form-control form-control-sm" <?=$readonly_attr?>>
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
                                        <select name="rating" class="form-control form-control-sm" <?=$readonly_attr?>>
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
                                <input type="text" name="ten_vi" id="ten_vi" class="form-control form-control-sm" value="<?=$item['ten_vi']?>" required <?=$readonly_attr?>>
                            </div>

                            <?php if(in_array('slug', $fields)) { ?>
                            <div class="form-group">
                                <label class="font-weight-600 small">Đường dẫn (Slug)</label>
                                <input type="text" name="ten_khong_dau" id="ten_khong_dau" class="form-control form-control-sm" value="<?=$item['ten_khong_dau']?>" <?=$readonly_attr?>>
                            </div>
                            <?php } ?>

                            <?php if(in_array('chucvu', $fields)) { ?>
                            <div class="form-group">
                                <label class="font-weight-600 small">Chức vụ / Vị trí</label>
                                <input type="text" name="chucvu" class="form-control form-control-sm" value="<?=$item['chucvu']?>" <?=$readonly_attr?>>
                            </div>
                            <?php } ?>

                            <?php if(in_array('mota', $fields)) { ?>
                            <div class="form-group mb-0">
                                <label class="font-weight-600 small">Mô tả ngắn</label>
                                <textarea name="mota_vi" id="mota_vi" class="form-control" rows="5" <?=$readonly_attr?>><?=$item['mota_vi']?></textarea>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- Tab Nội dung -->
                        <?php if(in_array('noidung', $fields)) { ?>
                        <div class="tab-pane fade" id="content" role="tabpanel">
                            <div class="form-group mb-0">
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control" rows="15" <?=$readonly_attr?>><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Tab SEO -->
                        <?php if(in_array('seo', $fields)) { ?>
                        <div class="tab-pane fade" id="seo" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-600 small">SEO Title</label>
                                <input type="text" name="title" class="form-control form-control-sm shadow-none border" value="<?=$item['title']?>" <?=$readonly_attr?>>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-600 small">SEO Keywords</label>
                                <textarea name="keywords" class="form-control shadow-none border" rows="3" <?=$readonly_attr?>><?=$item['keywords']?></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label class="font-weight-600 small">SEO Description</label>
                                <textarea name="description" class="form-control shadow-none border" rows="3" <?=$readonly_attr?>><?=$item['description']?></textarea>
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
                    <?php if($is_admin) { ?>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary px-2 py-1">DUYỆT</button>
                    <?php } ?>
                </div>
                <div class="card-body text-center bg-light-50">
                    <?php $img_src = ($item['photo'] != '' && file_exists('../'.$item['photo'])) ? '../'.$item['photo'] : 'https://placehold.co/300x300?text=No+Image'; ?>
                    <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded mb-3 shadow-xs border" style="max-height: 150px; cursor: pointer;" <?=$is_admin ? "onclick=\"openBrowser('photo')\"" : ""?>>
                    <?php if($is_admin) { ?>
                    <div class="custom-file text-left text-xs">
                        <input type="file" class="custom-file-input" name="file" id="file" accept="image/*, .jfif">
                        <label class="custom-file-label" for="file">Tải ảnh mới...</label>
                    </div>
                    <?php } ?>
                    <small class="text-danger mt-2 d-block">Kích thước khuyến nghị: <b><?=$size_info?></b> (.jpg, .png, .webp, .jfif)</small>
                    <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">
                </div>
            </div>
            <?php } ?>

            <div class="card mb-4 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white font-weight-bold py-3 text-xs uppercase">Thiết lập</div>
                <div class="card-body">
                    <?php if(in_array('ngaytao', $fields)) { 
                        $ngaytao_val = isset($item['ngaytao']) ? date('Y-m-d\TH:i', $item['ngaytao']) : date('Y-m-d\TH:i');
                    ?>
                    <div class="form-group">
                        <label class="font-weight-600 small">Ngày hiển thị</label>
                        <input type="datetime-local" name="ngaytao" class="form-control form-control-sm" value="<?=$ngaytao_val?>" <?=$readonly_attr?>>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="font-weight-600 small">Số thứ tự</label>
                        <input type="number" name="stt" class="form-control form-control-sm" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 80px;" <?=$readonly_attr?>>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?> <?=$is_admin?'':'disabled'?>>
                        <label class="custom-control-label small cursor-pointer" for="hienthi">Hiển thị</label>
                    </div>
                    <?php if(in_array('noibat', $fields)) { ?>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="noibat" name="noibat" <?=($item['noibat']==1)?'checked':''?> <?=$is_admin?'':'disabled'?>>
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

<!-- CKEditor is loaded in layout -->
<script>
    var com = '<?=$com?>';
    // Mapping thư mục upload theo module
    var dir = com; 
    if(com === 'news') dir = 'news';
    if(com === 'news_cat') dir = 'news';
    if(com === 'du-an') dir = 'duan';
    if(com === 'dichvu') dir = 'dichvu';
    if(com === 'tuyendung') dir = 'tuyendung';
    if(com === 'themanh') dir = 'themanh';
    if(com === 'giatri') dir = 'giatri';
    if(com === 'staff') dir = 'staff';
    if(com === 'feedback') dir = 'feedback';
    if(com === 'appdancu') dir = 'caidat';

    function waitCK() {
        if (typeof initKhaServiceCKEditor === 'undefined') {
            setTimeout(waitCK, 100);
            return;
        }
        <?php if($is_admin) { ?>
        initKhaServiceCKEditor(['noidung_vi', 'mota_vi'], dir);
        <?php } else { ?>
        // Read-only mode for textareas (CKEditor replacement)
        if(document.getElementById('noidung_vi')) document.getElementById('noidung_vi').readOnly = true;
        if(document.getElementById('mota_vi')) document.getElementById('mota_vi').readOnly = true;
        <?php } ?>
    }
    waitCK();

    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=' + dir, 'Browser', 'width=1000,height=600');
    }

    function updateImagePath(field, path) {
        // Xử lý khi chọn ảnh cho Gallery (Multi Upload)
        if(field === 'gallery') {
            var preview = document.getElementById('gallery-preview');
            // Tạo ID ngẫu nhiên cho block
            var randId = Math.floor(Math.random() * 10000);
            var html = '<div class="col-md-3 col-sm-4 col-6 mb-4 text-center" id="gal-item-'+randId+'">' +
                       '<div class="bg-light p-2 rounded border shadow-xs border-primary position-relative">' +
                       '<img src="../' + path + '" class="img-fluid rounded mb-2" style="height: 120px; object-fit: cover;">' +
                       '<input type="hidden" name="files_server[]" value="' + path + '">' +
                       '<input type="number" name="stt_server[]" class="form-control form-control-sm text-center mb-2 mx-auto" value="1" style="width: 60px;">' +
                       '<button type="button" class="btn btn-xs btn-danger" onclick="document.getElementById(\'gal-item-'+randId+'\').remove()">Bỏ chọn</button>' +
                       '</div></div>';
            preview.insertAdjacentHTML('beforeend', html);
            toastr.success('Đã thêm ảnh vào danh sách chờ');
            return;
        }

        var input = document.getElementById('input-' + field);
        var preview = document.getElementById('preview-' + field);
        if(input) input.value = path;
        if(preview) preview.src = '../' + path;
        
        // Hỗ trợ trường hợp ID input là 'photo' (không có prefix)
        if(field === 'photo') {
             if(document.getElementById('input-photo')) document.getElementById('input-photo').value = path;
             if(document.getElementById('preview-photo')) document.getElementById('preview-photo').src = '../' + path;
        }
    }

    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('custom-file-input')) {
            var fileName = e.target.value.split("\\").pop();
            if(e.target.nextElementSibling) e.target.nextElementSibling.innerHTML = fileName;
        }

        // Preview cho ảnh chính
        if(e.target && e.target.id === 'file') {
            var preview = document.getElementById('preview-photo');
            var file = e.target.files[0];
            if(file) {
                var reader = new FileReader();
                reader.onload = function(re) {
                    if(preview) preview.src = re.target.result;
                }
                reader.readAsDataURL(file);
            }
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