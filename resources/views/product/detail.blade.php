@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
@php
$discountPrice = $product->price - ($product->price * ($product->discount / 100));
@endphp
@endsection
@section('image')
@php
$imgs = json_decode($product->images);
$color = json_decode($product->size);
$promotion =  json_decode($product->preserve);
@endphp
{{url(''.$imgs[0])}}
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="preload" as='style'  type="text/css" href="{{asset('frontend/css/product_style.scss.css')}}">
<link href="{{asset('frontend/css/product_style.scss.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('frontend/css/breadcrumb_style.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
{{-- choice color --}}
<script>
   function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
   }
   $(document).ready(function(){
         $(".click-color").click(function(){ 
            var color = $(this).data('value');
            var price = $(this).data('price');
            var discount = $(this).data('discount');
            const discountPrice = price-(price*(discount/100));
            var html = '<span class="prices price-box"><span class="price product-price sale-price on-sale">'+formatNumber(discountPrice)+'₫</span> &nbsp;<del class="old-price">'+formatNumber(price)+'₫</del></span>';
            $(this).parent().find('input[name=color]').val(color);
            $(this).parents().find('input[name=product_price]').val(price);
            $(this).parents().removeClass('error');
            $(this).parents().find('.message-error').html('');
            $('.has-price-range').html(html);
            $('.click-color').removeClass('active');
            $(this).addClass('active');
   })});
</script>
<script>
   $('.btn-detail').click(function(e){
      $('#specifications').attr("style", "display:block")
   });
</script>
<script>
   $('.close-specifications').click(function(e){
      $('#specifications').attr("style","display:none")
   })
</script>
<script>
   $('.specifications-overlay').click(function(e){
      $('#specifications').attr("style","display:none")
   })
</script>
<script>
   setTimeout(function(){
      var ch = $('.product_getcontent').height(),
         smore = $('.show-more');
      if(ch > 500) {
         $('#content').addClass('has-height');
         smore.removeClass('d-none');
      }
   },200);
   $('.btn--view-more').on('click', function(e){
      e.preventDefault();
      var $this = $(this);
      $this.parents('.tab-content').find('.product_getcontent').toggleClass('expanded');
      $('html, body').animate({ scrollTop: $('.product_getcontent').offset().top - 110 }, 'slow');
      $(this).toggleClass('active');
      return false;
   });
   
   var getLimit = 6;
   var alias = 'cu-sac-nhanh-aukey-pa-f1s-20w-usb-c-pd';
   
   function activeTab(obj){
      $('.product-tab ul li').removeClass('active');
      $(obj).addClass('active');
      var id = $(obj).attr('data-tab');
      $('.tab-content').removeClass('active');
      $(id).addClass('active');
   }
   
   
   $('.product-tab ul li').click(function(){
      activeTab(this);
      return false;
   });
   
   
   var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 5,
      slidesPerView: 10,
      lazy: false,
      hashNavigation: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      direction: 'vertical',
      loop: false, 
      loopAdditionalSlides: 0,
      breakpoints: {
         300: {
            slidesPerView: 4,
            spaceBetween: 10,
            direction: 'horizontal',
         },
         500: {
            slidesPerView: 4,
            spaceBetween: 10,
            direction: 'horizontal',
         },
         640: {
            slidesPerView: 5,
            spaceBetween: 10,
            direction: 'horizontal',
         },
         768: {
            slidesPerView: 5,
            spaceBetween: 10,
         },
         1024: {
            slidesPerView: 5,
            spaceBetween: 10,
         },
      },
      navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
      },
   });
   var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 0,
      lazy: true,
      hashNavigation: true,
      navigation: {
         nextEl: '.swiper-prenext .swiper-button-next',
         prevEl: '.swiper-prenext .swiper-button-prev',
      },
      thumbs: {
         swiper: galleryThumbs
      }
   });
   var swiper = new Swiper('.product-relate-swiper', {
      slidesPerView: 5,
      loop: false,
      grabCursor: true,
      spaceBetween: 30,
      roundLengths: true,
      slideToClickedSlide: false,
      navigation: {
         nextEl: '.product-relate-swiper .swiper-button-next',
         prevEl: '.product-relate-swiper .swiper-button-prev',
},
      autoplay: false,
      breakpoints: {
         300: {
            slidesPerView: 2,
            spaceBetween: 15
         },
         500: {
            slidesPerView: 2,
            spaceBetween: 15
         },
         640: {
            slidesPerView: 3,
            spaceBetween: 15
         },
         768: {
            slidesPerView: 3,
            spaceBetween: 20
         },
         991: {
            slidesPerView: 4,
            spaceBetween: 20
         },
         1200: {
            slidesPerView: 5,
            spaceBetween: 20
         }
      }
   });
   $(document).ready(function() {
      $("#lightgallery").lightGallery({
         thumbnail: false
      });
      $("#playvideo").lightGallery(); 
   });
   
   
   if ($(window).width() < 991) {
      var appendHtml = $('.append-product-tab-mobile').html();
      $('.product-tab-mobile').append(appendHtml);
      $('.append-product-tab-mobile').remove();
   
   }
</script>
<script>
(function($){"use strict";$.ajaxChimp={responses:{"We have sent you a confirmation email":0,"Please enter a valueggg":1,"An email address must contain a single @":2,"The domain portion of the email address is invalid (the portion after the @: )":3,"The username portion of the email address is invalid (the portion before the @: )":4,"This email address looks fake or invalid. Please enter a real email address":5},translations:{en:null},init:function(selector,options){$(selector).ajaxChimp(options)}};$.fn.ajaxChimp=function(options){$(this).each(function(i,elem){var form=$(elem);var email=form.find("input[type=email]");var label=form.find("label[for="+email.attr("id")+"]");var settings=$.extend({url:form.attr("action"),language:"en"},options);var url=settings.url.replace("/post?","/post-json?").concat("&c=?");form.attr("novalidate","true");email.attr("name","EMAIL");form.submit(function(){var msg;function successCallback(resp){if(resp.result==="success"){msg="We have sent you a confirmation email";label.removeClass("error").addClass("valid");email.removeClass("error").addClass("valid")}else{email.removeClass("valid").addClass("error");label.removeClass("valid").addClass("error");var index=-1;try{var parts=resp.msg.split(" - ",2);if(parts[1]===undefined){msg=resp.msg}else{var i=parseInt(parts[0],10);if(i.toString()===parts[0]){index=parts[0];msg=parts[1]}else{index=-1;msg=resp.msg}}}catch(e){index=-1;msg=resp.msg}}if(settings.language!=="en"&&$.ajaxChimp.responses[msg]!==undefined&&$.ajaxChimp.translations&&$.ajaxChimp.translations[settings.language]&&$.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]){msg=$.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]}label.html(msg);label.show(2e3);if(settings.callback){settings.callback(resp)}}var data={};var dataArray=form.serializeArray();$.each(dataArray,function(index,item){data[item.name]=item.value});$.ajax({url:url,data:data,success:successCallback,dataType:"jsonp",error:function(resp,text){console.log("mailchimp ajax submit error: "+text)}});var submitMsg="Submitting...";if(settings.language!=="en"&&$.ajaxChimp.translations&&$.ajaxChimp.translations[settings.language]&&$.ajaxChimp.translations[settings.language]["submit"]){submitMsg=$.ajaxChimp.translations[settings.language]["submit"]}label.html(submitMsg).show(2e3);return false})});return this}})(jQuery);
</script>
@endsection
@section('content')
<div class="bodywrap">
   <section class="bread-crumb">
      <div class="container">
         <ul class="breadcrumb" >
            <li class="home">
               <a  href="{{route('home')}}" ><span >Trang chủ</span></a>						
               <span class="mr_lr">&nbsp;/&nbsp;</span>
            </li>
            <li><strong><span>{{languageName($product->name)}}</span></strong>
            <li>
         </ul>
      </div>
   </section>
   <section class="product layout-product" itemscope itemtype="https://schema.org/Product">
      <div class="container">
         <div class="details-product">
            <div class="row margin-am-10">
               <div class="product-detail-left product-images col-12 col-md-12 col-lg-7 col-left">
                  <div class="product-image-block relative">
                     <div class="swiper-image">
                        <div class="swiper-container gallery-top">
                           <div class="swiper-wrapper" id="lightgallery">
                              @foreach ($imgs as $img)
                              <a class="swiper-slide" data-hash="0" href="#" title="Click để xem">
                              <img height="540" width="540" src="{{$img}}" alt="{{$product->name}}" data-image="{{$img}}" class="img-responsive mx-auto d-block swiper-lazy" />
                              </a>
                              @endforeach
                           </div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                           <div class="swiper-wrapper">
                              @foreach ($imgs as $img)
                                 <div class="swiper-slide" data-hash="0">
                                    <div class="p-100">
                                       <img height="80" width="80" src="{{$img}}" data-image="{{$img}}" class="swiper-lazy" />
                                    </div>
                                 </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <div class="btn-product d-flex align-items-center">
                        <div class="swiper-prenext space-x-2">
                           <div class="swiper-button-prev"></div>
                           <div class="swiper-button-next"></div>
                        </div>
                        <div class="btn-tag space-x-2">
                              <svg width="20" height="20" x="0" y="0" viewBox="0 0 459 459.648" style="enable-background:new 0 0 512 512">
                                 <path xmlns="http://www.w3.org/2000/svg" d="m416.324219 293.824219c0 26.507812-21.492188 48-48 48h-313.375l63.199219-63.199219-22.625-22.625-90.511719 90.511719c-6.246094 6.25-6.246094 16.375 0 22.625l90.511719 90.511719 22.625-22.625-63.199219-63.199219h313.375c44.160156-.054688 79.945312-35.839844 80-80v-64h-32zm0 0" fill="#ffffff" data-original="#000000" style=""></path>
                                 <path xmlns="http://www.w3.org/2000/svg" d="m32.324219 165.824219c0-26.511719 21.488281-48 48-48h313.375l-63.199219 63.199219 22.625 22.625 90.511719-90.511719c6.246093-6.25 6.246093-16.375 0-22.625l-90.511719-90.511719-22.625 22.625 63.199219 63.199219h-313.375c-44.160157.050781-79.949219 35.839843-80 80v64h32zm0 0" fill="#ffffff" data-original="#000000" style=""></path>
                              </svg>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="append-product-tab-mobile">
                     <div class="product-tab e-tabs not-dqtab">
                        <ul class="tabs tabs-title clearfix">
                           <li class="tab-link active" data-tab="#tab-1">
                              <h3>Đặc điểm nổi bật</h3>
                           </li>
                        </ul>
                        <div class="tab-float">
                           <div id="tab-1" class="tab-content active content_extab">
                              <div class="rte product_getcontent">
                                 <div id="content">
                                    {!!languageName($product->content)!!}
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-5 col-right">
                  <div class="product-sticky">
                     <div class="details-pro">
                        <h1 class="title-product">{{languageName($product->name)}}</h1>
                        <form id="add-to-cart-form" class="form-inline">
                           <div class="price-box clearfix">
                              @if ($product->price > 0 && $product->price_big > 0)
                                 <span class="special-price has-price-range">
                                    <span class="price product-price">{{number_format($product->price,0,'','.')}}₫ - {{number_format($product->price_big,0,'','.')}}₫
                                 </span>
                              @else
                                 @if ($product->discount  > 0 && $product->price > 0)
                                    <span class="special-price">
                                       <span class="price product-price">{{number_format($discountPrice,0,'','.')}}₫
                                    </span>
                                    <span class="old-price">
                                       <del class="price product-price-old">
                                          {{number_format($product->price,0,'','.')}}₫
                                       </del>
                                    </span>
                                 @elseif($product->discount == 0 && $product->price > 0)
                                    <span class="special-price">
                                       <span class="price product-price">{{number_format($product->price,0,'','.')}}₫
                                    </span>
                                 @elseif($product->discount >= 0 && $product->price==0)
                                    <span class="special-price">
                                       <a href="tel:{{$setting->phone1}}" style="color:orangered">
                                          <span class="price product-price" style="cursor: pointer">Liên Hệ</span>
                                       </a>
                                    </span>
                                 @endif
                              @endif
                           </div>
                           <div class="km-hot">
                              <div class="box-km">
                                 <h2 class="title_km">
                                    <span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                          <path d="M1.3125 11.026V19.3155C1.3125 20.0782 1.90181 20.6971 2.625 20.6971H9.1875V11.026H1.3125Z" fill="white"></path>
                                          <path d="M19.6875 5.49972H15.5348C15.8327 5.28557 16.0886 5.07281 16.2671 4.88215C17.3263 3.76169 17.3263 1.93801 16.2671 0.81755C15.2381 -0.273898 13.4453 -0.271134 12.4176 0.81755C11.8479 1.41854 10.3386 3.86531 10.5473 5.49972H10.4528C10.6601 3.86531 9.15075 1.41854 8.58244 0.81755C7.55344 -0.271134 5.76056 -0.271134 4.73287 0.81755C3.675 1.93801 3.675 3.76169 4.73156 4.88215C4.91138 5.07281 5.16731 5.28557 5.46525 5.49972H1.3125C0.589312 5.49972 0 6.12005 0 6.8813V8.95367C0 9.33498 0.294 9.64446 0.65625 9.64446H9.1875V6.8813H11.8125V9.64446H20.3438C20.706 9.64446 21 9.33498 21 8.95367V6.8813C21 6.12005 20.412 5.49972 19.6875 5.49972ZM9.11006 5.45413C9.11006 5.45413 9.05494 5.49972 8.86725 5.49972C7.96031 5.49972 6.22913 4.50775 5.66344 3.90814C5.1135 3.32511 5.1135 2.37459 5.66344 1.79156C5.92987 1.50972 6.28294 1.35498 6.65831 1.35498C7.03237 1.35498 7.38544 1.50972 7.65188 1.79156C8.5365 2.72827 9.41588 5.12117 9.11006 5.45413ZM12.1314 5.49972C11.9451 5.49972 11.8899 5.45551 11.8899 5.45413C11.5841 5.12117 12.4635 2.72827 13.3481 1.79156C13.8771 1.22926 14.8024 1.2265 15.3366 1.79156C15.8878 2.37459 15.8878 3.32511 15.3366 3.90814C14.7709 4.50775 13.0397 5.49972 12.1314 5.49972Z" fill="white"></path>
                                          <path d="M11.8125 11.026V20.6971H18.375C19.0995 20.6971 19.6875 20.0782 19.6875 19.3155V11.026H11.8125Z" fill="white"></path>
                                       </svg>
                                    Khuyến Mãi
                                    </span>
                                 </h2>
                                 <div class="box-promotion">
                                    <ul>
                                       @foreach ($promotion as $item)
                                          <li>
                                             <i class="bi bi-check-all check-custom"></i>&nbsp;&nbsp;{{$item->detail}}
                                          </li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="form-product">
                              <div class="select-swatch">
                                 <div id="variant-swatch-0" class="swatch clearfix">
                                    @if ($color[0]->title != '')
                                       <div class="header">Phân loại:</div>
                                       <div class="select-swap">
                                       <input class="variant-0" id="swatch-0-den" type="text" name="color" value="" class="hidden"/>
                                          @foreach ($color as $item)
                                          <div data-value="{{$item->title}}" data-price="{{$item->price}}" data-discount="{{$product->discount}}" class="swatch-element vang available click-color text-center">
                                             <span>{{$item->title}}</span><br/>
                                             @if ($product->discount > 0)
                                                @php
                                                   $priceDis = $item->price - ($item->price * ($product->discount / 100));
                                                @endphp
                                                <span style="color: #ff5c00">{{number_format($priceDis, 0,'', '.')}}₫</span>
                                             @else
                                                <span style="color: #ff5c00">{{number_format($item->price, 0,'', '.')}}₫</span>
                                             @endif
                                          </div>
                                          @endforeach                    
                                          <div class="message-error"></div>
                                       </div>
                                    @endif
                                 </div>
                                 <div class="clearfix form-group ">
                                    <div class="flex-quantity">
                                       @if($product->discount >= 0 && $product->price==0)
                                       @else
                                       <div class="custom custom-btn-number show">
                                          <label class="sl section">Số lượng:</label>
                                          <div class="input_number_product form-control">									
                                             <button class="btn_num num_1 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;" type="button">-</button>
                                             <input type="text" id="qtym" name="quantity" value="1" maxlength="3" class="form-control prd_quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                             <button class="btn_num num_2 button button_qty" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">+</button>
                                          </div>
                                       </div>
                                       <div class="btn-mua button_actions clearfix ">
                                          <input type="text" name="id" value="{{$product->id}}" hidden/>
                                          <input type="text" name="product_price" value="{{$product->price}}" hidden/>
                                          <button class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart" data-url="{{route('addToCart')}}">
                                          <span>Mua ngay</span>
                                          Giao hàng tận nơi hoặc nhận tại cửa hàng
                                          </button>
                                          <div class="group-button">
                                             <a href="tel:{{$setting->phone1}}">
                                             <span>Trả góp</span> Mua trả góp lãi suất thấp
                                             </a>
                                             <a href="tel:{{$setting->phone1}}">
                                             <span>Trả góp qua thẻ</span> Visa, Master, JCB 
                                             </a>
                                          </div>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="specifications ">
                     <h2 class="fs-dttop">Thông số kỹ thuật</h2>
                     <div class="fs-tsright">
                        {!!languageName($product->description)!!}
                     </div>
                     <button type="button" class="btn btn-primary btn-specifications btn-detail">
                     Xem cấu hình chi tiết
                     </button>
                     <div class="modal fade active" id="specifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                        <div class="specifications-overlay"></div>
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close close-specifications"  aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title" id="myModalLabel">Thông số kỹ thuật chi tiết</h4>
                              </div>
                              <div class="modal-body">
                                 {!!languageName($product->description)!!}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-tab-mobile"></div>
                  <div class="blog-bar pd-20">
                     <div class="title"><a href="tin-tuc" title="Tin nổi bật">Tin nổi bật</a></div>
                     <div class="clearfix"></div>
                     <div class="blog-bar-default">
                        @foreach ($news as $blog)
                           <div class="c-new">
                              <a href="{{route('detailBlog',['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}" class="c-new__img">
                                 <img src="{{$blog->image}}" alt="{{languageName($blog->title)}}" class="lazyload img-responsive mx-auto d-block loaded" data-was-processed="true">
                              </a>
                              <div class="c-new__info">
                                 <a href="{{route('detailBlog',['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a>
                              </div>
                           </div>  
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @if (count($productlq) > 1)
      <div class="productRelate">
         <div class="container">
            <div class="block-title">
               <h2>
                  <a href="#" title="Sản phẩm cùng loại">Sản phẩm cùng loại</a>
               </h2>
            </div>
            <div class="margin-am">
               <div class="product-relate-swiper swiper-container">
                  <div class="swiper-wrapper">
                     @foreach ($productlq as $pro)
                     @if ($pro->id != $product->id)
                        <div class="swiper-slide">
                           @include('layouts.product.item',['product'=>$pro])
                        </div>
                     @endif
                     @endforeach
                  </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
               </div>
            </div>
         </div>
      </div>
   @endif
</div>
@endsection








