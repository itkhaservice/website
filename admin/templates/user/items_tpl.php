<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Quản lý Tài khoản</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="index.php?com=user&act=add" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Danh sách Admin</h3>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th style="width: 50px;" class="text-center">STT</th>
              <th>Tài khoản</th>
              <th>Họ tên</th>
              <th>Email</th>
              <th style="width: 150px;" class="text-center">Quyền hạn</th>
              <th style="width: 100px;" class="text-center">Trạng thái</th>
              <th style="width: 100px;" class="text-center">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0, $count=count($items); $i<$count; $i++){ ?>
            <tr>
              <td class="text-center"><?=$i+1?></td>
              <td><span class="font-weight-bold text-primary"><?=$items[$i]['username']?></span></td>
              <td><?=$items[$i]['ten']?></td>
              <td><?=$items[$i]['email']?></td>
              <td class="text-center">
                  <?php if($items[$i]['role'] == 3) echo '<span class="badge badge-danger">Super Admin</span>'; 
                        else echo '<span class="badge badge-info">Admin</span>'; ?>
              </td>
              <td class="text-center">
                <?php if($items[$i]['hienthi']==1) { ?>
                  <a href="index.php?com=user&act=man&hienthi=<?=$items[$i]['id']?>"><i class="fas fa-check-circle text-success"></i></a>
                <?php } else { ?>
                  <a href="index.php?com=user&act=man&hienthi=<?=$items[$i]['id']?>"><i class="fas fa-times-circle text-danger"></i></a>
                <?php } ?>
              </td>
              <td class="text-center">
                <a href="index.php?com=user&act=edit&id=<?=$items[$i]['id']?>" class="btn btn-sm btn-info" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                <?php if($items[$i]['id'] != 1 && $items[$i]['id'] != $_SESSION['login']['id']) { ?>
                    <a href="index.php?com=user&act=delete&id=<?=$items[$i]['id']?>" onClick="return confirm('Bạn có chắc muốn xóa?');" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                <?php } ?>
              </td>
            </tr>
            <?php } ?>
            <?php if(count($items) == 0) { ?>
                <tr><td colspan="7" class="text-center">Chưa có dữ liệu</td></tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>