<?php
	$d->reset();
	$sql = "select * from #_lkweb where hienthi=1 and type='lkweb' order by stt,id desc ";
	$d->query($sql);
	$lienket = $d->result_array();
?>

<div class="lienket">
<!-- <h4>Liên kết mạng xã hội</h4> -->
<?php for($i=0;$i<count($lienket);$i++){?>
	<a href="<?=$lienket[$i]['url']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$lienket[$i]['thumb']?>" alt="<?=$lienket[$i]['ten_'.$lang]?>" /></a>
<?php } ?>
</div>
