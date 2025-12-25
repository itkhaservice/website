<?php
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "man";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "tin-tuc";

switch($type){
    case 'du-an': $title_main = "Khu vực"; break;
    default: $title_main = "Danh mục"; break;
}

switch($act){
    case "man":
        get_items();
        $template = "news_cat/items";
        break;
    case "add":
        $template = "news_cat/item_add";
        break;
    case "edit":
        get_item();
        $template = "news_cat/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    default:
        $template = "index";
}

function get_items(){
    global $d, $items, $type;
    $d->reset();
    $sql = "select * from #_news_cat where type='$type' order by stt asc, id desc";
    $d->query($sql);
    $items = $d->result_array();
}

function get_item(){
    global $d, $item, $type;
    $id = (int)$_GET['id'];
    $d->reset();
    $sql = "select * from #_news_cat where id='$id'";
    $d->query($sql);
    $item = $d->fetch_array();
}

function save_item(){
    global $d, $type;
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news_cat&act=man&type=".$type);
    $id = (int)$_POST['id'];

    $data['ten_vi'] = $_POST['ten_vi'];
    $data['stt'] = $_POST['stt'];
    $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
    $data['type'] = $type;

    if($id){
        $d->reset();
        $d->setTable('news_cat');
        $d->setWhere('id', $id);
        if($d->update($data)) redirect("index.php?com=news_cat&act=man&type=".$type);
    }else{
        $d->reset();
        $d->setTable('news_cat');
        if($d->insert($data)) redirect("index.php?com=news_cat&act=man&type=".$type);
    }
}

function delete_item(){
    global $d, $type;
    $id = (int)$_GET['id'];
    $d->reset();
    $d->setTable('news_cat');
    $d->setWhere('id', $id);
    $d->delete();
    redirect("index.php?com=news_cat&act=man&type=".$type);
}
?>