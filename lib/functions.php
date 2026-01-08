<?php if(!defined('_lib')) die("Error");
#
#	$id_connect : ket noi database
#
function clearContent($html) {
	// Chuyển ../upload/ thành upload/ để hiển thị đúng ở frontend
	$html = str_replace('../upload/', 'upload/', $html);
	return $html;
}

function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}
function showOptionLink($option, $value, $id){
    if($value > 0)
        return '<a href="index.php?com='.$_GET['com'].'&act='.$_GET['act'].'&id_cat='.$_REQUEST['id_cat'].'&curPage='.$_GET['curPage'].'&'.$option.'='.$id.'"><img src="themes/images/active_1.png"  border="0"/></a>';
    return '<a href="index.php?com='.$_GET['com'].'&act='.$_GET['act'].'&id_cat='.$_REQUEST['id_cat'].'&curPage='.$_GET['curPage'].'&'.$option.'='.$id.'"><img src="themes/images/active_0.png" border="0" /></a>';
}

function showOptionUpdate($table, $option, $value, $id, $lbl=''){
    $value = $value > 0 ? 1 : 0;
    $lbl = $lbl == '' ? '<i class="fa"></i>' : $lbl;
    return "<a href='javascript:void();' class='opt-update opt-$value' data-opt-table='$table' data-opt-id='$id' data-opt='$option'>$lbl</a>";
}

function substrTitle($title, $limit = 0){
    if($limit == 0)
        return $title;

    if(mb_strlen($title,'utf-8') > $limit+12)
        return mb_substr($title,0,mb_strpos($title," ",$limit, "utf-8"), "utf-8").'...';

    return $title;
}

function updateOptionTable($option, $id, $table){
    global $d;

    $sql = "SELECT id,$option FROM table_$table where id='$id'";
    $d->reset();
    $d->query($sql);
    $item = $d->fetch_array();

    $val = $item[$option];
    $v = 1;
    if($val == 0)
    {
        $sqlUpdate = "UPDATE table_$table SET $option = $v WHERE  id = $id";
        $d->reset();
        $d->query($sqlUpdate);
    }
    else
    {
        $sqlUpdate = "UPDATE table_$table SET $option = 0 WHERE  id = $id";
        $d->reset();
        $d->query($sqlUpdate);
    }
}

function checkLogin(){
    global $login_name;
    if($_SESSION[$login_name])
        return true;
    return false;
}
#
#	$id_connect : ket noi database
#
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}
// dem so nguoi online //
/////////////////////////
function count_online(){
/*
CREATE TABLE `camranh_online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `session_id` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
*/
	global $d;
	$time = 600; // 10 phut
	$ssid = session_id();
	// xoa het han
	$sql = "delete from #_online where time<".(time()-$time);
	$d->query($sql);
	//
	$sql = "select id,session_id from #_online order by id desc";
	$d->query($sql);
	$result['dangxem'] = $d->num_rows();
	$rows = $d->result_array();
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	
	if($i<$result['dangxem']){
		$sql = "update #_online set time='".time()."' where session_id='".$ssid."'";
		$d->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into #_online (session_id, time) values ('".$ssid."', '".time()."')";
		$d->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}
function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}
function alert($s){
	echo '<script language="javascript"> alert("'.$s.'") </script>';
}
function delete_file($file){
		return @unlink($file);
}

function getTreeMenu($id, $table)
{
    $id = (int) $id;
    $menus = db_result_array($table);
    $tree = array();
    getMenu($tree,$menus,0,0,$id);
    $result[] = $id;
    foreach($tree as $r){
        $result[] = $r['id'];
    }

    return implode(', ', $result);
}


function getTreeParent($id, $table, &$listCat){
    $id = (int) $id;
    $item = db_fetch_array($table,"id = $id");
    if($item['id_parent'] > 0){
        $listCat[] = $item;
        getTreeParent($item['id_parent'],$table,$listCat);
    }else{
        $listCat[] = $item;
    }
}

function getTreeSLug($id, $table, $lang){
    $listCat = array();
    getTreeParent($id, $table, $listCat);

    $slug = null;

    for($i = count($listCat); $i>0; $i--) {
        if($listCat[$i - 1]['id'])
            $slug[] = $listCat[$i - 1]["slug_$lang"];
    }

    return implode("/",$slug);

}

function getMenuParent($id, $table){
    $menu = db_fetch_array($table,"id = $id");
    if($menu['id_parent'] == 0)
        return $menu;
    else
        return getMenuParent($menu['id_parent'],$table);
}

function getMenuChild($id, $table){
    $menu = db_fetch_array($table,"id = $id");
    if($menu['id_parent'] == 0)
        return $menu;
    else {
        $menuParent = db_fetch_array($table,"id = ".$menu['id_parent']);
        if($menuParent['id_parent'] == 0)
            return $menu['id'];
        else
            return getMenuChild($menu['id_parent'], $table);
    }
}

#====================================
function fns_Rand_digit($min,$max,$num)
{
    $result='';
    for($i=0;$i<$num;$i++){
        $result.=rand($min,$max);
    }
    return $result;
}

function upload_pdf($field_name,$extension,$folder,$newname=''){
    if(is_file(($_FILES["$field_name"]["tmp_name"]))!="")
    {
        $arrext=explode('.',$_FILES["$field_name"]['name']);
        $ext = strtolower(end($arrext));
        $new_name = $newname.'.'.$ext;
        if(strpos($extension, $ext)===false){
            alert('Chỉ hỗ trợ upload file dạng '.$extension);
            return false; // không hỗ trợ
        }

        if($new_name!="")
        {
            $des=$folder."/".$new_name;


            if(copy($_FILES["$field_name"]["tmp_name"],$des))
            {

                return $new_name;
            }

        }
    }
    return "";
}


function getFileExt($file_name){
    $arr_temp=explode('.',$file_name);
    return strtolower(end($arr_temp));
}

function getTrangThaiDonHang($id, $lang='vi'){
	global $d;
   		$sql="select trangthai,trangthai1 from #_tinhtrang where id= $id";
		$d->query($sql);
		$result=$d->fetch_array();
		if($lang =='vi') 
			return  $result['trangthai'];
		else 
			return $result['trangthai1'];		   
}
function thongtintheoid($id){
	global $d;		
	$sql = "select * from #_user where id='".$id."'";
	$d->query($sql);
	$item = $d->fetch_array();
	return $item;
}	
function remove_directory($dir){
  if($handle = opendir("$dir")){
     while(false !== ($item = readdir($handle))){
       if($item != "." && $item != ".."){
          if(is_dir("$dir/$item")){
             remove_directory("$dir/$item");
          }else{
          unlink("$dir/$item");
          echo"removing $dir/$item<br>\n";
         }
        }
     } 
     closedir($handle);
     rmdir($dir);
     echo"removing $dir<br>\n";
   }
}
function upload_image($file, $extension, $folder, $newname=''){
    if(isset($_FILES[$file]) && !$_FILES[$file]['error']){

        $ext = strtoupper(end(explode('.',$_FILES[$file]['name'])));
        $name = basename($_FILES[$file]['name'], '.'.$ext);

        if(strpos($extension, $ext)===false){
            alert('Chỉ hỗ trợ upload file dạng '.$extension);
            return false;
        }

        if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
            for($i=0; $i<100; $i++){
                if(!file_exists($folder.$name.$i.'.'.$ext)){
                    $_FILES[$file]['name'] = $name.$i.'.'.$ext;
                    break;
                }
            }
        else{
            $_FILES[$file]['name'] = $newname.'.'.$ext;
        }

        $dest_path = $folder . $_FILES[$file]['name'];

        if (!copy($_FILES[$file]["tmp_name"], $dest_path)) {
            if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $dest_path)) {
                return false;
            }
        }
        
        // --- AUTO RESIZE & WEBP GENERATION ---
        try {
            $max_width = 1920; // Chuẩn Full HD
            list($width, $height) = getimagesize($dest_path);
            
            // Chỉ xử lý nếu là ảnh JPG, PNG, GIF
            if(in_array($ext, ['JPG', 'JPEG', 'PNG', 'GIF'])) {
                $image = null;
                if($ext == 'JPG' || $ext == 'JPEG') $image = imagecreatefromjpeg($dest_path);
                elseif($ext == 'PNG') $image = imagecreatefrompng($dest_path);
                elseif($ext == 'GIF') $image = imagecreatefromgif($dest_path);

                if($image) {
                    // 1. Resize nếu ảnh quá lớn
                    if($width > $max_width) {
                        $ratio = $max_width / $width;
                        $new_height = $height * $ratio;
                        
                        $canvas = imagecreatetruecolor($max_width, $new_height);
                        
                        // Giữ trong suốt cho PNG/GIF
                        if($ext == 'PNG' || $ext == 'GIF'){
                            imagealphablending($canvas, false);
                            imagesavealpha($canvas, true);
                            $transparent = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
                            imagefilledrectangle($canvas, 0, 0, $max_width, $new_height, $transparent);
                        }
                        
                        imagecopyresampled($canvas, $image, 0, 0, 0, 0, $max_width, $new_height, $width, $height);
                        
                        // Ghi đè file gốc bằng file đã resize
                        if($ext == 'JPG' || $ext == 'JPEG') imagejpeg($canvas, $dest_path, 90);
                        elseif($ext == 'PNG') imagepng($canvas, $dest_path, 9);
                        elseif($ext == 'GIF') imagegif($canvas, $dest_path);
                        
                        imagedestroy($image); // Giải phóng ảnh cũ
                        $image = $canvas; // Gán ảnh mới để làm WebP
                    }

                    // 2. Tạo bản WebP
                    $webp_path = str_replace('.'.$ext, '.webp', $dest_path);
                    $webp_path = str_replace('.'.$ext, '.webp', $webp_path); // Lowercase check
                    
                    if(function_exists('imagewebp')) {
                        // Chuyển PNG/GIF trong suốt sang WebP cần xử lý background
                        if($ext == 'PNG' || $ext == 'GIF') {
                            imagepalettetotruecolor($image);
                            imagealphablending($image, true);
                            imagesavealpha($image, true);
                        }
                        imagewebp($image, $webp_path, 85); // Chất lượng 85
                    }
                    
                    imagedestroy($image);
                }
            }
        } catch(Exception $e) {
            // Nếu lỗi xử lý ảnh thì bỏ qua, vẫn trả về ảnh gốc upload thành công
        }
        // -------------------------------------

        return $_FILES[$file]['name'];
    }
    return false;
}
function upload_file($file, $folder, $newname=''){
    if(isset($_FILES[$file]) && !$_FILES[$file]['error']){

        $ext = strtolower(end(explode('.',$_FILES[$file]['name'])));
        $name = changeTitle(basename($_FILES[$file]['name'], '.'.$ext));

        $_FILES[$file]['name'] = $name.'_'.$newname.'.'.$ext;

        if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
            if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
                return false;
            }
        }
        return $_FILES[$file]['name'];
    }
    return false;
}
function thumb_image($file, $width, $height, $folder){	
	if(!file_exists($folder.$file))	return false; // không tìm thấy file
	
	if ($cursize = getimagesize ($folder.$file)) {					
		$newsize = setWidthHeight($cursize[0], $cursize[1], $width, $height);
		$info = pathinfo($file);
		
		$dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
		
		$types = array('jpg' => array('imagecreatefromjpeg', 'imagejpeg'),
					'gif' => array('imagecreatefromgif', 'imagegif'),
					'png' => array('imagecreatefrompng', 'imagepng'));
		$func = $types[$info['extension']][0];
		$src = $func($folder.$file); 
		imagecopyresampled($dst, $src, 0, 0, 0, 0,$newsize[0], $newsize[1],$cursize[0], $cursize[1]);
		$func = $types[$info['extension']][1];
		$new_file = str_replace('.'.$info['extension'],'_thumb.'.$info['extension'],$file);
		
		return $func($dst, $folder.$new_file) ? $new_file : false;
	}
}
function setWidthHeight($width, $height, $maxWidth, $maxHeight){
	$ret = array($width, $height);
	$ratio = $width / $height;
	if ($width > $maxWidth || $height > $maxHeight) {
		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
		if ($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
	}
	return $ret;
}
function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}
function transfer($msg,$page="index.php")
{
	 $_SESSION['transfer_msg'] = $msg;
	 redirect($page);
	 exit();
}

function getGiaTriDonHang($id_dh){
    $sp = db_result_array("donhang d, table_chitietdonhang c","d.id = c.madonhang and d.id = $id_dh");
    $cart_amount = 0;
    foreach ($sp as $row){
        $cart_amount += $row['dongia'] * $row['soluong'];
    }
    return $cart_amount;
}

function getSoLuongDonHang($id_dh){
    $donhang = db_fetch_array_sql("select sum(soluong) as soluong from #_chitietdonhang where madonhang = $id_dh group by madonhang");
    return $donhang['soluong'];
}

function getTongGiaTridonHang($id_user, $trangthai){
    global $d;

    $sql = "select sum(tonggia) as tonggia from #_donhang where id_user = $id_user and trangthai = $trangthai group by id_user";
    $d->reset();
    $d->query($sql);
    $result = $d->fetch_array();

    return $result['tonggia'];
}

function getUserLevel($id_user){
    global $d,$_trangthai_level;

    $tonggia = (int) getTongGiaTridonHang($id_user, $_trangthai_level);

    $d->reset();
    $d->setTable("user_level");
    $d->setWhere("value1 <= $tonggia");
    $d->setWhere("(value2 = 0 or value2 > $tonggia)");
    $d->select();
    $level = $d->fetch_array();

    return $level;
}

function getUserLevelName($id_user, $lang = 'vi'){
    $level = getUserLevel($id_user);
    return $level["ten_$lang"];
}

function checkSlug($slug,$table,$id,$lang = 'vi'){
    if(db_num_rows($table,"slug_$lang = '$slug' and id <> $id") > 0){
        return 1;
    }
    return 0;
}

function back(){
	echo '<script language="javascript">window.history.back(-2)</script>';
	exit();
}

function getWeekDay($time = 0){
    if($time == 0)
        $time = time();

    $weekday = date("l",$time);
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday;
}

function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}
function themdau($s){
	$s = addslashes($s);
	return $s;
}
function bodau($s){
	$s = stripslashes($s);
	return $s;
}
function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}
function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;
		$r2=array();
		
		$paging.="<ul>";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.="<li class='active'><a href='#'>".$i."</a></li>";//dang xem
					}
					else    
					{
						$paging1 .= "<li><a href='".$url."&curPage=".$i."'  class=\"{$class_paging}\">".$i."</a></li>";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .="<li><a href='".$url."' class=\"{$class_paging}\" >&larr;</a><li>"; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .="<li><a href='".$url."&curPage=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a></li>"; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .="<li><a href='".$url."&curPage=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a></li>"; //ke
				
				$paging .="<li><a href='".$url."&curPage=".($totalPages)."' class=\"{$class_paging}\" >&rarr;</a></li>"; //ve cuoi
			#}
		}
		$paging.="</ul>";
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
	
function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;
		$r2=array();
		$paging="";
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;		
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		$paging .= "<ul>";
		if($totalRows>$mxR)
		{
			$from = $curPg - $mxP;	
			$to = $curPg + $mxP;
			if ($from <=0) { $from = 1;   $to = $mxP*2; }
			if ($to > $totalPages) { $to = $totalPages; }
			for($j = $from; $j <= $to; $j++) {
			   if ($j == $curPg) $links = $links . "<li class='active'><a href='javascript:void(0)'>{$j}</a></li>";		
			   else{				
				$qt = $url. "&p={$j}";
				$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
			   } 	   
			} //for
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			if($curPg>$mxP)
			{
				//$paging .="<li><a href='".$url."'>&laquo;</a></li>"; //ve dau				
				$paging .="<li><a href='".$url."&p=".($curPg-1)."'><i class='fas fa-long-arrow-alt-left'></i></a></li>"; //ve truoc
			}else{
				//$paging .="<li><a href='".$url."'>&laquo;</a></li>"; //ve dau				
				$paging .="<li><a href='".$url."&p=".($curPg-1)."'><i class='fas fa-long-arrow-alt-left'></i></a></li>"; //ve truoc
			}
			$paging.=$links; 
			if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			{
				$paging .="<li><a href='".$url."&p=".($curPg+1)."'><i class='as fa-long-arrow-alt-left'></i></a></li>"; //ke
				//$paging .="<li class='disabled'><a href='".$url."&p=".($totalPages)."'>&raquo;</a></li>"; //ve cuoi
			}else{
				$paging .="<li><a href='".$url."&p=".($curPg+1)."'><i class='fas fa-long-arrow-alt-right'></i></a></li>"; //ke				
				//$paging .="<li><a href='".$url."&p=".($totalPages)."'>&raquo;</a></li>"; //ve cuoi
			}
		}
		$paging .= "</ul>";		
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;			
		$r3['totalRows']=$totalRows;		
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function catchuoi($chuoi,$gioihan){
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so sánh vị trí cắt
với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
nếu vị trí khoảng trắng lớn hơn
thì cắt chuỗi tại vị trí khoảng trắng đó
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// trường hợp còn lại không ảnh hưởng tới kết quả
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau
function changeTitle($str,$space = 0)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ \-]/','',$str);
	$str = str_replace("  "," ",$str);
    if(!$space)
	    $str = str_replace(" ","-",$str);
	return $str;
}
function add_leading_zero($value, $threshold = 2) {
    return sprintf('%0' . $threshold . 's', $value);
}
function madonhang($id){
    return 'LG-'.add_leading_zero($id,6);
}

function getThanhTien($id){
    global $d;

    $sql = "select p.giaban * c.soluong as tong from #_donhang d, #_chitietdonhang c, #_product p where d.id = c.madonhang and p.id = c.masanpham and d.id = $id";
    $d->reset();
    $d->query($sql);
    $sum = 0;
    foreach($d->result_array() as $row){
        $sum += $row['tong'];
    }
    return $sum;
}

function getCurrentPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    $pageURL .= $_SERVER["SERVER_NAME"];
    
    // Lấy đường dẫn gốc (không kèm query string)
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $path = $uri_parts[0];
    
    $pageURL .= $path;
    
    // Lấy tất cả tham số GET hiện tại
    $params = $_GET;
    
    // Loại bỏ các tham số không muốn giữ lại trong base URL phân trang
    unset($params['p']);
    unset($params['per_page']);
    unset($params['com']); // com thường được xử lý bởi rewrite rule, không cần append lại nếu dùng link rewrite
    unset($params['act']);
    
    // Nếu có tham số khác (ví dụ: keyword, type...) thì nối lại
    if (count($params) > 0) {
        $pageURL .= '?' . http_build_query($params);
    }
    
    return $pageURL;
}


function xss_cleaner($input_str) {
    $return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}

function checkRecaptcha(){
    global $_gcaptcha;
    // grab recaptcha library
    require_once "recaptchalib.php";

    // your secret key
    $secret = $_gcaptcha['secret_key'];
    // empty response
    $response = null;

    // check secret key
    $reCaptcha = new ReCaptcha($secret);

    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }


    if ($response != null && $response->success) {
        return true;
    }
    return false;
}

function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){
// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?
$new_width   = $width;
$new_height   = $height;
 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;
// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;
     default : die("UNKNOWN IMAGE TYPE: $image_url");
}
// scale down and add borders
	if ($zoom_crop == 3) {
		$final_height = $height * ($new_width / $width);
		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}
	}
	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);
	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);
	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);
	// scale down and add borders
	if ($zoom_crop == 2) {
		$final_height = $height * ($new_width / $width);	
		if ($final_height > $new_height) {
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));
		} else {
			$origin_y = $new_height / 2;			
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));
		}
	}
	// Restore transparency blending
	imagesavealpha ($canvas, true);
	if ($zoom_crop > 0) {
		$src_x = $src_y = 0;		
		$src_w = $width;
		$src_h = $height;
		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;
		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {
			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);
		} else if ($cmp_y > $cmp_x) {
			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);
		}
		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}
		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
    } else {
        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    }
$new_file = $file_name.'_'.$new_width.'x'.$new_height.'.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') 
	$func($canvas, $folder.$new_file,100);
else 
	$func($canvas, $folder.$new_file,floor ($quality * 0.09));
	
return $new_file;
}
function ChuoiNgauNhien($sokytu){
$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
for ($i=0; $i < $sokytu; $i++){
	$vitri = mt_rand( 0 ,strlen($chuoi) );
	$giatri= $giatri . substr($chuoi,$vitri,1 );
}
return $giatri;
}

function counttotal($category){
    $count=0;
    foreach($category as $ct){
        $rcount=(isset($ct['total']) && $ct['total']!="")?$ct['total']:0;
        $count=floatval($count)+floatval($rcount);
    }
    return $count;
}
function checkexistparent($listcate,$cate){
    $result=false;
    foreach($listcate as $lcate){
        if($lcate['id']==$cate){
            $result=true;
            break;
        }
    }
    return $result;
}

function getYoutubeId($url){
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    return $my_array_of_vars['v'];
}
function getYoutubeTitle($youtube_id){
    if($content=file_get_contents("http://youtube.com/get_video_info?video_id=".$youtube_id)) {
        parse_str($content, $ytarr);
        $title=$ytarr['title'];
    }
    else
        $title="No title";

    return $title;
}
function getYoutubeInfo($youtube_id){
    if($content=file_get_contents("http://youtube.com/get_video_info?video_id=".$youtube_id)) {
        parse_str($content, $ytarr);
        return $ytarr;
    }else
        return false;
}


function addBr($string){
    return str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
}

function inThoiLuong($number){

    $h = 0;
    $m = 0;
    $s = 0;

    $tmp = $number % 3600;
    $h = ( $number - $tmp ) / 3600;

    $tmp = ( $number - $h * 3600 ) % 60;
    $m = ( $number - $h * 3600 - $tmp ) / 60;

    $s = $number - ( $h * 3600 + $m * 60 );

    if( $h < 10 ) $h = '0' . $h;
    if( $m < 10 ) $m = '0' . $m;
    if( $s < 10 ) $s = '0' . $s;

    if($h == 0)
        return $m . ' : ' . $s;
    return $h . ' : ' . $m . ' : ' . $s;
}
// dem so nguoi online //

// ==== MENU ===

function getMenu(&$menu, $menus, $level = 0, $cur_level = 0, $id_parent = 0, $s = ''){

    $menu_tmp = array();
    foreach ($menus as $key => $item) {
        if ((int) $item['id_parent'] == (int) $id_parent) {
            $menu_tmp[] = $item;
            unset($menus[$key]);
        }
    }

    if ($menu_tmp)
    {
        if($level > 0 && $cur_level == $level)
            return;
        $cur_level ++;

        foreach ($menu_tmp as $item)
        {
            $id = $item['id'];
            $item['ten_vi'] = $s.$item['ten_vi'];
            $item['ten_en'] = $s.$item['ten_en'];
            $menu[] = $item;
            getMenu($menu,$menus,$level, $cur_level, $id, $s." -- --");
        }
    }
}
function getMenuNoS(&$menu, $menus, $level = 0, $cur_level = 0, $id_parent = 0){

    $menu_tmp = array();
    foreach ($menus as $key => $item) {
        if ((int) $item['id_parent'] == (int) $id_parent) {
            $menu_tmp[] = $item;
            unset($menus[$key]);
        }
    }

    if ($menu_tmp)
    {
        if($level > 0 && $cur_level == $level)
            return;
        $cur_level ++;
        foreach ($menu_tmp as $item)
        {
            $id = $item['id'];
            $menu[] = $item;
            getMenu($menu, $menus,$level, $cur_level, $id);
        }
    }
}

function showMenuSelect($menus, $id_cur = 0, $id_parent = 0, $lang = 'vi', $s = '')
{
    $menu_tmp = array();

    foreach ($menus as $key => $item) {
        if ((int) $item['id_parent'] == (int) $id_parent) {
            $menu_tmp[] = $item;
            unset($menus[$key]);
        }
    }

    if ($menu_tmp)
    {
        foreach ($menu_tmp as $item)
        {
            $id = $item['id'];
            $id_parent = $item['id_parent'];
            $link = $item["link"];
            $title = $s.$item["ten_$lang"];

            $selected = '';
            if($id_cur > 0 && $id_cur == $id)
                $selected = "selected";

            echo "<option $selected value='$id'>$title</option>";
            showMenuSelect($menus, $id_cur, $id, $lang, $s.'-- -- ');
        }
    }
}

function showMenuTree($id_item){
    global $d;
    if(!$id_item)
        return '';
    $item = db_fetch_array("news_item", "id = $id_item");
    $title = $item['ten_vi'];

    $id_parent = $item['id_parent'];
    if($id_parent > 0){
        $parent = db_fetch_array("news_item", "id = ".$item['id_parent']);
        $title = $parent['ten_vi']."<br/>-- -- ".$title;
    }

    return $title;
}

function getTen($id, $table, $lang = 'vi'){
	global $d;
	$d->reset();
	$d->setTable($table);
	$d->setWhere('id',$id);
	$d->select('ten_'.$lang.' as name');
	$row = $d->fetch_array();
	return $row['name'] != '' ? $row['name'] : 'N/A';
}
function getMenuCha(){
	global $d;
	
	$d->reset();
	$d->setTable('product_cat');
	$d->setOrder('stt, id desc');
	$d->select();
	
	return $d->result_array();
}
function getMenuCon($id){
	global $d;
	
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id_cat',$id);
	$d->setOrder('stt, id desc');
	$d->select();
	
	return $d->result_array();
}
function getSumItem($id_cat){
	global $d;
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id_cat',$id_cat);
	$d->select("count('id') as a");
	$row = $d->fetch_array();
	return $row['a'];
}
function getCatInfo($id){
	global $d;
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id', $id);
	$d->select();
	
	return $d->fetch_array();
}
function getCatInfo2($id){
	global $d;
	$d->reset();
	$d->setTable('product_cat');
	$d->setWhere('id', $id);
	$d->select();
	return $d->fetch_array();
}
function getItemInfo($id){
	global $d;
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id', $id);
	$d->select();
	return $d->fetch_array();
}
function getListItemInfo($id){
	global $d;
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id_list', $id);
	$d->setOrder('stt, id desc');
	$d->select();
	
	return $d->result_array();
}
function getNhanHang($id)
{
	global $d;
	$d->reset();
	$d->setTable('product_nh');
	$d->setWhere('id',$id);
	$d->select();
	
	return $d->fetch_array();
}
function dateFormat($time){
    if($time > 0)
	    return date('d/m/Y',$time);
    return "";
}
function dateTimeFormat($time){
    if($time > 0)
	    return date('H:i - d/m/Y',$time);
    return "";
}

function ThoiHanVip($time){
    if($time > 0){
        if($time > time())
            return "<span class='label label-success'>Còn hạn</span>";
        return "<span class='label label-warning'>Hết hạn</span>";
    }
}

function getHomePageTitle($title){
	$lenght = 30;
    if(strlen($title) > $lenght){
    	$title = substr($title, 0, $lenght).'...';
    }
    
	return $title;
}

function formatNumber($number){
	return number_format($number,0,'.','.');
}

function getUserInfo($user_id){
	global $d;
	
	$sql = "select * from #_user where id='$user_id'";
	$d->query($sql);
	
	if($d->num_rows()==0) 
		return false;
		
	return $d->fetch_array();
}

function getUsername($user_id){
    $row = getUserInfo($user_id);
    return $row['username'];
}
function getUserTen($user_id){
    $row = getUserInfo($user_id);
    return $row['ten'];
}

function getVideoCats($limit = 0){
	global $d;
	
	$d->reset();
	$d->setTable('product_cat');
	$d->setWhere('hienthi', 1);
	$d->setOrder('stt, id desc');
	if($limit > 0)
		$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}

function getVideoItems($id_cat, $limit = 0){
	global $d;
	
	$d->reset();
	$d->setTable('product_item');
	$d->setWhere('id_cat',$id_cat);
	$d->setWhere('hienthi', 1);
	$d->setOrder('stt, id desc');
	if($limit > 0)
		$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}

function getVideoByCat($id_cat, $limit = 0){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('id_cat',$id_cat);
	$d->setWhere('hienthi',1);
	$d->setOrder('time desc');
	if($limit > 0)
		$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}

function getVideoByItem($id_item){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('id_item',$id_item);
	$d->setWhere('hienthi',1);
	$d->setOrder('time desc');
	$d->select();
	
	return $d->result_array();
}

function getVideoDaPhat($limit = 5, $id_cat = 0){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('daphat',1);
	$d->setWhere('hienthi',1);
	if($id_cat > 0)
		$d->setWhere('id_cat',$id_cat);		
	$d->setOrder('time desc');
	$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}
function getVideoHauTruong($limit = 5, $id_cat = 0){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('hautruong',1);
	$d->setWhere('hienthi',1);
	if($id_cat > 0)
		$d->setWhere('id_cat',$id_cat);		
	$d->setOrder('time desc');
	$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}
function getVideoHot($limit = 5, $id_cat = 0){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('hot',1);
	$d->setWhere('hienthi',1);
	if($id_cat > 0)
		$d->setWhere('id_cat',$id_cat);		
	$d->setOrder('time desc');
	$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}

function db_result_array($table, $where = '', $order = '', $limit = '', $select = ''){
	global $d;
	
	$d->reset();
	$d->setTable($table);
	if($where != '')
		$d->setWhere($where);
	if($order != '')
		$d->setOrder($order);
    if($limit != '')
        $d->setLimit($limit);
    if($select != '')
        $d->select($select);
	else 
		$d->select();
	return $d->result_array();
}

function db_fetch_array($table, $where = '', $order = '', $select = ''){
    global $d;

    $d->reset();
    $d->setTable($table);
    if($where != '')
        $d->setWhere($where);
    if($order != '')
        $d->setOrder($order);
    if($select != '')
        $d->select($select);
    else
        $d->select();

    return $d->fetch_array();
}

function db_result_array_sql($sql){
    global $d;

    $d->reset();
    $d->query($sql);
    return $d->result_array();
}

function db_fetch_array_sql($sql){
    global $d;

    $d->reset();
    $d->query($sql);

    return $d->fetch_array();
}

function db_num_rows($table, $where = '', $order = '', $select = ''){
    global $d;

    $d->reset();
    $d->setTable($table);
    if($where != '')
        $d->setWhere($where);
    if($order != '')
        $d->setOrder($order);
    if($select != '')
        $d->select($select);
    else
        $d->select();

    return $d->num_rows();
}

function getNumsCmt($id){
    return db_num_rows("comment", "id_news = $id and id_parent = 0");
}
function getNewsOption($row){
    $numsCmt = getNumsCmt($row['id']);
    $option = '';

    if($row["hasPhoto"])
        $option .= "<i class='fa fa-camera'></i> ";
    if($row['youtube'] != '')
        $option .= "<i class='fa fa-video-camera'></i> ";
    if($numsCmt > 0)
        $option .= "<i class='fa fa-comment-o'></i> ".$numsCmt;

    return $option;
}
function getNewsInfo($row){
    $numsCmt = getNumsCmt($row['id']);
    $views = $row['views']+1000;
    $date = date("d/m/Y", $row['ngaytao']);
    if($row['ngaydang'] > 0)
        $date = date("d/m/Y", $row['ngaydang']);
    $user = getUsername($row['id_user']);

    $info = "<i class='fa fa-calendar'></i>&nbsp;&nbsp;$date&nbsp;&nbsp;|&nbsp;&nbsp;<i class='fa fa-eye'></i> $views";
    return $info;
}
function getNewsInfo2($row){
    $numsCmt = getNumsCmt($row['id']);
    $info = '<p class="newsInfo2">By '.getUsername($row['id_user'])."&nbsp;&nbsp;|&nbsp;&nbsp;".date("d M y", $row['ngaytao']);
    return $info;
}

function getVideoNew($limit = 5, $id_cat = 0){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('hot = 0');
	if($id_cat > 0)
		$d->setWhere('id_cat',$id_cat);	
	$d->setWhere('hienthi',1);
	$d->setOrder('time desc');
	$d->setLimit("0, $limit");
	$d->select();
	
	return $d->result_array();
}

function getItemByCat($id_cat){
	global $d;
	
	$d->reset();
	$d->setTable('news_item');
	$d->setWhere('hienthi', 1);
	$d->setWhere('id_cat', $id_cat);
	$d->setOrder('stt, id desc');
	$d->select();
	
	return $d->result_array();
}

function videoViewsPlus($id_video){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('id_video', $id_video);
	$d->select('views');
	$row = $d->fetch_array();
	
	$data['views'] = $row['views'] + 1;
	$d->update($data);
}

function getVideoInfo($id_video){
	global $d;
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere('id_video', $id_video);
	$d->select();
	return $d->fetch_array();
}

function getBannerBackground(){
	global $d;
	
	$d->reset();
	$d->setTable('quangcao3');
	$d->setWhere('hienthi', 1);
	$d->setOrder('shows');
	$d->select();
	$row = $d->fetch_array();
	
	if($row != null){
		$data['shows'] = $row['shows'] + 1;
		$d->setWhere('id', $row['id']);
		$d->update($data);
	}
	
	return $row;
}
function getBannerVideo(){
	global $d;
	
	$d->reset();
	$d->setTable('quangcao4');
	$d->setWhere('hienthi', 1);
	$d->setOrder('shows');
	$d->select();
	$row = $d->fetch_array();
	
	if($row != null){
		$data['shows'] = $row['shows'] + 1;
		$d->setWhere('id', $row['id']);
		$d->update($data);
	}
	
	return $row;
}

function getAdVideo(){
    global $d;

    $d->reset();
    $d->setTable('quangcao2');
    $d->setWhere('hienthi', 1);
    $d->setOrder('shows');
    $d->select();
    $row = $d->fetch_array();

    if($row != null){
        $data['shows'] = $row['shows'] + 1;
        $d->setWhere('id', $row['id']);
        $d->update($data);
    }

    return $row;
}

function getRelatedVideo($id_video, $limit = 0){
	global $d;
	
	$video = getVideoInfo($id_video);
	
	$d->reset();
	$d->setTable('video');
	$d->setWhere("id_video <> $id_video");
	$d->setWhere("(id_cat = ".$video['id_cat']." or id_item = ".$video['id_item'].")");
	$d->setWhere('hienthi',1);
	if($limit > 0)
		$d->setLimit("0, $limit");
	$d->select();
	return $d->result_array();
}
function isloged(){
	global $login_name;
	
	return $_SESSION[$login_name];
}


function inChuoi($s){
	return $s == '0' ? '' : $s;
}
function inChuoi2($s){
	return $s == '1' ? 'Có' : '-';
}

function mail_it($content, $subject, $email, $recipient, $headers_order='') {
   global $attachment_chunk, $attachment_name, $attachment_type, $attachment_sent, $bcc;

    $separator = md5(time());
    $eol = PHP_EOL;

   $ob = "----=_OuterBoundary_000";
   $ib = "----=_InnerBoundery_001";
   $headers .= "From: ".$email."\n";
   $headers .= "To: ".$recipient."\n";
   $headers .= "Reply-To: ".$email."\n";
   if ($bcc) $headers .= "Bcc: ".$bcc."\n";
   $headers .= "MIME-Version: 1.0\r\n";

   if($headers_order != ''){
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
        $headers .= "--" . $separator . $eol;
        //$headers .= "Content-Type: multipart/alternative; boundary=\"" . $separator . "\"" . $eol . $eol;
        $headers .= $headers_order;
        $headers .= "--" . $separator . $eol;
   }

   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $headers .= "X-Priority: 1\n";
   $headers .= "X-Mailer: DT Formmail".VERSION."\n";

   $message .= $content."\n\n";

   mail($recipient, $subject, $message, $headers);
}

function sendMail($emails, $subject, $body){
    global $config;

    @include_once "phpmailer/class.phpmailer.php";
    @include_once "../phpmailer/class.phpmailer.php";
    //Khởi tạo đối tượng
    $mail = new PHPMailer();
    //Thiet lap thong tin nguoi gui va email nguoi gui
    $mail->IsSMTP(); // Gọi đến class xử lý SMTP
    $mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
    $mail->SMTPSecure = "ssl";
    $mail->Host       = $config['email']['host'];     // Thiết lập thông tin của SMPT
    $mail->Port       = $config['email']['port'];     // Thiết lập cổng gửi email của máy
    $mail->Username   = $config['email']['email'];    // SMTP account username
    $mail->Password   = $config['email']['password']; // SMTP account password
    $mail->SetFrom("legrooming2019@gmail.com","LE GROOMING");
    //Thiết lập email nhận email hồi đáp

    //nếu người nhận nhấn nút Reply
    $mail->AddReplyTo("legrooming2019@gmail.com","LE GROOMING");

    //Thiết lập thông tin người nhận
    if(is_array($emails))
        foreach($emails as $k=>$v)
            $mail->AddAddress($v);
    else
        $mail->AddAddress($emails);

    //Thiết lập tiêu đề
    $mail->Subject    = $subject;
    //Thiết lập định dạng font chữ
    $mail->CharSet = "utf-8";
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

    //Thiết lập nội dung chính của email
    $mail->MsgHTML($body);
    return $mail->Send();
}

    function mailSend_admin($content, $subject, $email = '', $email2='') {
        global $config;

        // Bao gồm class SMTP mới
        include_once __DIR__ . "/class.smtp.php";

        if($config['email']['on']) {
            $to = ($email != '') ? $email : $config['email']['email2'];
            if($to == '') $to = 'it@khaservice.com.vn';

            // Lấy cấu hình từ config.php
            // Ưu tiên sử dụng host của SendGrid nếu có
            $host = 'smtp.sendgrid.net'; 
            $port = 587; // Cổng chuẩn cho SendGrid
            $username = 'apikey'; // SendGrid luôn dùng user là 'apikey'
            $password = $config['email']['password']; // Mật khẩu là API Key SG...
            $from_email = $config['email']['email'];
            $from_name = $config['email']['name'];

            // Nếu mật khẩu không phải key SendGrid (không bắt đầu bằng SG), dùng cấu hình gốc
            if(strpos($password, 'SG') !== 0) {
                 $host = $config['email']['host'];
                 $port = $config['email']['port'];
                 $username = $config['email']['username']; // Cần check lại key này trong config nếu không phải sendgrid
            }

            // Fallback user nếu config sai
            if($username == '') $username = 'apikey';

            $smtp = new SimpleSMTP($host, $port, $username, $password);
            
            return $smtp->send($to, $subject, $content, $from_email, $from_name);
        }
        return false;
    }



function getEmailTemplate($content){
    global $config_url;

    $url = "https://$config_url/";
    $body ="
        <meta charset='UTF-8'>
        <table border='0' cellspacing='0' cellpadding='0' style='margin: 0 auto; width:600px;font-family: Lato,sans-serif; font-size: 10.5pt; line-height: 150%'>
            <tr>
                <td style='border: solid 1px #dcdcdc'>
                </td>
            </tr>
            <tr>
                <td style='padding: 20px; border: solid 1px #dcdcdc; border-top: 0px;'>

                    $content

                    <p>
                        <hr/>
                        Trân trọng cảm ơn,<br/>
                        <b>Le Grooming</b>
                    </p>
                </td>
            </tr>
        </table>
    ";
    return $body;
}

    function getDiscount($code){
        global $d, $userInfo, $disEmail;
        if($userInfo || $disEmail) {
            $discount = db_fetch_array("discount", "code like '$code' and active > 0");

            if (!$discount || $discount['number'] == 0 || ($discount['expire'] > 0 && $discount['expire'] <= time()))
                return false;

            $used = getDiscountUsed($discount['id']);

            if ($discount['number'] > $used)
                return $discount;
        }

        return false;
    }

    function soLuongDaBan($id){
        if($id > 0) {
            $sql = "select sum(ct.soluong) as soluong from #_chitietdonhang ct, #_donhang d where d.id = ct.madonhang and d.trangthai < 100 and ct.masanpham = $id group by ct.masanpham";
            $row = db_fetch_array_sql($sql);
            return (int)$row['soluong'];
        }
        return 0;
    }
    function soLuongConLai($id){
        $pInfo = db_fetch_array("product","id = $id");
        $daban = soLuongDaBan($id);
        return $pInfo['sl'] - $daban;
    }

    function soLuong_update($id_p,$mail = false){
        global $d;

        $sp = db_fetch_array("product","id = $id_p");
        $daban = soLuongDaBan($id_p);

        if(($sp['sl'] - $daban) <= 0){
            $data['status'] = 2;
            $subj = "Sản phẩm ".strtoupper($sp['ten_vi'])." đã hết hàng";
        }elseif(($sp['sl'] - $daban) <= $sp['sl_min']){
            $data['status'] = 1;
            $subj = "Sản phẩm ".strtoupper($sp['ten_vi'])." sắp hết hàng";
        }else{
            $data['status'] = 0;
        }

        if($sp['status'] != $data['status']) {
            $d->reset();
            $d->setTable('product');
            $d->setWhere('id', $id_p);
            $d->update($data);
            if ($mail) {
                $body = "<h4>$subj</h4>
                    <table border='1' cellspacing='0' cellpadding='5' width='250'>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td><b>".strtoupper($sp['code'])."</b></td>
                        </tr>
                        <tr>
                            <td>Số lượng hàng</td>
                            <td><b>".$sp['sl']."</b></td>
                        </tr>
                        <tr>
                            <td>Đã bán</td>
                            <td><b>$daban</b></td>
                        </tr>
                        <tr>
                            <td>Còn lại</td>
                            <td><b>".($sp['sl'] - $daban)."</b></td>
                        </tr>
                        <tr>
                            <td>SL tối thiểu</td>
                            <td><b>".$sp['sl_min']."</b></td>
                        </tr>
                    </table>";
                mailSend($body, $subj, constant('mail_admin'));
            }
        }
    }

    function ghiLogAdmin($id_user, $noidung){
        global $d;
    }

    function getDiscountUsed($id){
        global $d;

        $sql = "select count(id) as num from #_discount_used where id_discount = $id group by id_discount";
        $d->reset();
        $d->query($sql);
        $dt = $d->fetch_array();
        return $dt['num'];
    }

    function sendSms($phone, $sms){
        global $_sms, $d;

        if($_sms['on']) {
            $sender = $_sms['sender'];
            $username = $_sms['username'];
            $password = $_sms['password'];

            $url = 'http://124.158.14.49/CMC_BRAND/Service.asmx/SendSMSBrandName';
            $data = array('phone' => $phone, 'sms' => $sms, sender => $sender, username => $username, password => $password);

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if ($result === FALSE) {
                // Gửi lỗi
            }

            $dt['phone'] = $phone;
            $dt['sms'] = $sms;
            $dt['status'] = $result;
            $dt['ngaygui'] = time();

            $d->reset();
            $d->setTable('log_sms');
            $d->insert($dt);
        }
    }


function getReview_g($id,$review){
    $quiz = json_decode($review,true);
    $data = '';
    $data['total'] = 0;
    $data['num'] = 0;

    if(count($quiz[$id]) > 0)
    foreach($quiz[$id] as $k=>$v){
        $data['total'] += $v;
        $data['num']++;
    }

    return $data;
}

function getReview_group($id,$show_at){
    $where = "(link2 like '$show_at-%' or link2 like '%-$show_at-%' or link2 like '%-$show_at')";
    $listReview = db_result_array("review","hienthi = 1 and $where");

    $total = 0;
    $num = 0;

    foreach($listReview as $row){
        $quiz = json_decode($row['review'], true);
        $data = '';
        $data['total'] = 0;
        $data['num'] = 0;
        if(count($quiz[$id]) > 0)
            foreach ($quiz[$id] as $k => $v) {
                $data['total'] += $v;
                $data['num']++;
            }
        $total += $data['num'] > 0 ? round($data['total']/$data['num'],1) : 0;
        $num++;
    }

    return $num > 0 ? round($total/$num,1) : 0;
}

function getReview_avg($review){
    $quiz = json_decode($review,true);

    $total = 0;
    $num = 0;

    foreach($quiz as $key=>$val) {
        $data = '';
        $data['total'] = 0;
        $data['num'] = 0;

        foreach ($val as $k => $v) {
            $data['total'] += $v;
            $data['num']++;
        }

        $total += round($data['total'] / $data['num'],1);
        $num++;
    }

    $tbc = $total/$num;
    if($tbc > 5)
        return round($tbc/2,1);

    return round($tbc,1);
}

function checkusecate($listcate,$cate){
    $result=false;
    foreach($listcate as $lcate){
        if($lcate==$cate){
            $result=true;
            break;
        }
    }
    return $result;
}

function getAvailability($row){
    $result='';
    if(isset($row) && isset($row['availability'])){
        switch ($row['availability']){
            case 1:
                $result='Availability: <span style="color:#cc3300">In Stock (Order Processing time 3-5 business days)</span>';
                break;
            case 2:
                $result='Availability: <span style="color:#cc3300">Out of Stock</span>';
                break;
            case 3:
                $result='Availability: <span style="color:#cc3300">Special Order</span>';
                break;
            case 4:
                $result='Availability:<span style="color:#cc3300">'.$row['availability_text'].'</span>';
                break;
            default:
                $result='';
                break;
        }
    }

    return $result;

}

function checkVIP($userInfo){
    if($userInfo['vip'] > time())
        return true;
    return false;
}

function gioHangNum(){
    if($_SESSION['cart']){
        $num = 0;
        $tong = 0;
        foreach ($_SESSION['cart'] as $k => $v){
            $product = get_product_info($v['productid']);
            $num += $v['qty'];
            $tong += ($v['qty']*$product['giaban']);
        }
        return $num . ' / ' . formatNumber($tong).'đ';
    }
    return "0 / 0đ";
}

function get_product_info($id){
    return db_fetch_array("product","id = $id");
}
function showRatedStarts($id){
    $n = getRated($id);
    $t = 5 - $n;
    for($i = 1; $i <= $n; $i++){
        echo "<i class='fa fa-star'></i>";
    }
    for($i = 1; $i <= $t; $i++){
        echo "<i class='fa fa-star-o'></i>";
    }
}
function showRateStarts($n){
    $t = 5 - $n;
    for($i = 1; $i <= $n; $i++){
        echo "<i class='fa fa-star'></i>";
    }
    for($i = 1; $i <= $t; $i++){
        echo "<i class='fa fa-star-o'></i>";
    }
}
function showRateStartsFE($n){
    $t = 5 - $n;
    for($i = 1; $i <= $n; $i++){
        echo '<i class="fas fa-star"></i>';
    }
}
function getRated($id){
    $rate = db_fetch_array_sql("select avg(rate) as rate from #_rating where id_post = $id group by id_post");
    return (int) $rate['rate'];
}

function get_photo($photo, $default = 'img/no-image.png') {
    if(!empty($photo) && file_exists($photo)) {
        return $photo;
    }
    if(file_exists($default)) {
        return $default;
    }
    return 'https://placehold.co/600x400/ebebeb/a8a8a8?text=KHASERVICE';
}

function upload_images($file, $extension, $folder, $newname = '', $max_file = 999)
{

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $photos = [];

    if ($_FILES[$file]) {
        foreach ($_FILES[$file]['name'] as $i => $v) {
            if (isset($_FILES[$file]) && !$_FILES[$file]['error'][$i]) {
                $expName = explode('.', $_FILES[$file]['name'][$i]);
                $ext     = strtolower(end($expName));
                $name    = basename($_FILES[$file]['name'][$i], '.' . $ext);

                if (strpos($extension, $ext) === false) {
                    alert('Chỉ hỗ trợ upload file dạng ' . $extension);
                    return false; // không hỗ trợ
                }

                if ($newname == '' && file_exists($folder . $_FILES[$file]['name'][$i])) {
                    $_FILES[$file]['name'][$i] = $name . time() . $i . '.' . $ext;
                } else {
                    $_FILES[$file]['name'][$i] = ($newname ? $newname : time()) . $i . '.' . $ext;
                }

                if (!copy($_FILES[$file]["tmp_name"][$i], $folder . $_FILES[$file]['name'][$i])) {
                    if (!move_uploaded_file($_FILES[$file]["tmp_name"][$i], $folder . $_FILES[$file]['name'][$i])) {
                        return false;
                    }
                }

                $photos[] = $_FILES[$file]['name'][$i];
            }
        }
    }

    if (count($photos) > 0) {
        return $photos;
    }

    return false;
}