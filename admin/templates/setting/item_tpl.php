<form method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Cấu hình hệ thống</h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-primary shadow-sm px-4 font-weight-bold" style="border-radius: 10px;"><i class="fas fa-save mr-2"></i> LƯU THIẾT LẬP</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-outline card-outline-tabs border-0 shadow-sm">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs-info-tab" data-toggle="pill" href="#tabs-info" role="tab"><i class="fas fa-info-circle mr-1"></i> Thông tin công ty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-social-tab" data-toggle="pill" href="#tabs-social" role="tab"><i class="fas fa-share-alt mr-1"></i> Mạng xã hội</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-map-tab" data-toggle="pill" href="#tabs-map" role="tab"><i class="fas fa-map-marker-alt mr-1"></i> Bản đồ</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body bg-white">
                    <div class="tab-content">
                        <!-- Tab Thông tin công ty -->
                        <div class="tab-pane fade show active" id="tabs-info" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold">Tên đầy đủ (longName)</label>
                                <input type="text" name="longName" class="form-control" value="<?=$item['longName']?>" placeholder="Ví dụ: Công ty Cổ phần Quản lý và Vận hành...">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tên giao dịch (nationalName)</label>
                                        <input type="text" name="nationalName" class="form-control" value="<?=$item['nationalName']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tên viết tắt (shortName)</label>
                                        <input type="text" name="shortName" class="form-control" value="<?=$item['shortName']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Mã số thuế (taxCode)</label>
                                        <input type="text" name="taxCode" class="form-control" value="<?=$item['taxCode']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?=$item['email']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Điện thoại</label>
                                        <input type="text" name="dienthoai" class="form-control" value="<?=$item['dienthoai']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-danger">Hotline</label>
                                        <input type="text" name="hotline" class="form-control font-weight-bold text-danger" value="<?=$item['hotline']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Địa chỉ</label>
                                <input type="text" name="diachi_vi" class="form-control" value="<?=$item['diachi_vi']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mô tả ngắn về công ty</label>
                                <textarea name="description" class="form-control" rows="4"><?=$item['description']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Mạng xã hội -->
                        <div class="tab-pane fade" id="tabs-social" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fab fa-facebook text-primary mr-1"></i> Fanpage Facebook</label>
                                <input type="text" name="fanpage" class="form-control" value="<?=$item['fanpage']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fab fa-tiktok text-dark mr-1"></i> Tiktok</label>
                                <input type="text" name="tiktok" class="form-control" value="<?=$item['tiktok']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fab fa-youtube text-danger mr-1"></i> Kênh Youtube</label>
                                <input type="text" name="youtube" class="form-control" value="<?=$item['youtube']?>">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-success"><i class="fas fa-play-circle mr-1"></i> Video trang giới thiệu (link Youtube)</label>
                                <input type="text" name="video_intro" class="form-control border-success shadow-none" value="<?=$item['video_intro']?>" placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fas fa-info-circle text-info mr-1"></i> Thông tin Youtube (youtubeInfo)</label>
                                <input type="text" name="youtubeInfo" class="form-control" value="<?=$item['youtubeInfo']?>">
                            </div>
                        </div>

                        <!-- Tab Bản đồ -->
                        <div class="tab-pane fade" id="tabs-map" role="tabpanel">
                            <div class="form-group">
                                <label class="font-weight-bold">Google Map Iframe</label>
                                <textarea name="google_map" class="form-control" rows="8"><?=$item['google_map']?></textarea>
                                <small class="text-muted mt-2 d-block italic">Dán mã nhúng từ Google Maps (thẻ iframe) vào đây.</small>
                            </div>
                            <?php if($item['google_map'] != '') { ?>
                                <div class="mt-3 border rounded p-2 bg-light text-center">
                                    <label class="d-block text-left mb-2 text-sm font-italic">Xem trước bản đồ:</label>
                                    <div class="embed-responsive" style="height: 300px;">
                                        <?=$item['google_map']?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <!-- Logo vuông -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-image mr-1 text-primary"></i> Logo vuông (favicon)</span>
                    <button type="button" onclick="openBrowser('logo')" class="btn btn-xs btn-outline-primary px-2 py-1" style="font-size: 11px;">DUYỆT</button>
                </div>
                <div class="card-body text-center bg-white">
                    <?php 
                        $img_src = ($item['logo'] != '') ? '../'.$item['logo'] : 'https://placehold.co/200x200?text=Logo';
                    ?>
                    <div class="mb-3 bg-white p-2 rounded shadow-xs border text-center">
                        <img id="preview-logo" src="<?=$img_src?>" class="img-fluid rounded" style="max-height: 100px;">
                        <input type="hidden" name="logo_from_server" id="input-logo" value="<?=$item['logo']?>">
                    </div>
                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="logo_file" id="logo_file">
                        <label class="custom-file-label" for="logo_file">Tải ảnh mới...</label>
                    </div>
                </div>
            </div>

            <!-- Logo ngang -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-image mr-1 text-primary"></i> Logo ngang</span>
                    <button type="button" onclick="openBrowser('logoRectangle')" class="btn btn-xs btn-outline-primary px-2 py-1" style="font-size: 11px;">DUYỆT</button>
                </div>
                <div class="card-body text-center bg-white">
                    <?php 
                        $img_src_rect = ($item['logoRectangle'] != '') ? '../'.$item['logoRectangle'] : 'https://placehold.co/300x100?text=Logo+Rect';
                    ?>
                    <div class="mb-3 bg-white p-2 rounded shadow-xs border text-center">
                        <img id="preview-logoRectangle" src="<?=$img_src_rect?>" class="img-fluid rounded" style="max-height: 60px;">
                        <input type="hidden" name="logoRectangle_from_server" id="input-logoRectangle" value="<?=$item['logoRectangle']?>">
                    </div>
                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="logoRectangle_file" id="logoRectangle_file">
                        <label class="custom-file-label" for="logoRectangle_file">Tải ảnh mới...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=caidat', 'Browser', 'width=1000,height=600,scrollbars=yes');
    }

    function updateImagePath(field, path) {
        $('#input-' + field).val(path);
        $('#preview-' + field).attr('src', '../' + path);
        toastr.success('Đã chọn ảnh');
    }

    // Preview khi chọn file từ máy tính
    document.querySelectorAll('.custom-file-input').forEach(input => {
        input.addEventListener('change', function(e) {
            let fileName = this.files[0].name;
            let label = this.nextElementSibling;
            label.innerText = fileName;
            
            let previewId = 'preview-' + this.id.replace('_file', '');
            let reader = new FileReader();
            reader.onload = function(re) {
                document.getElementById(previewId).src = re.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>