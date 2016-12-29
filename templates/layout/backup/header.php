<?php

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
    $d->query($sql_banner_top);
    $logo_top = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='banner'";
    $d->query($sql_banner_top);
    $banner_top = $d->fetch_array();

?>
<div class="header_top">
<div class="margin_auto">

 <div id="logo"><a href="trang-chu.html"><img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="logo" /></a></div>

  <div id="banner"><img src="<?=_upload_hinhanh_l.$banner_top['thumb_'.$lang]?>" alt="banner" /></div>

  <div class="giohang_top"><a href="gio-hang.html"> Giỏ hàng <img src="images/giohang.png" alt="giohang"><span><?=count($_SESSION['cart'])?></span></a></div>

  <div class="hotline_top">Hotline :<br/> <span><?=$row_setting['hotline']?></span></div>
  
  <?php include _template."layout/menu.php";?>
</div>
</div> 
