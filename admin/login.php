<?php
// Xử lý login
$error = "";
if(isset($_POST['login'])){
    $username = addslashes($_POST['username']);
    $password = $_POST['password'];
    
    // Check DB
    $d->reset();
    $d->query("select * from #_user where username='$username' and role >= 2"); // Role >= 2 là admin/mod
    
    if($d->num_rows() == 1){
        $row = $d->fetch_array();
        if($row['password'] == md5($password)){
            $_SESSION['admin_logined'] = true;
            $_SESSION['login']['username'] = $username;
            $_SESSION['login']['id'] = $row['id'];
            $_SESSION['login']['role'] = $row['role'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Mật khẩu không đúng!";
        }
    } else {
        $error = "Tài khoản không tồn tại!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-box {
            width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo img {
            max-width: 150px;
        }
        .btn-login {
            background: #28a745;
            border: none;
        }
        .btn-login:hover {
            background: #218838;
        }
        .password-wrapper {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 10;
            padding: 5px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="login-logo">
            <h3 class="text-success font-weight-bold">ADMIN CP</h3>
            <p class="text-muted">Đăng nhập hệ thống</p>
        </div>
        
        <?php if($error != ''){ ?>
            <div class="alert alert-danger text-center"><?=$error?></div>
        <?php } ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tài khoản" autocomplete="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" autocomplete="current-password" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </span>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label text-muted" for="rememberMe" style="font-size: 13px; cursor: pointer;">Ghi nhớ</label>
                </div>
                <a href="javascript:void(0)" onclick="alert('Vui lòng liên hệ kỹ thuật viên để khôi phục mật khẩu.\nHoặc thử vận may bằng cách... nhớ lại!')" class="text-success" style="font-size: 13px;">Quên mật khẩu?</a>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-login font-weight-bold">ĐĂNG NHẬP</button>
        </form>
        
        <p class="text-center mt-3 text-muted" style="font-size: 12px;">&copy; 2025 Khaservice</p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>