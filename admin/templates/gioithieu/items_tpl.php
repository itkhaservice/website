<div class="row mb-3 align-items-center">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;"><?=$title_main?></h1>
    </div>
    <div class="col-sm-6 text-right">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-primary shadow-sm mr-2"><i class="fas fa-plus mr-1"></i> Thêm mới</a>
        <a href="#" id="delete-all" class="btn btn-danger shadow-sm"><i class="fas fa-trash-alt mr-1"></i> Xóa mục đã chọn</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-striped mb-0 text-sm">
            <thead class="bg-light text-dark">
                <tr>
                    <th style="width: 40px" class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all"></label>
                        </div>
                    </th>
                    <th style="width: 40px" class="text-center"><i class="fas fa-arrows-alt text-muted"></i></th>
                    <th style="width: 80px" class="text-center">STT</th>
                    <th style="width: 80px" class="text-center">Ảnh</th>
                    <th>Tiêu đề</th>
                    <th style="width: 100px" class="text-center">Hiển thị</th>
                    <th style="width: 120px" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody id="sortable-list" data-table="<?=$table_db?>">
                <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                <tr data-id="<?=$v['id']?>" class="ui-sortable-handle">
                    <td class="text-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input select-item" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                            <label class="custom-control-label" for="select-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center cursor-move text-muted">
                        <i class="fas fa-grip-vertical"></i>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center update-stt font-weight-bold" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 60px; margin: auto;">
                    </td>
                    <td class="text-center">
                        <?php 
                            $img_src = ($v['photo'] != '') ? '../'.$v['photo'] : 'https://placehold.co/50x50?text=No+Image';
                        ?>
                        <img src="<?=$img_src?>" class="rounded border" width="50" height="40" style="object-fit:cover;">
                    </td>
                    <td>
                        <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="text-dark font-weight-bold"><?=$v['ten_vi']?></a>
                        <div class="text-xs text-muted">Slug: <?=$v['ten_khong_dau']?></div>
                    </td>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                            <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-light text-primary mr-2 shadow-sm" title="Sửa"><i class="fas fa-edit"></i></a>
                            <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-light text-danger btn-delete-item shadow-sm" title="Xóa"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php }} else { ?>
                <tr><td colspan="7" class="text-center py-4 text-muted">Chưa có dữ liệu Giới thiệu.</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white border-top py-3">
        <div class="row align-items-center">
            <div class="col-sm-7 d-flex align-items-center mb-3 mb-sm-0 justify-content-center justify-content-sm-start">
                <span class="mr-2 text-muted text-sm">Hiển thị</span>
                <select class="form-control form-control-sm border-secondary shadow-xs" style="width: 70px;" onchange="window.location.href='index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=' + this.value;">
                    <option value="5" <?=($perPage==5)?'selected':''?>>5</option>
                    <option value="10" <?=($perPage==10)?'selected':''?>>10</option>
                    <option value="15" <?=($perPage==15)?'selected':''?>>15</option>
                    <option value="20" <?=($perPage==20)?'selected':''?>>20</option>
                    <option value="25" <?=($perPage==25)?'selected':''?>>25</option>
                    <option value="50" <?=($perPage==50)?'selected':''?>>50</option>
                    <option value="100" <?=($perPage==100)?'selected':''?>>100</option>
                </select>
                <span class="ml-2 text-muted text-sm">dòng / trang (Tổng: <?=$paging['total']?>)</span>
            </div>
            <div class="col-sm-5 text-center text-sm-right">
                <nav class="d-inline-block">
                    <ul class="pagination pagination-sm m-0 justify-content-center justify-content-sm-end">
                        <?php if($paging['current'] > 1) { ?>
                            <li class="page-item"><a class="page-link font-weight-bold" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=1">«</a></li>
                            <li class="page-item"><a class="page-link font-weight-bold" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']-1?>">‹</a></li>
                        <?php } ?>
                        
                        <?php 
                        $start = max(1, $paging['current'] - 2);
                        $end = min($paging['last'], $paging['current'] + 2);
                        for($i=$start; $i<=$end; $i++) { ?>
                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php } ?>

                        <?php if($paging['current'] < $paging['last']) { ?>
                            <li class="page-item"><a class="page-link font-weight-bold" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']+1?>">›</a></li>
                            <li class="page-item"><a class="page-link font-weight-bold" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['last']?>">»</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-move { cursor: move; }
    .ui-sortable-helper { background: #fff !important; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-radius: 8px; display: table !important; }
</style>