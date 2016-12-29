<div class="header">
  <div class="top__header">
    <div id="top__header">
      <div class="left__top__head left"><i class="fa fa-phone" aria-hidden="true"></i><span>Tổng đài bán hàng :</span> <?=$row_setting['hotline']?></div>
      <div class="slogan__top left">
        <span>Muốn có gấu ???</span><img src="images/banner.png" alt="Cửa hàng gấu bông">     
      </div>
      <div class="right__top__head right">
        <ul>
          <li><a href="">Trang chủ</a></li>
          <li><a href="tin-tuc.html">Tin tức</a></li>
          <li><a href="lien-he.html">Liên hệ</a></li>
          <li><a class="count-cart" href="gio-hang.html"><i class="fa fa-shopping-cart" aria-hidden="true"><span><?=count($_SESSION['cart'])?></span></i></a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>  
  </div>
  <div class="midle__header">
    <div id="midle__header">
      <div class="logo"><a href=""><img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="<?=$row_setting['ten_'.$lang]?>"></a></div>
      <div class="right__top__md">
        <div class="mainmenu__icon">
          <div class="menu__item">
            <div class="iconbox"><i class="fa fa-life-ring"></i></div>
            <div class="contentbox">
              <h4>
                <a href="hoi-dap.html" title="Hỏi đáp" rel="dofollow">
                <span>Hỏi đáp</span>
                </a>
              </h4>
              <small>Mua hàng online</small>
            </div>
            <div class="clear"></div>
          </div><!--menu__item-->
          <div class="menu__item">
            <div class="iconbox"><i class="fa fa-refresh" aria-hidden="true"></i></i></div>
            <div class="contentbox">
              <h4>
                <a href="doi-tra-hang.html" title="Đổi trả hàng" rel="dofollow">
                <span>Đổi trả hàng</span>
                </a>
              </h4>
              <small>Trong 15 ngày</small>
            </div>
            <div class="clear"></div>
          </div><!--menu__item-->
          <div class="menu__item">
            <div class="iconbox"><i class="fa fa-truck" aria-hidden="true"></i></div>
            <div class="contentbox">
              <h4>
                <a href="phi-van-chuyen.html" title="Phí vận chuyển" rel="dofollow">
                <span>Miễn phí</span>
                </a>
              </h4>
              <small>Vận chuyển nội thành</small>
            </div>
            <div class="clear"></div>
          </div><!--menu__item-->
          <div class="menu__item margin-right">
            <div class="iconbox"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="contentbox">
              <h4>
                <a href="lien-he.html" title="Vị trí cửa hàng" rel="dofollow">
                <span>Vị trí cửa hàng</span>
                </a>
              </h4>
              <small>Mua hàng online</small>
            </div>
            <div class="clear"></div>
          </div><!--menu__item-->
          <div class="clear"></div>
        </div><!--mainmenu__icon-->       
      </div>
      <div class="clear"></div>
    </div>    
    <div class="clear"></div>
  </div><!--midle__header-->
</div>
