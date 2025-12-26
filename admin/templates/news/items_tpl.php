<div class="row mb-4 align-items-center">
    <div class="col-md-6 col-sm-12">
        <h1 class="m-0 text-dark text-center text-md-left" style="font-size: 1.6rem; font-weight: 800; color: #1e293b !important; letter-spacing: -0.5px;"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 col-sm-12 text-center text-md-right mt-3 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-sm btn-save shadow-sm mr-2 px-3 py-2"><i class="fas fa-plus-circle mr-1"></i> Thêm mới</a>
        <a href="#" id="delete-all" class="btn btn-sm btn-outline-danger shadow-sm px-3 py-2 border-0 bg-white"><i class="fas fa-trash-alt mr-1"></i> Xóa mục chọn <span id="selected-count" class="badge badge-danger ml-1 d-none">0</span></a>
    </div>
</div>

<?php if($com == 'du-an' || $com == 'news' || $com == 'staff' || $com == 'thuvien') { ?>
<div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px; background: #fff;">
    <div class="card-body py-3 px-4">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 mb-2 mb-md-0">
                <div class="input-group input-group-sm border-0 bg-light rounded-pill px-3 py-1">
                    <input type="text" id="keyword" class="form-control border-0 bg-transparent shadow-none" placeholder="Tìm kiếm tên bài viết..." value="<?=$_GET['keyword']?>">
                    <div class="input-group-append">
                        <span class="text-muted flex-center"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            
            <?php if($com == 'du-an') { ?>
            <div class="col-lg-3 col-md-4 mb-2 mb-md-0">
                <select id="id_khuvuc" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" onchange="onSearch()">
                    <option value="0">-- Tất cả khu vực --</option>
                    <?php if(!empty($regions)) { foreach($regions as $r) { ?>
                        <option value="<?=$r['id']?>" <?=($_GET['id_khuvuc']==$r['id'])?'selected':''?>><?=$r['ten_vi']?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php } ?>

            <?php if($type == 'tin-tuc' || $type == 'thuvien-anh') { ?>
            <div class="col-lg-3 col-md-4 mb-2 mb-md-0">
                <select id="id_cat" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" onchange="onSearch()">
                    <option value="0">-- Tất cả danh mục --</option>
                    <?php if(!empty($categories)) { foreach($categories as $c) { ?>
                        <option value="<?=$c['id']?>" <?=($_GET['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php } ?>

            <div class="col-lg-6 col-md-4 d-flex align-items-center justify-content-md-end">
                <button class="btn btn-sm btn-dark px-4 rounded-pill shadow-sm" type="button" onclick="onSearch()" style="background: #1e293b;"><i class="fas fa-filter mr-1"></i> Lọc dữ liệu</button>
                <?php if($_GET['keyword'] != '' || $_GET['id_khuvuc'] > 0 || $_GET['id_cat'] > 0) { ?>
                    <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-sm text-danger font-weight-bold ml-3" title="Xóa tất cả bộ lọc"><i class="fas fa-sync-alt mr-1"></i> Làm mới</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function onSearch() {
        var keyword = document.getElementById('keyword').value;
        var id_khuvuc = document.getElementById('id_khuvuc') ? document.getElementById('id_khuvuc').value : 0;
        var id_cat = document.getElementById('id_cat') ? document.getElementById('id_cat').value : 0;
        var url = "index.php?com=<?=$com?>&act=man&type=<?=$type?>";
        if(keyword != '') url += "&keyword=" + encodeURIComponent(keyword);
        if(id_khuvuc > 0) url += "&id_khuvuc=" + id_khuvuc;
        if(id_cat > 0) url += "&id_cat=" + id_cat;
        window.location.href = url;
    }
    document.getElementById('keyword').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') onSearch();
    });
</script>
<?php } ?>

<div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; background: #fff;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                        <th style="width: 50px" class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input" id="select-all">
                                <label class="custom-control-label" for="select-all"></label>
                            </div>
                        </th>
                        <th style="width: 40px" class="text-center"></th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-800 small text-muted">STT</th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-800 small text-muted">ID</th>
                        <?php if($com != 'giatri' && $type != 'gioi-thieu') { ?>
                            <th style="width: 100px" class="text-center text-uppercase font-weight-800 small text-muted">Hình ảnh</th>
                        <?php } ?>
                        <th class="text-uppercase font-weight-800 small text-muted">Thông tin nội dung</th>
                        <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                            <?php if($com=='du-an') echo '<th class="text-uppercase font-weight-800 small text-muted">Khu vực</th>'; ?>
                            <th style="width: 100px" class="text-center text-uppercase font-weight-800 small text-muted">Nổi bật</th>
                        <?php } ?>
                        <?php if($type=='tin-tuc') echo '<th class="text-uppercase font-weight-800 small text-muted">Danh mục</th>'; ?>
                        <?php if(in_array($com, ['staff', 'feedback'])){ ?>
                            <th class="text-uppercase font-weight-800 small text-muted">Vị trí / Chức vụ</th>
                        <?php } ?>
                        <?php if($com=='feedback'){ ?>
                            <th class="text-center text-uppercase font-weight-800 small text-muted">Đánh giá</th>
                        <?php } ?>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Hiển thị</th>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-800 small text-muted border-left">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="sortable-list" data-table="<?=$table_db?>">
                    <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                    <tr data-id="<?=$v['id']?>" class="ui-sortable-handle align-middle">
                        <td class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input select-item" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                                <label class="custom-control-label" for="select-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center cursor-move text-muted">
                            <i class="fas fa-grip-vertical opacity-20"></i>
                        </td>
                        <td class="text-center">
                            <input type="number" class="form-control form-control-sm text-center update-stt mx-auto border-0 bg-light font-weight-bold" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px; border-radius: 6px;">
                        </td>
                        <td class="text-center"><span class="badge badge-light px-2 py-1 text-muted border" style="font-weight: 500;">#<?=$v['id']?></span></td>
                        <?php if($com != 'giatri' && $type != 'gioi-thieu') { ?>
                        <td class="text-center">
                            <?php $img_src = ($v['photo'] != '' && file_exists('../'.$v['photo'])) ? '../'.$v['photo'] : 'https://placehold.co/100x100/ebebeb/666666?text=No+Image'; ?>
                            <img src="<?=$img_src?>" class="rounded shadow-sm border" width="55" height="40" style="object-fit:cover;">
                        </td>
                        <?php } ?>
                        <td class="py-3">
                            <div class="font-weight-bold text-dark mb-1" style="font-size: 0.95rem;"><?=$v['ten_vi']?></div>
                            <div class="text-muted small"><i class="far fa-calendar-alt mr-1"></i> <?=($v['ngaytao'] > 0) ? date('d/m/Y', $v['ngaytao']) : 'Chưa rõ'?></div>
                        </td>
                        <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu'){ 
                            if($com=='du-an') {
                                $region_name = $v['ten_khuvuc'];
                                if($region_name == '' && $v['id_khuvuc'] > 0){
                                    $d->reset(); $d->query("select ten_vi from #_khuvuc where id='".$v['id_khuvuc']."'");
                                    $tmp_r = $d->fetch_array(); $region_name = $tmp_r['ten_vi'];
                                }
                        ?>
                            <td>
                                <span class="small font-weight-bold text-primary bg-light-blue px-3 py-1 rounded-pill border">
                                    <?=($region_name!='') ? $region_name : '---'?>
                                </span>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                                <div class="custom-control custom-switch custom-switch-md">
                                    <input type="checkbox" class="custom-control-input checkbox-noibat" id="noibat-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['noibat']==1)?'checked':''?>>
                                    <label class="custom-control-label" for="noibat-<?=$v['id']?>"></label>
                                </div>
                            </td>
                        <?php } ?>
                        <?php if($type=='tin-tuc'){ ?>
                            <td><span class="small font-weight-bold text-dark bg-light px-3 py-1 rounded-pill border"><?=($v['ten_danhmuc']!='') ? $v['ten_danhmuc'] : '---'?></span></td>
                        <?php } ?>
                        <?php if(in_array($com, ['staff', 'feedback'])){ ?>
                            <td><span class="text-muted font-weight-500"><?=$v['chucvu']?></span></td>
                        <?php } ?>
                        <?php if($com=='feedback'){ ?>
                            <td class="text-center text-warning">
                                <?php for($i=1; $i<=5; $i++) { ?>
                                    <i class="<?=($i<=$v['rating'])?'fas':'far'?> fa-star small"></i>
                                <?php } ?>
                            </td>
                        <?php } ?>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group shadow-xs rounded">
                                <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-primary border-right" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa mục này"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan="12" class="text-center py-5 text-muted">Chưa có dữ liệu nào trong danh sách này.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3 px-4">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center small">
                <span class="text-muted mr-3">Hiển thị</span>
                <select class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none" style="width: 70px;" onchange="window.location.href='index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=' + this.value;">
                    <?php foreach([5, 10, 20, 50, 100] as $p) { ?>
                        <option value="<?=$p?>" <?=($perPage==$p)?'selected':''?>><?=$p?></option>
                    <?php } ?>
                </select>
                <span class="text-muted ml-3">mục trên trang. Tổng: <strong class="text-dark"><?=$paging['total']?></strong></span>
            </div>
            <div class="col-md-6 text-right">
                <nav class="d-inline-block">
                    <ul class="pagination pagination-sm m-0">
                        <?php if($paging['current'] > 1) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle mr-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']-1?>"><i class="fas fa-chevron-left small"></i></a></li>
                        <?php } ?>
                        <?php for($i=1; $i<=$paging['last']; $i++) { 
                            if($i == 1 || $i == $paging['last'] || ($i >= $paging['current'] - 1 && $i <= $paging['current'] + 1)) { ?>
                            <li class="page-item <?=($i==$paging['current'])?'active':''?>"><a class="page-link border-0 rounded-circle mx-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php } elseif($i == 2 || $i == $paging['last'] - 1) { echo '<li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>'; } } ?>
                        <?php if($paging['current'] < $paging['last']) { ?>
                            <li class="page-item"><a class="page-link border-0 rounded-circle ml-1" href="index.php?com=<?=$com?>&act=man&type=<?=$type?>&per_page=<?=$perPage?>&p=<?=$paging['current']+1?>"><i class="fas fa-chevron-right small"></i></a></li>
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
    .bg-light-blue { background-color: #f0f9ff !important; color: #0369a1 !important; border-color: #e0f2fe !important; }
    .cursor-move { cursor: grab; }
    .cursor-move:active { cursor: grabbing; }
    .ui-sortable-handle:hover { background-color: #fcfdfe !important; }
    .ui-sortable-helper { background: #fff !important; box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: table !important; }
    .bg-light { background-color: #f1f5f9 !important; }
    .font-weight-800 { font-weight: 800; }
    .opacity-20 { opacity: 0.2; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; }
    .pagination .page-link { width: 32px; height: 32px; flex-center; color: #64748b; font-weight: 600; }
    .pagination .page-item.active .page-link { background: #108042 !important; color: #fff !important; box-shadow: 0 4px 10px rgba(16, 128, 66, 0.2); }
    .flex-center { display: flex; align-items: center; justify-content: center; }
</style>