<div class="row mb-3 align-items-center">
    <div class="col-md-6 col-sm-12">
        <h1 class="m-0 text-dark text-center text-md-left" style="font-size: 1.25rem; font-weight: 700; color: #1e293b !important;"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 col-sm-12 text-center text-md-right mt-2 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-sm btn-primary shadow-sm mr-1 px-3"><i class="fas fa-plus mr-1" style="font-size: 11px;"></i> Thêm mới</a>
        <a href="#" id="delete-all" class="btn btn-sm btn-outline-danger shadow-sm px-3"><i class="fas fa-trash-alt mr-1" style="font-size: 11px;"></i> Xóa <span id="selected-count" class="badge badge-danger ml-1 d-none">0</span></a>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 text-sm">
                <thead class="bg-light" style="background-color: #f8fafc !important;">
                    <tr>
                        <th style="width: 40px" class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label class="custom-control-label" for="select-all"></label>
                            </div>
                        </th>
                        <th style="width: 40px" class="text-center"><i class="fas fa-arrows-alt text-muted" style="font-size: 11px;"></i></th>
                        <th style="width: 60px" class="text-center">STT</th>
                        <th>Tiêu đề</th>
                        <th style="width: 80px" class="text-center border-left">Hiện</th>
                        <th style="width: 100px" class="text-center border-left">Sửa/Xóa</th>
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
                            <i class="fas fa-ellipsis-v" style="font-size: 10px;"></i>
                        </td>
                        <td class="text-center">
                            <input type="number" class="form-control form-control-sm text-center update-stt mx-auto" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px; height: 25px; font-size: 12px;">
                        </td>
                        <td>
                            <div class="font-weight-600 text-dark"><?=$v['ten_vi']?></div>
                        </td>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group">
                                <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-xs btn-light text-primary border" title="Sửa"><i class="fas fa-pencil-alt"></i></a>
                                <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-xs btn-light text-danger border btn-delete-item" title="Xóa"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="6" class="text-center py-4 text-muted small">Chưa có dữ liệu.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .cursor-move { cursor: move; }
    .ui-sortable-helper { background: #fff !important; box-shadow: 0 5px 15px rgba(0,0,0,0.1); display: table !important; }
    .table thead th { border-bottom: none !important; font-size: 11px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
    .table td { vertical-align: middle; padding: 0.75rem 0.75rem; border-top: 1px solid #f1f5f9; }
    .btn-group .btn { padding: 4px 8px; }
</style>