<!-- Header -->
<form method="post" action="index.php?com=static&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;"><?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-primary shadow-sm mr-2 px-4"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=static&act=capnhat&type=<?=$type?>" class="btn btn-secondary shadow-sm px-4"><i class="fas fa-undo mr-1"></i> Hủy bỏ</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-outline card-outline-tabs border-0 shadow-sm">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs-story-tab" data-toggle="pill" href="#tabs-story" role="tab" aria-controls="tabs-story" aria-selected="true"><i class="fas fa-history mr-1"></i> Câu chuyện</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-stats-tab" data-toggle="pill" href="#tabs-stats" role="tab" aria-controls="tabs-stats" aria-selected="false"><i class="fas fa-chart-bar mr-1"></i> Số liệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-vision-tab" data-toggle="pill" href="#tabs-vision" role="tab" aria-controls="tabs-vision" aria-selected="false"><i class="fas fa-eye mr-1"></i> Tầm nhìn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-mission-tab" data-toggle="pill" href="#tabs-mission" role="tab" aria-controls="tabs-mission" aria-selected="false"><i class="fas fa-bullseye mr-1"></i> Sứ mệnh</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body bg-white">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- TabCâu chuyện -->
                        <div class="tab-pane fade show active" id="tabs-story" role="tabpanel" aria-labelledby="tabs-story-tab">
                            <input type="hidden" name="ten_vi" value="<?=$item['ten_vi']?>">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Mô tả ngắn (Slogan/Lời dẫn)</label>
                                <input type="text" name="mota_vi" class="form-control" value="<?=$item['mota_vi']?>" placeholder="Nhập lời dẫn ngắn gọn...">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nội dung chi tiết (Câu chuyện thành công)</label>
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control editor"><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Số liệu -->
                        <div class="tab-pane fade" id="tabs-stats" role="tabpanel" aria-labelledby="tabs-stats-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Số nhân viên</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_nhanvien" class="form-control" value="<?=$item['sl_nhanvien']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Số dự án</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_duan" class="form-control" value="<?=$item['sl_duan']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Tổng số căn hộ</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_canho" class="form-control" value="<?=$item['sl_canho']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Khách hàng</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_khachhang" class="form-control" value="<?=$item['sl_khachhang']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Giải thưởng</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_giaithuong" class="form-control" value="<?=$item['sl_giaithuong']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Đối tác</label>
                                        <div class="input-group">
                                            <input type="number" name="sl_doitac" class="form-control" value="<?=$item['sl_doitac']?>">
                                            <div class="input-group-append"><span class="input-group-text">+</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold text-dark">Mô tả số liệu</label>
                                <textarea name="mota_solieu" id="mota_solieu" class="form-control editor"><?=$item['mota_solieu']?></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold text-dark text-danger"><i class="fab fa-youtube mr-1"></i> Link Video (Youtube)</label>
                                <input type="text" name="video" class="form-control" value="<?=$item['video']?>" placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>

                        <!-- Tab Tầm nhìn -->
                        <div class="tab-pane fade" id="tabs-vision" role="tabpanel" aria-labelledby="tabs-vision-tab">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nội dung Tầm nhìn</label>
                                <textarea name="tamnhin" id="tamnhin" class="form-control editor"><?=$item['tamnhin']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Sứ mệnh -->
                        <div class="tab-pane fade" id="tabs-mission" role="tabpanel" aria-labelledby="tabs-mission-tab">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nội dung Sứ mệnh</label>
                                <textarea name="sumenh" id="sumenh" class="form-control editor"><?=$item['sumenh']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
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
                        <input type="hidden" name="photo_from_server" id="photo" value="<?=$item['photo']?>">
                    </div>
                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Tải ảnh mới...</label>
                    </div>
                    <p class="text-muted mt-2 mb-0" style="font-size: 11px;">Hỗ trợ: .jpg, .png, .gif, .jpeg</p>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Tích hợp CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>
<script>
    window.onload = function() {
        if (typeof CKEDITOR !== 'undefined') {
            var config = {
                height: 500,
                language: 'vi',
                entities: false,
                basicEntities: false,
                allowedContent: true,
                versionCheck: false,
                filebrowserUploadUrl: 'ck_upload.php?dir=vechungtoi',
                uploadUrl: 'ck_upload.php?dir=vechungtoi',
                // Tắt các plugin yêu cầu bản quyền hoặc gây lỗi
                removePlugins: 'exportpdf,language,print,newpage,save',
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
            
            // Cấu hình riêng cho Mô tả số liệu (thấp hơn)
            if(document.getElementById('mota_solieu')) {
                var config_short = Object.assign({}, config);
                config_short.height = 150;
                CKEDITOR.replace('mota_solieu', config_short);
            }

            if(document.getElementById('tamnhin')) CKEDITOR.replace('tamnhin', config);
            if(document.getElementById('sumenh')) CKEDITOR.replace('sumenh', config);
        }

        // Xử lý sự kiện bằng jQuery (lúc này jQuery đã chắc chắn tồn tại)
        if (typeof jQuery !== 'undefined') {
            var $ = jQuery;
            
            $('form').on('submit', function() {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
            });

            // Tự động resize lại editor khi chuyển tab để tránh bị vỡ khung hoặc sai kích thước
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].resize('100%', 500);
                }
            });

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        }
    };

    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=vechungtoi', 'Browser', 'width=1000,height=600,scrollbars=yes');
    }

    function updateImagePath(field, path) {
        var preview = document.getElementById('preview-' + field);
        var input = document.getElementById(field);
        if(preview) preview.src = '../' + path;
        if(input) input.value = path;
        if(typeof toastr !== 'undefined') toastr.success('Đã chọn ảnh từ server');
    }
</script>