<?php
    session_start();
    @define ( '_template' , './templates/');
    @define ( '_source' , './sources/');
    @define ( '_lib' , './libraries/');
    
    if(!isset($_SESSION['lang']))
    {
    $_SESSION['lang']='vi';
    }
    $lang=$_SESSION['lang'];
    
    include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."functions_share.php";
    include_once _lib."class.database.php";
    include_once _source."lang_$lang.php";
    include_once _lib."functions_giohang.php";
    include_once _lib."file_requick.php";
    include_once _lib."counter.php"; 
    include_once _source."template.php";
    
    if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
    $pid=$_REQUEST['productid'];
    $soluong=1;
    addtocart($pid,$soluong);
    redirect("thanh-toan.html");}
    
    if($_GET['lang']!=''){
      $_SESSION['lang']=$_GET['lang'];
      header("location:".$_SESSION['links']);
    } else {
      $_SESSION['links']=getCurrentPageURL();
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<base href="http://<?=$config_url?>/">
<link id="favicon" rel="shortcut icon" href="<?=_upload_hinhanh_l.$favicon['thumb_'.$lang]?>" type="image/x-icon" />

<title><?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?></title>
<meta name="description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
<meta name="keywords" content="<?php if($keywords_bar!='') echo $keywords_bar; else echo $row_setting['keywords']; ?>">

<meta name="robots" content="noodp,index,follow" />
<meta name="google" content="notranslate" />
<meta name='revisit-after' content='1 days' />
<meta name="ICBM" content="<?=$row_setting['toado']?>">
<meta name="geo.position" content="<?=$row_setting['toado']?>">
<meta name="geo.placename" content="<?=$row_setting['diachi_'.$lang]?>">
<meta name="author" content="<?=$row_setting['ten_'.$lang]?>">
<?=$share_facebook?>

<style><?php echo file_get_contents('http://'.$config_url.'/css_optimize.php');?></style>

<!--<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/giohang.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/sm-blue.css">
<link rel="stylesheet" type="text/css" href="css/sm-core-css.css">-->
<link rel="stylesheet" type="text/css" href="css/messenger.css">
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script src="js/yetii.js"></script>

<script src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.smartmenus.js"></script>
<script type="text/javascript">
  $(document).ready(function(e) {   
    // Menu small
    $('.imenu').click(function(){
      $('#menu-rp').slideToggle();  
    })
    
  });
  $(function() {
        $('#main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
    });
  
</script>

<!--<link rel="stylesheet" href="css/owl.carousel.min.css" />
<link rel="stylesheet" href="css/owl.theme.default.min.css" />-->
<script src="js/owl.carousel.js"></script>
<script>
  $(document).ready(function() {
      $('.owl-slider').owlCarousel({
        items : 1, 
        autoplay : true,
        nav : true,
        navText : false,
        dots : true,
      });
      $('.owl-video').owlCarousel({
        items : 1, 
        autoplay : true,
        nav : false,
        navText : false,
        dots : false,
      });
      $('.owl-news').owlCarousel({
         items : 3, 
         autoplay : true,
         nav : true,
         margin : 10,
         navText : false,
         dots : false,
         responsive : {
              0 : { 
                items: 1,
              },
              768 : {
                items: 2,
              },
              1024 : {
                items: 3,
              }
         }
      });
  });
</script>

<script type="text/javascript" src="js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="js/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" /> -->

<?=$row_setting['analytics']?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=1577805669146955";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>

<body>
<div class="wrapper">
	<?php include _template."layout/header.php"; ?>
  <?php include _template."layout/menu.php"; ?>
  <div id="wrapper">
    <?php 
      if($source=='index') {
          include _template."layout/slider.php"; 
          include _template."layout/news_nb.php"; 
        }
    ?>
    <?php if($source=='index' || $source=='product' || $source=='contact' || $source=='tags'  || $source=='search') { ?>
      <?php include _template.$template."_tpl.php";?>
    <?php }else{ ?>
      <div class="container-left"><?php include _template.$template."_tpl.php";?></div>
      <?php include _template."layout/right.php"; ?>
      <div class="clear"></div>
    <?php } ?>
  </div>  
</div><!--wrapper-->
<?php include _template."layout/footer.php"; ?>

<?php if($source=='index'){?>
<?php include _template."layout/addon/popup.php"; ?>
<?php } ?>

<!-- <?=$row_setting['vchat']?> -->
<a href="https://m.me/cuahanggaubong"  data-original-title="Click để Chat Facebook với Shop" target="_blank" class="nj-facebook-messenger nj-facebook-messenger-940_open toby_tooltip" data-popup-ordinal="0" id="fb_messenger">Chat Facebook</a> 
  
<!-- JS BLOCK-->
<div class="drag-wrapper">
   <div data-drag="data-drag" class="thing" style="transform: translate(1190px, 20px);">
      <a class="drag_messenger_button toby_tooltip" data-original-title="Chat Facebook">
         <div class="circle facebook-messenger-avatar">
            <img class="facebook-messenger-avatar" src="/upload/hinhanh/facebook-messenger1.png">
         </div>
      </a>
      <div class="content" style="display: none; max-height: 563px;">
         <div class="inside" id="fbmessenger_content">
            <div class="arrow"></div>
            <ul class="ChatLog" id="chat_text">
               <li class="ChatLog__entry">
                  <img class="ChatLog__avatar" src="http://demo.focusnguyen.com/upload/hinhanh/ico.png" />
                  <p class="ChatLog__message">
                     Chào bạn!
                     <time class="ChatLog__timestamp">1 minutes ago</time>
                  </p>
               </li>
               <li class="ChatLog__entry">
                  <img class="ChatLog__avatar" src="http://demo.focusnguyen.com/upload/hinhanh/ico.png" />
                  <p class="ChatLog__message">
                     Bạn cần Shop tự vấn hoặc hỗ trợ thêm thông tin gì hok bạn ha?
                     <time class="ChatLog__timestamp">2 minutes ago</time>
                  </p>
               </li>
               <li class="Chat_button" id="Chat_button">  
                  <a href="https://m.me/cuahanggaubong" target="_blank" class="nj-facebook-messenger nj-facebook-messenger-940_open" data-popup-ordinal="0" id="fb_messenger_button">Chat Ngay</a>
               </li>
            </ul>
            <div class="fb-page" id="fb_page" data-width="310" data-height="270" data-href="https://www.facebook.com/cuahanggaubong" data-tabs="messages" data-small-header="true" data-hide-cover="false" data-show-facepile="true" data-adapt-container-width="true">
               <div class="fb-xfbml-parse-ignore">
                  <blockquote cite="https://www.facebook.com/cuahanggaubong"><a href="https://www.facebook.com/cuahanggaubong">Loading...</a></blockquote>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="magnet-zone">
      <div class="magnet"></div>
   </div>
</div>
<div id="messenger_bg"> </div>

<script type="text/javascript" src="js/rebound.min.js"></script>
<script type="text/javascript" src="js/facebook-index.js"></script>

<script  type="text/javascript">
  window.onload = function() {
      {
          var unknown = '-';

          // screen
          var screenSize = '';
          if (screen.width) {
              width = (screen.width) ? screen.width : '';
              height = (screen.height) ? screen.height : '';
              screenSize += '' + width + " x " + height;
          }

          // browser
          var nVer = navigator.appVersion;
          var nAgt = navigator.userAgent;
          var browser = navigator.appName;
          var version = '' + parseFloat(navigator.appVersion);
          var majorVersion = parseInt(navigator.appVersion, 10);
          var nameOffset, verOffset, ix;

          // Opera
          if ((verOffset = nAgt.indexOf('Opera')) != -1) {
              browser = 'Opera';
              version = nAgt.substring(verOffset + 6);
              if ((verOffset = nAgt.indexOf('Version')) != -1) {
                  version = nAgt.substring(verOffset + 8);
              }
          }
          // Opera Next
          if ((verOffset = nAgt.indexOf('OPR')) != -1) {
              browser = 'Opera';
              version = nAgt.substring(verOffset + 4);
          }
          // MSIE
          else if ((verOffset = nAgt.indexOf('MSIE')) != -1) {
              browser = 'Microsoft Internet Explorer';
              version = nAgt.substring(verOffset + 5);
          }
          // Chrome
          else if ((verOffset = nAgt.indexOf('Chrome')) != -1) {
              browser = 'Chrome';
              version = nAgt.substring(verOffset + 7);
          }
          // Safari
          else if ((verOffset = nAgt.indexOf('Safari')) != -1) {
              browser = 'Safari';
              version = nAgt.substring(verOffset + 7);
              if ((verOffset = nAgt.indexOf('Version')) != -1) {
                  version = nAgt.substring(verOffset + 8);
              }
          }
          // Firefox
          else if ((verOffset = nAgt.indexOf('Firefox')) != -1) {
              browser = 'Firefox';
              version = nAgt.substring(verOffset + 8);
          }
          // MSIE 11+
          else if (nAgt.indexOf('Trident/') != -1) {
              browser = 'Microsoft Internet Explorer';
              version = nAgt.substring(nAgt.indexOf('rv:') + 3);
          }
          // Other browsers
          else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
              browser = nAgt.substring(nameOffset, verOffset);
              version = nAgt.substring(verOffset + 1);
              if (browser.toLowerCase() == browser.toUpperCase()) {
                  browser = navigator.appName;
              }
          }
          // trim the version string
          if ((ix = version.indexOf(';')) != -1) version = version.substring(0, ix);
          if ((ix = version.indexOf(' ')) != -1) version = version.substring(0, ix);
          if ((ix = version.indexOf(')')) != -1) version = version.substring(0, ix);

          majorVersion = parseInt('' + version, 10);
          if (isNaN(majorVersion)) {
              version = '' + parseFloat(navigator.appVersion);
              majorVersion = parseInt(navigator.appVersion, 10);
          }

          // mobile version
          var mobile = /Mobile|mini|Fennec|Android|iP(ad|od|hone)/.test(nVer);

          // cookie
          var cookieEnabled = (navigator.cookieEnabled) ? true : false;

          if (typeof navigator.cookieEnabled == 'undefined' && !cookieEnabled) {
              document.cookie = 'testcookie';
              cookieEnabled = (document.cookie.indexOf('testcookie') != -1) ? true : false;
          }

          // system
          var os = unknown;
          var clientStrings = [
              {s:'Windows 10', r:/(Windows 10.0|Windows NT 10.0)/},
              {s:'Windows 8.1', r:/(Windows 8.1|Windows NT 6.3)/},
              {s:'Windows 8', r:/(Windows 8|Windows NT 6.2)/},
              {s:'Windows 7', r:/(Windows 7|Windows NT 6.1)/},
              {s:'Windows Vista', r:/Windows NT 6.0/},
              {s:'Windows Server 2003', r:/Windows NT 5.2/},
              {s:'Windows XP', r:/(Windows NT 5.1|Windows XP)/},
              {s:'Windows 2000', r:/(Windows NT 5.0|Windows 2000)/},
              {s:'Windows ME', r:/(Win 9x 4.90|Windows ME)/},
              {s:'Windows 98', r:/(Windows 98|Win98)/},
              {s:'Windows 95', r:/(Windows 95|Win95|Windows_95)/},
              {s:'Windows NT 4.0', r:/(Windows NT 4.0|WinNT4.0|WinNT|Windows NT)/},
              {s:'Windows CE', r:/Windows CE/},
              {s:'Windows 3.11', r:/Win16/},
              {s:'Android', r:/Android/},
              {s:'Open BSD', r:/OpenBSD/},
              {s:'Sun OS', r:/SunOS/},
              {s:'Linux', r:/(Linux|X11)/},
              {s:'iOS', r:/(iPhone|iPad|iPod)/},
              {s:'Mac OS X', r:/Mac OS X/},
              {s:'Mac OS', r:/(MacPPC|MacIntel|Mac_PowerPC|Macintosh)/},
              {s:'QNX', r:/QNX/},
              {s:'UNIX', r:/UNIX/},
              {s:'BeOS', r:/BeOS/},
              {s:'OS/2', r:/OS\/2/},
              {s:'Search Bot', r:/(nuhk|Googlebot|Yammybot|Openbot|Slurp|MSNBot|Ask Jeeves\/Teoma|ia_archiver)/}
          ];
          for (var id in clientStrings) {
              var cs = clientStrings[id];
              if (cs.r.test(nAgt)) {
                  os = cs.s;
                  break;
              }
          }

          var osVersion = unknown;

          if (/Windows/.test(os)) {
              osVersion = /Windows (.*)/.exec(os)[1];
              os = 'Windows';
          }

          switch (os) {
              case 'Mac OS X':
                  osVersion = /Mac OS X (10[\.\_\d]+)/.exec(nAgt)[1];
                  break;

              case 'Android':
                  osVersion = /Android ([\.\_\d]+)/.exec(nAgt)[1];
                  break;

              case 'iOS':
                  osVersion = /OS (\d+)_(\d+)_?(\d+)?/.exec(nVer);
                  osVersion = osVersion[1] + '.' + osVersion[2] + '.' + (osVersion[3] | 0);
                  break;
          }
          
          // flash (you'll need to include swfobject)
          /* script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" */
          var flashVersion = 'no check';
          if (typeof swfobject != 'undefined') {
              var fv = swfobject.getFlashPlayerVersion();
              if (fv.major > 0) {
                  flashVersion = fv.major + '.' + fv.minor + ' r' + fv.release;
              }
              else  {
                  flashVersion = unknown;
              }
          }
      }

      window.jscd = {
          screen: screenSize,
          browser: browser,
          browserVersion: version,
          browserMajorVersion: majorVersion,
          mobile: mobile,
          os: os,
          osVersion: osVersion,
          cookies: cookieEnabled,
          flashVersion: flashVersion
      };

   
    if(jscd.os == 'iOS'){

        document.getElementById('fb_messenger').href='fb-messenger://user-thread/630396760353373';
        document.getElementById('fb_messenger').target='';
        document.getElementById('fb_messenger_button').href='fb-messenger://user-thread/630396760353373';
        document.getElementById('fb_messenger_button').target='';    
        document.getElementById("fb_page").style.display = "none";      
        document.getElementById("chat_text").style.position = 'relative';
    }
    else if(jscd.os == 'Android'){
        document.getElementById('fb_messenger').href='fb-messenger://user/630396760353373';
        document.getElementById('fb_messenger').target='';
        document.getElementById('fb_messenger_button').href='fb-messenger://user/630396760353373';
        document.getElementById('fb_messenger_button').target='';
        document.getElementById("fb_page").style.display = "none";
        document.getElementById("chat_text").style.position = 'relative';
        
    }else{
        
        document.getElementById('fb_messenger').href='https://m.me/cuahanggaubong';
        document.getElementById('Chat_button').innerHTML='';
        document.getElementById("fb_page").style.display = "block";
    }


  }
</script>





<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=151385378335949";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>