<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];


	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	
	$d = new database($config['database']);
	
		if(isset($_GET['id'])){
			
			$id=(int)$_GET['id'];
			$d->reset();
			$sql="select hit from #_product WHERE id='$id'";
			$d->query($sql);
			$hit=$d->fetch_array();
		}
	
	
?> 
<?=$hit['hit']?> lượt đánh giá sản phẩm này