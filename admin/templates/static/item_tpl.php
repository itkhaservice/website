<!-- Header -->
<form method="post" action="index.php?com=static&act=save&type=<?=$type?>" enctype="multipart/form-data">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.25rem; font-weight: 700; color: #1e293b !important;"><?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right mt-2 mt-md-0">
            <button type="submit" class="btn btn-sm btn-primary shadow-sm mr-2 px-3" style="font-weight: 600;"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=dashboard" class="btn btn-sm btn-light border shadow-sm px-3 text-secondary" style="font-weight: 600;"><i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                <div class="card-header p-0 border-bottom">
                    <ul class="nav nav-tabs border-0" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold px-4 py-3 border-0" id="tabs-story-tab" data-toggle="pill" href="#tabs-story" role="tab">Câu chuyện</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="tabs-stats-tab" data-toggle="pill" href="#tabs-stats" role="tab">Số liệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="tabs-vision-tab" data-toggle="pill" href="#tabs-vision" role="tab">Tầm nhìn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold px-4 py-3 border-0" id="tabs-mission-tab" data-toggle="pill" href="#tabs-mission" role="tab">Sứ mệnh</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body bg-white">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- TabCâu chuyện -->
                        <div class="tab-pane fade show active" id="tabs-story" role="tabpanel">
                            <input type="hidden" name="ten_vi" value="<?=$item['ten_vi']?>">
                            <div class="form-group">
                                <label class="font-weight-600">Mô tả ngắn (Slogan/Lời dẫn)</label>
                                <input type="text" name="mota_vi" class="form-control shadow-none border" value="<?=$item['mota_vi']?>" placeholder="Nhập lời dẫn...">
                            </div>
                            <div class="form-group mb-0">
                                <label class="font-weight-600">Nội dung chi tiết</label>
                                <textarea name="noidung_vi" id="noidung_vi" class="form-control editor shadow-none border"><?=$item['noidung_vi']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Số liệu -->
                        <div class="tab-pane fade" id="tabs-stats" role="tabpanel">
                            <div class="row">
                                <?php 
                                    $stats = [
                                        ['field' => 'sl_nhanvien', 'label' => 'Số nhân viên'],
                                        ['field' => 'sl_duan', 'label' => 'Số dự án'],
                                        ['field' => 'sl_canho', 'label' => 'Tổng số căn hộ'],
                                        ['field' => 'sl_khachhang', 'label' => 'Khách hàng'],
                                        ['field' => 'sl_giaithuong', 'label' => 'Giải thưởng'],
                                        ['field' => 'sl_doitac', 'label' => 'Đối tác']
                                    ];
                                    foreach($stats as $s) {
                                ?>
                                <div class="col-md-4 mb-3">
                                    <label class="font-weight-600 small"><?=$s['label']?></label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="<?=$s['field']?>" class="form-control shadow-none border" value="<?=$item[$s['field']]?>">
                                        <div class="input-group-append"><span class="input-group-text">+</span></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-600">Mô tả số liệu (Bên trái thống kê)</label>
                                <textarea name="mota_solieu" id="mota_solieu" class="form-control editor shadow-none border"><?=$item['mota_solieu']?></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-600">Mô tả đối tác (Bên trái logo đối tác)</label>
                                <textarea name="mota_doitac" id="mota_doitac" class="form-control editor shadow-none border"><?=$item['mota_doitac']?></textarea>
                            </div>
                            <div class="form-group mt-3 mb-0">
                                <label class="font-weight-600 text-danger"><i class="fab fa-youtube mr-1"></i> Link Video (Youtube)</label>
                                <input type="text" name="video" class="form-control shadow-none border" value="<?=$item['video']?>" placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>

                        <!-- Tab Tầm nhìn -->
                        <div class="tab-pane fade" id="tabs-vision" role="tabpanel">
                            <div class="form-group mb-0">
                                <label class="font-weight-600">Nội dung Tầm nhìn</label>
                                <textarea name="tamnhin" id="tamnhin" class="form-control editor shadow-none border"><?=$item['tamnhin']?></textarea>
                            </div>
                        </div>

                        <!-- Tab Sứ mệnh -->
                        <div class="tab-pane fade" id="tabs-mission" role="tabpanel">
                            <div class="form-group mb-0">
                                <label class="font-weight-600">Nội dung Sứ mệnh</label>
                                <textarea name="sumenh" id="sumenh" class="form-control editor shadow-none border"><?=$item['sumenh']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center py-3">
                    <span>Hình ảnh</span>
                    <button type="button" onclick="openBrowser('photo')" class="btn btn-xs btn-outline-primary py-1 px-2" style="font-size: 11px;"><i class="fas fa-search-plus"></i> DUYỆT</button>
                </div>
                <div class="card-body text-center bg-light-50">
                    <?php 
                        $img_src = ($item['photo'] != '' && file_exists('../'.$item['photo'])) ? '../'.$item['photo'] : 'https://placehold.co/300x200/ebebeb/666666?text=No+Image';
                    ?>
                    <div class="mb-3 bg-white p-2 rounded shadow-xs border d-inline-block">
                        <img id="preview-photo" src="<?=$img_src?>" class="img-fluid rounded" style="max-height: 150px; cursor: pointer;" onclick="openBrowser('photo')">
                        <input type="hidden" name="photo_from_server" id="photo" value="<?=$item['photo']?>">
                    </div>
                    <div class="custom-file text-left text-sm">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label shadow-none" for="file" style="border-radius: 8px;">Tải ảnh mới...</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; transition: 0.3s; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.3); }
    .nav-tabs .nav-link { color: #6c757d; border-bottom: 3px solid transparent !important; }
    .nav-tabs .nav-link.active { color: #108042 !important; border-bottom-color: #108042 !important; background: transparent; }
    .font-weight-600 { font-weight: 600; font-size: 0.9rem; color: #444; }
</style>

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    function loadStaticCKEditor() {
        if (typeof CKEDITOR === 'undefined') {
            setTimeout(loadStaticCKEditor, 100);
            return;
        }
        var config = {
            height: 400,
            language: 'vi',
            versionCheck: false,
            filebrowserBrowseUrl: 'browser.php?dir=vechungtoi',
            filebrowserImageBrowseUrl: 'browser.php?dir=vechungtoi',
            filebrowserUploadUrl: 'ck_upload.php?dir=vechungtoi',
            filebrowserImageUploadUrl: 'ck_upload.php?dir=vechungtoi',
            removeDialogTabs: '',
            // Thêm plugin màu sắc, font, căn lề
            extraPlugins: 'image,filebrowser,justify,colorbutton,font,panelbutton,floatpanel',
            
            // Thêm các kiểu trình bày nhanh cho ảnh
            stylesSet: [
                { name: 'Ảnh rộng 100%', element: 'img', attributes: { 'class': 'img-100' } },
                { name: 'Ảnh rộng 75%', element: 'img', attributes: { 'class': 'img-75' } },
                { name: 'Ảnh rộng 50%', element: 'img', attributes: { 'class': 'img-50' } },
                { name: 'Ảnh rộng 25%', element: 'img', attributes: { 'class': 'img-25' } }
            ]
        };
        
        var ids = ['noidung_vi', 'tamnhin', 'sumenh', 'mota_solieu', 'mota_doitac'];
        ids.forEach(function(id) {
            if(document.getElementById(id)) {
                CKEDITOR.replace(id, (id === 'mota_solieu' || id === 'mota_doitac') ? Object.assign({}, config, {height: 150}) : config);
            }
        });
    }
    
    // Gọi khởi tạo
    loadStaticCKEditor();

    function openBrowser(field) {
        window.open('browser.php?field=' + field + '&dir=vechungtoi', 'Browser', 'width=1000,height=600');
    }

    function updateImagePath(field, path) {
        document.getElementById('preview-photo').src = '../' + path;
        document.getElementById('photo').value = path;
    }

    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('custom-file-input')) {
            var fileName = e.target.value.split("\\").pop();
            if(e.target.nextElementSibling) e.target.nextElementSibling.innerHTML = fileName;
        }
    });
</script>