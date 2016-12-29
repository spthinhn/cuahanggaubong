<div class="container-right">
  <div class="moudle-right">
    <div class="tab-pro">
      <?php if($row_detail["tags"]!=''){?>
             <i class="fa fa-tags" aria-hidden="true"></i> Tags: &nbsp; <?=show_tags($row_detail["tags"])?>
        <br>
      <?php }?>
    </div> 

    <div class="title-left"><h2><span>Danh mục sản phẩm</span></h2></div>
    <div class="navi-left">
    	<ul>
    		<?php for ($i=0; $i < count($row_list) ; $i++) { ?>
            <li><a href="cua-hang-gau-bong/<?=$row_list[$i]['tenkhongdau']?>"><?=$row_list[$i]['ten']?></a></li>
            <?php } ?>
    	</ul>
    </div>
  </div>
  <div class="moudle-right">
    <div class="title-left"><h2><span>Sản phẩm nổi bật</span></h2></div>
    <div class="product-hot">
    	<?php for ($i=0; $i < count($hot_product) ; $i++) { ?>
    		<div class="items-hot-pro">
    			<a href="cua-hang-gau-bong/<?=$hot_product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$hot_product[$i]['thumb']?>" alt="<?=$hot_product[$i]['ten']?>"></a>
    			<h3><a href="cua-hang-gau-bong/<?=$hot_product[$i]['tenkhongdau']?>.html"><?=$hot_product[$i]['ten']?></a></h3>
    			<p>Từ </br> <span><?php if($hot_product[$i]['price']==0) echo 'Liên hệ'; else echo number_format ($hot_product[$i]['price'],0,",",",").' '.₫ ; ?></span></p>
    			<div class="clear"></div>
    		</div>
    	<?php } ?>
    </div>
  </div>
</div>