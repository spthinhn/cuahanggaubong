<script language="javascript">
  function addtocart(pid){
    document.form_giohang.productid.value=pid;
    document.form_giohang.command.value='add';
    document.form_giohang.submit();
  }
</script>
<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>

<div id="info">
  <?php if(count($product)!=0){?>
  <div class="block-product">
    <div class="title-right"><h2><span>Sản phẩm hot</span></h2></div>
    <div id="block-product">
      <center>
        <?php for ($i=0; $i < count($product); $i++) { ?>
        <div class="items-product">
          <div id="items-product">
            <?php if($product[$i]['giacu']>0) { ?>
            <label class="promo-item giamgia"><b><?=giamgia($product[$i]['giacu'],$product[$i]['giaban'])?></b>GIẢM GIÁ</label>
            <?php } ?>
            <div class="img-product"><a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product[$i]['thumb']?>" alt="<?=$product[$i]['ten_'.$lang]?>"></a></div>
            <div class="info-product">
              <h3><a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></h3>
              <p class="price">Giá : <span><?php if($product[$i]['price']==0) echo 'Liên hệ'; else echo number_format ($product[$i]['price'],0,",",",").' '.VND ; ?></span></p>
              <?php if($product[$i]['giacu'] < 0) {?>
              <p class="old-price"><span><?=number_format ($product[$i]['giacu'],0,",",",").' '.VND ; ?></span></p>
              <?php } ?>
            </div>
          </div>      
        </div>
        <?php } ?>
      </center>   
    </div>
  </div>
  <?php } else { ?>
    <div style="text-align:center; color:#FF0000; font-weight:nomal; font-size:15px;"> Chưa Có Tin Cho Mục này . </div>
  <?php }?>
  <div class="clear"></div>
  <div class="paging"><?=$paging?></div> 
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>

