<?php
	
	$d->reset();
	$sql = "select noidung_$lang from #_company where type='footer' ";
	$d->query($sql);
	$footer = $d->fetch_array();

	$d->reset();
	$sql = "select thumb,link from #_photo where hienthi=1 and type='doitac' order by id desc";
	$d->query($sql);
	$doitac = $d->result_array();

	$d->reset();
	$sql = "select * from #_yahoo where hienthi=1 order by id desc";
	$d->query($sql);
	$yahoo = $d->result_array();

	$d->reset();
	$sql = "select tenkhongdau,ten_$lang,ngaytao,thumb,mota_$lang from #_baiviet where hienthi=1 and type='tintuc' and noibat!=0 order by id desc limit 0,4";
	$d->query($sql);
	$tin_hot = $d->result_array();

	$d->reset();
	$sql = "select * from #_photo where type='bando' ";
	$d->query($sql);
	$bando = $d->fetch_array();

?>

 
<?php if($_GET['com']=='' || $_GET['com']=='index' || $_GET['com']=='trang-chu'){?>

<aside id="thongtin">
<div class="margin_auto">
		<div class="khung_tt">
		<div class="thanh_bottom"><h4><img src="images/tintuc.png" alt="tin tuc" /> tin tức</h4></div>
		<div class="hotnews">
			<div class="bottom_ti">
				 <a href="tin-tuc/<?=$tin_hot[0]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tin_hot[0]['thumb']?>" border="0" align="left"  /></a>
			     <h3><a href="tin-tuc/<?=$tin_hot[0]['tenkhongdau']?>.html" ><?=_substr($tin_hot[0]['ten_'.$lang],40)?></a></h3>
			     <p><span style=" color:#ccc;">Ngày Đăng : <?=date('d/m/Y - g:i A',$tin_hot[0]['ngaytao']);?></span></p>
			     <?=_substr($tin_hot[0]['mota_'.$lang],245)?>
			</div>

			<ul>
			<?php for($i=0;$i<count($tin_hot);$i++){?>
				<li>
			            <a href="tin-tuc/<?=$tin_hot[$i]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tin_hot[$i]['thumb']?>" border="0" align="left" width="115" height='85'  /></a>
			            <h3><a href="tin-tuc/<?=$tin_hot[$i]['tenkhongdau']?>.html" ><?=_substr($tin_hot[$i]['ten_'.$lang],40)?></a></h3>
			            <p><span style=" color:#ccc;">Ngày Đăng : <?=date('d/m/Y - g:i A',$tin_hot[$i]['ngaytao']);?></span></p>
			            <?=_substr($tin_hot[$i]['mota_'.$lang],145)?>
				</li>
			<?php } ?>
			</ul>
		</div>
		</div>	


		<div class="khung_vd">
		<div class="thanh_bottom"><h4> <img src="images/video.png" alt="tin tuc" />  Video</h4></div>
		<div class="video_con">
		<?=get_video_youtube(440,300,true)?>
		</div>
		</div>	
</div>
</aside>
<?php } ?>
<div id="doitac">
<div class="margin_auto">
<?php include _template.'layout/doitac.php';?>
</div>
</div>

<div id="bottom">
<div class="margin_auto">
<div class="bottom">

	<div class="thongtin_bt">
		<h4>Thông tin liên hệ</h4>
		<h2><?=$row_setting['ten_'.$lang]?></h2>
		<ul>
			<li><?=$row_setting['diachi_'.$lang]?><li>
			<li>Điện thoại : <?=$row_setting['dienthoai']?><li>
			<li>Email : <?=$row_setting['email']?><li>
			<li>Website : <?=$row_setting['website']?><li>
		</ul>
		 <?php include _template."layout/addon/lienket.php";?>
	</div>

	<div class="khung_facebook">
		<?php include _template."layout/addon/nhantin.php";?>
	</div>


	<div class="thongke">
		<?php include _template."layout/addon/thongke.php";?>
	</div>
	
</div>

<div class="copy">Copyright © 2016 <span>Duc Nguyen </span>. All rights reserved. Design by <a href="http://nina.vn" target="_blank">NINA Co.,Ltd</a>
	<a href="site-map.html"> - Site map</a>
</div>

</div>
</div>




			