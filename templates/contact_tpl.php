<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
function js_submit12(){
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	if(isEmpty(document.getElementById('diachi'), "Xin nhập Địa Chỉ.")){
		document.getElementById('diachi').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("Email không hợp lệ");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('tieude'), "Xin nhập Chủ đề.")){
		document.getElementById('tieude').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>
<div id="info">
	<div id="sanpham">
	           
	   <div class="khung">
		   <div class="title-right"><h2><span><?=_contact?></span></h2></div>

		   <div class="khung_trai">			

				<div class="form_lh">
					<form method="post" name="frm" action="lien-he.html" enctype="multipart/form-data">

				        <p><label><?=_hovaten?> : </label><b style="color:#990000;">*</b><input name="ten" type="text" class="tflienhe" id="ten" /></p>
				        <p><label><?=_address?> : </label><b style="color:#990000;">*</b><input name="diachi" type="text"  class="tflienhe" id="diachi"/></p>
						<p><label><?=_dienthoai?> : </label> <b style="color:#990000;">*</b><input name="dienthoai" type="text" class="tflienhe" id="dienthoai"/></p>
						<p><label>Email : </label><b style="color:#990000;">*</b><input name="email" type="text" class="tflienhe" id="email"  /></p>
						<p><label><?=_chude?> : </label><b style="color:#990000;">*</b><input name="tieude" type="text" class="tflienhe" id="tieude" /></p>
						<p><label><?=_dinhkemfile?> : </label><input name="file" type="file" class="contact-file-input" /></p>
						<p><label><?=_noidung?> : </label><b style="color:#990000;">*</b>
						<textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
						</p>
				        <p><label>&nbsp </label>
				            <button type="button" class="button-contact" onclick="js_submit12();"> Gửi liên hệ</button>
				            <button type="reset" class="button-contact">Reset</button>   
				        </p> 

				    </form>
				</div>
		    </div>


	      	<div class="khung_phai">
	      		<div class="form_contact">
					<p><?=$row_detail['noidung_'.$lang]?></p>
				</div>
	      		<?=get_mapapi(2,1)?>
	      	</div>	        
	      	<div class="clear"></div> 			 	 
	    </div>
	</div>
</div>