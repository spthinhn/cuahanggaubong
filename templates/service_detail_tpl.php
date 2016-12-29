<div id="info">
<div id="sanpham">
       
        <div class="khung">
      
        <div class="thanh_title"><h2><?=$title_detail?></h2></div>
        <h1 class="tieude"> <?=$row_detail['ten_'.$lang]?></h1>
        <div class="noidung">
            <?=$row_detail['noidung_'.$lang]?>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55a5ff5b3a9222b9" async="async"></script>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <?=get_social('','share');?>
            <?=get_social('','comment');?>

		</div>
        
    <div style="clear:left;"></div><br /><br />
    <div class="thanh_title"><h2><?=_othernews?></h2></div>

    <?php foreach($tintuc as $tinkhac){?>
    <div style="padding-left:10px; height:auto;"><a href="<?=$com?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><img src="images/sao.png" border="0" />&nbsp;&nbsp;<span style="font-size:14px; color:#666;"><?=$tinkhac['ten_'.$lang]?></span></a></div>
    
    <?php }?>
    </div>      
        
</div>
</div>
     