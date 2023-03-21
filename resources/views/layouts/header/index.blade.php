<!-- menu mobile -->
<div class="header-mobile-nav">
    <div class="inner">
       <div class="menu-header">
          <button class="btn-close" type="button">
          <i class="fa-solid fa-rectangle-xmark"></i>
          </button>
       </div>
       <div class="menu-mobile">
          <ul class="nav-menu">
             @foreach ($categoryProduct as $cate)
             <li id="nav-menu-item-1395" class="mega-menu-item nav-item menu-item-depth-0 has-submenu menu-has-column-6">
                <a title="Whisky" href="{{route('allListProCate',['cate'=>$cate->slug])}}" class="menu-link main-menu-link">{{languageName($cate->name)}}</a>
                <div class="sub-nav">
                   <div class="container-md group-col-nav">
                      @foreach ($cate->typeCate as $type)
                      <ul class="menu-depth-1 sub-menu sub-nav-group sub-column-6">
                         <li id="nav-menu-item-1397" class="mega-menu-item sub-nav-item menu-item-depth-1 has-submenu menu-has-column-1">
                            <a href="{{route('allListProType',['cate'=>$cate->slug,'type'=>$type->slug])}}" class="menu-link sub-menu-link">{{languageName($type->name)}}</a>
                         </li>
                      </ul>
                      @endforeach
                   </div>
                </div>
             </li>
             @endforeach
             <li id="nav-menu-item-1488" class="mega-menu-item nav-item menu-item-depth-0"><a title="Tin tức" href="{{route('allListBlog')}}" class="menu-link main-menu-link">Blog<span class="item-title">Tin tức</span></a></li>
          </ul>
       </div>
    </div>
 </div>
 <div class="bg-web bdb">
     <div class="container">
      
        <div class="tuan-cuss">
            <div>
               <a href="{{route('home')}}"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Trang chủ</a>
            </div>
            <div>
               <a href="{{route('aboutUs')}}"><i class="fa-solid fa-user-tie"></i>&nbsp;&nbsp;Giới thiệu</a>
            </div>
            <div>
               <a href="{{route('lienHe')}}"><i class="fa-solid fa-phone-volume"></i>&nbsp;&nbsp;Liên Hệ</a>
            </div>
            <div>
               <a class="head_cart_box" href="{{route('checkout')}}"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Giỏ hàng
               </a>
            </div>
            </li>
            </ul>
         </div>
     </div>
 </div>
 <header class="clearfix header-block" id="header">
    <div class="container-gv">
  
       <div class="clearfix">
          <div class="header-inner posr">
             <div class="logo text-center">
                <a href="{{route('home')}}">
                <img src="{{$setting->logo}}"/>
                </a>
             </div>
             <div class="header-panel">
                <ul class="top-nav">
                   <li class="hidden-lg">
                      <a role="button" class="btn-toggle"><i class="fa-solid fa-bars"></i>Menu</a>
                   </li>
                   <li class="hidden-md hidden-xs">
                      <a role="button" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i>Search</a>
                   </li>
                   <li class="hidden-lg hidden-md">
                      <a href="{{route('home')}}"><i class="fa-solid fa-house"></i>Trang chủ</a>
                   </li>
                   <li class="hidden-lg hidden-md ">
                      <a href="{{route('aboutUs')}}"><i class="fa-solid fa-user-tie"></i>Giới thiệu</a>
                   </li>
                   {{-- <li class="hidden-lg hidden-md">
                      <a href="{{route('lienHe')}}"><i class="fa-solid fa-phone-volume"></i>Liên Hệ</a>
                   </li> --}}
                   <li class="hidden-lg hidden-md">
                      <a class="head_cart_box" href="{{route('checkout')}}"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng
                   
                      </a>
                   </li>
                </ul>
                <div class="header-search" style="display:block">
                   <form role="search" method="post" class="search-form" id="searchform" action="{{route('search_result')}}">
                      @csrf
                      <fieldset>
                         <input type="text" class="search-input" autocomplete="off" value="" name="keyword" id="s" placeholder="Tìm kiếm..."/>
                         <button type="submit"><i class="ri-search"></i></button>
                         <input type="hidden" name="post_type" value="product" />
                      </fieldset>
                      <div class="search_suggest">
                         <div class="suggest-box">
                            <span class="bss-close"><i class="fa fa-close"></i></span>
                            <ul class="list" id="suggest_search">
                            </ul>
                            <div class="show-more">
                            </div>
                            <div class="load_content" style="display:none;">
                               {{-- < <img src="//i0.wp.com/maltco.asia/wp-content/themes/gv-3409/images/waiting.gif">  --}}
                            </div>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- navigation -->
 <nav class="main-navi clearfix">
    <div class="container-md">
       <div class="clearfix">
          <ul class="primary-menu">
             @foreach ($categoryProduct as $cate)
             <li id="nav-menu-item-1395" class="mega-menu-item nav-item menu-item-depth-0 has-submenu menu-has-column-6">
                <a title="Whisky" href="{{route('allListProCate',['cate'=>$cate->slug])}}" class="menu-link main-menu-link">{{languageName($cate->name)}}</a>
                <div class="sub-nav">
                   <div class="container-md group-col-nav">
                      @foreach ($cate->typeCate as $type)
                      <ul class="menu-depth-1 sub-menu sub-nav-group sub-column-6">
                         <li id="nav-menu-item-1396" class="mega-menu-item sub-nav-item menu-item-depth-1 has-submenu menu-has-column-1">
                            <a href="{{route('allListProType',['cate'=>$cate->slug,'type'=>$type->slug])}}" class="menu-link sub-menu-link">{{languageName($type->name)}}</a>
                         </li>
                      </ul>
                      @endforeach
                   </div>
                </div>
             </li>
             @endforeach
             <li id="nav-menu-item-1488" class="mega-menu-item nav-item menu-item-depth-0"><a title="Tin tức" href="{{route('allListBlog')}}" class="menu-link main-menu-link">Blog<span class="item-title"></span></a></li>
          </ul>
       </div>
    </div>
 </nav>
 <div class="free-ship">
    <div class="container-md">
       <div class="inner">
          <img src="{{asset('frontend/images/trustbar--delivery.png')}}"/>
          <p><span>Miễn phí giao hàng trong nội thành Hà Nội</span>trong vòng 60 phút</p>
       </div>
    </div>
 </div>