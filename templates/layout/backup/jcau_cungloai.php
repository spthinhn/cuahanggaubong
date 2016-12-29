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
	padding-bottom:30px;
	margin:20px 0px 20px 0px;
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
	margin: 0px 15px 0px 15px;
	text-align:center;
	position:relative;
	width: 270px;
	top: 0px;
}
.list_carousel_4 li a{ float: left; height: 195px; }
.list_carousel_4 li h3{ color: #fff; text-transform: capitalize; font-size:16px; padding: 5px 0px 0px 0px; position: absolute; background:rgba(4, 116, 243, 0.7); bottom: 9px; transition: 0.5s; left: 0px; right: 0px; padding: 5px; font-family: 'RobotoRegular'; font-weight: 100;}
.list_carousel_4 li:hover h3{background:rgba(4, 116, 243, 1); color: #FFFC00;bottom: 19px;}
.list_carousel_4 li p{ color: #666; padding: 5px;}
.list_carousel_4 li img{
	width:270px;
	height: 195px;
}
.list_carousel_4 li:hover{ opacity:0.8;}
.list_carousel_4 li:after{ content: ''; width: 100%; float: left; height: 9px; background: url(images/bong_ct.png) no-repeat; }
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
    $sql= "select ten_$lang,id,thumb,mota_$lang,tenkhongdau from #_product where hienthi=1 and type='product' and noibat!=0 order by stt,id desc";
    $d->query($sql);
    $dichvu = $d->result_array();
?>
<div class="list_carousel_4">
	<!--<a href="#prev14" id="prev14" class="prev14"></a>
	<a href="#next14" id="next14" class="next14"></a>-->
    <div class="clearfix"></div>
	<ul id="foo4">
    <?php for($j=0,$count_ch=count($dichvu);$j<$count_ch;$j++){?>
		<li>
		<a href="cong-trinh/<?=$dichvu[$j]['tenkhongdau']?>.html">
			<img src="<?=_upload_product_l.$dichvu[$j]['thumb']?>" alt="<?=$dichvu[$j]['ten_'.$lang]?>" />
            <h3><?=$dichvu[$j]['ten_'.$lang]?></h3>

        </a>
        <div class="clearfix"></div>
        </li>
	<?php } ?>
	</ul>
</div>
        
        
        
		
