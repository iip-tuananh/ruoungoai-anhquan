<!DOCTYPE html>
<html lang="vi" style="overflow-x: hidden">
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title>@yield('title')</title>
		<meta name="description" content="">
		<meta name="keywords" content="@yield('title')" />
		<meta name="robots" content="noodp,index,follow" />
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="@yield('description')" />
		<link rel="canonical" href="{{ url()->current() }}" />
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:site_name" content="{{ url()->current() }}" />
		<meta property="og:updated_time" content="2021-08-28T22:06:30+07:00" />
		<meta property="og:image" content="@yield('image')" />
		<meta property="og:image:secure_url" content="@yield('image')" />
		<meta property="og:image:width" content="598" />
		<meta property="og:image:height" content="333" />
		<meta property="og:image:alt" content="" />
		<meta property="og:image:type" content="image/jpeg" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="@yield('title')" />
		<meta name="twitter:description" content="@yield('description')" />
		<meta name="twitter:image" content="@yield('image')" />
		<!-- Fav Icon -->
		<link rel="icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">
        <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/jquery.bxslider.min.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/jquery.fancybox.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/fonts.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/grid.css')}}" rel="stylesheet" media="all"/>
        <link href="{{asset('frontend/css/style.css')}}"rel="stylesheet" media="bogus"/>
        <link href="{{asset('frontend/css/main.css')}}"rel="stylesheet" media="bogus"/>
        <link href="{{asset('frontend/css/product.css')}}"rel="stylesheet" media="bogus"/>
        <link href="{{asset('frontend/css/blog.css')}}"rel="stylesheet" media="bogus"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		@yield('css')

        <style type="text/css">
            img.wp-smiley,
            img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
            }
        </style>
        <link rel='stylesheet' id='icon-font-style-css'  href='{{asset('frontend/css/icon-font-style.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='wp-block-library-css'  href='{{asset('frontend/css/style.min.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='wc-blocks-vendors-style-css'  href='{{asset('frontend/css/wc-blocks-vendors-style.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='wc-blocks-style-css'  href='{{asset('frontend/css/wc-blocks-style.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='dispensary-age-verification-css'  href='{{asset('frontend/css/dispensary-age-verification-public.min.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-layout-css'  href='{{asset('frontend/css/woocommerce-layout.css')}}' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='{{asset('frontend/css/woocommerce-smallscreen.css')}}' type='text/css' media='only screen and (max-width: 768px)' />
        <link rel='stylesheet' id='woocommerce-general-css'  href='{{asset('frontend/css/woocommerce.css')}}' type='text/css' media='all' />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap');
          </style>
        <style id='woocommerce-inline-inline-css' type='text/css'>
            .woocommerce form .form-row .required { visibility: visible; }
        </style>
        <link rel='stylesheet' id='yith-infs-style-css'  href='{{asset('frontend/css/frontend.css')}}' media='all' />
        <script type='text/javascript' src='{{asset('frontend/js/jquery.min.js')}}' id='jquery-core-js'></script>
        <script type='text/javascript' src='{{asset('frontend/js/jquery-migrate.min.js')}}' id='jquery-migrate-js'></script>
        <script type='text/javascript' src='{{asset('frontend/js/js.cookie.js')}}' id='age-verification-cookie-js'></script>
        <input type="hidden" name="imgLogo" id ="logoimg" value="{{ url('' . $setting->logo) }}">
        <script type='text/javascript' id='dispensary-age-verification-js-extra'>
            /* <![CDATA[ */
            var imgLogo = document.getElementById('logoimg').value;
            var object_name = {
            bgImage: "",
            minAge: "18",
            imgLogo: imgLogo,
            title: "",
            copy:
                "Website kh\u00f4ng d\u00e0nh cho ng\u01b0\u1eddi d\u01b0\u1edbi 18 tu\u1ed5i.\nQu\u00fd kh\u00e1ch vui l\u00f2ng cung c\u1ea5p th\u00f4ng tin:",
            btnYes: "\u0110\u1ee7 18 tu\u1ed5i",
            btnNo: "Ch\u01b0a \u0111\u1ee7 18 tu\u1ed5i",
            successTitle: "Success!",
            successText: "You are now being redirected back to the site ...",
            successMessage: "",
            failTitle: "Sorry!",
            failText: "You are not old enough to view the site ...",
            messageTime: "",
            redirectOnFail: "",
            beforeContent: "",
            afterContent: ""
        };
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/dispensary-age-verification-public.js')}}' id='dispensary-age-verification-js'></script>
        <style type="text/css">
            .avwp-av-overlay {
            background-image: url();
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            box-sizing: border-box;
            }
            .avwp-av {
            box-shadow: none;
            }
        </style>
        <noscript>
            <style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
        </noscript>
        <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet"/>
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet"/>
    </head>
    <body>
        <div class="zalo-cus">
            <a href="http://zalo.me/{{$setting->phone1}}"><img src="{{asset('frontend/images/zalo-icon.png')}}" alt="" srcset=""></a>
        </div>
        <div class="gv_popup_age" style="display: none">
            <div class="box_inner">
                <div class="box_content">
                    <div class="logo">
                        <img src="{{$setting->logo}}"/>
                    </div>
                    <div class="head">
                        <h2>Bạn có trên 18 tuổi không?</h2>
                        <div class="button_wrap">
                            <button class="bt_yes">Có</button>
                            <button class="bt_no">Không</button>
                        </div>
                    </div>
                    <div class="desc">
                        Tuân thủ Nghị định 24/2020/NĐ-CP, Malt & Co cam kết không bán rượu cho người dưới 18 tuổi. Do đó, chúng tôi yêu cầu những người dưới 18 tuổi không truy cập vào trang web của chúng tôi.
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.header.index')
        @yield('content')
        @include('layouts.footer.index')                                
        <div class="add-to-cart-animation"></div>
        <div class="mc-call-phone">
            <a href="tel:+{{$setting->phone1}}">
            <img src="{{asset('frontend/images/icon-call.png')}}"/>
            </a>
        </div>
        <link href="{{asset('frontend/css/mobile.css')}}" rel="stylesheet" media="all"/>
        {{-- <div class="zalo-chat-widget" data-oaid="2583263602653822437" data-welcome-message="Anh/chị có cần Malt&Co hỗ trợ gì không ạ ?" data-autopopup="0" data-width="300" data-height="300"></div>
        <script src="https://sp.zalo.me/plugins/sdk.js"></script> --}}
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $.ageCheck({
                    "bgImage" : object_name.bgImage,
                    "minAge" : object_name.minAge,
                    "imgLogo" : object_name.imgLogo,
                    "title" : object_name.title,
                    "copy" : object_name.copy,
                    "btnYes" : object_name.btnYes,
                    "btnNo" : object_name.btnNo,
                    "redirectOnFail" : object_name.redirectOnFail,
                    "successTitle" : object_name.successTitle,
                    "successText" : object_name.successText,
                    "successMessage" : object_name.successMessage,
                    "failTitle" : object_name.failTitle,
                    "failText" : object_name.failText,
                    "messageTime" : object_name.messageTime,
                    "cookieDays" : object_name.cookieDays,
                    "adminDebug" : object_name.adminDebug,
                    "beforeContent" : object_name.beforeContent,
                    "afterContent" : object_name.afterContent
                });
            });
        </script>
        <script type="text/javascript">
            (function () {
                var c = document.body.className;
                c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
                document.body.className = c;
            })();
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/jquery.blockUI.min.js')}}' id='jquery-blockui-js'></script>
        <script type='text/javascript' id='wc-add-to-cart-js-extra'>
            /* <![CDATA[ */
            var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"Xem gi\u1ecf h\u00e0ng","cart_url":"https:\/\/maltco.asia\/gio-hang\/","is_cart":"","cart_redirect_after_add":"no"};
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/add-to-cart.min.js')}}' id='wc-add-to-cart-js'></script>
        <script type='text/javascript' src='{{asset('frontend/js/js.cookie.min.js')}}' id='js-cookie-js'></script>
        <script type='text/javascript' id='woocommerce-js-extra'>
            /* <![CDATA[ */
            var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/woocommerce.min.js')}}' id='woocommerce-js'></script>
        <script type='text/javascript' id='wc-cart-fragments-js-extra'>
            /* <![CDATA[ */
            var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_eb3696daec179da0a19f4a307ec3b820","fragment_name":"wc_fragments_eb3696daec179da0a19f4a307ec3b820","request_timeout":"5000"};
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/cart-fragments.min.js')}}' id='wc-cart-fragments-js'></script>
        <script type='text/javascript' src='{{asset('frontend/js/yith.infinitescroll.min.js')}}' id='yith-infinitescroll-js'></script>
        <script type='text/javascript' id='yith-infs-js-extra'>
            /* <![CDATA[ */
            var yith_infs = {"navSelector":"nav.navigation","nextSelector":"nav.navigation a.next","itemSelector":"li.item--prod","contentSelector":"#prod-ajax","loader":"https:\/\/maltco.asia\/wp-content\/plugins\/yith-infinite-scrolling\/assets\/images\/loader.gif","shop":""};
            /* ]]> */
        </script>
        <script type='text/javascript' src='{{asset('frontend/js/yith-infs.min.js' )}}' id='yith-infs-js'></script>
        <script type='text/javascript' src='{{asset('frontend/js/wp-embed.min.js' )}}' id='wp-embed-js'></script>
        <!-- js -->
        <script src="{{asset('frontend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery-ui.v1.12.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
        <script src="{{asset('frontend/js/sticksy.js')}}"></script>
        <script src="{{asset('frontend/js/home.js')}}"></script>
        <script src="{{asset('frontend/js/custom.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        
        <script src="{{asset('frontend/js/notify.min.js')}}"></script>
        @if (session()->has('successBill'))
    </body>
     <script>
        console.log(123);
        $.notify("Đặt hàng thành công", "success"
			);
    </script>
@endif
@if (session()->has('SuccessPostContac'))
<script>
    console.log(123);
    $.notify("Gửi thông tin liên hệ thành công", "success"
        );
</script>
@endif
		<script>
			var swiper = new Swiper(".mySwiper", {
			  pagination: {
				el: ".swiper-pagination",
			  },
			});
		  </script>
          <script>
			var swiper = new Swiper(".mySwiperbanner", {
			  pagination: {
				el: ".swiper-pagination",
			  },
              autoplay: {
        delay: 2500,
        disableOnInteraction: false,
             },
			});
		  </script>
		    <script>
                var swiper = new Swiper(".mySwiperblog", {
                  pagination: {
                    el: ".swiper-pagination",
                  },
                breakpoints: {
                350: {
                slidesPerView: 1,
                spaceBetween: 20,
                },
                768: {
                slidesPerView: 2,
                spaceBetween: 40,
                },
                1024: {
                slidesPerView: 3,
                spaceBetween: 50,
                },
            },
                });
              </script>
                 <script>
                    var swiper = new Swiper(".mySwiperthuonghieu", {
                    spaceBetween: 20,
                      pagination: {
                        el: ".swiper-pagination",
                      },
                    breakpoints: {
                    350: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    },
                    768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                    },
                    1024: {
                    slidesPerView: 5,
                    spaceBetween: 50,
                    },
                },
                    });
                  </script>
                      <script>
                        $('#filter-price').change(function (e) { 
                            e.preventDefault();
                            var price = $(this).val();
                            var url = $(this).data('url');
                            var cate = $('input[name="cate-id"]').val();
                            var type = $('input[name=type-id]').val();
                            console.log(cate,type);
                            $.ajax({
                                type: "post",
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: url,
                                data: {
                                    price: price,
                                    cate :cate,
                                    type:type,
                                },
                                success: function (data) {
                                    $('.form-filer').html(data.html7);
                                }
                            });
                       
                        });
                        
                     </script>
         
          
</html>