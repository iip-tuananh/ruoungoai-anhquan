var $Base_site = document.location.origin + '/wp-content/themes/gv-whisky/';

/** Get trending product */
function get_trending_prod($offset, $show){
	var offseted = $show * 2;

	$.ajax({ 
		type : "POST",
        dataType : "html",
        async: false,
        cache: false, 
        url: $Base_site + "/ajaxload.php",
        data : {
			action: "loadmore",
            offset: $offset,
			show: $show,
        },
		beforeSend: function(){
			$('.load_content').show();
        },
        success: function(response) {
			//console.log(response);
			$('.load_content').hide();
            $('.trend--prod').append(response);
            if(offseted == $show * 2){
				$('.load-more-trending').css('display', 'none');
            }
        },
        error: function( jqXHR, textStatus, errorThrown ){
			console.log( 'The following error occurred: ' + textStatus, errorThrown );
        }
	});
}

/** Product Trending **/
$(document).ready(function(){
	$('.load-more-trending').click(function() {
		var offset = parseInt($(this).attr('data-offset')); 
		var show = parseInt($(this).attr('data-show'));
		
		if(offset < show * 2){
      		get_trending_prod(offset, show);
		}
    });
});