@extends('layouts.main.master')
@section('title')
    {{ $setting->company }}
@endsection
@section('description')
    {{ $setting->webname }}
@endsection
@section('image')
    {{-- {{ url('' . $banners[0]->image) }} --}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
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
        height: 100%;
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

    <div class="banner-home">
        <div class="banner-grid">
            <div class="container-md">
                {{-- <div class="grid--box">
                    <div class="col-item">
                        @foreach ($bannerPhu as $key => $item)
                            @if ($key < 2)
                                <div class="item-mansory">
                                    <div class="inner">
                                        <a href="{{ $item->link }}">
                                            <img src="{{ $item->image }}" />
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div> --}}
                    <div class="col-item special-col">
                        <div class="item-mansory">
                            <div class="inner">
                                <div class="swiper mySwiperbanner">
                                    <div class="swiper-wrapper">
                                        @foreach ($banners as $item)
                                            <div class="swiper-slide">
                                                <a href="{{$item->name}}">
                                                    <img src="{{ $item->image }}" alt="" srcset="">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-item">
                        @foreach ($bannerPhu as $key => $item)
                            @if ($key >= 2 && $key < 4)
                                <div class="item-mansory">
                                    <div class="inner">
                                        <a href="{{ $item->link }}">
                                            <img src="{{ $item->image }}" />
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Highlight -->
    <div class="highligh-block clearfix">
        <div class="container-md">
            <div class="clearfix">
                <div class="head-block clearfix">
                    <h3 class="title-block"><span>Sản phẩm bán chạy</span></h3>
                </div>
            </div>
            <div class="clearfix hgh--box">
                <div class="block-row block-row-two">
                    @foreach ($bannerAds_tren as $item)
                        <div class="item-hght">
                            <div class="inner">
                                <a href="{{ $item->name }}">
                                    <img src="{{ $item->image }}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="block-row block-row-four">
                    @foreach ($bannerAds_duoi as $item)
                        <div class="item-hght">
                            <div class="inner">
                                <a href="{{ $item->name}}">
                                    <img src="{{ $item->image }}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @foreach ($categoryProduct as $key => $cate)
        @if (count($cate->product) > 0)
            @if ($key % 2 != 0)
                <div class="trending-block clearfix ">
                    <div class="container-md">
                        <div class="clearfix">
                            <div class="head-block clearfix">
                                <h3 class="title-block"><span>{{ languageName($cate->name) }}</span></h3>
                            </div>
                        </div>
                        <div class="clearfix trend--grid">
                            <ul class="trend--prod">
                                @foreach ($cate->product as $pro)
                                    @php
                                        $img = json_decode($pro->images);
                                        $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
                                    @endphp
                                    <li>
                                        <div class="inner" style="border-radius:10px">
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
                    </div>
                </div>
            @else
                <div class="trending-block clearfix ">
                    <div class="container-md">
                        <div class="clearfix">
                            <div class="head-block clearfix">
                                <h3 class="title-block"><span>{{ languageName($cate->name) }}</span></h3>
                            </div>
                        </div>
                        <div class="clearfix trend--grid">
                            <ul class="trend--prod">
                                @foreach ($cate->product as $pro)
                                    @php
                                        $img = json_decode($pro->images);
                                        $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
                                    @endphp
                                    <li>
                                        <div class="inner" style="border-radius:10px">
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
                    </div>
                </div>
            @endif
        @endif
    @endforeach
    <div class="trending-block clearfix ">
        <div class="container-md">
            <div class="clearfix">
                <div class="head-block clearfix">
                    <h3 class="title-block"><span><a href="{{ route('allListBlog') }}" style="color: #d3a676"> Tin Tức
                                NỔI BẬT</a></span></h3>
                </div>
            </div>

            <div class="row swiper mySwiperblog">
                <div class="swiper-wrapper">
                    @foreach ($hotBlogs as $blog)
                        <div class="swiper-slide">
                       <a class="a-cus" href="{{route('detailBlog',['slug'=>$blog->slug])}}">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap">
                                    <div class="card-body 
                                    ">
                                        <p class="card-text">{{ languageName($blog->title) }}</p>
                                    </div>
                                </div>
                            </a>
                     
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    {{-- thương hiệu --}}
    <div class="trending-block clearfix ">
        <div class="container-md">
            <div class="clearfix">
                <div class="head-block clearfix">
                    <h3 class="title-block"><span><a href="{{ route('allListBlog') }}" style="color: #d3a676"> THƯƠNG HIỆU</a></span></h3>
                </div>
            </div>
            <div class="row swiper mySwiperthuonghieu">
                <div class="swiper-wrapper">
                    @foreach ($productBrands as $item)
                        <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
                                </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    </div>
@endsection
