<div class="slider">
	<div class="left-slider">
		<div class="owl-carousel owl-theme owl-slider">	
			<?php for ($i=0; $i < count($slider); $i++) { ?>		
			<div class="item">
				<a href="<?=$slider[$i]['link']?>" target="blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$slider[$i]['photo_vi']?>&h=325&w=585&zc=1&q=100" alt="<?=$slider[$i]['ten_vi']?>"></a>
				<h3><?=$slider[$i]['ten_vi']?></h3>
			</div>
			<?php } ?>			
		</div>
		<div class="adsvertsing"><a href="<?=$adsvertsing['link']?>" target="blank"><img src="<?=_upload_hinhanh_l.$adsvertsing['photo_vi']?>"></a></div>
	</div>
	<div class="right-slider">
		<div class="owl-carousel owl-theme owl-video">
			<?php for ($i=0; $i < count($videos); $i++) { ?>			
			<div class="item">
				<a href="<?=$videos[$i]['link']?>" target="blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$videos[$i]['photo_vi']?>&h=325&w=585&zc=1&q=100"></a>
				<a class="icon-video" href="<?=$videos[$i]['link']?>" target="blank"><img src="images/icon-video.png"></a>				
			</div>
			<?php } ?>					
		</div>
		<div class="block-video">
			<?php for ($i=0; $i < count($sub_videos); $i++) { ?>
			<div class="items-video <?php if(($i+1)%3==0) echo 'margin-right'; ?>">
				<a href="<?=$sub_videos[$i]['link']?>" target="blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$sub_videos[$i]['thumb_vi']?>&h=140&w=190&zc=1&q=80"></a>
				<a class="icon-video" href="<?=$sub_videos[$i]['link']?>" target="blank"><img src="images/icon-video.png"></a>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>