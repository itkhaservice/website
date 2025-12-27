<div class="row mb-4 align-items-center">
    <div class="col-md-6 col-sm-12">
        <h1 class="m-0 text-dark text-center text-md-left" style="font-size: 1.6rem; font-weight: 800; color: #1e293b !important; letter-spacing: -0.5px;"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 col-sm-12 text-center text-md-right mt-3 mt-md-0">
        <a href="index.php?com=photo&act=add&type=<?=$type?>" class="btn btn-sm btn-save shadow-sm mr-2 px-3 py-2"><i class="fas fa-plus-circle mr-1"></i> Thêm mới</a>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; background: #fff;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                        <?php if(strpos($type, 'banner') === false){ ?>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-800 small text-muted py-3">STT</th>
                        <?php } ?>
                        <th style="width: 150px" class="text-center text-uppercase font-weight-800 small text-muted">Hình ảnh</th>
                        <?php if($type == 'doi-tac' || $type == 'slideshow'){ ?>
                        <th class="text-uppercase font-weight-800 small text-muted">Tên <?=$type=='doi-tac'?'đối tác - khách hàng':'slideshow'?></th>
                        <?php } ?>
                        <th style="width: 150px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Hiển thị</th>
                        <th style="width: 150px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="sortable-list" data-table="photo">
                    <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                    <tr data-id="<?=$v['id']?>" class="align-middle">
                        <?php if(strpos($type, 'banner') === false){ ?>
                        <td class="text-center">
                            <input type="number" class="form-control form-control-sm text-center update-stt mx-auto border-0 bg-light font-weight-bold" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="photo" style="width: 50px; border-radius: 6px;">
                        </td>
                        <?php } ?>
                        <td class="text-center py-3">
                            <?php $img_src = ($v['photo'] != '' && file_exists('../'.$v['photo'])) ? '../'.$v['photo'] : 'https://placehold.co/150x80/ebebeb/666666?text=No+Image'; ?>
                            <img src="<?=$img_src?>" class="rounded shadow-sm border" style="max-height: 50px; max-width: 120px; object-fit:contain;">
                        </td>
                        <?php if($type == 'doi-tac' || $type == 'slideshow'){ ?>
                        <td class="py-3">
                            <div class="font-weight-bold text-dark" style="font-size: 0.95rem;"><?=($v['ten_vi']!='')?$v['ten_vi']:'---'?></div>
                            <?php if($v['link']!=''){ ?>
                                <div class="text-muted small mt-1"><i class="fas fa-link mr-1"></i> <?=$v['link']?></div>
                            <?php } ?>
                        </td>
                        <?php } ?>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch custom-switch-md">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="photo" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group shadow-xs rounded">
                                <a href="index.php?com=photo&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-primary border-right" title="Sửa nội dung"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=photo&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa mục này"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="10" class="text-center py-5 text-muted">Chưa có dữ liệu nào trong danh sách này.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3 px-4">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center small">
                <span class="text-muted mr-3">Hiển thị <strong><?=$paging['per_page']?></strong> mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
            </div>
            <div class="col-md-6 text-right">
                <nav class="d-inline-block">
                    <ul class="pagination pagination-sm m-0">
                        <?php if($paging['current'] > 1) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle mr-1" href="index.php?com=photo&act=man&type=<?=$type?>&p=<?=$paging['current']-1?>"><i class="fas fa-chevron-left small"></i></a></li>
                        <?php } ?>
                        <?php for($i=1; $i<=$paging['last']; $i++) { 
                            if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link border-0 rounded-circle mx-1" href="index.php?com=photo&act=man&type=<?=$type?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                        <?php if($paging['current'] < $paging['last']) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle ml-1" href="index.php?com=photo&act=man&type=<?=$type?>&p=<?=$paging['current']+1?>"><i class="fas fa-chevron-right small"></i></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-save { background-color: #108042; color: #fff; border: none; font-weight: 600; border-radius: 8px; }
    .btn-save:hover { background-color: #0d6a36; color: #fff; box-shadow: 0 4px 12px rgba(16, 128, 66, 0.2); }
    .bg-light { background-color: #f1f5f9 !important; }
    .font-weight-800 { font-weight: 800; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; }
    .pagination .page-link { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; color: #64748b; font-weight: 600; }
    .pagination .page-item.active .page-link { background: #108042 !important; color: #fff !important; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.2); }
</style>