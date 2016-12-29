<?php
	$d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
    $d->query($sql_banner_top);
    $logo_top = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='banner'";
    $d->query($sql_banner_top);
    $banner_top = $d->fetch_array();

    $d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='slider' order by id asc";
    $d->query($sql);
    $slider = $d->result_array();

    $d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='videos' order by id asc";
    $d->query($sql);
    $videos = $d->result_array();

    $d->reset();
    $sql = "select ten_vi,id,link,photo_vi,thumb_vi from #_photo where hienthi=1 and type='videos' order by id desc limit 3";
    $d->query($sql);
    $sub_videos = $d->result_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang,photo_vi,link from #_photo where type='adsvertsing'";
    $d->query($sql_banner_top);
    $adsvertsing = $d->fetch_array();

    $d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,mota_$lang as mota from #_baiviet where hienthi=1 and type='tintuc' and noibat=1 order by stt,id desc limit 9";
    $d->query($sql);
    $newsnb = $d->result_array();

    $d->reset();
    $sql= "select noidung_$lang as noidung from #_company where type='footer'";
    $d->query($sql);
    $footer = $d->fetch_array();

    $d->reset();
    $sql= "select noidung_$lang as noidung from #_company where type='stk'";
    $d->query($sql);
    $stk = $d->fetch_array();

    $d->reset();
    $sql = "select ten,id,url,photo from #_lkweb where hienthi=1 and type='mxh' order by id asc";
    $d->query($sql);
    $mxh = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='product' order by stt,id desc";
    $d->query($sql);
    $row_list = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id,thumb,giaban,giacu from #_product where hienthi=1 and banchay =1 and type='product' order by stt,id desc limit 10";
    $d->query($sql);
    $hot_product = $d->result_array();
    foreach ($hot_product as $key => $value) {
        $fc_sql = "select * from #_size where product_id = ".$hot_product[$key]['id']." order by size limit 1";
        $fc_stmt = $d->query($fc_sql);
        $test = $d->fetch_array();
        $hot_product[$key]['price'] = $test['price'];
    }

?>