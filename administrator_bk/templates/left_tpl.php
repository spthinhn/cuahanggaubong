<style type="text/css">
.logo img{width: 100%;}
</style>
<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logoadmin.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>

 <li class="categories_li <?php if($_GET['com']=='product' || $_GET['com']=='order' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=product&act=man_list&type=product">Quản lý danh mục 1</a></li>
      <li<?php if($_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.php?com=product&act=man_cat&type=product">Quản lý danh mục 2</a></li>
      <li<?php if($_GET['act']=='man' && $_GET['com']!='order') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=product">Quản lý sản phẩm</a></li>
    <li<?php if($_GET['com']=='order') echo ' class="this"' ?> ><a href="index.php?com=order&act=man">Quản lý đơn hàng</a></li>
    </ul>
  </li> 

  <li class="categories_li <?php if($_GET['com']=='baiviet') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
    <ul class="sub">
      <!-- <li<?php if($_GET['type']=='dichvu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=dichvu">Quản lý dịch vụ </a></li> -->

      <li<?php if($_GET['type']=='tintuc') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tintuc">Quản lý tin tức </a></li>
      <li<?php if($_GET['type']=='khuyenmai') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=khuyenmai">Quản lý khuyến mãi </a></li>
      <li<?php if($_GET['type']=='khachhang') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=khachhang">Quản lý khách hàng </a></li>
      
    </ul>
  </li>

<!-- <li class="template_li<?php if($_GET['com']=='album') echo ' activemenu' ?>" id="menu_abs"><a href="#" title="" class="exp"><span>Album</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=album&act=man_list&type=album" title="">Danh mục album</a></li>
    <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=album&act=man&type=album" title="">Danh sách album</a></li>
  </ul>
</li>  -->

  <li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=gioithieu">Giới thiệu</a></li>
      <li<?php if($_GET['type']=='hoidap') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=hoidap">Hỏi đáp</a></li>
      <li<?php if($_GET['type']=='doitra') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=doitra">Đổi trả hàng</a></li>
      <li<?php if($_GET['type']=='vanchuyen') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=vanchuyen">Miễn phí vận chuyển</a></li>
    </ul>
  </li>

 <!--  <li class="categories_li <?php if($_GET['com']=='download') echo ' activemenu' ?>" id="menu_dl"><a href="" title="" class="exp"><span>Download</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='download') echo ' class="this"' ?>><a href="index.php?com=download&act=man&type=download">Download file</a></li>

    </ul>
  </li> -->

  <li class="categories_li <?php if($_GET['com']=='tags') echo ' activemenu' ?>" id="menu_tg"><a href="" title="" class="exp"><span>Tags</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='tags') echo ' class="this"' ?>><a href="index.php?com=tags&act=man&type=tags">Quản lý tags</a></li>

    </ul>
  </li>

  <li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='bannerqc'  || $_GET['com']=='company') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='logo') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo" title="">Logo</a></li>
      <!-- <li<?php if($_GET['type']=='banner') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=banner" title="">banner</a></li> -->
      <li<?php if($_GET['type']=='banner') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=adsvertsing" title="">Adsvertsing</a></li>
      <li<?php if($_GET['type']=='favicon') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
      <li<?php if($_GET['type']=='popup') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=popup" title="">popup</a></li>      
      <li<?php if($_GET['type']=='lienhe') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=lienhe" title="">Liên hệ</a></li>
      <li<?php if($_GET['type']=='stk') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=stk" title="">Tải khoản ngân hàng</a></li>
      <li<?php if($_GET['type']=='footer') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=footer" title="">Footer</a></li>
      <li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
      <!-- <li<?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man" title="">Gửi Mail</a></li> -->
    </ul>
  </li>

  <li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='lkweb') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='mxh') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=mxh" title="">Mạng xã hội</a></li>
      <!-- <li <?php if($_GET['com']=='lkweb') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=lkweb" title="">Liên kết website</a></li> -->
      <li <?php if($_GET['com']=='yahoo') echo ' class="this"' ?>><a href="index.php?com=yahoo&act=man&type=yahoo" title="">Quản lý yahoo</a></li>
    </ul>
  </li>

  <li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='slider') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider" title="">Hình ảnh slider</a></li>
      <li<?php if($_GET['type']=='videos') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=videos" title="">Slider video</a></li>
      <!-- <li<?php if($_GET['type']=='doitac') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=doitac" title="">Đối tác</a></li> -->
   
    </ul>
  </li>
  <li class="gallery_li<?php if($_GET['com']=='phanquyen' || $_GET['com']=='user') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Phân quyền</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='phanquyen') echo ' class="this"' ?>><a href="index.php?com=phanquyen&act=man" title="">Phân loại admin</a></li>
      <li<?php if($_GET['com']=='user') echo ' class="this"' ?>><a href="index.php?com=user&act=man" title="">Phân quyền user</a></li>
    </ul>
  </li>
<!--   <li class="gallery_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='video') echo ' class="this"' ?>><a href="index.php?com=video&act=man&type=video" title="">Video</a></li>
    </ul>
  </li> -->

</ul>