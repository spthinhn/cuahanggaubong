<div id="info">
      
      <div class="khung">       

      <div class="title-right"><h2><span><?=$title_detail?></span></h2></div>
      <div>
      <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){  ?> 
        <div class="box_new">
            <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tintuc[$i]['thumb']?>"  width="180" alt="<?=$tintuc[$i]['ten_'.$lang]?>" /></a>

            <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><?=$tintuc[$i]['ten_'.$lang]?></a></h3>
            <span style=" color:rgba(153,153,153,1);">Ngày Đăng : <?=date('d/m/Y - g:i A',$tintuc[$i]['ngaytao']);?></span><br />
            <?=_substr($tintuc[$i]['mota_'.$lang],225)?>
            <!-- <div class="xemtiep"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" >Xem Tiếp </a></div> -->
            <div class="clear"></div>
        </div>
       <?php }?>
       </div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>

      </div>
</div> 