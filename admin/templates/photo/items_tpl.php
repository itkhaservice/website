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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách</h3>
                <div class="card-tools">
                    <a href="index.php?com=photo&act=add&type=<?=$type?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Thêm mới</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 80px" class="text-center align-middle">STT</th>
                            <th class="text-center align-middle">Hình ảnh</th>
                            <th style="width: 150px" class="text-center align-middle">Trạng thái</th>
                            <th style="width: 150px" class="text-center align-middle">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                        <tr>
                            <td class="text-center align-middle">
                                <input type="number" class="form-control form-control-sm text-center update-stt mx-auto shadow-sm" value="<?=$v['stt']?>" data-id="<?=$v['id']?>" data-table="photo" style="width: 60px; border-radius: 5px;">
                            </td>
                            <td class="text-center align-middle py-3">
                                <?php if($v['photo']!=''){ ?>
                                <div class="position-relative d-inline-block">
                                    <img src="../<?=$v['photo']?>" style="max-height: 100px; max-width: 300px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                </div>
                                <?php } else { echo '<span class="text-muted italic small">Chưa có hình ảnh</span>'; } ?>
                            </td>
                            <td class="text-center align-middle">
                                <div class="custom-control custom-switch custom-switch-lg">
                                    <input type="checkbox" class="custom-control-input <?=strpos($type, 'banner') !== false ? 'checkbox-hienthi-banner' : 'checkbox-hienthi'?>" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="photo" data-type="<?=$type?>" <?=($v['hienthi']==1)?'checked':''?>>
                                    <label class="custom-control-label cursor-pointer" for="hienthi-<?=$v['id']?>"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                    <a href="index.php?com=photo&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-info border-right" title="Thay thế ảnh"><i class="fas fa-edit"></i></a>
                                    <a href="index.php?com=photo&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php }} else { ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" style="width: 64px; opacity: 0.3; margin-bottom: 15px;">
                                <p class="text-muted">Chưa có hình ảnh nào được tải lên.</p>
                                <a href="index.php?com=photo&act=add&type=<?=$type?>" class="btn btn-primary btn-sm px-4">Thêm ngay</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>