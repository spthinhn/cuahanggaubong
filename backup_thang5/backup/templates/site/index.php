<!DOCTYPE html>
<html lang="vi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_page; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?></title>
<meta name="description" content="<?php echo $descriptions; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="WT.ti" content="<?php echo $title_page; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?>" />
<meta name="generator" content="imgroup.vn"/>
<?php showRobotsMeta(); ?>
<?php getFavicon(); ?>
<link href="<?php echo $FullUrl; ?>/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $FullUrl; ?>/js/external.php"></script>
<?php global $do, $tpl, $title_bar; 
	$showslider = Info::getInfoField('showslider');
?>
</head>
<body>
	<?php Template::UserControl('SEO'); ?>
    <div class="container<?=$do=='main'?($showslider?' mainbody':''):''?>">
        <div class="wrapper">
            <div class="right_content">
            	<? if ($do == "cart") { ?>
					<?
                        $filename = TPL_DIR.$do.'/'.$tpl.'.php'; //echo $filename;
                        if(file_exists($filename)) 
                            include(TPL_DIR.$do.'/'.$tpl.'.php'); 
                        else
                            print('This page is not available');
                    ?>
                <? } else { ?>
                <div class="mid_content" <?=$do=='main'?'style="padding-top:0"':''?>>
                    <?
                        $filename = TPL_DIR.$do.'/'.$tpl.'.php'; //echo $filename;
                        if(file_exists($filename)) 
                            include(TPL_DIR.$do.'/'.$tpl.'.php'); 
                        else
                            print('This page is not available');
                    ?>
                    <? if ($do!="main") { ?><div class="title-h3 topNavigation"><?=$title_bar?$title_bar:navigationBar()?></div><? } ?>
                </div>
                <?php Template::UserControl('RightContent'); ?>
                <? } ?>
            </div>
            <?php Template::UserControl('LeftContent'); ?>
        </div>
        <?php Template::UserControl('Header'); ?>
        <?php Template::UserControl('Footer'); ?>
    </div>
<div style="display:none;" id="dialog" title="<?=SITE_ALERT?>">
	<div></div>
</div>
<div style="display:none;" id="dialogReset" title="<?=SITE_ALERT?>">
	<div><?=isset($_SESSION['mess'])?$_SESSION['mess']:''; unset($_SESSION['mess']); ?></div>
</div>
<div id="back_to_top"></div>
<?php Template::UserControl('Socials') ?>
</body>
</html>