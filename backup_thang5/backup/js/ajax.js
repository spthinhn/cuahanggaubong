// Kiem tra du lieu dung ajax
var baseurl = '';
var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

jQuery(document).ready(function() {
	$.ajax({
		type: 'POST',
		url: baseurl + '/ajax.php?do=select&act=check',
		data: {
		},
		success: function() {
		}
	});
	/* Trang lien he */
    jQuery('#contactSubmit').click(function() {
        jQuery('#formContact input, #formContact textarea').removeClass('error');
		$('#formContact .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#contactName').val() === '') {
			jQuery('#contactName').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#contactPhone').val() != '') {
			if(isNaN(jQuery.trim(jQuery('#contactPhone').val())) || jQuery('#contactPhone').val().length<10) {
				jQuery('#contactPhone').addClass('error');
				hasError = true;
			}
		}

        if(jQuery('#contactEmail').val() === '') {
			jQuery('#contactEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#contactEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#contactEmail').val()))) {
				jQuery('#contactEmail').addClass('error');
				hasError = true;
			}
		}

        if(jQuery('#contactMessage').val() === '') {
			jQuery('#contactMessage').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#contactCaptcha').val() === '') {
			jQuery('#contactCaptcha').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
			$('#formContact .ajax-loader').css('display', 'inline-block');
            var name = jQuery('#contactName').val();
            var email = jQuery('#contactEmail').val();
            var message = jQuery('#contactMessage').val();
            var phone = jQuery('#contactPhone').val();
            var company = jQuery('#contactComp').val();
            var address = jQuery('#contactAddress').val();
			var captcha = jQuery('#contactCaptcha').val();
			var lg = jQuery('#lgct').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=contact&act=sendContact&lg=' + lg,
                data: {'name':name, 'email':email, 'message':message, 'phone':phone, 'company':company, 'address':address, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$('#formContact .ajax-loader').css('display', 'none');

					if (obj['error'] == 0)
					{
						$("#dialog div").html(obj['mess']);
						$("#dialog").dialog("open");
					}
					else
					{
						$('#formContact .ajax-result').css('display', 'block');
						$('#formContact .ajax-result').html(obj['mess']);
					}
                }
            });
        }
        return false;
    });
	
	$('#reload').click(function(e) {
		$('#captchaImg').attr('src', baseurl + '/CaptchaSecurityImages.php?width=100&height=28&characters=6&rnd='+Math.random());
		return false;
    });
	
	/* Trang dang ky thanh vien */
    jQuery('#registerSubmit').click(function() {
		jQuery('#formRegister input').removeClass('error');
		$('#formRegister .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#regName').val() === '') {
			jQuery('#regName').addClass('error');
            hasError = true;
        }

        if(jQuery('#regEmail').val() === '') {
			jQuery('#regEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#regEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#regEmail').val()))) {
				jQuery('#regEmail').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#regPassword').val() === '') {
			jQuery('#regPassword').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#regPasswordRetype').val() === '') {
			jQuery('#regPasswordRetype').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#regPasswordRetype').val() != jQuery('#regPassword').val()) {
			jQuery('#regPasswordRetype').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#regPhone').val() != '') {
			if(isNaN(jQuery.trim(jQuery('#regPhone').val())) || jQuery('#regPhone').val().length<10) {
				jQuery('#regPhone').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#regCaptcha').val() === '') {
			jQuery('#regCaptcha').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
            $('#formRegister .ajax-loader').css('display', 'inline-block');
            var name = jQuery('#regName').val();
            var email = jQuery('#regEmail').val();
            var phone = jQuery('#regPhone').val();
            var password = jQuery('#regPassword').val();
            var address = jQuery('#regAddress').val();
			var captcha = jQuery('#regCaptcha').val();
			var lg = jQuery('#lgreg').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=register&lg=' + lg,
                data: {'name':name, 'email':email, 'phone':phone, 'password':password, 'address':address, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$('#formRegister .ajax-loader').css('display', 'none');
						
					if (obj['error']==0)
					{
						$("#dialog div").html(obj['mess']);
						$("#dialog").dialog("open");
					}
					else
					{
						$('#formRegister .ajax-result').css('display', 'block');
						$('#formRegister .ajax-result').html(obj['mess']);
					}
                }
            });
        }
        return false;
    });
	
	/* Trang quen mat khau */
    jQuery('#forgotSumbit').click(function() {
		jQuery('#formForgotPass input').removeClass('error');
		$('#formForgotPass .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#forgotEmail').val() === '') {
			jQuery('#forgotEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#forgotEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#forgotEmail').val()))) {
				jQuery('#forgotEmail').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#forgotCaptcha').val() === '') {
			jQuery('#forgotCaptcha').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
            $('#formForgotPass .ajax-loader').css('display', 'inline-block');
            var email = jQuery('#forgotEmail').val();
			var captcha = jQuery('#forgotCaptcha').val();
			var lg = jQuery('#lgforget').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=forgetPass&lg=' + lg,
                data: {'email':email, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$('#formForgotPass .ajax-loader').css('display', 'none');
					if (obj['error']==0)
					{
						$("#dialog div").html(obj['mess']);
						$("#dialog").dialog("open");
					}
					else
					{
						$('#formForgotPass .ajax-result').css('display', 'block');
						$('#formForgotPass .ajax-result').html(obj['mess']);
					}
                }
            });
        }
        return false;
    });

	/* Trang doi mat khau */
    jQuery('#changePassSubmit').click(function() {
		jQuery('#formChangePass input').removeClass('error');
		$('#formChangePass .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#oldPassword').val() === '') {
			jQuery('#oldPassword').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#newPassword').val() === '') {
			jQuery('#newPassword').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#newPassRetype').val() === '') {
			jQuery('#newPassRetype').addClass('error');
            hasError = true;
        }
		
		if(jQuery('#newPassRetype').val() != jQuery('#newPassword').val()) {
			jQuery('#newPassRetype').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
			$('#formChangePass .ajax-loader').css('display', 'inline-block');
            var oldpass = jQuery('#oldPassword').val();
			var newpass = jQuery('#newPassword').val();
			var lg = jQuery('#lgchange').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=changePass&lg=' + lg,
                data: {'oldpass':oldpass, 'newpass':newpass},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$('#formChangePass .ajax-loader').css('display', 'none');
					if (obj['error']==0)
					{
						$("#dialog div").html(obj['mess']);
						$("#dialog").dialog("open");
					}
					else
					{
						$('#formChangePass .ajax-result').css('display', 'block');
						$('#formChangePass .ajax-result').html(obj['mess']);
					}
                }
            });
        }
        return false;
    });
	
	/* Trang thay doi thong tin */
    jQuery('#changeInfoSubmit').click(function() {
		jQuery('#formChangeInfo input').removeClass('error');
		$('#formChangeInfo .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#changeName').val() === '') {
			jQuery('#changeName').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#changePhone').val() != '') {
			if(isNaN(jQuery.trim(jQuery('#changePhone').val())) || jQuery('#changePhone').val().length<10) {
				jQuery('#changePhone').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#changeCaptcha').val() === '') {
			jQuery('#changeCaptcha').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
			$('#formChangeInfo .ajax-loader').css('display', 'inline-block');
            var name = jQuery('#changeName').val();
			var email = jQuery('#changeEmail').val();
            var phone = jQuery('#changePhone').val();
            var address = jQuery('#changeAddress').val();
			var captcha = jQuery('#changeCaptcha').val();
			var lg = jQuery('#lg').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=changeInfo&lg=' + lg,
                data: {'name':name, 'phone':phone, 'email':email, 'address':address, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$('#formChangeInfo .ajax-loader').css('display', 'none');
					if (obj['error']==0)
					{
						$("#dialog div").html(obj['mess']);
						$("#dialog").dialog("open");
					}
					else
					{
						$('#formChangeInfo .ajax-result').css('display', 'block');
						$('#formChangeInfo .ajax-result').html(obj['mess']);
					}
                }
            });
        }
        return false;
    });
	
	/* Dang nhap */
    jQuery('#loginSubmit').click(function() {
		jQuery('#formLogin input').removeClass('error');
		$('#formLogin .ajax-result').css('display', 'none');
        var hasError = false;

        if(jQuery('#loginEmail').val() === '') {
			jQuery('#loginEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#loginEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#loginEmail').val()))) {
				jQuery('#loginEmail').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#loginPass').val() === '') {
			jQuery('#loginPass').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
			$('#formLogin .ajax-loader').css('display', 'inline-block');
			var email = jQuery('#loginEmail').val();
            var password = jQuery('#loginPass').val();
			var lg = jQuery('#lg').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=login&lg=' + lg,
                data: {'email':email, 'password':password},

                success: function(data) {
					$('#formLogin .ajax-loader').css('display', 'none');
					if (data)
					{
						$('#formLogin .ajax-result').css('display', 'block');
						$('#formLogin .ajax-result').html(data);
					}
					else
					{
						location.reload();
					}
                }
            });
        }
        return false;
    });
	
	/* Tim kiem */
    jQuery('#searchSubmit').click(function() {
		jQuery('#formSearch input').removeClass('error');
        var hasError = false;

        if(jQuery('#keySearch').val() === '' || jQuery('#keySearch').val() === 'Keyword...') {
			jQuery('#keySearch').addClass('error');
            hasError = true;
        }

        if(hasError === false) {
			return true;
        }
        return false;
    });
	
	/* Optin */
    jQuery('#optinSubmit').click(function() {
        jQuery('#formOptin input').removeClass('error');
        var hasError = false;

        if(jQuery('#optinName').val() === '' || jQuery('#optinName').val() === 'Name...') {
			jQuery('#optinName').addClass('error');
            hasError = true;
        }

        if(jQuery('#optinEmail').val() === '') {
			jQuery('#optinEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#optinEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#optinEmail').val()))) {
				jQuery('#optinEmail').addClass('error');
				hasError = true;
			}
		}

        if(hasError === false) {
			$('#formOptin .ajax-loader').css('display', 'inline-block');
            var name = jQuery('#optinName').val();
            var email = jQuery('#optinEmail').val();
			var pid = jQuery('#optintype').val();
			var lg = jQuery('#lgot').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=optin&act=send&lg='+lg,
                data: {'name':name, 'email':email, 'pid':pid},

                success: function(data) {
					$('#formOptin .ajax-loader').css('display', 'none');
					$("#dialog div").html(data);
					$("#dialog").dialog("open");
                }
            });
        }
        return false;
    });
	
	/* Dang nhap o trang thanh toan*/
	jQuery('#buyLoginSubmit').click(function() {
		jQuery('#formLoginBuy input').removeClass('error');
		jQuery('#formLoginBuy .ajax-result').css('display', 'none');
		var hasError = false;
	
		if(jQuery('#buyLoginEmail').val() === '') {
			jQuery('#buyLoginEmail').addClass('error');
			hasError = true;
		}
		
		if (jQuery('#buyLoginEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#buyLoginEmail').val()))) {
				jQuery('#buyLoginEmail').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#buyLoginPass').val() === '') {
			jQuery('#buyLoginPass').addClass('error');
			hasError = true;
		}
	
		if(hasError === false) {
			jQuery('#loaderright').css('display', 'block');
			var email = jQuery('#buyLoginEmail').val();
			var password = jQuery('#buyLoginPass').val();
			var lg = jQuery('#lgdn').val();
	
			jQuery.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=member&act=login&lg='+lg,
				data: {'email':email, 'password':password},
	
				success: function(data) {
					jQuery('#loaderright').css('display', 'none');
					if (data){
						jQuery('#formLoginBuy .ajax-result').css('display', 'block');
						$('#formLoginBuy .ajax-result').html(data);
					}
					else
						location.reload();
				}
			});
		}
		return false;
	});
	
	/* Trang dang ky mua nhanh */
    jQuery('#fastRegisterSubmit').click(function() {
		jQuery('#fastRegForm input').removeClass('error');
        var hasError = false;

        if(jQuery('#fRegName').val() === '') {
			jQuery('#fRegName').addClass('error');
            hasError = true;
        }

        if(jQuery('#fRegEmail').val() === '') {
			jQuery('#fRegEmail').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#fRegEmail').val() != '') {
			if(!emailReg.test(jQuery.trim(jQuery('#fRegEmail').val()))) {
				jQuery('#fRegEmail').addClass('error');
				hasError = true;
			}
		}
		
		if(jQuery('#fRegPhone').val() === '') {
			jQuery('#fRegPhone').addClass('error');
            hasError = true;
        }
		
		if (jQuery('#fRegPhone').val() != '') {
			if(isNaN(jQuery.trim(jQuery('#fRegPhone').val())) || jQuery('#fRegPhone').val().length<10) {
				jQuery('#fRegPhone').addClass('error');
				hasError = true;
			}
		}

        if(hasError === false) {
			jQuery('#loaderleft').css('display', 'block');
            var name = jQuery('#fRegName').val();
            var email = jQuery('#fRegEmail').val();
            var phone = jQuery('#fRegPhone').val();
			var lg = jQuery('#lgfr').val();

            jQuery.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=fastRegister&lg='+lg,
                data: {'name':name, 'email':email, 'phone':phone},

                success: function(data) {
					location.reload();
                }
            });
        }
        return false;
    });
});
	
function checkoutSubmit(alias)
{
	jQuery('#formOrder input').removeClass('error');
	var hasError = false;

	if(jQuery('#orderName').val() === '') {
		jQuery('#orderName').addClass('error');
		hasError = true;
	}

	if(jQuery('#orderEmail').val() === '') {
		jQuery('#orderEmail').addClass('error');
		hasError = true;
	}
	
	if (jQuery('#orderEmail').val() != '') {
		if(!emailReg.test(jQuery.trim(jQuery('#orderEmail').val()))) {
			jQuery('#orderEmail').addClass('error');
			hasError = true;
		}
	}
	
	if(jQuery('#orderAddress').val() === '') {
		jQuery('#orderAddress').addClass('error');
		hasError = true;
	}
	
	if(jQuery('#orderPhone').val() === '') {
		jQuery('#orderPhone').addClass('error');
		hasError = true;
	}
	
	if (jQuery('#orderPhone').val() != '') {
		if(isNaN(jQuery.trim(jQuery('#orderPhone').val())) || jQuery('#orderPhone').val().length<10) {
			jQuery('#orderPhone').addClass('error');
			hasError = true;
		}
	}
	
	if(hasError === false) {
		$('#formOrder .ajax-loader').css('display', 'inline-block');
		var name = jQuery('#orderName').val();
		var email = jQuery('#orderEmail').val();
		var address = jQuery('#orderAddress').val();
		var phone = jQuery('#orderPhone').val();
		var note = jQuery('#orderMessage').val();
		var lg = jQuery('#lgod').val();
		var stt = $('input[name="'+alias+'"]:checked').val();

		jQuery.ajax({
			type: 'POST',
			url: baseurl + '/ajax.php?do=cart&act=checkout&lg='+lg,
			data: {'alias':alias, 'name':name, 'email':email, 'address':address, 'phone':phone, 'note':note, 'stt':stt},
	
			success: function(data) {
				window.location.replace(data);
			}
		});
	}
    return false;
}

function Comment() {
    jQuery('#formComment input, #formComment textarea').removeClass('error');
	$('#formComment .ajax-result').css('display', 'none');
    var hasError = false;

    if(jQuery('#commentName').val() === '') {
        jQuery('#commentName').addClass('error');
        hasError = true;
    }
	
    if(jQuery('#commentEmail').val() === '') {
        jQuery('#commentEmail').addClass('error');
        hasError = true;
    }

	if (jQuery('#commentEmail').val() != '') {
        if(!emailReg.test(jQuery.trim(jQuery('#commentEmail').val()))) {
            jQuery('#commentEmail').addClass('error');
            hasError = true;
        }
    }
	
    if(jQuery('#commentCaptcha').val() === '') {
        jQuery('#commentCaptcha').addClass('error');
        hasError = true;
    }

    if(jQuery('#commentMessage').val() === '') {
        jQuery('#commentMessage').addClass('error');
        hasError = true;
    }

    if(hasError === false) {
		$('#formComment .ajax-loader').css('display', 'inline-block');

        var name = jQuery('#commentName').val();
        var email = jQuery('#commentEmail').val();
        var message = jQuery('#commentMessage').val();
        var captcha = jQuery('#commentCaptcha').val();
        // hidden value
        var pid = jQuery('#pid').val();
        var post_id = jQuery('#post_id').val();
		var type = jQuery('#type').val();

        jQuery.ajax({
            type: 'POST',
            url: baseurl + '/ajax.php?do=comment&act=insert',
            data: { 'name':name, 'email':email,'message':message,'captcha':captcha, 'pid':pid, 'post_id':post_id, 'type':type },

            success: function(data) {
				var obj = eval('(' + data + ')');
				$('#formComment .ajax-loader').css('display', 'none');
				if (obj['error']==0)
				{
					$("#dialog div").html(obj['mess']);
					$("#dialog").dialog("open");
				}
				else
				{
					$('#formComment .ajax-result').css('display', 'block');
					$('#formComment .ajax-result').html(obj['mess']);
				}
			}
        });
    }
	return false;
}

function ReplyCmt(cmt_pid, post_id, type) {
    jQuery('#formComment input, #formComment textarea').removeClass('error');
    jQuery('.cmtBox').hide();

    jQuery('#cancel-rep-'+cmt_pid).show();
    jQuery('#active-rep-'+cmt_pid).hide();

    jQuery.ajax({
        type: 'POST',
        url: baseurl + '/ajax.php?do=comment&act=reply',
        data: { 'cmt_pid':cmt_pid, 'post_id':post_id, 'type':type },

        success: function(data) {
            jQuery('#replay-on-'+cmt_pid).html(data);
        }
    });

    return false;
}

function CancelRep(cmt_pid) {
    jQuery('#cancel-rep-'+cmt_pid).hide();
    jQuery('#active-rep-'+cmt_pid).show();
    jQuery('#replay-on-'+cmt_pid).empty();
    jQuery('.cmtBox').show();

    return false;
}

function ValidateQty(eleId, index){
    var qty = $('#' + eleId).children("input:text");
    var proId = $('#' + eleId).children("input.proId").val();
    var proPri = $('#' + eleId).children("input.proPri").val();
    var flag = !isNaN(parseFloat(qty.val())) && (qty.val()>0);

	if (flag == false) {
        alert("Số lượng phải lớn hơn 0!");
		location.reload();
        return false;
    }

	jQuery.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=cart&act=update',
		data:{'proPri':proPri,'qty':qty.val(), 'id':proId},
		dataType:'html',
		success:function (data) {
			var getdata = $.parseJSON(data);
			$('#subtotal' + index).text(getdata.total);
			$('#totalMoney').html(getdata.totalAll);
		}
	});
	return true;
}

function reloadReplyCaptcha()
{
	$('#captchaImgReply').attr('src', baseurl + '/CaptchaSecurityImages.php?width=100&height=28&characters=6&rnd='+Math.random());
	return false;
}