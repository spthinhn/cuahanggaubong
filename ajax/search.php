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
	$d = new database($config['database']);	

	if(isset($_POST['keyword'])){
		$tukhoa =  $_POST['keyword'];
		$tukhoa = trim(strip_tags($tukhoa));    	
		if (get_magic_quotes_gpc()==false) {
			$tukhoa = mysql_real_escape_string($tukhoa);    			
		}								
		$sql = "select id,ten_$lang as ten,id,thumb,tenkhongdau,mota_$lang,giaban,giacu from #_product where (ten_vi LIKE '%$tukhoa%' or masp LIKE '%$tukhoa%') and hienthi=1 and type='product' order by stt,id desc limit 15";
		$d->query($sql);
		$product = $d->result_array();	
		foreach ($product as $key => $value) {
			$fc_sql = "select * from table_size where product_id = ".$product[$key]['id']." order by size limit 1";
			$fc_stmt = $d->query($fc_sql);
			$test = $d->fetch_array();
			$product[$key]['price'] = $test['price'];
		}		
	}	
?>   


<ul>
	<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
	<li>
		<a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html" title="<?=$product[$i]['ten']?>">
			<img src="<?php if($product[$i]['thumb']!=NULL) echo _upload_product_l.$product[$i]['thumb']; else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" />		
		</a>
		<p><a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html" title="<?=$product[$i]['ten']?>"><?=$product[$i]['ten']?></a></p>
		<p id="price">Giá : <?php if($product[$i]['price']==0) echo 'Liên hệ'; else echo number_format ($product[$i]['price'],0,",",",").' '.VND ; ?></p>
		<div class="clear"></div>
	</li><!---END .item-->
	<?php } ?>
</ul>
