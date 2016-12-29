<div id="info">
    <div id="sanpham">

        <div class="khung">
        
        <div class="thanh_title"><h2><?=$title_detail?></h2> </div><div class="clear"></div>
        
    <?php if(count($album)!=0){?>
         <?php for($j=0;$j<count($album);$j++){
            ?>
                <div class="album">
                        <a href="thu-vien-anh/<?=$album[$j]['tenkhongdau']?>.html" title="<?=$album[$j]['ten_'.$lang]?>">
                            <img src="<?=_upload_album_l.$album[$j]['thumb']?>" alt="<?=$album[$j]['tenkhongdau']?>">
                            <h3><?=$album[$j]['ten_'.$lang]?></h3>
                        </a>
                </div>
        <?php }?>
        
    <?php } else { ?><div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>

        <div class="clear"></div>
        <div class="paging"><?=$paging?></div> 

      </div>
         
    </div>


  <h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1></div>