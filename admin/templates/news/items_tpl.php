<div class="row mb-4 align-items-center">
    <div class="col-md-6 col-sm-12">
        <h1 class="m-0 text-dark text-center text-md-left" style="font-size: 1.6rem; font-weight: 800; color: #1e293b !important; letter-spacing: -0.5px;"><?=$title_main?></h1>
    </div>
    <div class="col-md-6 col-sm-12 text-center text-md-right mt-3 mt-md-0">
        <a href="index.php?com=<?=$com?>&act=add&type=<?=$type?>" class="btn btn-sm btn-save shadow-sm mr-2 px-3 py-2"><i class="fas fa-plus-circle mr-1"></i> Thêm mới</a>
        <a href="#" id="delete-all" class="btn btn-sm btn-outline-danger shadow-sm px-3 py-2 border-0 bg-white"><i class="fas fa-trash-alt mr-1"></i> Xóa mục chọn <span id="selected-count" class="badge badge-danger ml-1 d-none">0</span></a>
    </div>
</div>

<?php 
$show_filters = in_array($com, ['du-an', 'news', 'staff', 'thuvien', 'dichvu', 'themanh', 'giatri', 'feedback', 'appdancu']);
if($show_filters) { 
?>
<div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px; background: #fff;">
    <div class="card-body py-3 px-4">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-2 col-md-4 mb-2 mb-lg-0">
                <div class="search-group d-flex align-items-center bg-light rounded-pill px-3 py-1" style="height: 42px;">
                    <i class="fas fa-search text-muted mr-2"></i>
                    <input type="text" id="keyword" class="form-control border-0 bg-transparent shadow-none" placeholder="Tìm kiếm..." value="<?=isset($_GET['keyword'])?$_GET['keyword']:''?>" style="font-size: 13px;">
                </div>
            </div>
            
            <?php if($com == 'du-an') { ?>
            <div class="col-lg-2 col-md-4 mb-2 mb-lg-0">
                <select id="id_khuvuc" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none custom-select-filter" onchange="onSearch()">
                    <option value="0">-- Khu vực --</option>
                    <?php if(!empty($regions)) { foreach($regions as $r) { ?>
                        <option value="<?=$r['id']?>" <?=($_GET['id_khuvuc']==$r['id'])?'selected':''?>><?=$r['ten_vi']?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php } ?>

            <?php if($type == 'tin-tuc' || $type == 'thuvien-anh') { ?>
            <div class="col-lg-2 col-md-4 mb-2 mb-lg-0">
                <select id="id_cat" class="form-control form-control-sm border-0 bg-light rounded-pill px-3 shadow-none custom-select-filter" onchange="onSearch()">
                    <option value="0">-- Danh mục --</option>
                    <?php if(!empty($categories)) { foreach($categories as $c) { ?>
                        <option value="<?=$c['id']?>" <?=($_GET['id_cat']==$c['id'])?'selected':''?>><?=$c['ten_vi']?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php } ?>

            <div class="col-lg-4 col-md-8 mb-2 mb-lg-0">
                <div class="d-flex align-items-center bg-light rounded-pill px-3 py-1" style="height: 42px;">
                    <span class="text-muted small mr-2 font-weight-bold">Từ:</span>
                    <input type="date" id="tungay" class="form-control form-control-sm border-0 bg-transparent shadow-none px-1" value="<?=isset($_GET['tungay'])?$_GET['tungay']:''?>" style="font-size: 12px;">
                    <span class="text-muted small mx-2 font-weight-bold">Đến:</span>
                    <input type="date" id="denngay" class="form-control form-control-sm border-0 bg-transparent shadow-none px-1" value="<?=isset($_GET['denngay'])?$_GET['denngay']:''?>" style="font-size: 12px;">
                </div>
            </div>

            <div class="col-lg-2 col-md-4 d-flex align-items-center justify-content-lg-end justify-content-center">
                <button class="btn btn-sm btn-dark px-4 rounded-pill shadow-sm" type="button" onclick="onSearch()" style="background: #1e293b; height: 42px;"><i class="fas fa-filter mr-1"></i> Lọc</button>
                <?php if(isset($_GET['keyword']) || isset($_GET['id_khuvuc']) || isset($_GET['id_cat']) || isset($_GET['tungay'])) { ?>
                    <a href="index.php?com=<?=$com?>&act=man&type=<?=$type?>" class="btn btn-sm text-danger font-weight-bold ml-2" title="Xóa lọc"><i class="fas fa-sync-alt"></i></a>
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
        var tungay = document.getElementById('tungay').value;
        var denngay = document.getElementById('denngay').value;
        var url = "index.php?com=<?=$com?>&act=man&type=<?=$type?>";
        if(keyword != '') url += "&keyword=" + encodeURIComponent(keyword);
        if(id_khuvuc > 0) url += "&id_khuvuc=" + id_khuvuc;
        if(id_cat > 0) url += "&id_cat=" + id_cat;
        if(tungay != '') url += "&tungay=" + tungay;
        if(denngay != '') url += "&denngay=" + denngay;
        window.location.href = url;
    }
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
                                <input type="checkbox" class="custom-control-input cursor-pointer" id="select-all">
                                <label class="custom-control-label cursor-pointer" for="select-all"></label>
                            </div>
                        </th>
                        <th style="width: 40px" class="text-center"></th>
                        <th style="width: 80px" class="text-center text-uppercase font-weight-bold small text-muted">STT</th>
                        <?php if($com != 'giatri' && $type != 'gioi-thieu') { ?>
                            <th style="width: 100px" class="text-center text-uppercase font-weight-bold small text-muted">Hình ảnh</th>
                        <?php } ?>
                        <th class="text-uppercase font-weight-bold small text-muted">Thông tin bài viết</th>
                        
                        <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                            <th style="width: 100px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Nổi bật</th>
                        <?php } ?>
                        
                        <th style="width: 100px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Hiển thị</th>
                        <th style="width: 120px" class="text-center text-uppercase font-weight-bold small text-muted border-left">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="sortable-list" data-table="<?=$table_db?>">
                    <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                    <tr data-id="<?=$v['id']?>" class="ui-sortable-handle align-middle">
                        <td class="text-center py-3">
                            <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input select-item cursor-pointer" id="select-<?=$v['id']?>" value="<?=$v['id']?>">
                                <label class="custom-control-label cursor-pointer" for="select-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center cursor-move text-muted">
                            <i class="fas fa-grip-vertical opacity-25"></i>
                        </td>
                        <td class="text-center">
                            <input type="number" class="form-control form-control-sm text-center update-stt mx-auto border-0 bg-light" value="<?=($v['stt']!='')?$v['stt']:0?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" style="width: 50px; border-radius: 8px; font-weight: 600;">
                        </td>
                        <?php if($com != 'giatri' && $type != 'gioi-thieu') { ?>
                        <td class="text-center">
                            <img src="../<?=$v['photo']?>" class="rounded shadow-sm border" width="55" height="40" style="object-fit:cover;" onerror="this.src='https://placehold.co/100x100?text=No+Image'">
                        </td>
                        <?php } ?>
                        <td class="py-3">
                            <div class="font-weight-bold text-dark mb-1" style="font-size: 0.95rem;"><?=$v['ten_vi']?></div>
                            <div class="text-muted small">
                                <?php if($com == 'news' && $type == 'tin-tuc') { ?>
                                    <span class="mr-3"><i class="far fa-calendar-check mr-1"></i> Cập nhật: <?=($v['ngaysua'] > 0) ? date('d/m/Y H:i', $v['ngaysua']) : date('d/m/Y H:i', $v['ngaytao'])?></span>
                                    <span><i class="far fa-calendar-alt mr-1"></i> Đăng bài: <?=date('d/m/Y H:i', $v['ngaytao'])?></span>
                                <?php } else { ?>
                                    <i class="far fa-calendar-alt mr-1"></i> <?=date('d/m/Y H:i', ($v['ngaysua']>0?$v['ngaysua']:$v['ngaytao']))?>
                                <?php } ?>
                            </div>
                        </td>
                        
                        <?php if($com=='du-an' || ($com=='news' && $type=='tin-tuc') || $com=='dichvu') { ?>
                        <td class="text-center border-left">
                            <div class="custom-control custom-switch custom-switch-md">
                                <input type="checkbox" class="custom-control-input checkbox-noibat cursor-pointer" id="noibat-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['noibat']==1)?'checked':''?>>
                                <label class="custom-control-label cursor-pointer" for="noibat-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <?php } ?>

                        <td class="text-center border-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-hienthi cursor-pointer" id="hienthi-<?=$v['id']?>" data-id="<?=$v['id']?>" data-table="<?=$table_db?>" <?=($v['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label cursor-pointer" for="hienthi-<?=$v['id']?>"></label>
                            </div>
                        </td>
                        <td class="text-center border-left">
                            <div class="btn-group shadow-xs rounded">
                                <a href="index.php?com=<?=$com?>&act=edit&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-primary border-right" title="Sửa"><i class="fas fa-edit"></i></a>
                                <a href="index.php?com=<?=$com?>&act=delete&type=<?=$type?>&id=<?=$v['id']?>" class="btn btn-sm btn-white text-danger btn-delete-item" title="Xóa"><i class="fas fa-trash-alt"></i></a>
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
    .btn-save { background: #108042; color: #fff; border: none; font-weight: 600; border-radius: 8px; transition: all 0.3s ease; }
    .btn-save:hover { background: #0d6a36; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(16, 128, 66, 0.2); color: #fff; text-decoration: none; }
    .card { border-radius: 16px !important; border: none !important; box-shadow: 0 10px 30px rgba(0,0,0,0.04) !important; }
    .table thead th { background: #f8fafc; color: #64748b; font-size: 11px; letter-spacing: 1px; border-top: none; padding: 15px; border-bottom: 1px solid #f1f5f9; }
    .table tbody td { vertical-align: middle !important; padding: 18px 15px; border-top: 1px solid #f1f5f9; }
    .table tbody tr:hover { background-color: #f8fafc !important; }
    .cursor-move { cursor: grab; }
    .btn-white { background: #fff; border: 1px solid #f1f5f9; }
    .btn-white:hover { background: #f8fafc; color: #108042; }
    .search-group { border: 1px solid transparent; transition: 0.3s; }
    .search-group:focus-within { background: #fff !important; border-color: #108042; box-shadow: 0 0 0 3px rgba(16, 128, 66, 0.1); }
    .custom-select-filter { height: 42px !important; font-size: 13px !important; cursor: pointer; }
</style>

<script>
    $(document).ready(function() {
        // Chọn tất cả
        $(document).on('change', '#select-all', function() {
            var status = $(this).is(':checked');
            $('.select-item').prop('checked', status);
            updateSelectedCount();
        });

        // Chọn từng mục
        $(document).on('change', '.select-item', function() {
            updateSelectedCount();
            $('#select-all').prop('checked', $('.select-item:checked').length === $('.select-item').length);
        });

        function updateSelectedCount() {
            var count = $('.select-item:checked').length;
            if(count > 0) {
                $('#selected-count').text(count).removeClass('d-none');
                $('#delete-all').removeClass('btn-outline-danger bg-white border-0').addClass('btn-danger text-white shadow-sm');
            } else {
                $('#selected-count').addClass('d-none');
                $('#delete-all').addClass('btn-outline-danger bg-white border-0').removeClass('btn-danger text-white shadow-sm');
            }
        }

        // Xóa nhiều mục
        $('#delete-all').on('click', function(e) {
            e.preventDefault();
            var listid = "";
            $('.select-item:checked').each(function() { listid += $(this).val() + ","; });
            listid = listid.slice(0, -1);
            
            if(listid == "") {
                Swal.fire({ icon: 'info', title: 'Thông báo', text: 'Bạn chưa chọn mục nào để xóa!', confirmButtonColor: '#108042' });
                return false;
            }

            Swal.fire({
                title: 'Xác nhận xóa?',
                text: "Dữ liệu sau khi xóa sẽ không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#108042',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý, xóa ngay!',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=" + listid;
                }
            });
        });

        // Cập nhật STT nhanh
        $(document).on('change', '.update-stt', function() {
            var id = $(this).data('id');
            var table = $(this).data('table');
            var value = $(this).val();
            $.ajax({
                url: 'ajax/ajax_update.php',
                type: 'POST',
                data: {id: id, table: table, value: value, field: 'stt'},
                success: function(res) {
                    if(res == 1) toastr.success('Đã cập nhật số thứ tự');
                    else toastr.error('Lỗi cập nhật');
                }
            });
        });

        // Cập nhật Hiển thị/Nổi bật nhanh
        $(document).on('change', '.checkbox-hienthi, .checkbox-noibat', function() {
            var id = $(this).data('id');
            var table = $(this).data('table');
            var field = $(this).hasClass('checkbox-hienthi') ? 'hienthi' : 'noibat';
            var value = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: 'ajax/ajax_update.php',
                type: 'POST',
                data: {id: id, table: table, value: value, field: field},
                success: function(res) {
                    if(res == 1) toastr.success('Đã cập nhật trạng thái');
                    else toastr.error('Lỗi cập nhật');
                }
            });
        });
    });
</script>