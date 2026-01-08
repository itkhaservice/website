<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "man";

switch($act){
    case "man":
        get_items();
        $template = "log/items";
        break;
    case "delete":
        delete_item();
        break;
    default:
        $template = "index";
}

function get_items(){
    global $d, $items, $paging, $curPage, $perPage;
    
    $curPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($curPage < 1) $curPage = 1;
    $perPage = 20;
    $startpoint = ($curPage * $perPage) - $perPage;

    $where = " where id > 0 ";
    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
        $keyword = addslashes($_GET['keyword']);
        $where .= " and (username LIKE '%$keyword%' OR noidung LIKE '%$keyword%' OR module LIKE '%$keyword%') ";
    }

    $d->query("select count(id) as num from #_log $where");
    $row_count = $d->fetch_array();
    $total_items = $row_count['num'];

    $d->reset();
    $sql = "select * from #_log $where order by id desc limit $startpoint, $perPage";
    $d->query($sql);
    $items = $d->result_array();

    $total_pages = ceil($total_items / $perPage);
    $paging = array(
        'total' => $total_items,
        'per_page' => $perPage,
        'current' => $curPage,
        'last' => $total_pages
    );
}

function delete_item(){
    global $d;
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $d->reset();
        $d->setTable('log');
        $d->setWhere('id', $id);
        $d->delete();
        redirect("index.php?com=log&act=man");
    }
}
?>