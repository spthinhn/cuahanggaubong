<?php

		$title_bar .= "Thanh Toán";

			$d->reset();
	$sql = "select * from #_tinh where hienthi=1 order by ten ";
	$d->query($sql);
	$tinhthanh_tt = $d->result_array();
?>