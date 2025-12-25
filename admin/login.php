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
                <label>Tài khoản</label>
                <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản" required autofocus>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-login">Đăng nhập</button>
        </form>
        
        <p class="text-center mt-3 text-muted" style="font-size: 12px;">&copy; 2025 Khaservice</p>
    </div>

</body>
</html>