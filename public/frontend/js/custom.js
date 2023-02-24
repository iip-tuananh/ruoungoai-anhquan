var $Base_site = document.location.origin + '/wp-content/themes/gv-whisky/';

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function setCookieHour(cname, cvalue, hour) {
    var d = new Date();
    d.setTime(d.getTime() + (1*hour*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function checkCookie() {
    var username=getCookie("username");
    if (username!="") {
        alert("Welcome again " + username);
    } else {
        username = prompt("Please enter your name:", "");
        if (username != "" && username != null) {
            setCookie("username", username, 365);
        }
    }
}
/** Check Age **/
$(document).ready(function(){
	var ager = getCookie('ageVerification');
	var noitics = window.sessionStorage.getItem('AgesNoitice');
	
	if(ager == ""){
		//console.log('1');
		//$('.gv_popup_age').show();
		//$('body').addClass('fixed');
	}

	$('.gv_popup_age .box_content .bt_no').click(function(){
		$('.gv_popup_age .box_content .button_wrap').hide();
	});

	$('.gv_popup_age .box_content .bt_yes').click(function(){
		$('.gv_popup_age').hide();
		$('body').removeClass('fixed');

		setCookie('ageVerification', 'yes', 365);
	});
	
	//if(noitics == ""){
	//console.log(window.sessionStorage.getItem('AgesNoitice'));
	
	if ( noitics == null ) {
		//console.log(11111);
		setTimeout(function(){
			$('.bg_layer_over').fadeIn('slow');
			$('.gv_popup_note').fadeIn('slow');
		}, 1200);
	}
	
	$('.bnt-close').click(function(){
		$('.gv_popup_note').fadeOut();
		$('.bg_layer_over').fadeOut();
		window.sessionStorage.setItem('AgesNoitice', 'yes');
		setCookie('ageVerification', 'yes', 180);
	});
	
	$('.bg_layer_over').click(function(){
		$('.gv_popup_note').fadeOut();
		$(this).fadeOut();
		window.sessionStorage.setItem('AgesNoitice', 'yes');
	});
	
	/* console.log(ager); */
});

/** Header Block **/
$(document).ready(function() {
	if ($(window).width() < 768) {
		$('.btn-search').click(function(){
			$('.header-search').slideToggle(300);
		});
	}

	$('.btn-toggle').click(function(){
		$('.header-mobile-nav').toggleClass('open');
	});

	$('.btn-close').click(function(){
		$('.header-mobile-nav').toggleClass('open');
	});

	$('li.has-submenu').click(function(){
	    $(this).children('sub-nav').toggleClass('open');
		$(this).children('menu-link').toggleClass('active');
	});
	    
});

/** Suggest Seach */
// function suggest_search($value){
        
//     $.ajax({ 
//         type: "POST", 
//         async: true,
//         cache: false,
//         url: $Base_site + "/ajaxload.php",
//         data: {
//             action: "suggestsearch",
//             keyword: $value,
//         },
// 		beforeSend: function(){
// 			$('.load_content').show();
//         },
//         success: function(response) {
//             $('#suggest_search').html(response.result);
// 			$('.load_content').hide();
// 			//console.log(response.mored);
//             if(response.mored != ''){
//                 $('.show-more').html(response.mored);
//                 $('.show-more').show();
//             }else{
//                 $('.show-more').hide();
//             }
            
//         },
//         error: function( jqXHR, textStatus, errorThrown ){
//             console.log( 'The following error occurred: ' + textStatus, errorThrown );
//         }
    
//     });        
// }

/** Search **/
jQuery(document).ready(function ($) {
	var $sgtimeout = null;
	
	$('.search-input').keyup(function () {
		var $this = $(this).val();
		clearTimeout($sgtimeout);
		//console.log($this);
		$sgtimeout = setTimeout(function (){
			if($this != ''){
				suggest_search($this);
				$('.search_suggest').addClass('show');
			}else{
				$('.search_suggest').removeClass('show');
			}
		}, 500);
    });

    $('.bss-close').on('click', function(){
        $('.search_suggest').removeClass('show');
    });
});

/** Menu **/
jQuery(document).ready(function ($) {
	if ($(window).width() < 768) {
		$('.mega-box').removeClass('open');
	}
    $('.btn-menu').click(function () {
		$('.mega-box').toggleClass('open');
    });

    if ($(window).width() < 768) {
		jQuery(window).bind('scroll', function () {
			if ($(window).scrollTop() > 0) {
				$('.group-brand').addClass('fixed');
			} else {
				$('.group-brand').removeClass('fixed');
			}
		});
    }
	$('.toggle-button').click(function () {
		$('.navmain').addClass('open');
    });
	
    $('.toggle-close').click(function () {
		$('.navmain').removeClass('open');
    });
});

/** Header Nav **/
$(document).ready(function(){
	var wd = $(window).width();
	$('.header-panel .head_cart_box').removeClass('mobi_cart_image');
	if(wd < 768){
		$('.header-panel .head_cart_box').addClass('mobi_cart_image');
	}
	if(wd < 992){
		$('.sub-nav').css('display', 'none');
		$('.menu-mobile .has-submenu >a').after('<i class="arrow"></i>');
		$('.menu-mobile .has-submenu i.arrow').click(function(){
			if($(this).hasClass('show')){
				$(this).removeClass('show');
				$('.menu-mobile .sub-nav').slideUp(400);
			}else{
				$('.menu-mobile .sub-nav').slideUp(400);
				$('.menu-mobile .has-submenu i.arrow').removeClass('show');
				$(this).addClass('show');
				$(this).next().slideDown(400);
			}
		});
		/*
		jQuery( '.menu-mobile' ).on( 'click', '.nav-menu>li.has-submenu>a', function( e ){
			e.preventDefault();
            $(this).next(".sub-nav").slideToggle("slow");
		});
		*/
	}
	
	$('.promptHeaderCloseButtonContainer').click(function(){
		$('.fb_customer_chat_bubble_pop_in').hide();
	});
		
	$('.primary-menu>.has-submenu').hover(function(){
		$(this).children(".sub-nav").addClass('nav-open');
	},function(){
		$(this).children(".sub-nav").removeClass('nav-open');
	});
		
		
	if(wd > 991){
		$('.sub-nav').hover(function(){
			$(this).addClass('nav-open');
		}, function(){
    		$(this).removeClass('nav-open');
		});
	}
		
	jQuery(window).bind('scroll', function () {
		if ($(window).scrollTop() > 119) {
			$('.main-navi').addClass('fixed');
        } else {
			$('.main-navi').removeClass('fixed');
		}
	});
	
	jQuery(window).bind('scroll', function () {
		if ($(window).scrollTop() > 119) {
			$('#header .header-panel').addClass('fixed');
        } else {
			$('#header .header-panel').removeClass('fixed');
		}
	});
});

/** Cart Sticky **/
jQuery(document).ready(function($){
	if($(window).width() > 991){
		$(window).scroll(function () {
			var sbCart = $('.widget_shopping_cart');
			if(sbCart.length != 0){
				if ($(window).scrollTop() > sbCart.offset().top){
					sbCart.css({
						'left' : sbCart.offset().left+'px',
						'width' : sbCart.width()+'px',
					});
				}else{
					sbCart.removeAttr('style');
				}
			}
		});
	}
});
	
/** Sticky Menu **/
$(document).ready(function () {
	$(window).scroll(function () {
		var top =  $(".go-top");
		if ($(window).scrollTop() > 100) {
			top.animate({"opacity": "1"},100);
		}else{
			top.animate({"opacity": "0"},0);
		}
	});
	
	$("#btn-hidden").on("click", function(){
		$(this).closest('.short-desc').toggleClass('show');
		if($('.short-desc').hasClass('show')){
			$(this).html('Ẩn');
		}else{
			$(this).html('Xem thêm');
		}
	});
	
	$(".tbn-info").on("click", function(){
		$('.info-desc').slideToggle('slow');
	});
	
	

	$(".btn-gotop").on('click', function () {
		$("html, body").animate({scrollTop: 0}, 400);
	});
});


/** Add to cart Flying */
// function AnimationCart($this){
// 	var $el=$this.closest('.variant');
// 	/*console.log($this.offset().top-10);*/
// 	/*console.log($this.offset().left-10); */
// 	var $mb=$this.closest('.variant-mb');
// 	if($el.length != 0 || $mb.length != 0){
// 			/* var $form=$el.find('form'); */
// 			var $imgToDrag=$('.add-to-cart-animation').eq(0);
// 			var $basketImage=$('.box-cart-image');
// 				/* var addToCartIconClass=$form.data('add-to-basket-icon-class'); */
// 			var $headerBasketPlaceholder=$('.mobi_cart_image'),
// 				$animationTarget = $headerBasketPlaceholder.length&&$headerBasketPlaceholder.is(':visible')?$headerBasketPlaceholder:$basketImage;
// 				//console.log($animationTarget.offset().top-10);
// 				//console.log($animationTarget.offset().left-10);
// 			if($imgToDrag.length){
// 				$imgToDrag.clone().appendTo('body').addClass('add-to-cart-animation--')
// 				.css({
// 					'opacity':'0.9',
// 					'position':'absolute',
// 					'z-index':'10000',
// 					'display':'block',
// 					'top':$this.offset().top,
// 					'left':$this.offset().left,
// 				}).animate({
// 					'top':$animationTarget.offset().top-10,
// 					'left':$animationTarget.offset().left-10,
// 				}, 2000,
// 				'linear',function(){
// 					$(this).fadeOut(400,function(){
// 						$(this).remove()
// 					})
// 				})
// 			}
// 	}
// }

/**
 * SHOPPING CART
 */
$(document).on('click', '.bt_add_cart', function() {
    var id = $(this).data('id');
	var url = $(this).data('url');
	console.log(url);
    $.ajax({
        type: "POST",
        dataType: "json",
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        data: {
			id: id,
        },
        success: function(data) {
			$('#shopping_cart').html(data.html1);
			$.notify("Thêm vào giỏ hàng thành công", "success"
			);
        },
    });
});

/** Update cart */
$(document).on('click', '.bt-cplus', function() {
	var id = $(this).data('id');
	var url = $(this).data('url');
	var quantity = $(this).parent().find('input[name="quantity"]').val();

if( !isNaN( quantity ) && quantity >= 1 ) quantity++;

	
	console.log(quantity);
    $.ajax({
        type: "POST",
        dataType: "json",
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        data: {
           id :id,
		   quantity :quantity,
		 
        },
        success: function(data) {
            $('#shopping_cart').html(data.html1);
			$.notify("Tăng số lượng 1", "info");
        }
    });
});

/** Update cart */
$(document).on('click', '.bt-cminus', function() {
    
	var id = $(this).data('id');
	var url = $(this).data('url');
	var quantity = $(this).parent().find('input[name="quantity"]').val();

	if( !isNaN( quantity ) && quantity >= 1 ) quantity--;

	console.log(id,url);
    $.ajax({
        type: "POST",
        dataType: "json",
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        data: {
           id: id,
		   quantity: quantity,
        },
        success: function(data) {
			$('#shopping_cart').html(data.html1);
			$.notify("Giảm số lượng 1", "info");
        }
    });
});

/** Remove cart */
$(document).on('click', '.bt-cremove', function() {
    var id = $(this).data('id');
	var url = $(this).data('url');
	console.log(id,url);
    $.ajax({
        type: "POST",
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url :url,
        data: {
            id: id,
        },
        success: function(data) {
			$('#shopping_cart').html(data.html1);
			$.notify("Xoá sản phẩm thành công !", "error");
        },
       
    });
});

/** Calculate Tax **/
$(document).on('click', '.cal_taxfee', function(){
	var fee = $('input[name^="cart_fee"]').prop('checked') === true ? '1' : '';
		//console.log(fee);
	$.ajax({
			type: "POST",
			dataType: "html",
			async: false,
			cache: false,
			url: $Base_site + "/ajaxload.php",
			data: {
				action: "ajaxsetfeetax",
				ctfee: fee,
			},
			success: function(response) {
				console.log(response);
				jQuery('body').trigger('update_checkout');
				location.reload();
				//get_total_fee();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log('The following error occurred: ' + textStatus, errorThrown);
			}
	});
});

/* Slider */
jQuery(document).ready(function($){
	var Pslider = $('.Bx_gallery').bxSlider({
		mode: 'fade',
		controls: false,
		speed: 800,
		touchEnabled: false,
		pager: false,
		//pagerCustom: "#Bx-pager",
	});
	$('.Bx_thumbnail').bxSlider({
		mode: 'horizontal',
		controls: true,
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>',
		pager: false,
		touchEnabled: false,
		slideMargin: 30,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		slideWidth: 200,
	});
	
	$('#Bx-pager .Bx_thumbnail li>a[data-slide-index^="0"]').addClass('active');
	$('#Bx-pager .Bx_thumbnail li>a').click(function(ev){
		ev.preventDefault();
		Pslider.goToSlide(this.getAttribute('data-slide-index'));
		$('#Bx-pager .Bx_thumbnail li>a').removeClass('active');
		$(this).addClass('active');
		Pslider.stopAuto();
	});
	
	$('.owl-Related').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        autoplay: true,
        dots: false,
        items: 2,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items: 2,
                nav: true,
                dots: false,
            },
            576:{
                items: 3,
                nav: true,
                dots: false,
            },
            768:{
                items: 4,
            },
            992:{
                items: 5,
            },
        }
    });
});
