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
            <div class="card card-primary card-outline card-outline-tabs border-0 shadow-sm">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs-info-tab" data-toggle="pill" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="true"><i class="fas fa-info-circle mr-1"></i> Thông tin chung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-content-tab" data-toggle="pill" href="#tabs-content" role="tab" aria-controls="tabs-content" aria-selected="false"><i class="fas fa-edit mr-1"></i> <?=($type=='tuyen-dung')?'Chi tiết công việc':'Nội dung chi tiết'?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-seo-tab" data-toggle="pill" href="#tabs-seo" role="tab" aria-controls="tabs-seo" aria-selected="false"><i class="fas fa-search mr-1"></i> Cấu hình SEO</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body bg-white">
                    <div class="tab-content">
                        <!-- Tab Thông tin chung -->
                        <div class="tab-pane fade show active" id="tabs-info" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold"><?=($type=='tuyen-dung')?'Vị trí tuyển dụng':'Tiêu đề bài viết'?> <span class="text-danger">*</span></label>
                                <input type="text" name="ten_vi" id="ten_vi" class="form-control" value="<?=$item['ten_vi']?>" required placeholder="<?=($type=='tuyen-dung')?'Ví dụ: Kế toán tổng hợp, Nhân viên kinh doanh...':'Ví dụ: Về chúng tôi, Tầm nhìn sứ mệnh...'?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Đường dẫn (Link không dấu)</label>
                                <input type="text" name="ten_khong_dau" id="ten_khong_dau" class="form-control" value="<?=$item['ten_khong_dau']?>" placeholder="Tự động tạo nếu để trống">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><?=($type=='tuyen-dung')?'Tóm tắt yêu cầu (Lương, địa điểm...)':'Mô tả ngắn'?></label>
                                <textarea name="mota_vi" class="form-control" rows="4" placeholder="<?=($type=='tuyen-dung')?'Nhập các thông tin nhanh về vị trí này...':'Nhập mô tả ngắn gọn về mục này...'?>"><?=$item['mota_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Nội dung chi tiết -->
                        <div class="tab-pane fade" id="tabs-content" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold">Nội dung chi tiết</label>
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control editor"><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab SEO -->
                        <div class="tab-pane fade" id="tabs-seo" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold">SEO Title</label>
                                <input type="text" name="title" class="form-control" value="<?=$item['title']?>" placeholder="Thẻ title (tối ưu 60-70 ký tự)">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">SEO Keywords</label>
                                <input type="text" name="keywords" class="form-control" value="<?=$item['keywords']?>" placeholder="Từ khóa ngăn cách bằng dấu phẩy">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">SEO Description</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Mô tả SEO (tối ưu 150-160 ký tự)"><?=$item['description']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <!-- Hình ảnh đại diện -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-image mr-1 text-primary"></i> Hình ảnh</span>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary py-1 px-2" style="font-size: 11px;"><i class="fas fa-search-plus"></i> DUYỆT</button>
                </div>
                <div class="card-body text-center bg-white">
                    <?php 
                        $img_src = ($item['photo'] != '') ? '../'.$item['photo'] : 'https://placehold.co/300x200?text=No+Image';
                    ?>
                    <div class="mb-3 bg-white p-2 rounded shadow-xs border text-center">
                        <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded" style="max-height: 150px; cursor: pointer;" onclick="openBrowser('photo')">
                        <input type="hidden" name="photo_from_server" id="input-photo" value="<?=$item['photo']?>">
                    </div>
                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Tải ảnh mới...</label>
                    </div>
                </div>
            </div>

            <!-- Thiết lập -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-white font-weight-bold">Thiết lập</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold text-sm">Số thứ tự</label>
                        <input type="number" name="stt" class="form-control form-control-sm" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 80px;">
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label class="custom-control-label font-weight-bold text-sm" for="hienthi">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>
<script>
    var typeDir = '<?=$table_db?>';
    window.onload = function() {
        if (typeof CKEDITOR !== 'undefined') {
            var config = {
                height: 500,
                language: 'vi',
                entities: false,
                basicEntities: false,
                allowedContent: true,
                versionCheck: false,
                filebrowserUploadUrl: 'ck_upload.php?dir=' + typeDir,
                uploadUrl: 'ck_upload.php?dir=' + typeDir,
                // Tắt các plugin yêu cầu bản quyền hoặc gây lỗi
                toolbar: [
                    { name: 'document', items: [ 'Source', '-', 'Preview' ] },
                    { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'links', items: [ 'Link', 'Unlink' ] },
                    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                    '/',
                    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'tools', items: [ 'Maximize' ] }
                ]
            };
            if(document.getElementById('noidung_vi')) CKEDITOR.replace('noidung_vi', config);
        }

        if (typeof jQuery !== 'undefined') {
            var $ = jQuery;
            // Cập nhật CKEditor trước khi submit
            $('form').on('submit', function() {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
            });
            // Fix kích thước CKEditor khi chuyển Tab
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
                if(e.target.id === 'tabs-content-tab') {
                    for (var instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].resize('100%', 500);
                    }
                }
            });
            // Hiển thị tên file khi chọn
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                var reader = new FileReader();
                reader.onload = function (e) { $('#preview-photo').attr('src', e.target.result); }
                reader.readAsDataURL(this.files[0]);
            });
        }
    };

    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=' + typeDir, 'Browser', 'width=1000,height=600,scrollbars=yes');
    }

    function updateImagePath(field, path) {
        $('#input-' + field).val(path);
        $('#preview-' + field).attr('src', '../' + path);
        toastr.success('Đã chọn ảnh từ máy chủ');
    }
</script>