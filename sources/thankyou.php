<?php if(!defined('_source')) die("Error");

    $title_bar = "THANK YOU";

    if(!$_SESSION['formTuVan'])
        redirect('/');

    $_SESSION['formTuVan'] = false;
        
?>