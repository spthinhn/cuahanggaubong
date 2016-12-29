<div id="info">
  <div id="sanpham">        
    <div class="khung">      
      <h2 class="content-title"><?=$title_detail?></h2>
      <section class="content-date">Ngày đăng: <?=date('d-m-Y',$row_detail['ngaysua'])?> - <i class="fa fa-eye" aria-hidden="true"></i> Lượt xem : <?=$row_detail['luotxem']?></section>
      <div class="clear"></div>
      <div class="noidung"><?=$row_detail['noidung_'.$lang]?></div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>