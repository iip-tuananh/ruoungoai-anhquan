@extends('layouts.main.master')
@section('title')
Kết quả tìm kiếm
@endsection
@section('description')
Đã tìm thấy {{$countproduct}} kết quả phù hợp cho từ khóa "{{$keyword}}"
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/breadcrumb_style.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/sidebar_style.scss.css')}}" rel="stylesheet" type="text/css" />	
<link href="{{asset('frontend/css/collection_style.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
<div id="primary" class="product-area">
	<div class="breadcrumb-nav">
	   <div class="container-md clearfix">
		  <nav class="woocommerce-breadcrumb"><a class="home" href="{{route('home')}}"><i class="home ti-home"></i>Trang chủ<i class="delimiter ti-angle-right"></i></a><span>Kết quả tìm kiếm</span></nav>
	   </div>
	   <!-- end breadcrumb product -->
	</div>
	<!-- Start bein wrapper -->
	<div class="product-block">
	   <div class="gv_product_heading">
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
						Kết quả tìm kiếm											
					  </h2>
					  
				   </div>
				   <div class="col-md-6 col-right">
					  <div class="entry-content">
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
							   <h3 class="title-block"><span>Kết quả tìm kiếm</span></h3>
						   </div>
					   </div>
					   @if(count($resultPro)>0)
					   <div class="clearfix trend--grid">
						   <ul class="trend--prod">
							   @foreach ($resultPro as $pro)
								   @php
									   $img = json_decode($pro->images);
									   $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
								   @endphp
								   <li>
									   <div class="inner ">
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
					   @else
						không tìm thấy sản phẩm nào với từ khoá "{{$keyword}}"
					   @endif
					
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