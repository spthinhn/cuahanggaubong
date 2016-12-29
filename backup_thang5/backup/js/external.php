// JavaScript Document
<? $FullUrl = "" ?>

function IncludeJavaScript(jsFile)
{
	document.write('<script type="text/javascript" src="'+ jsFile + '"></script>');
}

IncludeJavaScript('<?=$FullUrl?>/js/admin/jquery-1.8.2.min.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery-ui-1.9.1.custom.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.nivo.slider.pack.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.easing.1.3.js');
IncludeJavaScript('<?=$FullUrl?>/js/admin/function.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.form-defaults.js');
IncludeJavaScript('<?=$FullUrl?>/js/site.js');
IncludeJavaScript('<?=$FullUrl?>/js/ajax.js');
IncludeJavaScript('<?=$FullUrl?>/fancybox/jquery.fancybox-1.3.4.js');
// danh cho mxh
IncludeJavaScript('<?=$FullUrl?>/js/socials/addthis_widget.js');
//IncludeJavaScript('<?=$FullUrl?>/js/socials/plusone.js');
IncludeJavaScript('<?=$FullUrl?>/js/socials/widgets.js');
//IncludeJavaScript('<?=$FullUrl?>/js/socials/facebook.js');
