<!-- Header -->
<form method="post" action="index.php?com=news_cat&act=save&type=<?=$type?>">
    <!-- Hidden ID for Edit Mode -->
    <input type="hidden" name="id" value="<?=$item['id']?>">

    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-save shadow-sm mr-2 px-4"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=news_cat&act=man&type=<?=$type?>" class="btn btn-secondary shadow-sm px-4"><i class="fas fa-undo mr-1"></i> Hủy bỏ</a>
        </div>
    </div>

    <div class="card card-primary card-outline card-outline-tabs border-0 shadow-sm">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tabs-info-tab" data-toggle="pill" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="true">Thông tin chung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-seo-tab" data-toggle="pill" href="#tabs-seo" role="tab" aria-controls="tabs-seo" aria-selected="false">Cấu hình SEO</a>
                </li>
            </ul>
        </div>
        <div class="card-body bg-white">
            <div class="tab-content">
                <!-- Tab Thông tin -->
                <div class="tab-pane fade show active" id="tabs-info" role="tabpanel">
                    <div class="form-group">
                        <label class="font-weight-600">Tên <?=$title_main?> <span class="text-danger">*</span></label>
                        <input type="text" name="ten_vi" id="ten_vi" class="form-control shadow-none border" value="<?=$item['ten_vi']?>" required placeholder="Nhập tên..." onkeyup="changeTitle(this);">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-600">Đường dẫn (Link thân thiện)</label>
                        <div class="input-group">
                            <input type="text" name="ten_khong_dau" id="ten_khong_dau" class="form-control shadow-none border bg-light" value="<?=$item['ten_khong_dau']?>" placeholder="tự-động-tạo-từ-tên">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white small text-muted"><i class="fas fa-link"></i></span>
                            </div>
                        </div>
                        <small class="text-muted">Link dùng để truy cập website (Ví dụ: <i>khu-vuc-mien-bac</i>)</small>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-600 text-sm">Số thứ tự (stt)</label>
                        <input type="number" name="stt" class="form-control form-control-sm shadow-none border" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 100px;">
                    </div>

                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label class="custom-control-label font-weight-500 text-sm cursor-pointer" for="hienthi">Hiển thị</label>
                    </div>
                </div>
                
                <!-- Tab SEO -->
                <div class="tab-pane fade" id="tabs-seo" role="tabpanel">
                    <div class="form-group">
                        <label class="font-weight-600">Title (Tiêu đề SEO)</label>
                        <input type="text" name="title" class="form-control" value="<?=$item['title']?>" placeholder="Mặc định lấy theo tên...">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-600">Keywords (Từ khóa)</label>
                        <textarea name="keywords" class="form-control" rows="3" placeholder="Từ khóa cách nhau bởi dấu phẩy"><?=$item['keywords']?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-600">Description (Mô tả SEO)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Mô tả ngắn gọn nội dung..."><?=$item['description']?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Hàm tạo Slug tự động (Vanilla JS)
    function changeTitle(ele){
        var title = ele.value;
        var slug = title.toLowerCase();
        
        // Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        
        // Xóa các ký tự đặc biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        
        // Đổi khoảng trắng thành gạch ngang
        slug = slug.replace(/ /gi, "-");
        
        // Đổi nhiều gạch ngang liên tiếp thành 1 gạch ngang
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        
        // Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        
        // Cập nhật vào ô input
        document.getElementById('ten_khong_dau').value = slug;
    }
</script>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; transition: 0.3s; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.3); }
    .font-weight-600 { font-weight: 600; font-size: 0.9rem; color: #444; }
    .cursor-pointer { cursor: pointer; }
</style>