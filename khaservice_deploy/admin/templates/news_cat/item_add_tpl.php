<!-- Header -->
<form method="post" action="index.php?com=news_cat&act=save&type=<?=$type?>">
    <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Quản lý: <?=$title_main?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-save shadow-sm mr-2 px-4"><i class="fas fa-save mr-1"></i> Lưu dữ liệu</button>
            <a href="index.php?com=news_cat&act=man&type=<?=$type?>" class="btn btn-secondary shadow-sm px-4"><i class="fas fa-undo mr-1"></i> Hủy bỏ</a>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=$item['id']?>">
    
    <div class="card mb-4 shadow-sm border-0" style="max-width: 800px;">
        <div class="card-header bg-white font-weight-bold">Thông tin chi tiết</div>
        <div class="card-body">
            <div class="form-group">
                <label class="font-weight-600">Tên <?=$title_main?> <span class="text-danger">*</span></label>
                <input type="text" name="ten_vi" class="form-control shadow-none border" value="<?=$item['ten_vi']?>" required placeholder="Nhập tên...">
            </div>

            <div class="form-group">
                <label class="font-weight-600 text-sm">Số thứ tự (stt)</label>
                <input type="number" name="stt" class="form-control form-control-sm shadow-none border" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 100px;">
            </div>

            <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                <label class="custom-control-label font-weight-500 text-sm cursor-pointer" for="hienthi">Hiển thị (hienthi)</label>
            </div>
        </div>
    </div>
</form>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; transition: 0.3s; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.3); }
    .font-weight-600 { font-weight: 600; font-size: 0.9rem; color: #444; }
    .cursor-pointer { cursor: pointer; }
</style>