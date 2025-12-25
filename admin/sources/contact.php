<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "man";

switch($act){
    case "man":
        get_items();
        $template = "contact/items";
        break;
    case "delete":
        delete_item();
        break;
    default:
        $template = "index";
}

function get_items(){
    global $d, $items;
    $d->reset();
    $sql = "select * from #_contact order by id desc";
    $d->query($sql);
    $items = $d->result_array();
}

function delete_item(){
    global $d;
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $d->reset();
        $d->setTable('contact');
        $d->setWhere('id', $id);
        $d->delete();
        redirect("index.php?com=contact&act=man");
    }
}
?>