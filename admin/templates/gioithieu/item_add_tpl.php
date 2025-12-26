<!-- Import CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<!-- Header -->
<form method="post" action="index.php?com=<?=$com?>&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-save shadow-sm mr-2 px-4"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-secondary shadow-sm px-4"><i class="fas fa-undo mr-1"></i> Hủy bỏ</a>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$item['id']?>">
    
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white p-0 border-bottom">
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold px-4 py-3 border-0" id="info-tab" data-toggle="tab" href="#info" role="tab">Thông tin chung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="content-tab" data-toggle="tab" href="#content" role="tab">Nội dung chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="seo-tab" data-toggle="tab" href="#seo" role="tab">SEO</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab Thông tin chung -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-600">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" name="ten_vi" class="form-control" value="<?=$item['ten_vi']?>" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-600">Đường dẫn (Slug)</label>
                                <input type="text" name="ten_khong_dau" class="form-control" value="<?=$item['ten_khong_dau']?>" placeholder="Bỏ trống để tự động tạo...">
                            </div>
                            <div class="form-group mb-0">
                                <label class="font-weight-600">Mô tả ngắn</label>
                                <textarea name="mota_vi" id="mota_vi" class="form-control" rows="5"><?=$item['mota_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Nội dung -->
                        <div class="tab-pane fade" id="content" role="tabpanel">
                            <div class="form-group mb-0">
                                <label class="font-weight-600">Nội dung chi tiết</label>
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control" rows="15"><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab SEO -->
                        <div class="tab-pane fade" id="seo" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-600">SEO Title</label>
                                <input type="text" name="title" class="form-control" value="<?=$item['title']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-600">SEO Keywords</label>
                                <textarea name="keywords" class="form-control" rows="3"><?=$item['keywords']?></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label class="font-weight-600">SEO Description</label>
                                <textarea name="description" class="form-control" rows="3"><?=$item['description']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                    <span>Hình ảnh</span>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary">DUYỆT</button>
                </div>
                <div class="card-body text-center">
                    <?php $img_src = ($item['photo'] != '' && file_exists('../'.$item['photo'])) ? '../'.$item['photo'] : 'https://placehold.co/300x300?text=No+Image'; ?>
                    <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded mb-3" style="max-height: 180px;">
                    <div class="custom-file text-left">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Tải ảnh mới...</label>
                    </div>
                    <small class="text-danger mt-2 d-block text-xs">Kích thước khuyến nghị: <b>800x600px</b></small>
                    <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">
                </div>
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold">Thiết lập</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-600">Số thứ tự</label>
                        <input type="number" name="stt" class="form-control" value="<?=isset($item['stt'])?$item['stt']:1?>">
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label class="custom-control-label" for="hienthi">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; }
    .nav-tabs .nav-link.active { color: #108042 !important; border-bottom: 3px solid #108042 !important; font-weight: bold; }
    .font-weight-600 { font-weight: 600; }
</style>

<script>
    function startCKEditor() {
        if (typeof CKEDITOR === 'undefined') {
            setTimeout(startCKEditor, 100);
            return;
        }

        var dir = 'gioithieu';
        
        if (document.getElementById('noidung_vi')) {
            CKEDITOR.replace('noidung_vi', {
                height: 500,
                filebrowserBrowseUrl: 'browser.php?dir=' + dir,
                filebrowserImageBrowseUrl: 'browser.php?dir=' + dir,
                filebrowserUploadUrl: 'ck_upload.php?dir=' + dir,
                filebrowserImageUploadUrl: 'ck_upload.php?dir=' + dir,
                removeDialogTabs: '',
                extraPlugins: 'image,filebrowser',
                
                // Thêm các kiểu trình bày nhanh cho ảnh
                stylesSet: [
                    { name: 'Ảnh rộng 100%', element: 'img', attributes: { 'class': 'img-100' } },
                    { name: 'Ảnh rộng 75%', element: 'img', attributes: { 'class': 'img-75' } },
                    { name: 'Ảnh rộng 50%', element: 'img', attributes: { 'class': 'img-50' } },
                    { name: 'Ảnh rộng 25%', element: 'img', attributes: { 'class': 'img-25' } }
                ],
                
                versionCheck: false
            });
        }

        if (document.getElementById('mota_vi')) {
            CKEDITOR.replace('mota_vi', {
                height: 200,
                toolbar: [['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']],
                versionCheck: false
            });
        }
    }

    startCKEditor();

    function openBrowser(field) {
        var dir = 'gioithieu';
        window.open('browser.php?field=' + field + '&dir=' + dir, 'Browser', 'width=1000,height=600');
    }

    function updateImagePath(field, path) {
        document.getElementById('input-' + field).value = path;
        document.getElementById('preview-' + field).src = '../' + path;
    }

    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('custom-file-input')) {
            var fileName = e.target.value.split("\\").pop();
            e.target.nextElementSibling.innerHTML = fileName;
            var reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('preview-photo').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>