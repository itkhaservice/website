<?php  if(!defined('_source')) die("Error");
$noiDung = db_fetch_array("about","id_cat = 8");
$titlePage = $title_bar = $noiDung["title_$lang"];
$titlePage = "Nội dung giới thiệu app dân cư";

$bc[_home] = "index.html";
$bc[$titlePage] = "noi-dung-gioi-thieu-app-dan-cu.html";
// echo $com; die;
$template = $com.'_detail';

?>