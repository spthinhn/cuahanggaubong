<?php
	function get_product_name($pid){
		global $d, $row,$lang;
		$sql = "select ten_$lang from table_product where id='".$pid."'";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten_'.$lang];
	}

	function get_fc_size_price($id_size){
		global $d, $row;
		$sql = "select * from table_size where id='".$id_size."'";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row;
	}	
		
	function get_thumb($pid){
		global $d, $row;
		$sql = "select thumb from table_product where id='".$pid."' ";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['thumb'];
	}
	function remove_product($pid,$thongtin){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $thongtin==$_SESSION['cart'][$i]['thongtin']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function remove_pro_thanh($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		redirect('thanh-toan.html');
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$check=$_SESSION['cart'][$i]['check'];
			$q=$_SESSION['cart'][$i]['qty'];
			$fc=get_fc_size_price($check);
			$price=$fc['price'];
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$q,$check){
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid,$q,$check)) return 0;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
			$_SESSION['cart'][$max]['check']=$check;
			return count($_SESSION['cart']);
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
			$_SESSION['cart'][0]['check']=$check;
			return count($_SESSION['cart']);	
		}
	}
	function product_exists($pid,$q,$check){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] && $check==$_SESSION['cart'][$i]['check']){
				$_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $q;
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>