<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Nhật ký hoạt động</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <form action="index.php" method="get">
                    <input type="hidden" name="com" value="log">
                    <input type="hidden" name="act" value="man">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tài khoản, nội dung..." value="<?=$_GET['keyword']?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th style="width: 50px;" class="text-center">STT</th>
              <th style="width: 150px;">Thời gian</th>
              <th style="width: 120px;">Tài khoản</th>
              <th style="width: 120px;">Module</th>
              <th style="width: 100px;" class="text-center">Hành động</th>
              <th>Nội dung chi tiết</th>
              <th style="width: 120px;" class="text-center">IP</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0, $count=count($items); $i<$count; $i++){ ?>
            <tr>
              <td class="text-center"><?=$i+1?></td>
              <td><span class="text-muted small"><?=date('H:i:s d/m/Y', $items[$i]['ngaytao'])?></span></td>
              <td><span class="font-weight-bold"><?=$items[$i]['username']?></span></td>
              <td><span class="badge badge-secondary"><?=$items[$i]['module']?></span></td>
              <td class="text-center">
                  <?php 
                    $color = 'info';
                    if($items[$i]['hanhdong'] == 'Thêm mới') $color = 'success';
                    elseif($items[$i]['hanhdong'] == 'Xóa') $color = 'danger';
                    elseif($items[$i]['hanhdong'] == 'Cập nhật') $color = 'warning';
                  ?>
                  <span class="badge badge-<?=$color?>"><?=$items[$i]['hanhdong']?></span>
              </td>
              <td style="white-space: normal;"><?=htmlspecialchars($items[$i]['noidung'])?></td>
              <td class="text-center"><small class="text-muted"><?=$items[$i]['ip']?></small></td>
            </tr>
            <?php } ?>
            <?php if(count($items) == 0) { ?>
                <tr><td colspan="7" class="text-center">Chưa có dữ liệu nhật ký</td></tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      
      <?php if($paging['last'] > 1) { ?>
      <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
              <?php for($p=1; $p<=$paging['last']; $p++) { ?>
                <li class="page-item <?=($p==$paging['current'])?'active':''?>">
                    <a class="page-link" href="index.php?com=log&act=man&p=<?=$p?><?=(isset($_GET['keyword']))?'&keyword='.$_GET['keyword']:''?>"><?=$p?></a>
                </li>
              <?php } ?>
          </ul>
      </div>
      <?php } ?>
    </div>
  </div>
</section>