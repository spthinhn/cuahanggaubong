<? 
	global $lg, $FullUrl; 
	$sliderImg = ImagesGroup::getImagesLimit('HomeSlider', 100);
?>
<? if ($sliderImg) { ?>
<div class="slider-wrapper theme-default" style="height: 270px; padding: 5px; background: white; margin-bottom:10px;">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
    	<? foreach ($sliderImg as $slider) { 
			$name = $slider["name_$lg"];
			$img = getTimThumb($slider["img"], 970, 270);
		?>
        <a href="<?=$slider['url']?>" target="_blank" title="<?=$name?>"> <img width="970" height="270" src="<?=$img?>" alt="<?=$name?>" /> </a>
        <? } ?>
    </div>
</div>
<? } ?>