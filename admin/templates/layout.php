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
    <!-- Google Font: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Modern Palette - Khaservice Green */
            --primary: rgb(16, 128, 66); 
            --primary-light: rgba(16, 128, 66, 0.1);
            --secondary: #64748b;
            --success: #10b981;
            --info: #3b82f6;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0f172a;
            --light: #f8fafc;
            --border-color: #e2e8f0;
            
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            font-size: 0.925rem;
        }

        /* --- Sidebar & Header --- */
        .main-header {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1039;
        }

        .main-sidebar {
            background: #fff;
            border-right: 1px solid var(--border-color);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1040;
        }
        
        .brand-link {
            border-bottom: 1px solid var(--border-color) !important;
            background: #fff;
            height: 57px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Fix Chrome iOS Toolbar hiding content */
        .sidebar {
            height: calc(100dvh - 57px) !important; /* Dùng dvh thay vì vh */
            overflow-y: auto !important;
            padding-bottom: 150px !important; /* Tăng khoảng trống dưới cùng lên 150px */
            -webkit-overflow-scrolling: touch;
        }

        .nav-sidebar .nav-link {
            color: #475569;
            font-weight: 500;
            border-radius: 10px;
            margin-bottom: 4px;
            padding: 0.6rem 1rem;
            transition: all 0.2s ease;
        }
        .nav-sidebar .nav-link:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }
        .nav-sidebar .nav-link.active {
            background-color: var(--primary) !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(16, 128, 66, 0.3) !important;
        }
        .nav-sidebar .nav-link.active .nav-icon { color: #fff !important; }
        .nav-sidebar .nav-icon {
            color: #94a3b8;
            font-size: 1.1rem;
            margin-right: 0.5rem;
            width: 1.5rem;
            text-align: center;
        }
        
        .nav-header {
            color: #94a3b8;
            font-weight: 700;
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
        }

        /* --- Override AdminLTE Blue --- */
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: var(--primary) !important;
        }
        .nav-treeview > .nav-item > .nav-link.active {
            background-color: var(--primary-light) !important;
            color: var(--primary) !important;
        }

        /* --- Card & Content --- */
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            background: #fff;
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
        }
        .card-title {
            color: var(--dark);
            font-size: 1.1rem;
            font-weight: 700;
        }

        /* --- Widgets (Small Box) --- */
        .small-box {
            border-radius: 20px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
            position: relative;
            background: #fff;
            border: none;
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            overflow: hidden;
            z-index: 1;
        }
        .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.1);
        }
        .small-box .inner { padding: 1.5rem; position: relative; z-index: 2; }
        .small-box h3 { font-weight: 800; font-size: 2.2rem; margin-bottom: 5px; }
        .small-box p { font-weight: 600; font-size: 0.95rem; margin-bottom: 0; opacity: 0.8; }
        
        .small-box .icon {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 0;
            transition: all 0.3s ease;
        }
        .small-box .icon i { font-size: 4rem; opacity: 0.15; }
        .small-box:hover .icon { transform: scale(1.1) rotate(-5deg); }
        .small-box:hover .icon i { opacity: 0.25; }
        
        /* Gradient Variants */
        .box-info { background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); color: #0369a1 !important; }
        .box-info h3 { color: #0369a1; }
        .box-info .small-box-footer { background: rgba(3, 105, 161, 0.05) !important; color: #0369a1 !important; }
        
        .box-success { background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); color: #15803d !important; }
        .box-success h3 { color: #15803d; }
        .box-success .small-box-footer { background: rgba(21, 128, 61, 0.05) !important; color: #15803d !important; }
        
        .box-warning { background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); color: #b45309 !important; }
        .box-warning h3 { color: #b45309; }
        .box-warning .small-box-footer { background: rgba(180, 83, 9, 0.05) !important; color: #b45309 !important; }
        
        .box-danger { background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); color: #b91c1c !important; }
        .box-danger h3 { color: #b91c1c; }
        .box-danger .small-box-footer { background: rgba(185, 28, 28, 0.05) !important; color: #b91c1c !important; }
        
        .small-box-footer {
            display: block;
            padding: 0.75rem 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.03);
            font-weight: 700;
            font-size: 0.85rem;
            text-align: center;
            transition: all 0.2s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .small-box-footer:hover { background: rgba(0,0,0,0.05) !important; text-decoration: none; }

        /* --- Buttons --- */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-primary {
            background: var(--primary) !important;
            border: none !important;
            box-shadow: 0 4px 10px rgba(16, 128, 66, 0.2);
        }
        .btn-primary:hover {
            background: rgb(12, 100, 52) !important;
            transform: translateY(-1px);
        }
        
        /* --- Switch Toggle (iOS Style) --- */
        .custom-switch { padding-left: 2.75rem !important; }
        .custom-switch .custom-control-label::before {
            left: -2.75rem !important;
            width: 2.25rem !important;
            height: 1.25rem !important;
            border-radius: 1rem !important;
            background-color: #cbd5e1 !important;
            border: none !important;
        }
        .custom-switch .custom-control-label::after {
            top: 2px !important;
            left: calc(-2.75rem + 2px) !important;
            width: calc(1.25rem - 4px) !important;
            height: calc(1.25rem - 4px) !important;
            border-radius: 50% !important;
            background-color: #fff !important;
        }
        .custom-switch .custom-control-input:checked ~ .custom-control-label::before {
            background-color: var(--primary) !important;
        }
        .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(1rem) !important;
        }

        /* Table */
        .table thead th {
            background: #f8fafc;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
        }
        
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        /* --- Responsive Optimization --- */
        @media (max-width: 768px) {
            .main-header {
                padding: 0 5px;
            }
            .content-wrapper {
                padding: 15px 10px !important; /* Tăng padding để không bị sát mép */
                margin-left: 0 !important;
            }
            .card-body {
                padding: 15px !important;
            }
            .nav-tabs .nav-link {
                padding: 10px 12px;
                font-size: 13px;
            }
            /* Đảm bảo sidebar không che khuất khi trượt */
            .sidebar-open .content-wrapper {
                transform: translateX(250px);
                transition: transform 0.3s ease;
            }
            /* Nút bấm to hơn trên mobile để dễ chạm */
            .btn-sm, .btn {
                padding: 10px 15px !important;
                min-height: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        /* Safe Area cho iPhone có tai thỏ */
        @supports (padding: env(safe-area-inset-bottom)) {
            .main-footer {
                padding-bottom: env(safe-area-inset-bottom);
            }
            .content-wrapper {
                padding-bottom: calc(20px + env(safe-area-inset-bottom)) !important;
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-none">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" target="_blank" class="nav-link font-weight-bold text-primary"><i class="fas fa-external-link-alt mr-1"></i> Xem website</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="user-panel d-flex align-items-center mr-3">
            <div class="image mr-2">
              <img src="https://ui-avatars.com/api/?name=<?=$_SESSION['login']['username']?>&background=108042&color=fff" class="img-circle border" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block text-dark font-weight-bold"><?=$_SESSION['login']['username']?></a>
            </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="index.php?com=logout" role="button" title="Đăng xuất">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-light-primary elevation-0">
    <a href="index.php" class="brand-link text-center">
      <span class="brand-text font-weight-bold text-primary" style="font-size: 1.2rem; letter-spacing:-0.5px;">KHASERVICE <span style="font-weight:300; color:#64748b;"></span></span>
    </a>

    <div class="sidebar">
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="index.php?com=dashboard" class="nav-link <?=$com=='dashboard'?'active':''?>">
              <i class="nav-icon fas fa-th-large"></i>
              <p>Tổng quan</p>
            </a>
          </li>
          
          <li class="nav-header">QUẢN LÝ KHÁCH HÀNG</li>
          <li class="nav-item">
            <a href="index.php?com=contact&act=man" class="nav-link <?=$com=='contact'?'active':''?>">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>Liên hệ - Đăng ký</p>
            </a>
          </li>

          <li class="nav-header">NỘI DUNG CHÍNH</li>
          <li class="nav-item">
            <a href="index.php?com=static&act=capnhat&type=ve-chung-toi" class="nav-link <?=$com=='static' && $_GET['type']=='ve-chung-toi'?'active':''?>">
              <i class="nav-icon fas fa-fingerprint"></i>
              <p>Về chúng tôi</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?com=themanh&act=man" class="nav-link <?=$com=='themanh'?'active':''?>">
              <i class="nav-icon fas fa-bolt"></i>
              <p>Thế mạnh</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?com=giatri&act=man" class="nav-link <?=$com=='giatri'?'active':''?>">
              <i class="nav-icon fas fa-gem"></i>
              <p>Giá trị cốt lõi</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="index.php?com=news&act=man&type=gioi-thieu" class="nav-link <?=$com=='news' && $_GET['type']=='gioi-thieu'?'active':''?>">
              <i class="nav-icon fas fa-award"></i>
              <p>Giới thiệu bài viết</p>
            </a>
          </li>

          <li class="nav-item <?=($com=='news' && $_GET['type']=='tin-tuc' || ($com=='news_cat' && $_GET['type']=='tin-tuc'))?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='news' && $_GET['type']=='tin-tuc' || ($com=='news_cat' && $_GET['type']=='tin-tuc'))?'active':''?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Tin tức & Sự kiện <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=news_cat&act=man&type=tin-tuc" class="nav-link <?=$com=='news_cat' && $_GET['type']=='tin-tuc'?'active':''?>">
                  <i class="far fa-circle nav-icon small"></i>
                  <p>Danh mục tin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=news&act=man&type=tin-tuc" class="nav-link <?=$com=='news' && $_GET['type']=='tin-tuc'?'active':''?>">
                  <i class="far fa-circle nav-icon small"></i>
                  <p>Tất cả bài viết</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="index.php?com=dichvu&act=man" class="nav-link <?=$com=='dichvu'?'active':''?>">
              <i class="nav-icon fas fa-concierge-bell"></i>
              <p>Dịch vụ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?com=tuyendung&act=man&type=tuyen-dung" class="nav-link <?=$com=='tuyendung'?'active':''?>">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Tuyển dụng</p>
            </a>
          </li>

          <li class="nav-item <?=($com=='du-an' || ($com=='news_cat' && $_GET['type']=='du-an'))?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='du-an' || ($com=='news_cat' && $_GET['type']=='du-an'))?'active':''?>">
              <i class="nav-icon fas fa-city"></i>
              <p>Quản lý dự án <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?com=news_cat&act=man&type=du-an" class="nav-link <?=$com=='news_cat' && $_GET['type']=='du-an'?'active':''?>">
                  <i class="far fa-circle nav-icon small"></i>
                  <p>Khu vực dự án</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?com=du-an&act=man" class="nav-link <?=$com=='du-an'?'active':''?>">
                  <i class="far fa-circle nav-icon small"></i>
                  <p>Danh sách dự án</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">MEDIA & HÌNH ẢNH</li>
          <li class="nav-item">
            <a href="index.php?com=photo&act=man&type=slideshow" class="nav-link <?=$_GET['type']=='slideshow'?'active':''?>">
              <i class="nav-icon fas fa-images"></i>
              <p>Slideshow trang chủ</p>
            </a>
          </li>
              <li class="nav-item">
            <a href="index.php?com=thuvien&act=man" class="nav-link <?=$com=='thuvien'?'active':''?>">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>Thư viện ảnh</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?com=photo&act=man&type=doi-tac" class="nav-link <?=$_GET['type']=='doi-tac'?'active':''?>">
              <i class="nav-icon fas fa-handshake"></i>
              <p>Đối tác & Khách hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?com=feedback&act=man" class="nav-link <?=$com=='feedback'?'active':''?>">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>Khách hàng nói gì</p>
            </a>
          </li>

          <li class="nav-item <?=($com=='photo' && strpos($_GET['type'], 'banner') !== false)?'menu-open':''?>">
            <a href="#" class="nav-link <?=($com=='photo' && strpos($_GET['type'], 'banner') !== false)?'active':''?>">
              <i class="nav-icon fas fa-pager"></i>
              <p>Quản lý Banner <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-gioithieu" class="nav-link <?=$_GET['type']=='banner-gioithieu'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Giới thiệu</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-linhvuc" class="nav-link <?=$_GET['type']=='banner-linhvuc'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Lĩnh vực</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-duan" class="nav-link <?=$_GET['type']=='banner-duan'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Dự án</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-tintuc" class="nav-link <?=$_GET['type']=='banner-tintuc'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Tin tức</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-tuyendung" class="nav-link <?=$_GET['type']=='banner-tuyendung'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Tuyển dụng</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=banner-lienhe" class="nav-link <?=$_GET['type']=='banner-lienhe'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Liên hệ</p></a></li>
              <li class="nav-item"><a href="index.php?com=photo&act=man&type=inner-banner" class="nav-link <?=$_GET['type']=='inner-banner'?'active':''?>"><i class="far fa-circle nav-icon small"></i><p>Banner Khác</p></a></li>
            </ul>
          </li>

          <li class="nav-header">HỆ THỐNG</li>
          <li class="nav-item">
            <a href="index.php?com=setting" class="nav-link <?=$com=='setting'?'active':''?>">
              <i class="nav-icon fas fa-tools"></i>
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

  <footer class="main-footer text-xs text-muted border-0 bg-transparent">
    <div class="float-right d-none d-sm-block"><b>Version</b> 5.1</div>
    <strong>Copyright &copy; 2025 <a href="#" class="text-primary">Khaservice</a>.</strong> All rights reserved.
  </footer>

</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- CKEditor Common -->
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script src="ckeditor_common.js"></script>

<script>
$(document).ready(function(){
    toastr.options = { "closeButton": true, "positionClass": "toast-top-right", "timeOut": "3000", "progressBar": true };

    <?php if(!empty($_SESSION['transfer_msg'])) { ?>
        toastr.success('<?=$_SESSION['transfer_msg']?>');
        <?php unset($_SESSION['transfer_msg']); ?>
    <?php } ?>

    // Cập nhật STT bằng kéo thả (Sortable)
    if($("#sortable-list").length > 0) {
        $("#sortable-list").sortable({
            handle: ".cursor-move",
            placeholder: "ui-state-highlight",
            axis: "y",
            update: function(event, ui) {
                var table = $(this).data("table");
                var listid = $(this).sortable("toArray", { attribute: "data-id" });
                
                $.ajax({
                    url: 'ajax/ajax_sort.php',
                    type: 'POST',
                    data: { table: table, listid: listid },
                    success: function(res) {
                        if(res == "1") {
                            toastr.success('Đã cập nhật thứ tự hiển thị');
                            // Cập nhật lại số hiển thị trên ô input STT
                            $('#sortable-list tr').each(function(index) {
                                $(this).find('.update-stt').val(index + 1);
                            });
                        } else {
                            toastr.error('Có lỗi xảy ra khi lưu thứ tự');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi kết nối server');
                    }
                });
            }
        });
    }

    $('.checkbox-hienthi, .checkbox-noibat').change(function() {
        var id = $(this).data('id');
        var table = $(this).data('table');
        var type = $(this).data('type'); // Lấy type để xử lý banner
        var field = $(this).hasClass('checkbox-noibat') ? 'noibat' : ($(this).data('field') || 'hienthi');
        var value = $(this).is(':checked') ? 1 : 0;
        var label = $(this).next('label');
        var $this = $(this);

        // UI Update cho Banner: Tắt các cái khác ngay lập tức nếu đang bật cái này
        if(table == 'photo' && type && type.indexOf('banner') !== -1 && value == 1 && field == 'hienthi') {
            $('.checkbox-hienthi[data-type="' + type + '"]').not($this).prop('checked', false);
        }

        $.ajax({
            url: 'ajax/ajax_update.php',
            type: 'POST',
            data: { id: id, table: table, field: field, value: value },
            success: function(res){
                if(res == 1){
                    toastr.success('Cập nhật thành công!');
                    if(field == 'trangthai') label.text(value == 1 ? 'Đã xem' : 'Chưa xem');
                } else {
                    toastr.error('Thất bại!');
                    // Revert nếu lỗi
                    $this.prop('checked', !value); 
                }
            }
        });
    });

    // Xác nhận xóa bằng SweetAlert2
    $(document).on('click', '.btn-delete-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: "Dữ liệu sau khi xóa sẽ không thể khôi phục!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#108042',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý, xóa ngay!',
            cancelButtonText: 'Hủy bỏ',
            borderRadius: '15px'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
</body>
</html>