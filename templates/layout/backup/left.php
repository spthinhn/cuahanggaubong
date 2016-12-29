<?php
  $d->reset();
  $sql = "select * from #_gia where hienthi=1 order by stt,id desc";
  $d->query($sql);
  $row_giaban = $d->result_array();

  $d->reset();
  $sql = "select * from #_yahoo where hienthi=1 order by stt";
  $d->query($sql);
  $row_yahoo = $d->result_array();

  $d->reset();
  $sql = "select * from #_lkweb where hienthi=1 order by stt";
  $d->query($sql);
  $mangxh = $d->result_array();

?>
<div id="left">
			<div class="danhmuc">
      <div class="thanh">Danh mục sản phẩm</div>
            <div class="ddsmoothmenu-v" id="smoothmenu2">
              <ul>
                <?php for($i=0,$count_xem=count($row_list);$i<$count_xem;$i++){?>

               
                 <li><a href="san-pham/<?=$row_list[$i]['tenkhongdau']?>"><?=$row_list[$i]['ten_'.$lang]?></a>
                 
                 </li>
                <?php } ?>
              </ul>
              </div>
      </div>
      
      <div class="danhmuc">
            <div class="thanh"><?=_hotrotructuyen?></div>
            <div class="left hotro">
            <div class="yahoo_top">
              <a href="ymsgr:sendIM?<?=$row_yahoo[0]['yahoo']?>"><img title="" src="http://opi.yahoo.com/online?u=<?=$row_yahoo[0]['yahoo']?>&amp;m=g&amp;t=14" width="140" border="0">
        </a>
            </div>
            <div class="hotline_l"><span> <?=$row_setting['hotline']?></span></div>
                <?php for($i=0,$count_ya=count($row_yahoo);$i<$count_ya;$i++){?>
                <div class="yahoo">
                    <p class="hinh">
                    <a href="ymsgr:sendIM?<?=$row_yahoo[$i]['yahoo']?>">
                    <img src="images/yahoo.png" title="yahoo" alt=""> 
                    </a>

                    <a href="Skype:<?=$row_yahoo[$i]['skyper']?>?chat">
                     <img src="images/skyper.png" title="skyper" alt=""> </a>
                      <span><?=$row_yahoo[$i]['ten']?></span>
                    </p>
                    <p class="dienthoai"><?=$row_yahoo[$i]['dienthoai']?></p>
                    <p class="email"><?=$row_yahoo[$i]['email']?></p>
                 </div>
                <?php }?>
            
              
            </div>
      </div>

      <div class="danhmuc">
            <div class="thanh">Sản phẩm nổi bật</div>
            <div class="left hotro">
            <?php include _template."layout/run_image.php";?>
            </div>
      </div>

      <div class="danhmuc">
            <div class="thanh">Tìm kiếm</div>
            <div class="left hotro">
            <?php include _template."layout/addon/timkiem_nc.php";?>
            </div>
      </div>

   


</div>