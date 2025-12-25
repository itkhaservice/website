<!-- Header -->
<form method="post" action="index.php?com=<?=$com?>&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-primary shadow-sm mr-2 px-4"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-secondary shadow-sm px-4"><i class="fas fa-undo mr-1"></i> Hủy bỏ</a>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$item['id']?>">
    
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold">Thông tin chính</div>
                <div class="card-body">
                    <?php if(in_array($com, ['news','thuvien','du-an'])) { 
                        $d->reset();
                        $d->query("select * from #_news_cat where type='$type' order by stt asc, id desc");
                        $cats = $d->result_array();
                    ?>
                    <div class="form-group">
                        <label class="font-weight-600">Danh mục / Khu vực</label>
                        <select name="id_cat" class="form-control text-sm">
                            <option value="0">Chọn danh mục</option>
                            <?php foreach($cats as $c){ ?>
                                <option value="<?=$c['id']?>" <?=($item['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="font-weight-600">Tiêu đề (ten_vi) <span class="text-danger">*</span></label>
                        <input type="text" name="ten_vi" class="form-control" value="<?=$item['ten_vi']?>" required placeholder="Nhập tiêu đề...">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-600">Mô tả (mota_vi)</label>
                        <textarea name="mota_vi" class="form-control" rows="4" placeholder="Nhập mô tả ngắn..."><?=$item['mota_vi']?></textarea>
                    </div>

                    <?php if(!in_array($com, ['themanh', 'giatri'])) { ?>
                    <div class="form-group">
                        <label class="font-weight-600">Nội dung chi tiết (noidung_vi)</label>
                        <textarea name="noidung_vi" id="noidung_vi" class="form-control editor" rows="10"><?=$item['noidung_vi']?></textarea>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <?php if($com != 'giatri') { ?>
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center py-3">
                    <span>Hình ảnh (photo)</span>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary py-1 px-2" style="font-size: 11px;"><i class="fas fa-search-plus"></i> DUYỆT</button>
                </div>
                <div class="card-body text-center bg-light-50">
                    <?php 
                        $img_style = "";
                        if($com == 'themanh') $img_style = "width: 56px; height: 56px; object-fit: contain; background: #f8f9fa; padding: 5px;";
                        $img_src = ($item['photo'] != '') ? '../'.$item['photo'] : 'https://placehold.co/150x150?text=No+Image';
                    ?>
                    <div class="mb-3 bg-white p-2 rounded shadow-xs border d-inline-block">
                        <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded" style="max-height: 180px; <?=$img_style?>">
                    </div>
                    
                    <div id="file-name-display" class="text-xs text-muted mb-2 text-truncate px-2">
                        <?=($item['photo'] != '') ? basename($item['photo']) : 'Chưa có ảnh'?>
                    </div>

                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file" style="border-radius: 8px;">Tải ảnh mới...</label>
                    </div>
                    
                    <!-- Input ẩn để nhận đường dẫn khi chọn từ Browser -->
                    <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">

                    <?php if($com == 'themanh'){ ?>
                        <small class="text-danger mt-2 d-block text-left font-italic" style="font-size: 11px;">* Kích thước chuẩn: 56px x 56px</small>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-white font-weight-bold py-3">Thiết lập</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-600 text-sm">Số thứ tự (stt)</label>
                        <input type="number" name="stt" class="form-control form-control-sm" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 100px;">
                    </div>

                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label class="custom-control-label font-weight-500 text-sm" for="hienthi">Hiển thị (hienthi)</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php if(!in_array($com, ['themanh', 'giatri'])) { ?>
<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'noidung_vi', {
        height: 500,
        language: 'vi',
        entities: false,
        basicEntities: false,
        versionCheck: false,
        filebrowserUploadUrl: 'ck_upload.php',
        uploadUrl: 'ck_upload.php'
    });
</script>
<?php } ?>

<script>
    // Hàm mở cửa sổ chọn ảnh
    function openBrowser(field) {
        var dir = '<?=$table_db?>';
        window.open('browser.php?field=' + field + '&dir=' + dir, 'Browser', 'width=1000,height=600,scrollbars=yes');
    }

    // Hàm nhận dữ liệu từ cửa sổ con (browser.php)
    function updateImagePath(field, path) {
        // Cập nhật giá trị vào input hidden
        $('#input-' + field).val(path);
        
        // Cập nhật ảnh xem trước
        $('#preview-' + field).attr('src', '../' + path);
        
        // Cập nhật tên file hiển thị
        var filename = path.split('/').pop();
        $('#file-name-display').text(filename).addClass('text-primary font-weight-bold');
        
        // Thông báo
        toastr.success('Đã chọn ảnh: ' + filename);
    }

    // Xử lý khi chọn file từ máy tính
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      $('#file-name-display').text(fileName).removeClass('text-primary font-weight-bold');
      
      // Hiển thị ảnh xem trước từ máy tính
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#preview-photo').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
</script>