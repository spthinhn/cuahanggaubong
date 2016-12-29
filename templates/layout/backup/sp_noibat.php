<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $('#foo4').carouFredSel({
            width: 1200,
            height: 'auto',
            prev: '#prev13',
            next: '#next13',
            auto: true,
            scroll: 1
        });
    });
</script>
<style type="text/css" media="all">
.list_carousel_4 {
	width: 1200px;
	float:left;
	position:relative;
	border-top:0px;
	background: url(images/bong_dm.png) no-repeat bottom center;
	margin-bottom:20px;
}
.list_carousel_4 ul {
	margin: 0;
	width: 1200px;
	padding: 0;
	list-style: none;
	display: block;
}
.list_carousel_4 li {
	display: block;
	float: left;
	position:relative;
	top: 0px;
}
.list_carousel_4 li img{

}
.list_carousel_4.responsive {
	width: auto;
	margin-left: 0;
}
.clearfix {
	float: none;
	clear: both;
}

.prev13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/left.png) no-repeat; top: 50px; left: 20px;}
.next13{ width: 41px; height: 36px; position: absolute; z-index: 10; background: url(images/right.png) no-repeat; top: 50px; right: 20px;}
</style>
<?php
  $d->reset();
  $sql = "select ten_$lang,id,thumb,tenkhongdau,giaban,rate from #_product where hienthi=1 and type='product' and noibat!=0 order by stt,id desc";
  $d->query($sql);
  $product_nb = $d->result_array();
?>
<div class="list_carousel_4">
	<!--<a href="#prev14" id="prev14" class="prev14"></a>
	<a href="#next14" id="next14" class="next14"></a>-->
    <div class="clearfix"></div>
	<ul id="foo4">
    <?php for($j=0,$count_ch=count($product_nb);$j<$count_ch;$j++){?>
		<li>
		<div class="item <?php if(($j+1)%4==0){ echo 'last';}?>" >
	         <div class="product_images"><a href="san-pham/<?=$product_nb[$j]['id']?>/<?=$product_nb[$j]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a></div>
	         <div class="bong_sp"></div>
	          <div class="stat">
                <span class="ui-rater">
                    <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:<?php echo $product_nb[$j]['rate']*9;?>px"></span></span>
                </span>
        </div>

	         <p class="giaban"> <span><?php if($product_nb[$j]['giaban']==0) echo "Liên Hệ"; else echo number_format ($product_nb[$j]['giaban'],0,",",".")." VNĐ";?></span>
	        
	         </p>
	         <h3><?=$product_nb[$j]['ten_'.$lang]?></h3>
	         
	    </div>
        </li>
	<?php } ?>
	</ul>
</div>
        
        
        
		
