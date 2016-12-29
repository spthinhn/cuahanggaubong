<?
	include("./includes/config.php");
	include("./includes/va_db.php");
	include("class/info.class.php");
	$content = Info::getInfoField('404page');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="NOINDEX, NOFOLLOW" />
<title>Error 404</title>
</head>
<body>
	<?php echo $content; ?>
</body>
</html>
