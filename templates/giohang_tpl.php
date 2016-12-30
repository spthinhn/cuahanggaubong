<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
		else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
		else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$check=$_SESSION['cart'][$i]['check'];
			$q=$_REQUEST[$check.'product'.$pid];
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
<script language="javascript">
	function del(pid){
		if(confirm('Xóa sản phẩm này ! ')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('Bạn Chắc Có Muốn Xóa Giỏ Hàng Hay Không ? ')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		if(confirm('Cập nhật giỏ hàng của bạn ?')){
			document.form1.command.value='update';
			document.form1.submit();
		}
	}
</script>
<link href="css/giohang.css" rel="stylesheet" type="text/css" />
<div id="info">
        <div id="sanpham">
          <div class="title-left"><h2><span>Giỏ hàng của bạn</span></h2></div>
          
            <div class="khung">
            <div class="noidungj" >
              <div id="tinh">
                <div id="giohang_ct">
                
                <form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
  <div style="margin-left: 2px; margin-right: 2px; color:#000;" class="giohang_tk">
				<table border="0" cellpadding="5px" cellspacing="1px" style="font-family: 'Roboto Condensed', sans-serif; font-size:12px;"  width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr class="menu_giohang" ><td>Stt</td><td>Hình Ảnh</td><td>Tên Sản Phẩm</td><td>Kích thước</td><td>Giá</td><td>Số lượng</td><td>Tổng giá</td><td>Xóa</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];
						$check=$_SESSION['cart'][$i]['check'];
						$pname=get_product_name($pid);
						$fc=get_fc_size_price($check);
						$size=$fc['size'];
						$price=$fc['price'];
						if($q==0) continue;
				?>
            		<tr bgcolor="#FFFFFF">

                    <td width="5%"><?=$i+1?></td>
                    <td width="10%"><a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html"><img src="upload/product/<?=get_thumb($pid)?>" width="120" style="padding:5px;" /></a></td>
            		<td width="29%"> <a href="san-pham/<?=$pid?>/<?=changeTitle($pname)?>.html" style="color:rgba(0,102,153,1); font-size:16px; font-weight:bold;"><?=$pname?> </a></td>
                    <td width="8%"><?php echo $size ?></td>

                    <td width="15%"><?=number_format($price,0, ',', '.')?>&nbsp;VND</td>
                    <td width="8%"><input type="text" name="<?=$check?>product<?=$pid?>" value="<?=$q?>" maxlength="5" size="3" style="background:#fff;text-align:center;border-radius:2px; border: solid 1px #ccc; padding: 5px 0px;" />&nbsp;</td>                    
                    <td width="15%"><?=number_format($price*$q,0, ',', '.') ?>&nbsp;VND</td>
                    <td width="10%"><a href="javascript:del(<?=$pid?>)"><img src="images/disabled.png" border="0" width="25" /></a></td>
            		</tr>
            <?php	} ?>

            <tr class="tonggia">
              <td colspan="8">  
               
                <b>Tổng giá : <?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
            </tr>
            
				<tr><td colspan="7">
              
                <input type="button" value="Mua tiếp" onclick="window.location='index.php'" class="g_muatiep">
                <input type="button" value="Xóa tất cả" onclick="clear_cart()" class="g_muatiep">
                <input type="button" value="Cập nhật" onclick="update_cart()" class="g_muatiep">
                <input type="button" value="Thanh toán" onclick="window.location='thanh-toan.html'" class="g_muatiep">
                </td></tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
				
			</div>
  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>