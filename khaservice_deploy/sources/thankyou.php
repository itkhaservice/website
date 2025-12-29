<?php 
if(!defined('_source')) die("Error");

$title_bar = "Cảm ơn bạn";
$title_t = "Gửi thông tin thành công";

// Session check
if(!isset($_SESSION['form_success']) || $_SESSION['form_success'] == false){
    // Tạm thời comment redirect để bạn có thể test giao diện
    // redirect("index.php");
}

// Reset session after viewing
$_SESSION['form_success'] = false;
?>