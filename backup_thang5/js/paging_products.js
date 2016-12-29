var baseurl = "";

$(document).ready(function(){          
	function loadData(page){		
		jQuery.ajax({
			type: 'POST',
			url: baseurl + '/ajax.php?do=comment&act=paging_products',
			data: { 'page':page },
	
			success: function(data) {
				$("#load-comments").html(data);
        }
    });
	}
	loadData(1);  // For first time page load default results
	$('#load-comments .Paging li.active').live('click',function(){
		var page = $(this).attr('p');
		loadData(page);
	});
});