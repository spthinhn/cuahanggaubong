<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {

      $('.thanhtoannhanh').click(function(e) {
        var pid = $(this).data('id');
        var check = $( "#choose-size option:selected" ).val();
        var soluong = $('.soluong_12').val();
        if(soluong <= 0){
          alert('Bạn chưa chọn số lượng !');
          return false;
        }

        $.ajax({
          type: "POST",
          url: "ajax/add_giohang.php", 
          data: {pid:pid,soluong:soluong,check:check},
          success: function(string){
            var getData = $.parseJSON(string);   
            var result = getData.result_giohang;
            var count = getData.count;
            console.log(result);
            if(result > 0) {    
              alert('Bạn đã thêm thành công sản phẩm này vào giỏ hàng');
              window.location.href="thanh-toan.html";        
            }
            else if (result == -1)alert('Sản phẩm này không tồn tại');
            else if (result == 0)
              { alert('Sản phẩm này đã có trong giỏ hàng'); window.location.href="thanh-toan.html";      
            }
          }          
        });
      });

  });
</script>

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
  <?php include _template."layout/dieuhuong_detail.php";?>  
  <div class="selection review-comment">
    <a href="#" id="compareto" class="prod_dt_comparison l-bx" title="So sánh">Chi tiết</a>
    <a href="javascript:;" data-link="tab_video" class="prod_dt_viewvideo l-bx"><i class="fa fa-film"></i>VIDEO</a>
    <a href="javascript:;" title="Xem lượt xem" data-view="69034" class="countview-box nb-view">
      <span class="number"><?=$row_detail['luotxem']?></span><span class="text">lượt xem</span>
    </a>
    <a href="javascript:;" title="Xem bình luận" class="comment-box"><span class="number">70</span><span class="text">bình luận</span></a>
  </div>
  <div class="frame_images">      

      <div class="app-figure" id="zoom-fig">
        <a href="<?=_upload_product_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$row_detail['ten_'.$lang]?> .">
        <img src="thumb.php?src=<?=_upload_product_l.$row_detail['photo']?>&h=300&w=350&zc=2&q=100" alt="<?=$row_detail['ten_'.$lang]?>" /></a>
      </div>

      <div class="selectors">
        <?php include _template."layout/jssor.php";?>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
  </div>

  <div class="khung_thongtin">
      <ul id="khung_thongtin">
        <li><h1 class="name-product"><?=$row_detail['ten_'.$lang]?></h1></li>  
        <li>
          <div style="color:#696969; font-size:11px; font-style:italic;text-align: center; text-indent:0px; width:150px; text-align:left">
              <!--RATING-->
              <div id="rate" class="score" style="width:100% !important;"></div>
              <p class="small"><?=($row_detail['hit']=='')? "0":$row_detail['hit']?> lượt đánh giá sản phẩm này</p>
              <!--End RATING-->
          </div>
        </li> 
        <li class="masp">Mã Sp : <strong><?=$row_detail['masp']?></strong></li>  
        <?php if($row_detail['giacu']< 0) { ?> 
        <li class="giacu-detail"><font><?=number_format ($row_detail['giacu'],0,",",".")." ₫";?></font> - <span>Tiết kiệm : <?=number_format(($row_detail['giacu']-$row_detail['giaban']),0,",",".")?>₫</span></li>
        <?php } ?>
          <li>
            <label>Kích thước</label>
            <select id="choose-size">
              <?php echo $html; ?>
            </select>
          </li>
        <?php if($html == '') { ?>
        <?php echo '<li class="gia_detail">"Liên Hệ"</li>'; ?>
        <?php } else { ?>
          <li class="gia_detail" check="0"><?php if($fc_price==0) echo "Liên Hệ"; else echo number_format ($fc_price,0,",",".")." ₫";?></li>      
        <?php } ?>
          
        <li class="khuyenmai_detail"><?=$row_detail['mota_'.$lang]?></li>
        <li class="soluong-sp"><b>Số lượng :</b> <input type="text" size="1" class="soluong_12" value="1" /></li>      
        <li class="dathang_detail">
            <div class="thanhtoannhanh" data-id="<?=$row_detail['id']?>">
              <span>Mua ngay</span></br>
              <font>Đặt hàng nhanh qua SĐT</font>
            </div>
        </li>  
        <li id="social">
            <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51a412672d41cf3b"></script><script type="text/javascript">// <![CDATA[
                      var addthis_config = {
                         data_track_clickback: false,
                         }
                      var addthis_share = {
                      templates: { twitter: "{{title}} {{url}} via @YourTwitterName"}
                      }
                      // ]]></script>
                <!-- AddThis Button END -->
        </li>                                         
    </ul>
    <div class="right-detail-product">
      <div class="promotion-block">
        <h3><span><i class="fa fa-gift"> </i></span> Quà tặng khuyến mãi</h3>
          <?php if($row_detail["khuyenmai_".$lang]!=''){?>
                <?=show_promo($row_detail["khuyenmai_".$lang])?>
          <?php }?>
        </div>    
        <div class="tab-pro">
          <?php if($row_detail["tags"]!=''){?>
                 <i class="fa fa-tags" aria-hidden="true"></i> Tags: &nbsp; <?=show_tags($row_detail["tags"])?>
          <?php }?>
        </div> 
    </div>
    <div class="clear"></div>
  </div>
  
  <div class="clear"></div>
  <div class="tab-product-detail">
    <div id="tab-product-detail">

      <div id="tab-container-1">
          <ul id="tab-container-1-nav" class="tablayout">
            <li id="tab_1"><a class="active" href="#tab1">Chi tiết sản phẩm</a></li>
            <li id="tab_2"><a href="#tab2">Video</a></li>
            <li id="tab_3"><a href="#tab3">Bình luận</a></li>
          </ul><!--tab-container-1-nav-->
          <div class="tabs-container"><!--Start .tabs-container-->
            <div class="tab" id="tab1"><!--Start Tab1-->  
              <div class="container-detail">
                <?=$row_detail['noidung_'.$lang]?>
              </div>              
            </div>
            <div class="tab" id="tab2"><!--Start Tab1--> 
              <div class="video-clip">
                <div class="videoWrapper">                    
                    <iframe width="560" height="349" src="http://www.youtube.com/embed/<?=$row_detail['link']?>?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>                
            </div>
            <div class="tab" id="tab3"><!--Start Tab1--> 
              <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
            </div>
          </div><!--Start .tabs-container-->
      </div>

    </div><!--tab-product-detail-->
    <div class="product-fetured">
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
    <div class="clear"></div>

  </div>
  <div class="sanphamcungloai">
    <div class="title-left"><h2><span>Sản phẩm cùng loại</span></h2></div>
    <center>
      <?php for ($i=0; $i < count($product); $i++) { ?>
      <div class="items-product">
        <div id="items-product">
          <?php if($product[$i]['giacu']>0) { ?>
          <label class="promo-item giamgia"><b><?=giamgia($product[$i]['giacu'],$product[$i]['price'])?></b>GIẢM GIÁ</label>
          <?php } ?>
          <div class="img-product"><a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product[$i]['thumb']?>" alt="<?=$product[$i]['ten_'.$lang]?>"></a></div>
          <div class="info-product">
            <h3><a href="cua-hang-gau-bong/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></h3>
            <p class="price">Giá : <span><?php if($product[$i]['price']==0) echo 'Liên hệ'; else echo number_format ($product[$i]['price'],0,",",",").' '.VND ; ?></span></p>
            <?php if($product[$i]['giacu']!=0) {?>
            <!-- <p class="old-price"><span><?=number_format ($product[$i]['giacu'],0,",",",").' '.VND ; ?></span></p> -->
            <?php } ?>
          </div>
        </div>      
      </div>
      <?php } ?>
    </center>
  </div>
</div>
<script type="text/javascript">
    var tabber1 = new Yetii({
    id: 'tab-container-1',
    active: 1,
    timeout: null,
    interval: null,
    tabclass: 'tab',
    activeclass: 'active'
    });
</script>
<?php
    if($row_detail['hit']!=0){
        $ratehit=$row_detail['score']/$row_detail['hit'];   
    }else{
        $ratehit=2;
    }
?>
<script type="text/javascript" src="js/AStarRating/js/jquery.raty.js"></script>
<script type="text/javascript">
$(function() {
    $('div#rate').raty({
        start:     <?=$ratehit?>,
        scoreName: 'general-score',
        onClick: function(score) {
            $.ajax({
                url:'ajax/rate.php',
                type: "POST",
                dataType: "html",
                data: {cmd:'rate',id:<?=$row_detail['id']?>,score:score},
                success: function(res){
                    if(res=='1'){
                        $('.small').load("ajax/ratehit.php?id=<?=$row_detail['id']?>");
                        alert("Cảm ơn bạn đã đánh giá sản phẩm này !"); 
                    }
                }
            });
          }
    });

    $('#choose-size').change(function(){
      var str = $( "#choose-size option:selected" ).attr('price');
      $('.gia_detail').html(str);


    });
});
</script>