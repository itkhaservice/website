<div class="row mb-3">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Chi tiết <?=$title_main?></h1>
    </div>
</div>

<form method="post" action="index.php?com=news_cat&act=save&type=<?=$type?>">
    <input type="hidden" name="id" value="<?=$item['id']?>">
    <div class="card card-primary card-outline" style="max-width: 600px;">
        <div class="card-body">
            <div class="form-group">
                <label>Tên <?=$title_main?></label>
                <input type="text" name="ten_vi" class="form-control" value="<?=$item['ten_vi']?>" required>
            </div>
            <div class="form-group">
                <label>Số thứ tự</label>
                <input type="number" name="stt" class="form-control" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width: 100px;">
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                <label class="custom-control-label" for="hienthi">Hiển thị</label>
            </div>
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-primary shadow-sm px-4">Lưu lại</button>
            <a href="index.php?com=news_cat&act=man&type=<?=$type?>" class="btn btn-default float-right">Hủy</a>
        </div>
    </div>
</form>