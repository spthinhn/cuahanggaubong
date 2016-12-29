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
    <div id="sanpham">
        <div class="thanh_title"> <h2>Tìm Kiếm ' <?=$_GET['keywords']?> ' </h2> </div>

        <div class="khung">
    <?php if(count($product)!=0){?>
      <?php for($j=0, $count_tt=count($product);$j<$count_tt;$j++){  ?> 
       <div class="item" >
                <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">
                    <img src="<?=_upload_product_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" />
                     <h3><?=$product[$j]['ten_'.$lang]?></h3>
                     <p class="giaban"> Giá bán : <span> <?php if($product[$j]['price']==0) { echo 'Liên hệ'; } else { echo number_format ($product[$j]['price'],0,",",",").' '.VND ;} ?></span></p>
        
                </a>
                <div class="giohang"><img src="images/giohang_m.png" alt="giỏ hàng" onclick="addtocart(<?=$product[$j]['id']?>);" /></div>
            </div> 
       <?php }?>
    <?php } else {?><div style="text-align:center; color:#FF0000; font-weight:bold; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>

      </div>
         <div class="paging"><?=$paging['paging']?></div> 
    </div>

   
  </div> 