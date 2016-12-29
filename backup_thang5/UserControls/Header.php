<? 
	global $FullUrl, $prefix_url, $do;
	$showoptin = Info::getInfoField('showoptin');
	$showslider = Info::getInfoField('showslider');
?>
<div class="header">
    <div class="hcontent">
    	<?php Template::UserControl('Logo'); ?>
        <?php if ($showoptin) Template::UserControl('Optin'); ?>
        <?php  Template::UserControl('WidgetSearch'); ?>
	</div>
    <?php if ($do=="main") if ($showslider) Template::UserControl('Slider'); ?>
    <?php Template::UserControl('Categories'); ?>
</div>