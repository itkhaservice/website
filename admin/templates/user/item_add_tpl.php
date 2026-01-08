<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?=($_GET['act']=='edit') ? 'Cập nhật' : 'Thêm mới'?> Tài khoản</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?com=user&act=man">Danh sách</a></li>
          <li class="breadcrumb-item active"><?=($_GET['act']=='edit') ? 'Cập nhật' : 'Thêm mới'?></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
    <form method="post" action="index.php?com=user&act=save" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=@$item['id']?>" />
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin đăng nhập</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tài khoản (Username) <span class="text-danger">*</span></label>
                            <input type="text" name="username" value="<?=@$item['username']?>" class="form-control" required <?=($_GET['act']=='edit') ? 'readonly' : ''?> placeholder="Nhập tên đăng nhập không dấu">
                        </div>
                        
                        <div class="form-group">
                            <label>Mật khẩu <?=($_GET['act']=='edit') ? '(Để trống nếu không đổi)' : '<span class="text-danger">*</span>'?></label>
                            <input type="password" name="password" class="form-control" <?=($_GET['act']=='add') ? 'required' : ''?> placeholder="Nhập mật khẩu">
                            <?php if($_GET['act']=='edit') { ?>
                                <small class="form-text text-muted">Nhập mật khẩu mới nếu bạn muốn thay đổi, ngược lại hãy để trống.</small>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Quyền hạn</label>
                            <select name="role" class="form-control">
                                <option value="1" <?=($item['role']==1)?'selected':''?>>Nhân viên (Xem đơn hàng)</option>
                                <option value="2" <?=($item['role']==2)?'selected':''?>>Quản lý (Sửa nội dung)</option>
                                <option value="3" <?=($item['role']==3)?'selected':''?>>Super Admin (Toàn quyền)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin cá nhân</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="ten" value="<?=@$item['ten']?>" class="form-control" placeholder="Nhập họ tên hiển thị">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?=@$item['email']?>" class="form-control" placeholder="example@khaservice.com">
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="hienthi" id="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                                <label class="custom-control-label" for="hienthi">Cho phép hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-center bg-white border-top-0">
            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save mr-2"></i>Lưu lại</button>
            <a href="index.php?com=user&act=man" class="btn btn-secondary"><i class="fas fa-times mr-2"></i>Thoát</a>
        </div>
    </form>
</section>