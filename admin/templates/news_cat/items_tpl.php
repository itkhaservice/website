<div class="row mb-3">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Quản lý <?=$title_main?></h1>
    </div>
    <div class="col-sm-6 text-right">
        <a href="index.php?com=news_cat&act=add&type=<?=$type?>" class="btn btn-primary shadow-sm"><i class="fas fa-plus mr-1"></i> Thêm mới</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead class="bg-light">
                <tr>
                    <th style="width: 50px" class="text-center">STT</th>
                    <th>Tên <?=$title_main?></th>
                    <th style="width: 120px" class="text-center">Hiển thị</th>
                    <th style="width: 120px" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                <tr>
                    <td class="text-center"><?=$v['stt']?></td>
                    <td><span class="font-weight-bold text-dark"><?=$v['ten_vi']?></span></td>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="news_cat" <?=($v['hienthi']==1)?'checked':''?>>
                            <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="index.php?com=news_cat&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-light text-primary mr-1"><i class="fas fa-edit"></i></a>
                        <a href="index.php?com=news_cat&act=delete&type=<?=$type?>&id=<?=$v['id']?>" onClick="if(!confirm('Xác nhận xóa?')) return false;" class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="4" class="text-center py-4">Chưa có dữ liệu.</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>