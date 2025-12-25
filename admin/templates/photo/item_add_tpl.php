<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?=$title_main?></h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form method="post" action="index.php?com=photo&act=save&type=<?=$type?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$item['id']?>">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên hình ảnh</label>
                        <input type="text" name="ten_vi" class="form-control" value="<?=$item['ten_vi']?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Link liên kết</label>
                        <input type="text" name="link" class="form-control" value="<?=$item['link']?>">
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="file">
                                <label class="custom-file-label" for="file">Chọn file</label>
                            </div>
                        </div>
                        <?php if($item['photo']!=''){ ?>
                            <div class="mt-2">
                                <img src="../<?=$item['photo']?>" width="200">
                            </div>
                        <?php } ?>
                    </div>
                    
                    <?php if($type == 'slider'){ ?>
                    <div class="form-group">
                        <label>Mô tả (Dòng nhỏ trên Slider)</label>
                        <input type="text" name="mota_vi" class="form-control" value="<?=$item['mota_vi']?>">
                    </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Số thứ tự</label>
                        <input type="number" name="stt" class="form-control" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:100px">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="hienthi" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>> 
                            <label class="custom-control-label" for="hienthi">Hiển thị</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a href="index.php?com=photo&act=man&type=<?=$type?>" class="btn btn-default float-right">Thoát</a>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Custom file input label
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>