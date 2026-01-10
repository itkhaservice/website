<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?=$title_main?></h1>
      </div>
    </div>
  </div>
</div>

<?php $is_admin = (isset($_SESSION['login']['role']) && $_SESSION['login']['role'] > 1); ?>
<?php $readonly_attr = $is_admin ? '' : 'readonly disabled'; ?>

<!-- CKEditor is loaded in layout -->

<section class="content">
    <div class="container-fluid">
        <form method="post" action="index.php?com=photo&act=save&type=<?=$type?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$item['id']?>">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-header bg-white border-bottom py-3">
                            <h3 class="card-title font-weight-bold"><i class="fas fa-image mr-2 text-primary"></i>Chi tiết hình ảnh</h3>
                        </div>
                        <div class="card-body p-4">
                            <?php if(strpos($type, 'banner') === false && $type != 'slideshow'){ ?>
                            <div class="form-group mb-4">
                                <label class="font-weight-600">Tên <?=$type=='doi-tac'?'đối tác':'hình ảnh'?></label>
                                <input type="text" name="ten_vi" class="form-control form-control-lg border-light bg-light" value="<?=$item['ten_vi']?>" placeholder="Nhập tên..." <?=$readonly_attr?>>
                            </div>
                            
                            <div class="form-group mb-4">
                                <label class="font-weight-600">Link liên kết</label>
                                <input type="text" name="link" class="form-control form-control-lg border-light bg-light" value="<?=$item['link']?>" placeholder="https://..." <?=$readonly_attr?>>
                            </div>
                            <?php } ?>

                            <?php if($type == 'slideshow'){ ?>
                            <div class="form-group mb-4">
                                <label class="font-weight-600 text-primary">Nội dung chính (H1 - Chữ lớn bên dưới) - Dùng CKEditor</label>
                                <textarea name="ten_vi" id="ten_vi" class="form-control border-primary bg-light" rows="3" <?=$readonly_attr?>><?=$item['ten_vi']?></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-600 text-info">Tiêu đề nhỏ (H5 - Chữ nhỏ bên trên) - Dùng CKEditor</label>
                                <textarea name="mota_vi" id="mota_vi" class="form-control border-light bg-light" rows="3" <?=$readonly_attr?>><?=$item['mota_vi']?></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-600">Link liên kết (Nút xem thêm)</label>
                                <input type="text" name="link" class="form-control border-light bg-light" value="<?=$item['link']?>" placeholder="Ví dụ: index.php?com=gioi-thieu" <?=$readonly_attr?>>
                            </div>
                            <?php } ?>

                            <div class="form-group mb-4">
                                <label class="d-flex justify-content-between align-items-center font-weight-600">
                                    <span>Tệp hình ảnh</span>
                                    <?php if($is_admin) { ?>
                                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary px-2 py-1" style="font-size: 11px;"><i class="fas fa-folder-open mr-1"></i> DUYỆT SERVER</button>
                                    <?php } ?>
                                </label>
                                <?php if($is_admin) { ?>
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" name="file" id="file_photo">
                                    <label class="custom-file-label border-light bg-light" for="file_photo">Chọn tệp từ máy tính...</label>
                                </div>
                                <?php } ?>
                                <small class="text-muted d-block bg-info-light p-2 rounded" style="background: #e7f3ff; color: #0056b3;">
                                    <i class="fas fa-info-circle mr-1"></i> Định dạng: .jpg, .png, .webp. <br>
                                    <?php if($type == 'slideshow') { ?>
                                        Kích thước khuyến nghị: <b>1920x600px</b> (Tỷ lệ 3.2:1)
                                    <?php } else { ?>
                                        Kích thước khuyến nghị: <b>1920x720px</b> (.jpg, .png, .webp)
                                    <?php } ?>
                                </small>
                                
                                <div class="mt-4 p-3 border rounded text-center bg-white shadow-sm mx-auto" style="max-width: 500px; border-style: dashed !important; border-width: 2px !important;">
                                    <?php $img_src = ($item['photo'] != '' && file_exists('../'.$item['photo'])) ? '../'.$item['photo'] : 'https://placehold.co/800x300?text=Preview+Image'; ?>
                                    <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded" style="max-height: 250px; object-fit: contain;">
                                    <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">
                                </div>
                            </div>

                            <div class="row">
                                <?php if(strpos($type, 'banner') === false && $type != 'slideshow'){ ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-600">Thứ tự hiển thị</label>
                                        <input type="number" name="stt" class="form-control border-light bg-light" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:120px" <?=$readonly_attr?>>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="<?=strpos($type, 'banner') === false && $type != 'slideshow' ? 'col-md-6' : 'col-md-12'?> d-flex align-items-end">
                                    <div class="form-group mb-2">
                                        <div class="custom-control custom-switch custom-switch-lg">
                                            <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?> <?=$is_admin?'':'disabled'?>> 
                                            <label class="custom-control-label font-weight-bold cursor-pointer" for="hienthi">Cho phép hiển thị</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-end">
                            <?php if($is_admin) { ?>
                            <button type="submit" class="btn btn-sm btn-primary shadow-sm mr-2 px-3" style="font-weight: 600;"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
                            <?php } ?>
                            <a href="index.php?com=photo&act=man&type=<?=$type?>" class="btn btn-sm btn-light border shadow-sm px-3 text-secondary" style="font-weight: 600;"><i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    function openBrowser(field) {
        var dir = '<?= (strpos($type, "banner") !== false) ? "banner" : $type ?>';
        window.open('browser.php?field=' + field + '&dir=' + dir, 'Browser', 'width=1000,height=600,scrollbars=yes');
    }

    function updateImagePath(field, path) {
        document.getElementById('input-' + field).value = path;
        document.getElementById('preview-' + field).src = '../' + path;
    }

    // Custom file input label and local preview
    document.getElementById('file_photo') && document.getElementById('file_photo').addEventListener('change', function(e) {
        var fileName = this.files[0].name;
        this.nextElementSibling.innerHTML = fileName;
        
        var reader = new FileReader();
        reader.onload = function (event) {
            document.getElementById('preview-photo').src = event.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });

    <?php if($type == 'slideshow'){ ?>
    // Sử dụng cấu hình chung nhưng ghi đè toolbar đơn giản cho Slideshow
    var slideshowConfig = {
        height: 150,
        toolbar: [
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'styles', items: [ 'Font', 'FontSize' ] },
            { name: 'paragraph', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'document', items: [ 'Source' ] },
            { name: 'insert', items: ['SpecialChar'] } // Vẫn cho phép ký tự đặc biệt
        ]
    };

    function waitCK() {
        if (typeof initKhaServiceCKEditor === 'undefined') {
            setTimeout(waitCK, 100);
            return;
        }
        <?php if($is_admin) { ?>
        initKhaServiceCKEditor(['ten_vi', 'mota_vi'], 'slideshow', slideshowConfig);
        <?php } else { ?>
        // Readonly mode
        if(document.getElementById('ten_vi')) document.getElementById('ten_vi').readOnly = true;
        if(document.getElementById('mota_vi')) document.getElementById('mota_vi').readOnly = true;
        <?php } ?>
    }
    waitCK();
    <?php } ?>
</script>