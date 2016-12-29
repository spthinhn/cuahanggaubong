<? 
	global $FullUrl, $prefix_url, $lg;

	$logo = Info::getInfoField('logo');
	$img = file_exists($logo)?$logo:'images/site/logo.jpg';
	$name = "Logo";
	$size = fixSize($img, 980, 103);	// thay doi w & h tuy theo website
	$h = number_format((103-$size["height"])/2);

	$pos = strpos($img, ".");
	$type = substr($img, $pos, strlen($img));
?>
<a class="logo" href="<?=$FullUrl.$prefix_url?>" title="<?=$name?>">
    <? if ($type==".swf") { ?>
        <embed height="<?=$size['height']?>" width="<?=$size['width']?>" src="<?=$FullUrl.'/'.$img?>" type="application/x-shockwave-flash" wmode="opaque">
    <? } else { ?>
        <img src="<?=$FullUrl.'/'.$img?>" height="<?=$size['height']?>" <?=$h>0?'style="margin-top:'.$h.'px"':""?> alt="<?=$name?>" />
    <? } ?>
</a>