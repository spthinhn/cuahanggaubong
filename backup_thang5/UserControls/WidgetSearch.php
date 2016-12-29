<?php
	global $lg, $FullUrl, $prefix_url;
?>

<form action="/index.php" id="searchbox">
	<input type="hidden" name="do" value="products" />
    <input type="hidden" name="act" value="search" />
    <input type="text" name="key" id="search-key" value="<? echo "Từ khóa"; ?>" onfocus="if (this.value == '<? echo "Từ khóa";?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<? echo "Từ khóa";?>';}" />
    <input type="hidden" name="lg" value="<?=$lg?>" />
    <input type="submit" value="Tìm kiếm" id="search-button">
</form>