@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">
@endsection
@section('js')
@endsection
@section('content')
<div id="primary" class="product-area">
   <div class="breadcrumb-nav">
      <div class="container-md clearfix">
         <nav class="woocommerce-breadcrumb"><a class="home" href="{{route('home')}}"><i class="home ti-home"></i>Trang chủ<i class="delimiter ti-angle-right"></i></a><span>{{$title}}</span></nav>
      </div>
      <!-- end breadcrumb product -->
   </div>
   <!-- Start bein wrapper -->
   <div class="product-block">
      <div class="gv_product_heading">
         <div class="arc-image">
            <img src="{{asset('frontend/images/nen.jpg')}}" class="desktop"/>
            <img src="{{asset('frontend/images/nen.jpg')}}" class="mobile"/>
         </div>
         <div class="arc-info">
            <div class="container-md">
               <div class="row">
                  <div class="left-box">
                     <div class="info-inner">
                     
                     </div>
                  </div>
                  <div class="right-box">
                     <div class="logo-brand">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="gv_product_desc">
         <div class="category-desc" style="display: none">
            <div class="container-md">
               <div class="row">
                  <div class="col-md-6 col-left">
                     <h2 class="heading-title-o">
                        {{$title}}												
                     </h2>
                     <div class="entry-content">
                        <p>Không quan trọng bạn thích dòng Scotch Whisky nào, quan trọng là tìm được chai yêu thích. Malt &amp; Co sẽ giúp bạn làm được điều đó.</p>
                     </div>
                  </div>
                  <div class="col-md-6 col-right">
                     <div class="entry-content">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="filter-block">
         <div class="box--filter">
            <div class="container-md">
               <div class="row">
                  <div class="col-md-4 filter-item">
                     <div class="inner chovao">
                        <label>Khoảng giá</label>
                        @if(isset($cate_id))
                        <input type="hidden" name="cate-id" value="{{$cate_id}}">
                        @endif
                        @if(isset($type_id))
                        <input type="hidden" name="type-id" value="{{$type_id}}">
                        @endif
                        <select id="filter-price" class="price prod_price" name="price-filer" data-url="{{route('filterProduct')}}" >
                           <option value="null">-- Tất cả --</option>
                           <option value="0-100">0 - 100.000</option>
                           <option value="100-200">100.000 - 200.000</option>
                           <option value="200-500">200.000 - 500.000</option>
                           <option value="500-1000">500.000 - 1.000.000</option>
                           <option value="1000-2000">1.000.000 - 2.000.000</option>
                           <option value=">2000">Trên 2.000.000</option>
                        </select>
                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="product-list">
         <div class="container-lg">
            <div class="row">
               <div class="trending-block clearfix col-md-9">
                  <div class="container-md">
                      <div class="clearfix">
                          <div class="head-block clearfix">
                              <h3 class="title-block"><span>{{$title}}</span></h3>
                          </div>
                      </div>
                      <div class="clearfix trend--grid form-filer">
                          <ul class="trend--prod">
                              @foreach ($list as $pro)
                                  @php
                                      $img = json_decode($pro->images);
                                      $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
                                  @endphp
                                  <li>
                                      <div class="inner " style="border-radius: 10px">
                                          @if ($pro->discount > 0)
                                              <div class="triangle-top-right"></div>
                                              <div class="nd-sale">- {{ $pro->discount }}%</div>
                                          @endif
                                          <div class="thumb">
                                              <a
                                                  href="{{ route('detailProduct', ['cate' => $pro->cate_slug, 'slug' => $pro->slug]) }}">
                                                  <img width="270" height="360" src="{{ $img[0] }}"
                                                      class="attachment-product-thumbnail size-product-thumbnail wp-post-image"
                                                      alt="Contramaestre 2L" loading="lazy"
                                                      srcset="{{ $img[0] }} 270w, {{ $img[0] }} 300w, {{ $img[0] }} 600w, {{ $img[0] }} 768w, {{ $img[0] }} 1152w, {{ $img[0] }} 1200w"
                                                      sizes="(max-width: 270px) 100vw, 270px" /></a>
                                          </div>
                                          <div class="info">
                                              <h3><a
                                                      href="{{ route('detailProduct', ['cate' => $pro->cate_slug, 'slug' => $pro->slug]) }}">{{ languageName($pro->name) }}</a>
                                              </h3>
                                              @if ($pro['price'] > 0 && $pro['discount'] > 0 && $pro['discount'] < 100)
                                                  <div class="price variant-mb">
                                                      <span class="reg">
                                                          {{ number_format($giagiam) }}đ
                                                      </span>
                                                      <br>
                                                      <span>
                                                          <del
                                                              style="color: rgba(65, 64, 64, 0.678)">{{ number_format($pro['price']) }}đ</del>
                                                      </span>
                                                      <br>
                                                      <button class="bt_add_cart " data-id="{{$pro['id']}}" data-url="{{route('addToCart')}}">
                                                          <i class="fa fa-shopping-basket"></i>
                                                      </button>
                                                  </div>
                                              @elseif($pro['price'] > 0 && $pro['discount'] == 0)
                                                  <div class="price variant-mb">
                                                      <span class="reg">
                                                          {{ number_format($pro['price']) }}đ
                                                      </span>
                                                      <br>
                                                      <button class="bt_add_cart " data-id="{{$pro['id']}}" data-url="{{route('addToCart')}}">
                                                          <i class="fa fa-shopping-basket"></i>
                                                      </button>
                                                  </div>
                                              @else
                                                  <div class="price variant-mb">
                                                      <span class="reg">
                                                          <a style="color:red" href="tel:+{{ $setting->phone1 }}">Liên
                                                              Hệ</a>
                                                      </span>
                                                  </div>
                                              @endif
                                          </div>
                                      </div>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                      <div class="clearfix text-center">
                        <div class="pagenav">
                           {{$list->links()}}
                           </div>
                           
                           <style>
                           .pagenav{
                              
                              width: 100% !important;
                              display: flex !important;
                              justify-content: center !important;
                              padding: 40px 0 !important;
                           }
                           .pagenav ul.pagination{
                              background-color: rgb(255 255 255) !important;
                              display: flex !important;
                              list-style: none !important;
                           }
                           .pagenav ul.pagination li span{
                           
                              height:41px !important;
                              width: 35px!important;
                              display: flex;
                              justify-content: center!important;
                              align-items: center!important;
                           }
                           .pagenav .pagination a{
                              height:41px!important;
                              width: 35px!important;
                              display: flex!important;
                              justify-content: center!important;
                              align-items: center!important;
                           }
                           .pagenav .pagination a:hover{
                              background-color: #847467!important;
                              color: antiquewhite!important;
                           }
                           .pagenav li.active{
                              background-color: #847467!important;
                              color: antiquewhite!important;
                           }
                           </style>
                      </div>
                  </div>
              </div>
               <div class="col-12 col-lg-3">
                  <div id="shopping_cart" class="sticky-widget widget_shopping_cart widget">
                     @include('cart.cart-right')
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection