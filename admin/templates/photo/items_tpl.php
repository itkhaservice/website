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
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px" class="text-center">STT</th>
                            <th style="width: 150px" class="text-center">Hình ảnh</th>
                            <th>Tên</th>
                            <th style="width: 100px" class="text-center">Hiển thị</th>
                            <th style="width: 100px" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                        <tr>
                            <td class="text-center"><?=$v['stt']?></td>
                            <td class="text-center">
                                <?php if($v['photo']!=''){ ?>
                                <img src="../<?=$v['photo']?>" width="100" style="object-fit:cover;">
                                <?php } ?>
                            </td>
                            <td>
                                <b><?=$v['ten_vi']?></b><br/>
                                <small><?=$v['link']?></small>
                            </td>
                            <td class="text-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="photo" <?=($v['hienthi']==1)?'checked':''?>>
                                    <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="index.php?com=photo&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=photo&act=delete&type=<?=$type?>&id=<?=$v['id']?>" onClick="if(!confirm('Xác nhận xóa?')) return false;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }} else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Chưa có dữ liệu</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>