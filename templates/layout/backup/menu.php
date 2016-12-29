<?php
  $d->reset();
  $sql = "select * from #_product_list where hienthi=1 and type='product' order by stt,id desc";
  $d->query($sql);
  $row_list = $d->result_array();

  $d->reset();
  $sql = "select * from #_baiviet_list where hienthi=1 and type='dichvu' order by stt,id desc";
  $d->query($sql);
  $row_dichvu_list = $d->result_array();
?>

<nav id="smoothmenu1" class="ddsmoothmenu">
    <ul>
        <li class="icon <?php if($_GET['com']=='trang-chu' || $_GET['com']==''){?>active<?php }?>"><a href="trang-chu.html"><?=_trangchu?></a></li>
        <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="gioi-thieu.html"><?=_gioithieu?></a></li>
        <li class="icon <?php if($_GET['com']=='san-pham'){?>active<?php }?>"><a href="san-pham.html">sản phẩm</a>
         <ul>
                  <?php for($i=0,$count_xem=count($row_list);$i<$count_xem;$i++){?>
                   <li><a href="san-pham/<?=$row_list[$i]['tenkhongdau']?>"><?=$row_list[$i]['ten_'.$lang]?></a></li>
                  <?php } ?>
          </ul>
        </li>
        <li class="icon <?php if($_GET['com']=='dich-vu'){?>active<?php }?>"><a href="dich-vu.html"><?=_dichvu?></a>
         
        </li>

        <li class="icon <?php if($_GET['com']=='tin-tuc'){?>active<?php }?>"><a href="tin-tuc.html"><?=_tintuc?></a></li>
        <li class="icon <?php if($_GET['com']=='tu-van'){?>active<?php }?>"><a href="tu-van.html"><?=_tuvan?></a></li>
        <li class="<?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he.html"><?=_lienhe?></a></li>
    </ul>
  
  <?php include _template."layout/addon/timkiem.php";?>
</nav>