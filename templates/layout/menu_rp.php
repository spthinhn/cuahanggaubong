<div class="navi-responsive">    
    <div class="smenu">
        <div class="cart-responsive">
            <a href="gio-hang.html"><i class="fa fa-shopping-cart"></i><span><font id="#total-res"><?=count($_SESSION['cart'])?></font></span></a>
        </div>
        <div class="search-form" style="float: left;margin-top: 8px;">
            <form action="tim-kiem.html" method="" name="frm2" class="frm_timkiem_rp">
                <input type="text" class="ipse" name="keyword" id="keyword_rp" value="" autocomplete="off" placeholder="Tìm kiếm...">
                <button class="submit-search" onclick="onSearch()"><i class="fa fa-search" aria-hidden="true"></i></button>                    
            </form>
        </div>
        <div class="button-toggle imenu">
            <span class="icon-bar margin-top-0"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
    </div><!--smenu-->

    <div id="menu-rp">
        <div class="menu-l">
            <ul id="main-menu" class="sm sm-blue ">
                <li  class="menu-line activem"><a href="">Trang chủ</a></li>                            
                <li class="menu-line">
                    <a href="cua-hang-gau-bong.html" class="font_custom <?php if($source=='chothue') echo 'active'; ?>">Sản phẩm</a>
                    <ul>
                        <?php for ($i=0; $i < count($row_list) ; $i++) { ?>
                        <li><a href="cua-hang-gau-bong/<?=$row_list[$i]['tenkhongdau']?>/"><?=$row_list[$i]['ten']?></a>
                            <?php
                                $d->reset();
                                $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_cat where id_list=".$row_list[$i]['id']." and hienthi=1 and type='product' order by stt,id desc";
                                $d->query($sql);
                                $row_cat = $d->result_array();
                                if(!empty($row_cat)) {
                            ?>
                            <ul>
                                <?php for ($j=0; $j < count($row_cat) ; $j++) { ?>
                                <li><a href="cua-hang-gau-bong/<?=$row_list[$i]['tenkhongdau']?>/<?=$row_cat[$j]['tenkhongdau']?>/"><?=$row_cat[$j]['ten']?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>           
                </li> 
                <li class="menu-line">
                    <a href="khuyen-mai.html">Khuyến mãi</a>
                </li>    
                <li class="menu-line">
                    <a href="khach-hang.html">Khách hàng</a>
                </li>  
                <li  class="menu-line">
                    <a href="gioi-thieu.html">Giới thiệu</a>
                </li>                     
                <li class="menu-line">
                    <a href="tin-tuc.html">Tin tức</a>
                </li>                            
                <li class="menu-line">
                    <a href="lien-he.html">Liên hệ</a>
                </li>
               </ul>
                <div class="clear"></div>
            </div>
    </div> <!--menu-->  
</div>
<script type="text/javascript">
  $(document).ready(function() {
       $('.frm_timkiem_rp').submit(function(){
          var timkiem = $('#keyword_rp').val();
          if(!timkiem){
            alert('Bạn chưa nhập từ khóa . ');
          } else {
            window.location.href="tim-kiem.html&keywords="+timkiem;
          }
          return false;
      })
  });
</script>
<!--Tim kiem-->
