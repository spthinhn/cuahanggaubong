<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	
	@define ( '_lib' , '../libraries/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
    
	$d = new database($config['database']);
		
	@$pid = $_POST['pid'];
	@$check = $_POST['check'];
	@$thongtin = $_POST['thongtin'];
	if($_POST['soluong']>0){
		@$soluong = $_POST['soluong'];
	}else {
		@$soluong = 1;
	}
     
    
    $result_giohang = addtocart($pid,$soluong,$check);

    $count = count($_SESSION['cart']);
	
	$result = array('result_giohang' => $result_giohang,'count' => $count,'check' => $_POST['check']);
	
	echo json_encode($result);
?>