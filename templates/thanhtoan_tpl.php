<script language="javascript">
	function clear_cart(){
		if(confirm('Bạn có muốn xóa tất giỏ hàng không ?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<script language="javascript">
	function xoa(pid){
		if(confirm('Xóa sản phẩm này ! ')){
			document.form_giohang.pid.value=pid;
			document.form_giohang.command.value='delete';
			document.form_giohang.submit();
		}
	}
</script>

<form name="form_giohang" action="index.php?com=thanh-toan" method="get">
	<input type="hidden" name="com" value="thanh-toan" />
	<input type="hidden" name="pid" />
    <input type="hidden" name="command" />
</form>

<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_pro_thanh($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
		else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$check=$_SESSION['cart'][$i]['check'];
			$q=$_REQUEST['product'.$pid];
			if($q>0 && $q<=999){
				$soluong = str_replace(",", '.', $q);
				$_SESSION['cart'][$i]['qty']=$soluong;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>

<link href="css/giohang.css" rel="stylesheet" type="text/css" />

<div id="info">
<div id="sanpham">
               <div class="title-left"><h2><span>Thanh toán</span></h2></div>
     <form method="post" name="frm_order" action="xac-nhan.html" enctype="multipart/form-data"  id="frm_order">
              <div class="khung">
             <div style="padding:5px; color:#000000;" >              
   
           <table border="0" cellpadding="5px" cellspacing="1px" style="font-family: 'Roboto Condensed', sans-serif; font-size:12px; background-color:#E1E1E1; padding:5px;" width="100%" class="giohang_tk">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr class="menu_giohang" ><td>STT</td><td>Hình Ảnh</td><td>Tên</td><td>Kích thước</td><td>Giá</td><td>Số lượng</td><td>Tổng giá</td><td>Xóa</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$check=$_SESSION['cart'][$i]['check'];
					$pname=get_product_name($pid);
					$size=get_fc_size_price($check)['size'];
					$price=get_fc_size_price($check)['price'];
					if($q==0) continue;
					
			?>
            		<tr bgcolor="#FFFFFF" class="ahaa"><td width="5%"><?=$i+1?></td>
                    <td width="10%"><a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html"><img src="upload/product/<?=get_thumb($pid)?>" width="120" style="padding:5px;" /></a></td>
            		<td width="29%"> <a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html" style="color:rgba(0,102,153,1); font-size:16px; font-weight:bold;"><?=$pname?> </a></td>
            		<td width="8%"><?php echo $size ?></td>
                    <td width="15%"><?=number_format($price,0, ',', '.')?>&nbsp;đ</td>
                    <td width="8%"><?=$q?></td>                    
                    <td width="15%"><?=number_format($price*$q,0, ',', '.')?>&nbsp;đ</td>
                     <td width="10%"><img src="images/disabled.png" border="0" onclick="xoa(<?=$pid?>)" width="30" height="30" style="padding-top:10px;"/></td>
            		</tr>
            <?php					
				}
			?>
				
                <tr><td colspan="8">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr class="tonggia">
              <td >  
                
                <b>Tổng giá : <?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
             </tr>
             
            
             </table>   
                </td></tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>Bạn Không có sản phẩm nào trong giỏ hàng</td>";
			}
		?>
        
        </table>
    
   <?php
   //if(get_order_total()!=0)
  // {
   ?>
    
   
    <table width="100%" cellpadding="0" cellspacing="0"  style="padding:5px;" class="noidung thanhtoan">
    
      <tr>
        <td class="contentinformationleft" width="15%"><img src="images/icon/accuont.png" alt="" style=" margin-right:10px;" /> Họ tên <span class="alert">*</span></td>
        <td class="contentinformationleft" width="30%"><input name="ten" id="ten" class="formsubmit" value="<?=$thanhvien_tv['hoten']?>" required="required" /></td>
        <td width="15%" class="contentinformationleft" ><img src="images/icon/phone.png" alt="" style=" margin-right:10px;" /> Điện thoại<span class="alert">*</span></td>
        <td width="30%" class="contentinformationleft" ><input name="dienthoai" id="dienthoai" class="formsubmit" value="<?=$thanhvien_tv['dienthoai']?>" required="required" /></td>
      </tr>
      <tr>
        <td width="15%"  class="contentinformationleft" ><img src="images/icon/house.png" alt="" style=" margin-right:10px;"  /> Địa chỉ <span class="alert">*</span></td>
        <td width="30%"  class="contentinformationleft"><input  name="diachi"  id="diachi" class="formsubmit" required="required"  value="<?=$thanhvien_tv['diachi']?>"/></td>
        <td width="15%"  class="contentinformationleft" ><img src="images/icon/batquai.png" alt="" style=" margin-right:10px;"  /> E-mail<span class="alert">*</span></td>
        <td width="30%"  class="contentinformationleft" ><input type="email" name="email" id="email" class="formsubmit" required="required"  value="<?=$thanhvien_tv['email']?>"/></td>
      </tr>

   

      <tr><td colspan="4" class="titleinformation"><img src="images/icon/thutuc.png" alt="" style=" margin-right:10px;" width="30"  /> Thông tin người nhận </td></tr>
      <tr>
        <td colspan="4"  style="vertical-align:top"> <textarea name="noidung"  cols="140" rows="5" style="color:#333333;"  ><?=$_POST['noidung']?></textarea></td>
      </tr>
     
      <tr>
        <td id="phuongthucthanhtoan" colspan="4" style="padding:10px; color:#990000; position:relative;">
        
      
        
         <?php
		if($ten_error!='')
		{
		echo "*".$ten_error;
		echo '<br/>';
		}
		if($dienthoai_error!='')
		{
		echo "*". $dienthoai_error;
		echo '<br/>';
		}
		if($diachi_error!='')
		{
		echo "*". $diachi_error;
		echo '<br/>';
		}
		if($email_error!='')
		{
		echo "*". $email_error;
		echo '<br/>';
		}
		if($noidung_error!='')
		{
		echo "*". $noidung_error;
		echo '<br/>';
		}
		if($phuongthuc_error!='')
		{
		echo "*". $phuongthuc_error;
		echo '<br/>';
		}
		?>
        </td>
      </tr>
      
             
    </table>
    
    <div style=" float:right; padding-bottom:20px; padding-top:20px;" align="right">
      
        <input  id="submit_thanhtoan" title='tiếp tục' alt='tiếp tục' align="right" type="submit" name="next" value="Thanh Toán" style="cursor:pointer;" style="padding:2px;" class="g_muatiep"/>
        <input name="mod" type="hidden" id="mod3">
    </div>
    <?php //}?>
    
    <input type="hidden" id="priceproduct" name="priceproduct" value="7850000" />
    <div id="totalprice" style="display:none;"><input type="hidden" id="total" name="total" value="7850000" /></div>
    <div id="delivery" style="display:none;"><input type="hidden" id="delivery" name="delivery" value="0" /></div>
</form>
                
                </div></div>
     
              </div>
              
</div>