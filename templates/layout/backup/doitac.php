<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $('#foo_dt').carouFredSel({
            width: 1200,
            height: 'auto',
            prev: '#prev_dt',
            next: '#next_dt',
            auto: true,
            scroll: 1
        });
    });
</script>
<style type="text/css" media="all">
.list_carousel_dt {
	width: 1200px;
	float:left;
	position:relative;
	min-height: 113px;
	border-top:0px;
	margin:0px 0px 0px 0px;
}
.list_carousel_dt ul {
	margin: 0;
	width: 1200px;
	padding: 0;
	list-style: none;
	display: block;
}
.list_carousel_dt li {
	display: block;
	float: left;
	padding: 20px 35px 20px 35px;
	text-align:center;
	position:relative;
	background: url(images/doitac.png) no-repeat right;
	top: 0px;
}
.list_carousel_dt li p{ color: #666; padding: 5px;}
.list_carousel_dt li img{
	width:100px;
	min-height: 67px;
}
.list_carousel_dt li:hover{ opacity:0.8;}
.list_carousel_dt.responsive {
	width: auto;
	margin-left: 0;
}
.clearfix {
	float: none;
	clear: both;
}
.prev_dt{ width: 25px; height: 25px; position: absolute; z-index: 10; background: url(images/left_dt.png) no-repeat; top: 25px; left: 0px;}
.next_dt{ width: 25px; height: 25px; position: absolute; z-index: 10; background: url(images/right_dt.png) no-repeat; top: 25px; right: 0px;}
</style>

<?php
    $d->reset();
    $sql= "select * from #_photo where hienthi=1 and type='doitac' order by stt,id desc";
    $d->query($sql);
    $doitac = $d->result_array();
?>
<div class="list_carousel_dt">
	<!-- <a href="#prev_dt" id="prev_dt" class="prev_dt"></a>
	<a href="#next_dt" id="next_dt" class="next_dt"></a> -->
    <div class="clearfix"></div>
	<ul id="foo_dt">
    <?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j++){?>
		<li>
		<a href="cong-trinh/<?=$dichvu[$j]['tenkhongdau']?>.html">
			<img src="<?=_upload_hinhanh_l.$doitac[$j]['thumb']?>" alt="<?=$doitac[$j]['ten_'.$lang]?>" />
        </a>
        </li>
	<?php } ?>
	</ul>
</div>
        
        
        
		
