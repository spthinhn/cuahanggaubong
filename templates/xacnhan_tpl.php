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
			$pid = $_SESSION['cart'][$i]['productid'];
			$check=$_SESSION['cart'][$i]['check'];
			$q=$_REQUEST[$check.'product'.$pid];
			$pname=get_product_name($pid);
			$size=get_fc_size_price($check)['size'];
			$price=get_fc_size_price($check)['price'];

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
<script>
$(document).ready(function(e) {

	$(document).ready(function(){
      $('#submit_thanhtoan').click(function(e){ 

          var ten = '<?=$_POST['ten']?>';
          var dienthoai = '<?=$_POST['dienthoai']?>';
          var diachi = '<?=$_POST['diachi']?>';
          var email = '<?=$_POST['email']?>';
          var noidung = '<?=$_POST['noidung']?>';
          var phuongthuc = $('input[name=phuongthuc]:checked').val();

          if(ten==''){
	          	alert('Bạn chưa nhập tên . ');
	          	$('#ten').focus();
	          	return false;
          } else if(dienthoai==''){
	          	alert('Bạn chưa nhập điện thoại . ');
	          	$('#dienthoai').focus();
	          	return false;
          } else if(diachi==''){
	          	alert('Bạn chưa nhập địa chỉ . ');
	          	$('#diachi').focus();
	          	return false;
          } else if(email==''){
	          	alert('Bạn chưa nhập email . ');
	          	$('#email').focus();
	          	return false;
          } else if(!phuongthuc){
	          	alert('Bạn chưa chọn phương thức thanh toán . ');
	          	return false;
          } else {
          		$.ajax({
		            type:'POST',
		            url:'ajax/thanhtoan.php',
		            data:{phuongthuc:phuongthuc,ten:ten,dienthoai:dienthoai,diachi:diachi,email:email,noidung:noidung},
		            success: function(result) {
		            	if(result==1){
		            		alert("chúc mừng bạn đã đặt hàng thành công .");
		            		window.location.href="trang-chu.html";
		            	} else{
		            		alert("Hệ thống bị lổi vui lòng thực hiện lại sau vài giây .");
		            	} 
		                
		            }
	          	});
          }

        });
    });

});
</script>
<div id="info">
<div id="sanpham">
               <div class="thanh_title"><h2>Xác Nhận Thanh Toán</h2></div>
     <form method="post" name="frm_order" action="http://<?=$config_url?>/noidia_php/do.php" enctype="multipart/form-data"  id="frm_order"> </form>
              <div class="khung">
             <div style="padding:5px; color:#000000;" >              
               <form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
           <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1; padding:5px;" width="100%" class="giohang_tk">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr class="menu_giohang" ><td>STT</td><td>Hình Ảnh</td><td>Tên</td><td>Size</td><td>Giá</td><td>Số lượng</td><td>Tổng giá</td><td>Xóa</td></tr>';
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

      

        <div class="xacnhan">
        <div class="khungxn">
        		<h4>Xác nhận thông tin giao hàng </h4>
        		<p><label><b>Tên :</b> <?=$_POST['ten']?></label></p>
        		<p><label><b>Địa chỉ : </b><?=$_POST['diachi']?></label></p>
        		<p><label><b>Điện thoại :</b> <?=$_POST['dienthoai']?></label></p>
        		<p><label><b>Email : </b><?=$_POST['email']?></label></p>
        		<p><label><b>Nội dung : </b><?=$_POST['noidung']?></label></p>
        </div>
		<div class="phuongthuc">
		<h4>Phương thức thanh toán </h4>
        <p><label> <input type="radio" name="phuongthuc" value="Thanh toán khi nhận hàng" /><span> </span>Thanh toán khi nhận hàng  . <br /><strong style="color:rgba(102,102,102,1); text-transform:capitalize; font-weight:100;">Miễn phí thu hộ, Áp dụng cho khu vực TP, HCM , Hà nội. Các tỉnh khác, tính phí COD là 50.000 VNĐ.</strong></label></p>

                 
        <p> <label> <input type="radio" name="phuongthuc" value="Thanh toán qua chuyển khoản" /> <span></span> Thanh toán qua chuyển khoản.  <br /><strong style="color:rgba(102,102,102,1); text-transform:capitalize; font-weight:100;">Thanh toán qua hệ thống các ngân hàng ACB, Vietinbank, Sacombank, Đông Á, Agribank, Vietcombank. Sẽ cung cấp thông tin chuyển khoản sau khi nhân viên gọi điện xác nhận đơn hàng.</strong></label></p>

        <p> <label> <input type="radio" name="phuongthuc" value="Thanh toán tại shop" /> <span></span> Thanh toán tại shop.  <br /><strong style="color:rgba(102,102,102,1); text-transform:capitalize; font-weight:100;">Thanh toán trực tiếp tại địa chỉ: <?=$row_setting['diachi_'.$lang]?>. Giảm giá thêm 5% khi Check-In tại Cửa hàng gấu bông.</strong></label></p>

		</div>

        </div>
    

    <div style=" float:right; padding-bottom:20px; padding-top:20px;" align="right">
      
        <input  id="submit_thanhtoan" title='tiếp tục' alt='tiếp tục' align="right" type="button" name="next" value="Thanh Toán" style="cursor:pointer;" style="padding:2px;" class="g_muatiep"/>
        <input name="mod" type="hidden" id="mod3">
    </div>
    
    <input type="hidden" id="priceproduct" name="priceproduct" value="7850000" />
    <div id="totalprice" style="display:none;"><input type="hidden" id="total" name="total" value="7850000" /></div>
    <div id="delivery" style="display:none;"><input type="hidden" id="delivery" name="delivery" value="0" /></div>
</form>
                
                </div></div>
     
              </div>
              
</div>