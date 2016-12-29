<div class="block-news">
	<div class="title-right"><h2><span>Tin tức nổi bật</span></h2></div>
	<div class="owl-carousel owl-news">
		<?php for ($i=0; $i < count($newsnb) ; $i++) { ?>
		<div class="item">
			<a href="tin-tuc/<?=$newsnb[$i]['tenkhongdau']?>.html"><img src="thumb.php?src=<?=_upload_baiviet_l.$newsnb[$i]['thumb']?>&h=100&w=150&zc=1&q=80"></a>
			<h3><a href="tin-tuc/<?=$newsnb[$i]['tenkhongdau']?>.html"><?=$newsnb[$i]['ten']?></a></h3>
			<p><?=catchuoi($newsnb[$i]['mota'],120)?></p>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
</div>