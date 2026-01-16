<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống gặp sự cố</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: #334155;
        }
        .error-card {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
            text-align: center;
            border: 1px solid #e2e8f0;
        }
        .icon-box {
            width: 80px;
            height: 80px;
            background: #fee2e2;
            color: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }
        h1 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
            color: #1e293b;
        }
        p {
            font-size: 16px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .error-details {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 15px;
            text-align: left;
            margin-bottom: 25px;
            font-family: monospace;
            font-size: 13px;
            color: #ef4444;
            overflow-x: auto;
            border: 1px solid #cbd5e1;
            max-height: 200px;
            overflow-y: auto;
        }
        .btn-home {
            display: inline-block;
            background: #108042;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgba(16, 128, 66, 0.2);
        }
        .btn-home:hover {
            background: #0d6a36;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(16, 128, 66, 0.3);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="icon-box">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1>Rất tiếc, đã xảy ra lỗi!</h1>
        <p>Hệ thống gặp sự cố không mong muốn trong quá trình xử lý yêu cầu của bạn. Đội ngũ kỹ thuật đã được thông báo về vấn đề này.</p>
        
        <?php if(isset($error_msg) && $error_msg != '') { ?>
        <div class="error-details">
            <strong>Chi tiết lỗi:</strong><br>
            <?=$error_msg?>
        </div>
        <?php } ?>

        <a href="index.php?com=dashboard" class="btn-home">
            <i class="fas fa-arrow-left mr-2"></i> Quay về Tổng quan
        </a>
    </div>
</body>
</html>