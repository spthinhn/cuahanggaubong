<div class="navigation">
    <div id="menu"><!--menu-->
        <div class="inner"><!--inner-->    	
            <ul>                
                <li class="icon-home"><a href=""><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                <li><span class="space"></span></li>
                <li>
                    <a href="cua-hang-gau-bong.html" class="font_custom <?php if($source=='product') echo 'active'; ?>"><i class="fa fa-bars" aria-hidden="true"></i> Sản phẩm</a>
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
                <li><span class="space"></span></li>
                <li>
                    <a href="khuyen-mai.html" class="font_custom <?php if($_GET['com']=='khuyen-mai') echo 'active'; ?>"><i class="fa fa-gift" aria-hidden="true"></i> Khuyến mãi</a>
                </li>
                <li><span class="space"></span></li>  
                <li>
                    <a href="khach-hang.html" class="font_custom <?php if($_GET['com']=='khach-hang') echo 'active'; ?>"><i class="fa fa-gift" aria-hidden="true"></i> Khách hàng</a>
                </li>
                <li><span class="space"></span></li>
                <li>
                    <a href="gioi-thieu.html" class="font_custom <?php if($_GET['com']=='gioi-thieu') echo 'active'; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Giới thiệu</a>                    
                </li>                
                <li><span class="space"></span></li> 
                <li>
                    <a href="tin-tuc.html" class="font_custom <?php if($_GET['com']=='tin-tuc') echo 'active'; ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Tin tức</a>                    
                </li>
                <li><span class="space"></span></li>                                                                                             
                <li>
                    <a href="lien-he.html"  class="font_custom <?php if($source=='contact') echo 'active'; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Liên hệ</a>
                </li>
                <li><span class="space"></span></li>                                                
                <li></li>
                <span class="clear"></span>
            </ul>            
        </div><!--#innner-->
        <div class="search-form">
            <form action="tim-kiem.html" method="" name="frm2" class="frm_timkiem">
                <input type="text" class="ipse" name="keyword" id="keyword" value="" autocomplete="off" placeholder="Tìm kiếm...">
                <button class="submit-search" onclick="onSearch()"><i class="fa fa-search" aria-hidden="true"></i></button>                    
            </form>
            <ul class="ui-autocomplete"></ul>
        </div>
        <span class="clear"></span>
    </div><!--#menu-->
</div>
<script type="text/javascript">
  $(document).ready(function() {
       $('.frm_timkiem').submit(function(){
          var timkiem = $('#keyword').val();
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
<script type="text/javascript">
$(document).ready(function(){           
    $("#keyword").keyup(function(){
        
        var val=$(this).val();    

        if(val.length >= 1){
            $.ajax({
                type: "POST",
                url: "ajax/search.php",
                data: 'keyword='+ val,
                async:true,
                
                success: function(html){
                    $(".ui-autocomplete").html(html).show();    
                }
            });
        }
        else{
                $(".ui-autocomplete").html("").hide();
            }
    });
});
</script>
<?php include _template."layout/menu_rp.php"; ?>