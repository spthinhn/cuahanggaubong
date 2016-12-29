<?php  if(!defined('_source')) die("Error");



    $per_page = 15; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_product where hienthi=1 and noibat=1 and type='product' order by stt,ngaytao desc";

	$sql = "select ten_$lang,id,thumb,tenkhongdau,mota_$lang,giaban,giacu from $where $limit";
	$d->query($sql);
	$product = $d->result_array();
	foreach ($product as $key => $value) {
		$fc_sql = "select * from #_size where product_id = ".$product[$key]['id']." order by size limit 1";
		$fc_stmt = $d->query($fc_sql);
		$test = $d->fetch_array();
		$product[$key]['price'] = $test['price'];
	}
	
	$url = 'index.html';
	$paging = pagination($where,$per_page,$page,$url);
    
?>