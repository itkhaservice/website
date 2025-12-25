<?php
	function get_product($pid){
		global $d, $row;

		$d->reset();
		$sql = "select * from #_product where id='$pid'";
		$d->query($sql);
		$row = $d->fetch_array();
		
		if($row['gia']>0 && $row['giakm']>0)
		{
			$row['gia']=$row['giakm'];
		}
		return $row;
	}
	
	function remove_product($pid,$size,$mau){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $size==$_SESSION['cart'][$i]['size'] && $mau==$_SESSION['cart'][$i]['mau']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		if(count($_SESSION['cart'])==0)
		{
			$redirect=true;		
		}
		else
		{
			$redirect=false;
		}
	}
	function get_order_total(){
		global $d;
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_product($pid);
			
			$sum+=$price['gia']*$q;
		}
		return $sum;
	}
	
	function get_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$q=$_SESSION['cart'][$i]['qty'];
			$sum+=$q;
		}
		return $sum;
	}

	function get_total_by_id($pid){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			if($_SESSION['cart'][$i]['productid']==$pid)
			{
				$q=$_SESSION['cart'][$i]['qty'];
				$sum+=$q;
			}
		}
		return $sum;
	}
	
	
	function addtocart($pid,$q,$size,$mau){
		if($pid<1 or $q<1) return;

		if(is_array($_SESSION['cart'])){
			$ck=product_exists($pid,$size,$mau);
			if($ck==-1)
			{
				## Sản phẩm chưa có => thêm vào giỏ hàng
				$max=count($_SESSION['cart']);
				$_SESSION['cart'][$max]['productid']=$pid;
				$_SESSION['cart'][$max]['qty']=$q;
				$_SESSION['cart'][$max]['size']=$size;
				$_SESSION['cart'][$max]['mau']=$mau;
			}
			else
			{
				## Sản phẩm đã có => cộng dồn số lượng
				$_SESSION['cart'][$ck]['qty']=$q+$_SESSION['cart'][$ck]['qty'];			
			}
		}else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
			$_SESSION['cart'][0]['size']=$size;
			$_SESSION['cart'][0]['mau']=$mau;
		}
	}

	function product_exists($pid,$size,$mau){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=-1;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $size === $_SESSION['cart'][$i]['size'] && $mau==$_SESSION['cart'][$i]['mau']){
				$flag=$i;
				break;
			}
		}
		return $flag;
	}

?>