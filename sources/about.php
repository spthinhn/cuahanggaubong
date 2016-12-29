<?php  if(!defined('_source')) die("Error");



	$d->reset();
	$sql = "select noidung_$lang,title,keywords,description,ngaysua,id,luotxem from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$sql_lanxem = "UPDATE #_info SET luotxem=luotxem+1  WHERE id ='".$row_detail['id']."'";
	$d->query($sql_lanxem);

	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];

?>