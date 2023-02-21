<header class="header">
<div class="topbar ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12 contact-header">
                <span class="time">
                    Giờ mở cửa: 08:30 - 21:30 các ngày trong tuần
                </span>
                <span class="hotline ">
                    Hotline Hà Nội :
                    @if (isset($setting->phone1))
                    <a class="fone" href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">
                        {{$setting->phone1}}
                    </a>
                    @endif
                    &nbsp; | &nbsp;
                    Hotline TP.HCM :
                    @if (isset($setting->phone2))
                    <a class="fone" href="tel:{{$setting->phone2}}" title="{{$setting->phone2}}">
                        {{$setting->phone2}}
                    @endif
                    </a>
                </span>
            </div>
            <div class="col-lg-3 d-lg-block d-none menu-top">
                @foreach ($headerTopAboutUs as $item)
                    <a href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="midder-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-12 block-logo">
                <a href="{{route('home')}}" class="logo" title="Logo">
                    <img width="217" height="28"
                        src="{{url($setting->logo)}}">
                </a>
            </div>
            <div class="col-lg-7 col-md-12 col-12  block-search">
                <div class="header_search">
                    <form class="input-group search-bar"  method="POST"  action="{{route('search_result')}}" data-url="{{route('search_ajax')}}">
                        @csrf
                        <div class="collection-selector">
                            <div class="search_text">Tất cả sản phẩm</div>
                            <div id="search_info" class="list_search" style="display: none;">
                                @foreach ($typeCate as $type)                         
                                <div class="search_item" data-coll-id="2952302" title="{{languageName($type->name)}}"><a href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}">{{languageName($type->name)}}</a></div>
                                @endforeach
                            </div>
                        </div>
                        <input type="search" id="keyword"  name="keyword" placeholder="Tìm kiếm..."
                            class="input-group-field st-default-search-input search-text" autocomplete="off"
                            required>
                        <span class="input-group-btn">
                            <button class="btn icon-fallback-text" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.66667 1.75C4.39898 1.75 1.75 4.39898 1.75 7.66667C1.75 10.9344 4.39898 13.5833 7.66667 13.5833C10.9344 13.5833 13.5833 10.9344 13.5833 7.66667C13.5833 4.39898 10.9344 1.75 7.66667 1.75ZM0.25 7.66667C0.25 3.57055 3.57055 0.25 7.66667 0.25C11.7628 0.25 15.0833 3.57055 15.0833 7.66667C15.0833 11.7628 11.7628 15.0833 7.66667 15.0833C3.57055 15.0833 0.25 11.7628 0.25 7.66667Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.0244 12.0252C12.3173 11.7323 12.7921 11.7323 13.085 12.0252L17.5295 16.4697C17.8224 16.7625 17.8224 17.2374 17.5295 17.5303C17.2366 17.8232 16.7617 17.8232 16.4688 17.5303L12.0244 13.0859C11.7315 12.793 11.7315 12.3181 12.0244 12.0252Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.4904 10.918C13.9039 10.9426 14.2191 11.2977 14.1945 11.7112C14.1549 12.3767 14.0217 13.0217 13.5448 13.4941C13.0819 13.9527 12.4326 14.1079 11.7576 14.1891C11.3463 14.2385 10.9729 13.9452 10.9234 13.534C10.874 13.1227 11.1672 12.7492 11.5785 12.6998C12.204 12.6246 12.4068 12.5101 12.4892 12.4285C12.5576 12.3607 12.663 12.195 12.6971 11.6221C12.7218 11.2086 13.0769 10.8934 13.4904 10.918Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </span>
                        <div id="search_ajax" class="hidden"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-12 col-cart-account-wish header-text">
                <div class="block-account menu-bar d-lg-none d-block">
                    <a href="javascript:;" title="Tài khoản của bạn" rel="nofollow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                            viewBox="0 0 20 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 1C0.958984 0.516751 1.35074 0.125 1.83398 0.125H12.334C12.8172 0.125 13.209 0.516751 13.209 1C13.209 1.48325 12.8172 1.875 12.334 1.875H1.83398C1.35074 1.875 0.958984 1.48325 0.958984 1Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 15C0.958984 14.5168 1.35074 14.125 1.83398 14.125H8.83399C9.31723 14.125 9.70899 14.5168 9.70899 15C9.70899 15.4832 9.31723 15.875 8.83399 15.875H1.83398C1.35074 15.875 0.958984 15.4832 0.958984 15Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 8C0.958984 7.51675 1.35074 7.125 1.83398 7.125H18.1673C18.6506 7.125 19.0423 7.51675 19.0423 8C19.0423 8.48325 18.6506 8.875 18.1673 8.875H1.83398C1.35074 8.875 0.958984 8.48325 0.958984 8Z"
                                fill="white"></path>
                        </svg>
                        <span class="info">
                            <span>Danh mục</span>
                            <span>Sản phẩm</span>
                        </span>
                    </a>
                </div>    
                <div class="block-cart">
                    <a href="{{route('listCart')}}" class="header-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="31"
                                viewBox="0 0 27 31" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.160015 15.2726C-0.823176 11.2022 2.8873 7.74798 6.82992 8.39249C11.4344 9.14521 15.4124 9.16777 20.1547 8.39867C24.0998 7.75886 27.8249 11.2168 26.84 15.2942L24.1192 26.5581C23.5249 29.0186 21.32 30.75 18.7879 30.75H8.21736C5.68523 30.75 3.48033 29.0186 2.886 26.5581L0.160015 15.2726ZM6.45665 10.6759C3.94943 10.266 1.86049 12.4585 2.40901 14.7293L5.13499 26.0148C5.47776 27.4339 6.7509 28.4363 8.21736 28.4363H18.7879C20.2543 28.4363 21.5275 27.4339 21.8702 26.0148L24.591 14.751C25.1402 12.4772 23.0414 10.2744 20.5251 10.6825C15.5333 11.4921 11.3042 11.4683 6.45665 10.6759Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.7078 2.98597C10.3651 2.98597 8.46603 4.88505 8.46603 7.22769L8.46601 13.9101C8.46601 14.549 7.94808 15.0669 7.30918 15.0669C6.67027 15.0669 6.15234 14.549 6.15234 13.91L6.15236 7.22769C6.15236 3.60725 9.08731 0.672302 12.7078 0.672302H14.2502C17.8706 0.672302 20.8056 3.60726 20.8056 7.2277V14.1687C20.8056 14.8076 20.2877 15.3255 19.6488 15.3255C19.0098 15.3255 18.4919 14.8076 18.4919 14.1687V7.2277C18.4919 4.88506 16.5928 2.98597 14.2502 2.98597H12.7078Z"
                                    fill="white" />
                            </svg>
                            @if (count($cartcontent) > 0)
                            <span class="count_item_pr">{{count($cartcontent)}}</span>
                            @else
                            <span class="count_item_pr">0</span>
                            @endif
                        </span>
                        <span class="info header-text">
                            <span>Giỏ hàng</span>
                            <span>Của bạn</span>
                        </span>
                    </a>
                    <div class="top-cart-content">
                            @if (count($cartcontent) > 0)
                                <div class="CartHeaderContainer data-update-cart" data-url="{{route('updateCart')}}">
                                    <form class="cart ajaxcart cartheader">
                                    <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                        <div class="ajaxcart__row">
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                                @foreach ($cartcontent as $item)
                                                @php
                                                    $discountPrice = $item['price'] - $item['price'] * ($item['discount'] / 100);
                                                    $totalPrice += $discountPrice * $item['quantity'];
                                                @endphp
                                                    <div class="ajaxcart__product cart_product">
                                                    <a href="" class="ajaxcart__product-image cart_image" title="{{languageName($item['name'])}}"><img width="80" height="80" src="{{$item['image']}}" alt="{{languageName($item['name'])}}"></a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="" class="ajaxcart__product-name h4" title="{{languageName($item['name'])}}">{{languageName($item['name'])}}</a>
                                                            <span class="ajaxcart__product-meta variant-title">{{$item['color']}}</span>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half cart_select cart_item_name">
                                                                <label class="cart_quantity">Số lượng</label>
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" aria-label="-" onclick="btnMinus({{$item['id']}})">
                                                                -
                                                                </button>
                                                                <input type="text" id="qty{{$item['id']}}" name="updates[]" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="{{$item['quantity']}}" min="0" data-id="" data-line="1" aria-label="quantity" pattern="[0-9]*">
                                                                <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" aria-label="+" onclick="btnPlus({{$item['id']}})">
                                                                +							
                                                                </button>
                                                                </div>
                                                            </div>
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">{{number_format($discountPrice, 0, '', '.')}}₫</span>
                                                                <a class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" onclick="removeItemCart({{$item['id']}})" data-url="{{route('removeCart')}}">Xóa</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                        <div class="ajaxcart__subtotal">
                                            <div class="cart__subtotal">
                                                <div class="cart__col-6">Tổng tiền:</div>
                                                <div class="text-right cart__totle"><span class="total-price">{{number_format($totalPrice, 0, '', '.')}}₫</span></div>
                                            </div>
                                        </div>
                                        <div class="cart__btn-proceed-checkout-dt">
                                            <button onclick="location.href='{{route('checkout')}}'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Thanh toán">Thanh toán</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            @else
                                <div class="CartHeaderContainer">
                                <div class="cart--empty-message">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 201.387 201.387" style="enable-background:new 0 0 201.387 201.387;" xml:space="preserve">
                                        <g>
                                        <g>
                                            <path d="M129.413,24.885C127.389,10.699,115.041,0,100.692,0C91.464,0,82.7,4.453,77.251,11.916    c-1.113,1.522-0.78,3.657,0.742,4.77c1.517,1.109,3.657,0.78,4.768-0.744c4.171-5.707,10.873-9.115,17.93-9.115    c10.974,0,20.415,8.178,21.963,19.021c0.244,1.703,1.705,2.932,3.376,2.932c0.159,0,0.323-0.012,0.486-0.034    C128.382,28.479,129.679,26.75,129.413,24.885z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M178.712,63.096l-10.24-17.067c-0.616-1.029-1.727-1.657-2.927-1.657h-9.813c-1.884,0-3.413,1.529-3.413,3.413    s1.529,3.413,3.413,3.413h7.881l6.144,10.24H31.626l6.144-10.24h3.615c1.884,0,3.413-1.529,3.413-3.413s-1.529-3.413-3.413-3.413    h-5.547c-1.2,0-2.311,0.628-2.927,1.657l-10.24,17.067c-0.633,1.056-0.648,2.369-0.043,3.439s1.739,1.732,2.97,1.732h150.187    c1.231,0,2.364-0.662,2.97-1.732S179.345,64.15,178.712,63.096z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M161.698,31.623c-0.478-0.771-1.241-1.318-2.123-1.524l-46.531-10.883c-0.881-0.207-1.809-0.053-2.579,0.423    c-0.768,0.478-1.316,1.241-1.522,2.123l-3.509,15c-0.43,1.835,0.71,3.671,2.546,4.099c1.835,0.43,3.673-0.71,4.101-2.546    l2.732-11.675l39.883,9.329l-6.267,26.795c-0.43,1.835,0.71,3.671,2.546,4.099c0.263,0.061,0.524,0.09,0.782,0.09    c1.55,0,2.953-1.062,3.318-2.635l7.045-30.118C162.328,33.319,162.176,32.391,161.698,31.623z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M102.497,39.692l-3.11-26.305c-0.106-0.899-0.565-1.72-1.277-2.28c-0.712-0.56-1.611-0.816-2.514-0.71l-57.09,6.748    c-1.871,0.222-3.209,1.918-2.988,3.791l5.185,43.873c0.206,1.737,1.679,3.014,3.386,3.014c0.133,0,0.27-0.009,0.406-0.024    c1.87-0.222,3.208-1.918,2.988-3.791l-4.785-40.486l50.311-5.946l2.708,22.915c0.222,1.872,1.91,3.202,3.791,2.99    C101.379,43.261,102.717,41.564,102.497,39.692z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M129.492,63.556l-6.775-28.174c-0.212-0.879-0.765-1.64-1.536-2.113c-0.771-0.469-1.696-0.616-2.581-0.406L63.613,46.087    c-1.833,0.44-2.961,2.284-2.521,4.117l3.386,14.082c0.44,1.835,2.284,2.964,4.116,2.521c1.833-0.44,2.961-2.284,2.521-4.117    l-2.589-10.764l48.35-11.626l5.977,24.854c0.375,1.565,1.775,2.615,3.316,2.615c0.265,0,0.533-0.031,0.802-0.096    C128.804,67.232,129.932,65.389,129.492,63.556z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M179.197,64.679c-0.094-1.814-1.592-3.238-3.41-3.238H25.6c-1.818,0-3.316,1.423-3.41,3.238l-6.827,133.12    c-0.048,0.934,0.29,1.848,0.934,2.526c0.645,0.677,1.539,1.062,2.475,1.062h163.84c0.935,0,1.83-0.384,2.478-1.062    c0.643-0.678,0.981-1.591,0.934-2.526L179.197,64.679z M22.364,194.56l6.477-126.293h143.701l6.477,126.293H22.364z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M126.292,75.093c-5.647,0-10.24,4.593-10.24,10.24c0,5.647,4.593,10.24,10.24,10.24c5.647,0,10.24-4.593,10.24-10.24    C136.532,79.686,131.939,75.093,126.292,75.093z M126.292,88.747c-1.883,0-3.413-1.531-3.413-3.413s1.531-3.413,3.413-3.413    c1.882,0,3.413,1.531,3.413,3.413S128.174,88.747,126.292,88.747z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M75.092,75.093c-5.647,0-10.24,4.593-10.24,10.24c0,5.647,4.593,10.24,10.24,10.24c5.647,0,10.24-4.593,10.24-10.24    C85.332,79.686,80.739,75.093,75.092,75.093z M75.092,88.747c-1.882,0-3.413-1.531-3.413-3.413s1.531-3.413,3.413-3.413    s3.413,1.531,3.413,3.413S76.974,88.747,75.092,88.747z"></path>
                                        </g>
                                        </g>
                                        <g>
                                        <g>
                                            <path d="M126.292,85.333h-0.263c-1.884,0-3.413,1.529-3.413,3.413c0,0.466,0.092,0.911,0.263,1.316v17.457    c0,12.233-9.953,22.187-22.187,22.187s-22.187-9.953-22.187-22.187V88.747c0-1.884-1.529-3.413-3.413-3.413    s-3.413,1.529-3.413,3.413v18.773c0,15.998,13.015,29.013,29.013,29.013s29.013-13.015,29.013-29.013V88.747    C129.705,86.863,128.176,85.333,126.292,85.333z"></path>
                                        </g>
                                        </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                        <g> </g>
                                    </svg>
                                    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                                </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-cate d-lg-block d-none">
                <div class="block-cate">
                    <div class="block-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                            viewBox="0 0 20 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 1C0.958984 0.516751 1.35074 0.125 1.83398 0.125H12.334C12.8172 0.125 13.209 0.516751 13.209 1C13.209 1.48325 12.8172 1.875 12.334 1.875H1.83398C1.35074 1.875 0.958984 1.48325 0.958984 1Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 15C0.958984 14.5168 1.35074 14.125 1.83398 14.125H8.83399C9.31723 14.125 9.70899 14.5168 9.70899 15C9.70899 15.4832 9.31723 15.875 8.83399 15.875H1.83398C1.35074 15.875 0.958984 15.4832 0.958984 15Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.958984 8C0.958984 7.51675 1.35074 7.125 1.83398 7.125H18.1673C18.6506 7.125 19.0423 7.51675 19.0423 8C19.0423 8.48325 18.6506 8.875 18.1673 8.875H1.83398C1.35074 8.875 0.958984 8.48325 0.958984 8Z"
                                fill="white" />
                        </svg>
                        Danh mục sản phẩm
                    </div>
                    <ul class="block-nav">
                        @foreach ($categoryProduct as $cate)
                        <li class="nav-item ">
                            <a class="a-img caret-down" href="{{route('allListProCate',['cate'=>$cate->slug])}}" title=" {{languageName($cate->name)}}">
                                {{languageName($cate->name)}}
                            </a>
                            @if (count($cate->typeCate) > 0)
                                <i class="fa fa-caret-down"></i>
                                <ul class="item_small">
                                    @foreach ($cate->typeCate as $type)
                                    <li>
                                        <a class="" href="{{route('allListProType',['cate'=>$type->cate_slug,'type'=>$type->slug])}}" title="   {{languageName($type->name)}}">
                                            {{languageName($type->name)}}
                                        </a>
                                    </li>   
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-10 col-menu">
                <nav class="header-nav">
                    <ul class="item_big">
                        <li class="nav-item">
                            <a class="a-img" href="{{route('home')}}" title="Trang chủ">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="a-img" href="{{route('aboutUs')}}" title="Giới thiệu">
                                Giới thiệu
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="a-img caret-down" href="{{route('allProduct')}}" title="Sản phẩm">
                            Sản phẩm
                            </a>
                            <i class="fa fa-caret-down"></i>
                            <ul class="item_small">
                                @foreach ($categoryProduct as $cate)
                            <li>
                                <a class="a-img caret-down" href="{{route('allListProCate',['cate'=>$cate->slug])}}" title=" {{languageName($cate->name)}}">
                                    {{languageName($cate->name)}}
                                </a>
                                @if (count($cate->typeCate) > 0)
                                    <i class="fa fa-caret-down"></i>
                                    <ul>
                                        @foreach ($cate->typeCate as $type)
                                        <li>
                                            <a class="" href="{{route('allListProType',['cate'=>$type->cate_slug,'type'=>$type->slug])}}" title="   {{languageName($type->name)}}">
                                                {{languageName($type->name)}}
                                            </a>
                                        </li>   
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="a-img caret-down" href="#" title="Chính sách đổi trả">
                                Chính sách đổi trả
                            </a>
                            <i class="fa fa-caret-down"></i>
                            <ul class="item_small">
                                @foreach ($servicehome as $service)
                                <li>
                                    <a class="" href="{{route('serviceDetail',['slug'=>$service->slug])}}" title="{{$service->name}}">
                                        {{$service->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="a-img" href="{{route('allListBlog')}}" title="Tin tức">
                                Tin tức
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="a-img" href="{{route('lienHe')}}" title="Liên hệ">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</header>
<script>
    $('#keyword').keyup(function() {
        var keyword = $(this).val();
        console.log(keyword);
        var url = $(this).parent().data('url');
        if (keyword != '') {
            $('#search_ajax').removeClass('hidden');
            $.ajax({
                url: url,
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    keyword: keyword,
                },
                success: function(data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data.html);
                }
            });
        } else {
            $('#search_ajax').fadeOut();
            $('#search_ajax').addClass('hidden');
        }
    });
    $('#keyword').click(function() {
        $('#search_ajax').addClass('hidden');
    })
</script>