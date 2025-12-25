<div class="row mb-3">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark" style="font-size: 1.5rem; font-weight: 700;">Danh sách Liên hệ - Đăng ký</h1>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover table-striped">
            <thead class="bg-light">
                <tr>
                    <th style="width: 50px" class="text-center">STT</th>
                    <th>Họ tên</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th class="text-center">Ngày gửi</th>
                    <th style="width: 80px" class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($items)) { foreach($items as $k=>$v){ ?>
                <tr>
                    <td class="text-center text-muted"><?=$k+1?></td>
                    <td><span class="font-weight-bold text-dark"><?=$v['ten']?></span></td>
                    <td><?=$v['dienthoai']?></td>
                    <td><?=$v['email']?></td>
                    <td><small><?=$v['noidung']?></small></td>
                    <td class="text-center text-sm"><?=date('d/m/Y H:i', $v['ngaytao'])?></td>
                    <td class="text-center">
                        <a href="index.php?com=contact&act=delete&id=<?=$v['id']?>" onClick="if(!confirm('Xác nhận xóa?')) return false;" class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php }} else { ?>
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">Chưa có liên hệ nào.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>