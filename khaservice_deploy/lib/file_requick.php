<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";	

    $headB = db_fetch_array("quangcao3","id = 58");
    $headBanner = _upload_hinhanh_l.$headB['photo'];
    $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
	switch($com){
		case $_com[1]:
			$source = $_com[1];
            $headB = db_fetch_array("quangcao3","id = 52");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
            $id_cat = 1;
			break;
		case $_com[2]:
			$source = $_com[2];
            $headB = db_fetch_array("quangcao3","id = 51");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
            $id_cat = 2;
			break;
		case $_com[3]:
			$source = $_com[3];
            $headB = db_fetch_array("quangcao3","id = 46");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
            $id_cat = 3;
			break;
		case $_com[4]:
			$source = $_com[4];
            $headB = db_fetch_array("quangcao3","id = 30");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
            $id_cat = 4;
			break;
        case $_com[5]:
            $source = $_com[5];
            $headB = db_fetch_array("quangcao3","id = 53");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            $headBanner_m = _upload_hinhanh_l.$headB['thumb'];
            $id_cat = 5;
            break;
		case $_com[8]:
			$source = $_com[8];
            $id_cat = 8;
			break;
        case 'search':
            $source = "search";
            break;
        case 'lien-he':
            $source = "contact";
            $template = "contact";
            $headB = db_fetch_array("quangcao3","id = 55");
            $headBanner = _upload_hinhanh_l.$headB['photo'];
            break;
        case 'thank-you':
            $source = "thankyou";
            $template = "thankyou";
            break;
        case 'thu-vien-anh':
            $source = "thuvienanh";
            $template = "thu-vien-anh";
            break;
        default:
            $source = "index";
            $template = "index";
			break;
	}
	
	if($source!="") 
		include _source.$source.".php";
		

	if($_REQUEST['com']=='logout')
	{
	    session_destroy();
        header("Location:index.php");
	}
?>