<?php if(!defined('_lib')) die("Error");
    
    /* Kiểm tra localhost */
    $localhost = 0;
    if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
        $localhost = 1;
    }

    if($localhost == 1){
        /* Cấu hình LOCALHOST (XAMPP) */
        $config_url = $_SERVER["SERVER_NAME"].'/khaservi_khaserv/';
        $base_url = "http://$config_url";
        
        $config['database']['servername'] = 'localhost';
        $config['database']['username'] = 'root';
        $config['database']['password'] = '';
        $config['database']['database'] = 'khaservice_db';
        $config['database']['refix'] = 'table_';
    } else {
        /* Cấu hình HOSTING (Khi đưa lên mạng) */
        $config_url = $_SERVER["SERVER_NAME"];
        $base_url = "https://$config_url/";
        
        $config['database']['servername'] = 'sql309.infinityfree.com';
        $config['database']['username'] = 'if0_40778649';
        $config['database']['password'] = 'I9IaWb2t7P8';
        $config['database']['database'] = 'if0_40778649_khaservice_db';
        $config['database']['refix'] = 'table_';
    }

    /* Các cấu hình dùng chung khác */
    $_gcaptcha['site_key'] = '6Lf7Mt4UAAAAAJ-Jn8sG9KFQTJxNDvikSOIdfpE0';
    $_gcaptcha['secret_key'] = '6Lf7Mt4UAAAAAI9fLV9iXcqR3XGg3JK0s0935GiF';

    @define ( '_ajax_folder' , 'ajax/');
    $login_name = "Website_loged";

    $_role[1] = "Thành viên";
    $_role[3] = "Admin";

    $_trangthai[1] = 'Mới';
    $_trangthai[2] = 'Đã xem';
    $_trangthai[3] = 'Đã xử lý';
    $_trangthai[100] = 'Huỷ';

    $config['email']['on'] = true;
    $config['email']['email'] = 'res@gmail.com';
    $config['email']['host'] = 'smtp.gmail.com';
    $config['email']['name'] = 'RES';
    $config['email']['port'] = 465;
    $config['email']['password'] = 'SG.mZNuZW3aRYyBPSljnWXfcg.5Y-JDbfZJUI-xZegAvtjyFiw8u77tpKupzhHt5jdld8lg';
    $config['email']['host'] = 'smtp.sendgrid.net';

    date_default_timezone_set("Asia/Bangkok");
    error_reporting(E_ERROR | E_PARSE);