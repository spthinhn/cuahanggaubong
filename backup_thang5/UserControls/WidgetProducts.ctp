<? global $lg, $FullUrl, $widgetProducts, $widgetName, $cid; ?>
<? if ($cid == 3) { ?>
<div class="sanpham-moi container-sub-div">
    <h3 class="title-h3"><?=$widgetName?></h3>
    <div class="ct-div-sub">
        <? if ($widgetProducts) { ?>
		<ul class="list-sp">
        	<? foreach ($widgetProducts as $obj) {
					$product = new products($obj);
					$link = $product->getLink();
					$name = $product->getName();
					$price = $product->getPriceSale()>0?$product->getPriceSale():$product->getPrice();
					$id = $product->getID();
				?>
            <li>
                <a class="ten-sp-ct" href="<?=$link?>" title="<?=$name?>"><?=$name?></a>
                <a class="img-thumb-ct" href="<?=$link?>" title="<?=$name?>"><img src="<?=$product->getImage(0, 170)?>" alt="<?=$name?>" /></a>
                <p class="gia-sp-ct"><?=echoPrice(formatPrice($price))?></p>
				<p>
                    <a class="chitiet-sp" href="<?=$link?>"><?=SITE_DETAIL?></a>
                    <a class="mua-sp" href="<?=$FullUrl?>/index.php?do=cart&amp;act=add&amp;id=<?=$id?>&amp;lg=<?=$lg?>&amp;sl=1"><?=PRO_BUY?></a>
                </p>
                <? if ($product->getPriceSale()>0) { ?>
                <span class="saleoff_percent">-<?=$product->getPercent()?>%</span>
                <? } ?>
			</li>
            <? } ?>
        </ul>
    	<? } else echo SITE_NO_NEWS; ?>
    </div>
    <div class="bt-spam-ct"></div>
</div>
<? } else { ?>
<div class="container-ct-sidebar">
    <h3 class="title-side-bar"><?=$widgetName?></h3>
    <div class="ct-sidebar">
        <? if ($widgetProducts) { ?>
        <ul class="list-products-sidebar">
			<? foreach ($widgetProducts as $obj) { 
				$product = new products($obj);
				$name = $product->getName();
				$link = $product->getLink();
			?>
            	<li>
                	<a class="images" title="<?=$name?>" href="<?=$link?>"><img src="<?=$product->getImage(180)?>" alt="<?=$name?>" /></a>
                    <p><a title="<?=$name?>" href="<?=$link?>"><?=$name?></a></p>
					<? if ($product->getPriceSale()>0) { ?>
                    <span class="saleoff_percent_widget">-<?=$product->getPercent()?>%</span>
                    <? } ?>
                </li>
			<? } ?>
        </ul>
        <? } else echo SITE_NO_NEWS; ?>
    </div>
    <img src="<?=$FullUrl?>/images/3.png" style="float:left;" alt="" />
</div>
<? } ?>