<?php if(!defined('_lib')) die("Error");
    if($localhost == 1){
        $config_url=$_SERVER["SERVER_NAME"].'/';
        $base_url = "http://$config_url/";
        $config['database']['servername'] = 'localhost';
        $config['database']['username'] = 'root';
        $config['database']['password'] = '';
        $config['database']['database'] = 'khaservice_db';
        $config['database']['refix'] = 'table_';
    }else{
        $config_url=$_SERVER["SERVER_NAME"];
        $base_url = "https://$config_url/";
        $config['database']['servername'] = 'localhost';
        $config['database']['username'] = 'khaservi_khaserv';
        $config['database']['password'] = 'otKM8XJI4GOa';
        $config['database']['database'] = 'khaservi_khaserv';
        $config['database']['refix'] = 'table_';
    }
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
    $config['email']['name2'] = 'RES';
    $config['email']['port'] = 465;
    $config['email']['email'] = 'apikey';
    $config['email']['password'] = 'SG.mZNuZW3aRYyBPSljnWXfcg.5Y-JDbfZJUI-xZegAvtjyFiw8u77tpKupzhHt5jdld8lg';
    $config['email']['host'] = 'smtp.sendgrid.net';

    $_tracking_type[2] = "GHTK";
    $_tracking_type[3] = "Viettel";
    $_tracking_type[1] = "Khang";


    $_com[1] = "tin-tuc";
    $_com[2] = "gioi-thieu";
    $_com[3] = "linh-vuc-hoat-dong";
    $_com[4] = "du-an";
    $_com[5] = "tuyen-dung";
    $_com[8] = "noi-dung-gioi-thieu-app-dan-cu";

    $_com[11] = "ly-do-chon-res";
    $_com[12] = "doi-ngu";
    $_com[13] = "hoc-vien";

    $_title[1]['vi'] = "Tin tức";
    $_title[2]['vi'] = "Giới thiệu";
    $_title[3]['vi'] = "Lĩnh vực hoạt động";
    $_title[4]['vi'] = "Dự án";
    $_title[5]['vi'] = "Tuyển dụng";
    $_title[11]['vi'] = "Đội ngũ xuất sắc";

    
    $_dulieu[1]['vi'] = "Lý do chọn chúng tôi";
    $_dulieu[2]['vi'] = "Thế mạnh của Khasevice";
    $_dulieu[3]['vi'] = "Khách hàng nói gì";
    $_dulieu[4]['vi'] = "";
    $_dulieu[5]['vi'] = "";
    $_dulieu[6]['vi'] = "";

    $_id_cat_thuvienanh = 100;
    date_default_timezone_set("Asia/Bangkok");
    error_reporting(E_ERROR | E_PARSE);
?>