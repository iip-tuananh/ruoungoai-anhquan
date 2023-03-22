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
$seeding = json_decode($product->size);
$promotion =  json_decode($product->preserve);
@endphp
{{url(''.$imgs[0])}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('js')

@endsection
@section('content')
<div id="primary" class="product-area">
    <div class="breadcrumb-nav">
        <div class="container-md clearfix">
            <nav class="woocommerce-breadcrumb">
                <a class="home" href="{{route('home')}}"><i class="home ti-home"></i>Trang chủ<i class="delimiter ti-angle-right"></i></a>
                <a href="{{route('allListProCate',['cate'=>$product->cate_slug])}}">{{languageName($product->cate->name)}}<i class="delimiter ti-angle-right"></i></a>
                <span>{{languageName($product->name)}}</span>
            </nav>
        </div>
        <!-- end breadcrumb product -->
    </div>
    <!-- start single -->
    <div class="woocommerce-notices-wrapper"></div>
    <div class="single-block clearfix padding-bottom-40">
        <div class="container-xl">
            <div class="clearfix sumary--prod">
                <div class="left--side">
                    <div class="sumary--inner">
                        <div class="left--box"> 
                            <div class="left-inner">
                                <div class="title">
                                    <div class="in-title">
                                        <h1 class="product-single-o">{{languageName($product->name)}}</h1>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ul class="nav nav-tabs detail-tab" id="myTab" role="tablist">
                                        {{-- <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#detail-tab" role="tab" aria-controls="detail" aria-selected="true">Mô tả</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#facts-tab" role="tab" aria-controls="facts" aria-selected="false">Chi Tiết </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#danhgianew-tab" role="tab" aria-controls="danhgianew" aria-selected="false">Đánh giá</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        {{-- <div class="tab-pane fade show active" id="detail-tab" role="tabpanel" aria-labelledby="detail-tab">
                                            <div class="content-inner">
                                                {!!languageName($product->description)!!}
                                            </div>
                                            <div class="text-center clearfix">
                                                <span class="btb-plus" data-id="plus" style="display: none">
                                                Hiện <i class="ar ti-plus"></i>
                                                </span>
                                            </div>
                                        </div> --}}
                                        <div class="tab-pane fade active show" id="facts-tab" role="tabpanel" aria-labelledby="facts-tab">
                                            {!!languageName($product->content)!!}
                                        </div>
                                        <div class="tab-pane fade" id="danhgianew-tab" role="tabpanel" aria-labelledby="danhgianew-tab">
                                            <ul class="param">
                                                @if($seeding != '')
                                                @foreach ($seeding as $item)
                                                @if($item->title != null && $item->price != null && $item->name != null )
                                                    <li>
                                                    <span style="display: flex" style="padding-left: 2px"><img style="height: 70px;border-radius: 50%;width: 70px ;border: 1px solid #c9bfbf;"src="{{$item->price}}" alt="">&nbsp;<div style="padding: 8px; font-family: sans-serif;"><strong style="font-weight:700">{{$item->name}}</strong><br>{{$item->title}}</div></span>
                                                    </li>
                                                    @endif
                                                @endforeach
                                                @else
                                                Hiện tại chưa có đánh giá nào về sản phẩm này
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end detail -->
                            </div>
                        </div>
                        <!-- end left--box -->
                        <div class="right--box">
                            <div class="gallery">
                                <div class="thumbnail">
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2detail">
                                        <div class="swiper-wrapper">
                                            @foreach ($imgs as $item)
                                                <div class="swiper-slide">
                                                <img src="{{$item}}" />
                                                </div>
                                            @endforeach
                                   
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                      </div>
                                      <div thumbsSlider="" class="swiper mySwiperdetail">
                                        <div class="swiper-wrapper">
                                            @foreach ($imgs as $item)
                                                <div class="swiper-slide">
                                                <img src="{{$item}}" />
                                                </div>
                                            @endforeach
                                   
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right--side">
                    <div class="right-info">
                        <div class="group-info">
                            <div class="price">
                                <div class="price-content">
                                    <span class="price-web">Giá độc quyền trên web</span>
                                    <span class="price-number">
                                    <b class="reg">
                                    {{number_format($discountPrice)}}<u>đ</u>
                                    </b>
                                    </span>
                                    <span><del>{{number_format($product->price)}}đ</del></span>
                                    <span class="price-vat">Giá trên chưa bao gồm VAT</span>
                                </div>
                                <div class="book-buy variant">
                                    @if($product->price > 0 )
                                    <button class="bt_add_cart " data-id="{{$product['id']}}" data-url="{{route('addToCart')}}">
                                        <i class="fa fa-shopping-basket"></i>
                                    </button>
                                    @endif
                                </div>
                                <div class="notes">
                                </div>
                            </div>
                        </div>
                        <div id="shopping_cart" class="widget_shopping_cart">
                            @include('cart.cart-right')
                        </div>
                    </div>
                </div>
                <div class="detail--box hidden-md">
                    <div class="inner">
                        <ul class="nav nav-tabs detail-tab" id="myTab" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#ddetail-tab" role="tab" aria-controls="detail" aria-selected="true">Mô tả</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#dfacts-tab" role="tab" aria-controls="facts" aria-selected="false">Chi Tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#danhgia-tab" role="tab" aria-controls="danhgia" aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            {{-- <div class="tab-pane fade show active" id="ddetail-tab" role="tabpanel" aria-labelledby="detail-tab">
                                {!!languageName($product->description)!!}
                            </div> --}}
                            <div class="tab-pane fade show active" id="dfacts-tab" role="tabpanel" aria-labelledby="facts-tab">
                                <ul class="param">
                                    {!!languageName($product->content)!!}
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="danhgia-tab" role="tabpanel" aria-labelledby="danhgia-tab">
                                <ul class="param">
                                    @if(count($seeding)>0)
                                    @foreach ($seeding as $item)
                                    @if($item->title != null && $item->price != null && $item->name != null )
                                        <li>
                                        <span style="display: flex" style="padding-left: 2px"><img style="height: 70px;border-radius: 50%;width: 70px ;border: 1px solid #c9bfbf;"src="{{$item->price}}" alt="">&nbsp;<div style="padding: 8px; font-family: sans-serif;"><strong style="font-weight:700">{{$item->name}}</strong><br>{{$item->title}}</div></span>
                                        </li>
                                        @endif
                                    @endforeach
                                    @else
                                    Hiện tại chưa có đánh giá nào !
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- end product detail -->
    <div class="trending-block clearfix ">
        <div class="container-md">
            <div class="clearfix">
                <div class="head-block clearfix">
                    <h3 class="title-block"><span>Sản phẩm liên quan</span></h3>
                </div>
            </div>
            <div class="clearfix trend--grid">
                <ul class="trend--prod">
                    @foreach ($productlq as $pro)
                    @if($pro->id != $product->id)
                    @php
                    $img = json_decode($pro->images);
                    $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
                    @endphp
                    <li>
                        <div class="inner">
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
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="pagenav">
                {{$productlq->links()}}
            </div>
        </div>
        </
    </div>
</div>
<!-- end single -->

<!-- Subcribe -->
<style>
  .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2detail {
      height: 80%;
      width: 100%;
    }

    .mySwiperdetail {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiperdetail .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiperdetail .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiperdetail", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2detail", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
</script>
@endsection