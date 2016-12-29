// js for google search
function SearchGoogle(){
	var key = document.getElementById("keySearch").value;
	var site = document.domain;
	var qs = encodeURI(key + "+site:" + site);
	var url = "http://www.google.com.vn/search?q=" + qs;
	window.open(url, '_blank');
	return false;
}

$(document).ready(function(e) {
	$('#slider').nivoSlider({directionNav:false});
    $( "#tabs" ).tabs();
	
	$("#this_map, #fancy_pro_img").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none',

		helpers : {
			title : {
				type : 'over'
			}
		}
	});
	
	$("a[class=fancy_img]").fancybox({
		'transitionIn'  : 'none',
		'transitionOut'  : 'none',
		'titlePosition'  : 'over'
	});

	jQuery("#optinName").DefaultValue("Name...");
	jQuery("#optinEmail").DefaultValue("Email...");
	jQuery("#keySearch").DefaultValue("Keyword...");

	$( "#dialog" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Ok",
				click: function() {
					$( this ).dialog( "close" );
					location.reload();
				}
			}
		]
	});

	$( "#dialogReset" ).dialog({
		autoOpen: false,
		width: 400,
		buttons: [
			{
				text: "Ok",
				click: function() {
					$( this ).dialog( "close" );
					document.location = "/";
				}
			}
		]
	});
	// back to top
	 $(window).scroll(function() {
		if($(window).scrollTop() != 0) {
			$('#back_to_top').fadeIn();
		} else {
			$('#back_to_top').fadeOut();
		}
	   });
	   
	   $('#back_to_top').click(function() {
			$('html, body').animate({scrollTop:0},500);
	   });
});
