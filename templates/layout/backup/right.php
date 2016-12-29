<?php
  $d->reset();
  $sql = "select * from #_gia where hienthi=1 order by stt,id desc";
  $d->query($sql);
  $row_giaban = $d->result_array();
?>
<div id="right">
			<div class="danhmuc">
      <div class="thanh">Video</div>
            <div class="menu_left">
              <ul>
                <?php for($i=0,$count_xem=count($row_list);$i<$count_xem;$i++){?>
                <?php
                    $d->reset();
                    $sql = "select * from #_product_cat where hienthi=1 and id_list='".$row_list[$i]['id']."' and type='product' order by stt,id desc";
                    $d->query($sql);
                    $row_cat = $d->result_array();

                    $d->reset();
                    $sql = "SELECT COUNT(*) as num FROM #_product where hienthi=1 and type='product' and id_list='".$row_list[$i]['id']."' ";
                    $d->query($sql);
                    $row_l = $d->fetch_array();
                ?>

                 <li><a href="<?=$row_list[$i]['tenkhongdau']?>"><?=$row_list[$i]['ten_'.$lang]?>  ( <?=$row_l['num']?> )</a>
                 
                  <ul>
                  <?php for($j=0,$count_cat=count($row_cat);$j<$count_cat;$j++){

                      $d->reset();
                      $sql = "select * from #_product_item where hienthi=1 and id_cat='".$row_cat[$j]['id']."' and type='product' order by stt,id desc";
                      $d->query($sql);
                      $row_item = $d->result_array();

                      $d->reset();
                      $sql = "SELECT COUNT(*) as num FROM #_product where hienthi=1 and type='product' and id_cat='".$row_cat[$j]['id']."' ";
                      $d->query($sql);
                      $row_c = $d->fetch_array();

                  ?>
                     <li><a href="<?=$row_list[$i]['tenkhongdau']?>/<?=$row_cat[$j]['tenkhongdau']?>"><?=$row_cat[$j]['ten_'.$lang]?> ( <?=$row_c['num']?> )</a></li>
                    <?php } ?>
                  </ul>
                 </li>
                <?php } ?>
              </ul>
              </div>

            

      </div>

    

</div>