<div class="footer">
	<div id="footer">
		<div class="footer-detail">
			<?=$footer['noidung']?>
			<div class="social">
				<?php for ($i=0; $i < count($mxh) ; $i++) { ?>
	            <a href="<?=$mxh[$i]['url']?>" target="blank"><img src="thumb.php?src=<?=_upload_hinhanh_l.$mxh[$i]['photo']?>&h=38&w=38&zc=1&q=80" alt="<?=$mxh[$i]['ten']?>"></a>
	            <?php } ?>
			</div>
		</div>
		<div class="stk"><?=$stk['noidung']?></div>
		<div class="clear"></div>	
	</div>
</div>