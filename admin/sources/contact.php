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
    case "delete_all":
        delete_all_item();
        break;
    default:
        $template = "index";
}

function get_items(){
    global $d, $items, $paging, $curPage, $perPage;
    
    // Xử lý phân trang
    $curPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if($curPage < 1) $curPage = 1;
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
    $startpoint = ($curPage * $perPage) - $perPage;

    $where = " where id > 0 ";
    
    // Lọc theo ngày
    if(isset($_GET['start_date']) && $_GET['start_date'] != ''){
        $start_date = strtotime($_GET['start_date'] . ' 00:00:00');
        $where .= " and ngaytao >= $start_date ";
    }
    if(isset($_GET['end_date']) && $_GET['end_date'] != ''){
        $end_date = strtotime($_GET['end_date'] . ' 23:59:59');
        $where .= " and ngaytao <= $end_date ";
    }

    // Tìm kiếm từ khóa
    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
        $keyword = addslashes($_GET['keyword']);
        $where .= " and (ten LIKE '%$keyword%' OR email LIKE '%$keyword%' OR dienthoai LIKE '%$keyword%') ";
    }

    // Đếm tổng số bản ghi
    $d->query("select count(id) as num from #_contact $where");
    $row_count = $d->fetch_array();
    $total_items = $row_count['num'];

    // Lấy dữ liệu
    $d->reset();
    $sql = "select * from #_contact $where order by id desc limit $startpoint, $perPage";
    $d->query($sql);
    $items = $d->result_array();

    // Tính tổng số trang
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
        $d->setTable('contact');
        $d->setWhere('id', $id);
        $d->delete();
        redirect("index.php?com=contact&act=man");
    }
}

function delete_all_item(){
    global $d;
    $listid = explode(",",$_GET['listid']);
    foreach($listid as $id){
        $id = (int)$id;
        $d->reset();
        $d->setTable('contact');
        $d->setWhere('id', $id);
        $d->delete();
    }
    redirect("index.php?com=contact&act=man");
}
?>