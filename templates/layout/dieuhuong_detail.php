<?php

	$d->reset();
	$sql = "select * from #_product_list where id='".$row_detail['id_list']."' ";
	$d->query($sql);
	$row_detail_list = $d->fetch_array();

	$d->reset();
	$sql = "select * from #_product_cat where id='".$row_detail['id_cat']."' ";
	$d->query($sql);
	$row_detail_cat = $d->fetch_array();

?>
<script type="text/javascript">
$(document).ready(function(){
	$('.cont-filter-attr input').click(function(){
		$('.cont-filter-attr input:checked').each(function(){
			var checkedValue = $(this).val();
			if(checkedValue){
				var id = $(this).val();
				link = link+''+id;
			}
		});
		window.location.href=link;
	});
});
</script>

<div class="dieuhuong">  

    <a href="trang-chu.html" itemprop="url" title="trang chủ"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</span></a><font><i class="fa fa-angle-double-right" aria-hidden="true"></i></font>
    <a href="cua-hang-gau-bong.html" itemprop="url" title="Sản phẩm<"><span itemprop="title">Sản phẩm</span></a><font><i class="fa fa-angle-double-right" aria-hidden="true"></i></font>
    
	<?php if($row_detail_list['id']!=''){?>
		<a title="<?=$row_detail_list['ten_'.$lang]?>" itemprop="url" href="cua-hang-gau-bong/<?=$row_detail_list['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_list['ten_'.$lang]?></span></a><font><i class="fa fa-angle-double-right" aria-hidden="true"></i></font>
	<?php } ?>

	<?php if($row_detail_cat['id']!=''){?>
		<a title="<?=$row_detail_cat['ten_'.$lang]?>" itemprop="url" href="cua-hang-gau-bong/<?=$row_detail_list['tenkhongdau']?>/<?=$row_detail_cat['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_cat['ten_'.$lang]?></span></a><font><i class="fa fa-angle-double-right" aria-hidden="true"></i></font>
	<?php } ?>

	<?php if($row_detail_item['id']!=''){?>
	<a title="<?=$row_detail_item['ten_'.$lang]?>" itemprop="url" href="cua-hang-gau-bong/<?=$row_detail_list['tenkhongdau']?>/<?=$row_detail_cat['tenkhongdau']?>/<?=$row_detail_item['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_item['ten_'.$lang]?></span></a><font><i class="fa fa-angle-double-right" aria-hidden="true"></i></font>
	<?php } ?>

	<a title="<?=$row_detail['ten_'.$lang]?>" itemprop="url" href="cua-hang-gau-bong/<?=$row_detail['tenkhongdau']?>.html"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a>
</div>
