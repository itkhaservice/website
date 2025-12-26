<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Website</title>
    <link rel="shortcut icon" type="image/x-icon" href="../<?=($row_setting['logo']!='') ? $row_setting['logo'] : 'img/favicon.png'?>">
    <!-- AdminLTE & Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #108042; /* Màu xanh mới */
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #334155;
        }

        .main-header {
            border-bottom: 1px solid #e2e8f0;
            background: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .main-sidebar {
            background: #fff;
            box-shadow: 1px 0 10px rgba(0,0,0,0.05);
            border-right: 1px solid #e2e8f0;
            height: 100vh;
            overflow-y: hidden; /* AdminLTE tự xử lý scroll, nhưng ta sẽ override nếu cần */
        }
        /* Fix scrollbar cho sidebar */
        .sidebar {
            height: calc(100vh - 57px); /* Trừ đi height của header/brand */
            overflow-y: auto;
            scrollbar-width: thin; /* Firefox */
            padding-bottom: 100px; /* Thêm khoảng trống lớn ở dưới */
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.2);
            border-radius: 3px;
        }
        .brand-link {
            border-bottom: 1px solid #e2e8f0 !important;
            height: 57px; /* Cố định height để tính toán */
        }
        .nav-sidebar .nav-link {
            color: #475569;
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 4px;
        }
        .nav-sidebar .nav-link:hover {
            background-color: #f1f5f9;
            color: var(--primary);
        }
        .nav-sidebar .nav-link.active {
            background-color: var(--primary);
            color: #fff;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2), 0 2px 4px -1px rgba(79, 70, 229, 0.1);
        }
        .nav-sidebar .nav-icon {
            color: #94a3b8;
        }
        .nav-sidebar .nav-link.active .nav-icon {
            color: #fff;
        }
        .nav-header {
            color: #94a3b8;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .content-wrapper {
            background-color: #f3f4f6;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem;
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
        }
        .card-title {
            font-weight: 600;
            color: #1e293b;
        }
        
        .table thead th {
            border-top: none;
            border-bottom: 2px solid #e2e8f0;
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .table td {
            vertical-align: middle;
            color: #334155;
            border-top: 1px solid #f1f5f9;
        }
        
        .btn {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            box-shadow: none !important;
        }
        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #0d6b35 !important;
            border-color: #0d6b35 !important;
        }

        /* Outline buttons (Nút duyệt) */
        .btn-outline-primary {
            color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
        .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #fff !important;
        }
        
        .card-primary.card-outline {
            border-top: 3px solid var(--primary) !important;
        }
        .card-primary:not(.card-outline) > .card-header {
            background-color: var(--primary) !important;
        }
        
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: var(--primary) !important;
        }
        .nav-tabs .nav-link {
            color: #64748b;
        }
        .nav-tabs .nav-link:hover {
            color: var(--primary) !important;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: var(--primary) !important;
            border-bottom: 2px solid var(--primary) !important;
            background: transparent !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
        }
        
        .custom-control-input:checked ~ .custom-control-label::before {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .main-footer a {
            color: var(--primary) !important;
        }
        .main-footer a:hover {
            color: #0d6b35 !important;
            text-decoration: underline;
        }

        .text-primary {
            color: var(--primary) !important;
        }
        .bg-primary {
            background-color: var(--primary) !important;
        }

        /* Pagination & Footer Customization */
        .card-footer {
            border-bottom-left-radius: 12px !important;
            border-bottom-right-radius: 12px !important;
            padding: 1rem 1.25rem !important;
            background-color: #fff !important;
        }
        .pagination .page-item .page-link {
            border: 1px solid #e2e8f0;
            color: #64748b;
            margin: 0 2px;
            border-radius: 6px;
            padding: 0.4rem 0.8rem;
            transition: all 0.2s;
            font-size: 0.875rem;
        }
        .pagination .page-item .page-link:hover {
            background-color: #f1f5f9;
            color: var(--primary);
            border-color: var(--primary);
        }
        .pagination .page-item.active .page-link {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #fff !important;
            box-shadow: 0 4px 6px -1px rgba(16, 128, 66, 0.2);
        }
        .pagination .page-item.disabled .page-link {
            background-color: #f8fafc;
            color: #cbd5e1;
            border-color: #e2e8f0;
        }
        
        select.form-control-sm {
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            color: #334155;
            cursor: pointer;
        }
        select.form-control-sm:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(16, 128, 66, 0.1);
            outline: none;
        }
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: var(--primary);
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.6rem 1rem;
        }
        .form-control-sm {
            padding: 0.25rem 0.5rem !important;
            height: auto !important;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
    </style>
<style>
    .custom-switch-lg .custom-control-label::before {
        height: 1.5rem;
        width: 2.5rem;
        border-radius: 1rem;
    }
    .custom-switch-lg .custom-control-label::after {
        width: calc(1.5rem - 4px);
        height: calc(1.5rem - 4px);
        border-radius: 1rem;
    }
    .custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
        transform: translateX(1rem);
    }
    .custom-switch-lg .custom-control-label {
        padding-left: 3rem;
        padding-top: 0.25rem;
    }
    .cursor-pointer { cursor: pointer; }
    .btn-white { background: #fff; border: 1px solid #dee2e6; color: #495057; }
    .btn-white:hover { background: #f8f9fa; color: #212529; }
    .table thead th { border-top: none; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; color: #6c757d; }
    .card { border-radius: 12px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border: none; }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" target="_blank" class="nav-link">Xem website</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="user-panel d-flex align-items-center mr-3">
            <div class="image mr-2">
              <img src="https://ui-avatars.com/api/?name=<?=$_SESSION['login']['username']?>&background=random" class="img-circle elevation-1" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block text-dark font-weight-bold"><?=$_SESSION['login']['username']?></a>
            </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="index.php?com=logout" role="button" title="Đăng xuất">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-light-primary elevation-0">
    <a href="index.php" class="brand-link text-center">
      <span class="brand-text font-weight-bold text-primary" style="font-size: 1.2rem;">KHASERVICE <span style="font-weight:300; color:#333;">Admin</span></span>
    </a>

    <div class="sidebar mt-3">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="index.php?com=dashboard" class="nav-link <?=$com=='dashboard'?'active':''?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Tổng quan</p>
            </a>
          </li>
          
          <li class="nav-header mt-3">QUẢN LÝ KHÁCH HÀNG</li>
          <li class="nav-item">
            <a href="index.php?com=contact&act=man" class="nav-link <?=$com=='contact'?'active':''?>">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Liên hệ - Đăng ký</p>
            </a>
          </li>

          <li class="nav-header mt-3">TRANG TĨNH</li>
          <li class="nav-item">
            <a href="index.php?com=static&act=capnhat&type=ve-chung-toi" class="nav-link <?=$com=='static' && $_GET['type']=='ve-chung-toi'?'active':''?>">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>Về chúng tôi</p>
            </a>
          </li>
                            <li class="nav-item">
                                <a href="index.php?com=news&act=man&type=gioi-thieu" class="nav-link <?=$com=='news' && $_GET['type']=='gioi-thieu'?'active':''?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Giới thiệu</p>
                                </a>
                            </li>
          <li class="nav-item">
            <a href="index.php?com=themanh&act=man" class="nav-link <?=$com=='themanh'?'active':''?>">
              <i class="nav-icon fas fa-star"></i>
              <p>Thế mạnh</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?com=giatri&act=man" class="nav-link <?=$com=='giatri'?'active':''?>">
              <i class="nav-icon fas fa-gem"></i>
              <p>Giá trị cốt lõi</p>
            </a>
          </li>

          <li class="nav-header mt-3">BÀI VIẾT & DỊCH VỤ</li>
          <li class="nav-item">
            <a href="index.php?com=appdancu&act=man" class="nav-link <?=$com=='appdancu'?'active':''?>">
              <i class="nav-icon fas fa-mobile-alt"></i>
              <p>Ứng dụng cư dân</p>
            </a>
          </li>

          <li class="nav-item <?=($com=='news' && $_GET['type']=='tin-tuc' || ($com=='news_cat' && $_GET['type']=='tin-tuc'))?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='news' && $_GET['type']=='tin-tuc' || ($com=='news_cat' && $_GET['type']=='tin-tuc'))?'active':''?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Quản lý tin tức <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=news_cat&act=man&type=tin-tuc" class="nav-link <?=$com=='news_cat' && $_GET['type']=='tin-tuc'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=news&act=man&type=tin-tuc" class="nav-link <?=$com=='news' && $_GET['type']=='tin-tuc'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="index.php?com=dichvu&act=man" class="nav-link <?=$com=='dichvu'?'active':''?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Dịch vụ</p>
            </a>
          </li>

          <li class="nav-item <?=($com=='du-an' || ($com=='news_cat' && $_GET['type']=='du-an'))?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='du-an' || ($com=='news_cat' && $_GET['type']=='du-an'))?'active':''?>">
              <i class="nav-icon fas fa-building"></i>
              <p>Quản lý dự án <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=news_cat&act=man&type=du-an" class="nav-link <?=$com=='news_cat' && $_GET['type']=='du-an'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khu vực</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=du-an&act=man" class="nav-link <?=$com=='du-an'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dự án</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="index.php?com=feedback&act=man" class="nav-link <?=$com=='feedback'?'active':''?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>Khách hàng nói gì</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?com=staff&act=man" class="nav-link <?=$com=='staff'?'active':''?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Đội ngũ xuất sắc</p>
            </a>
          </li>

          <li class="nav-header mt-3">HÌNH ẢNH & GIAO DIỆN</li>
          <li class="nav-item <?=($com=='photo' && $_GET['type']!='slideshow')?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='photo' && $_GET['type']!='slideshow')?'active':''?>">
              <i class="nav-icon fas fa-image"></i>
              <p>Banner trang con <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-gioithieu" class="nav-link <?=$_GET['type']=='banner-gioithieu'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Giới thiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-linhvuc" class="nav-link <?=$_GET['type']=='banner-linhvuc'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Lĩnh vực</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-duan" class="nav-link <?=$_GET['type']=='banner-duan'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Dự án</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-tintuc" class="nav-link <?=$_GET['type']=='banner-tintuc'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-tuyendung" class="nav-link <?=$_GET['type']=='banner-tuyendung'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Tuyển dụng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=banner-lienhe" class="nav-link <?=$_GET['type']=='banner-lienhe'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Liên hệ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=photo&act=man&type=inner-banner" class="nav-link <?=$_GET['type']=='inner-banner'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner Khác</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?com=photo&act=man&type=slideshow" class="nav-link <?=$_GET['type']=='slideshow'?'active':''?>">
              <i class="nav-icon fas fa-images"></i>
              <p>Slideshow</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?com=thuvien&act=man" class="nav-link <?=($com=='thuvien' || $com=='news_cat') && $_GET['type']=='thuvien-anh' ?'active':''?>">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>Thư viện ảnh <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=news_cat&act=man&type=thuvien-anh" class="nav-link <?=$com=='news_cat' && $_GET['type']=='thuvien-anh'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=thuvien&act=man" class="nav-link <?=$com=='thuvien'?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết</p>
                </a>
              </li>
            </ul>
          </li>

                        <li class="nav-item">
                            <a href="index.php?com=news&act=man&type=tuyen-dung" class="nav-link <?=$com=='news' && $_GET['type']=='tuyen-dung'?'active':''?>">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Tuyển dụng</p>
                            </a>
                        </li>

                        <li class="nav-header">THIẾT LẬP HỆ THỐNG</li>
          <li class="nav-item">
            <a href="index.php?com=setting" class="nav-link <?=$com=='setting'?'active':''?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>Cấu hình chung</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content pt-4">
        <div class="container-fluid">
            <?php include _template.$template."_tpl.php"; ?>
        </div>
    </section>
  </div>

  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 5.0
    </div>
    <strong>Copyright &copy; 2025 <a href="#">Khaservice</a>.</strong>
  </footer>

</div>

<!-- Modal xác nhận xóa dùng chung -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title font-weight-bold" id="confirmDeleteModalLabel text-dark">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4 text-muted">
                Bạn có chắc chắn muốn xóa mục này? Hành động này không thể hoàn tác.
            </div>
            <div class="modal-footer border-0 pb-4 px-4">
                <button type="button" class="btn btn-light px-4" data-dismiss="modal">Hủy bỏ</button>
                <a href="#" id="btn-confirm-delete" class="btn btn-danger px-4 shadow-sm">Đồng ý xóa</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function(){
    // Cấu hình Toastr
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "timeOut": "2000"
    };

    // Xử lý hiện Modal khi bấm nút xóa
    $(document).on('click', '.btn-delete-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#btn-confirm-delete').attr('href', url);
        $('#confirmDeleteModal').modal('show');
    });

    // Chọn tất cả
    $(document).on('click', '#select-all', function(){
        $('.select-item').prop('checked', this.checked);
        updateSelectedCount();
    });

    // Chọn lẻ
    $(document).on('click', '.select-item', function(){
        updateSelectedCount();
    });

    function updateSelectedCount() {
        var count = $('.select-item:checked').length;
        if(count > 0) {
            $('#selected-count').text(count).removeClass('d-none');
        } else {
            $('#selected-count').addClass('d-none');
        }
    }

    // Xóa nhiều
    $(document).on('click', '#delete-all', function(e){
        e.preventDefault();
        var ids = [];
        $('.select-item:checked').each(function(){
            ids.push($(this).val());
        });

        if(ids.length == 0){
            toastr.warning('Vui lòng chọn ít nhất một mục để xóa!');
            return false;
        }

        var deleteUrl = "index.php?com=<?=$com?>&act=delete_all&type=<?=$type?>&listid=" + ids.join(',');
        $('#btn-confirm-delete').attr('href', deleteUrl);
        $('#confirmDeleteModal').modal('show');
    });

    $('.checkbox-hienthi-banner').change(function() {
        var id = $(this).data('id');
        var type = $(this).data('type');
        var value = $(this).is(':checked') ? 1 : 0;
        var _this = $(this);

        $.ajax({
            url: 'ajax/ajax_banner.php',
            type: 'POST',
            data: {
                id: id,
                type: type,
                value: value
            },
            success: function(response){
                if(response == 1){
                    if(value == 1) {
                        // Uncheck others of the same type in UI
                        $('.checkbox-hienthi-banner[data-type="' + type + '"]').not(_this).prop('checked', false);
                    }
                    toastr.success('Cập nhật trạng thái hiển thị thành công!');
                } else {
                    toastr.error('Cập nhật thất bại. Vui lòng thử lại!');
                    _this.prop('checked', !value);
                }
            }
        });
    });

    $('.checkbox-hienthi').change(function() {
        var id = $(this).data('id');
        var table = $(this).data('table');
        var value = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'ajax/ajax_update.php',
            type: 'POST',
            data: {
                id: id,
                table: table,
                field: 'hienthi',
                value: value
            },
            success: function(response){
                if(response == 1){
                    toastr.success('Cập nhật trạng thái thành công!');
                } else {
                    toastr.error('Cập nhật thất bại. Vui lòng thử lại!');
                }
            }
        });
    });

    $('.checkbox-noibat').change(function() {
        var id = $(this).data('id');
        var table = $(this).data('table');
        var value = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: 'ajax/ajax_update.php',
            type: 'POST',
            data: {
                id: id,
                table: table,
                field: 'noibat',
                value: value
            },
            success: function(response){
                if(response == 1){
                    toastr.success('Cập nhật trạng thái nổi bật thành công!');
                } else {
                    toastr.error('Cập nhật thất bại. Vui lòng thử lại!');
                }
            }
        });
    });

    // Cập nhật số thứ tự (stt)
    $('.update-stt').change(function() {
        var id = $(this).data('id');
        var table = $(this).data('table');
        var value = $(this).val();

        $.ajax({
            url: 'ajax/ajax_update.php',
            type: 'POST',
            data: {
                id: id,
                table: table,
                field: 'stt',
                value: value
            },
            success: function(response){
                if(response == 1){
                    toastr.success('Cập nhật số thứ tự thành công!');
                } else {
                    toastr.error('Cập nhật thất bại. Vui lòng thử lại!');
                }
            }
        });
    });

    // Kéo thả sắp xếp (Sortable)
    $("#sortable-list").sortable({
        handle: ".cursor-move",
        placeholder: "ui-state-highlight",
        axis: "y",
        update: function(event, ui) {
            var table = $(this).data('table');
            var ids = [];
            
            // Cập nhật số STT hiển thị trên giao diện ngay lập tức
            $("#sortable-list tr").each(function(index) {
                var new_stt = index + 1;
                $(this).find('.update-stt').val(new_stt);
                ids.push($(this).data('id'));
            });

            // Gửi dữ liệu về server để lưu vào DB
            $.ajax({
                url: 'ajax/ajax_sort.php',
                type: 'POST',
                data: {
                    table: table,
                    ids: ids
                },
                success: function(response) {
                    if(response == 1) {
                        toastr.success('Đã cập nhật và lưu thứ tự mới!');
                    } else {
                        toastr.error('Lỗi khi lưu thứ tự vào máy chủ!');
                    }
                }
            });
        }
    });
});
</script>
</body>
</html>