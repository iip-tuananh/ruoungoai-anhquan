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
<link href="{{asset('frontend/css/breadcrumb_style.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/sidebar_style.scss.css')}}" rel="stylesheet" type="text/css" />	
<link href="{{asset('frontend/css/collection_style.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
<div class="bodywrap">
   <div class="layout-collection">
      <section class="bread-crumb">
         <div class="container">
            <ul class="breadcrumb" >
               <li class="home">
                  <a  href="{{route('home')}}" ><span >Trang chủ</span></a>		
                  <span class="mr_lr">&nbsp;/&nbsp;</span>
               </li>
            <li><strong ><span>{{$title}}</span></strong></li>
            </ul>
         </div>
      </section>
      <div class="container">
         <div class="row margin-10-">
            <aside class="dqdt-sidebar sidebar col-lg-3 col-12 padding-10">
               <div class="aside-content aside-cate">
                  <div class="title-head">
                     Danh mục sản phẩm
                  </div>
                  <nav class="nav-category">
                     <ul class="nav navbar-pills">
                        @if (isset($cate_id))
                        <input type="text" name="cateno" data-id="{{$cate_id}}" class="cate-id" hidden>
                        @elseif(isset($type_id))
                        <input type="text" name="cateno" data-id="{{$type_id}}" class="type-id" hidden>
                        @endif
                        @foreach ($categoryProduct as $cate)
                           <li class="nav-item  relative">
                              
                              <a title="{{languageName($cate->name)}}" class="nav-link" href="{{route('allListProCate',['cate'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
                           </li>   
                        @endforeach
                     </ul>
                  </nav>
               </div>
               <script>
                  $(".open_mnu").click(function(){
                     $(this).toggleClass('cls_mn').next().slideToggle();
                  });
               </script>
               <div class="aside-filter clearfix">
                  <div class="aside-hidden-mobile">
                     <div class="filter-container fillter-url" data-url="{{route('filterProduct')}}">
                        <div class="clearfix"></div>
                        <aside class="aside-item filter-vendor">
                           <div class="aside-title">Thương hiệu 
                              <span class="nd-svg collapsible-plus">
                              </span>
                           </div>
                           <div class="aside-content filter-group">
                              <ul class="filter-vendor">
                                 @foreach ($brands as $key=>$brand)
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                       <label for="{{$key}}">
                                          <input type="radio" id="{{$key}}" name="brand" class="brand-check"  data-id="{{$brand->id}}"  value="{{$brand->name}}" />
                                          <i class="fa"></i>
                                          {{ $brand->name}}
                                       </label>
                                    </li>
                                 @endforeach
                              
                              </ul>
                              <script>
                                 $(".brand-check").click(function(){
                                    var brand = $(this).data('id');
                                    var cate = $('.cate-id').data('id');
                                    var type = $('.type-id').data('id');
                                    var url = $('.fillter-url').data('url');
                                    $.ajax({
                                       type: "POST",
                                       url: url,
                                       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                       data : {
                                          brand:brand,
                                          cate:cate,
                                          type:type
                                       },
                                       success: function(data){
                                          $('.products-view').html(data.html);
                                       },

                                    })
                                 });
                              </script>		
                           </div>
                        </aside>
                        
                        <aside class="aside-item filter-price">
                           <div class="aside-title">Chọn mức giá 
                              <span class="nd-svg collapsible-plus">
                              </span>
                           </div>
                           <div class="aside-content filter-group">
                              <ul>
                                 <li class="filter-item filter-item--check-box filter-item--green">
                                    <span>
                                    <label for="filter-duoi-2-000-000d">
                                    <input type="radio" id="filter-duoi-2-000-000d" name="price" value="<2000000">
                                    <i class="fa"></i>
                                    Giá dưới 2.000.000đ
                                    </label>
                                    </span>
                                 </li>
                                 <li class="filter-item filter-item--check-box filter-item--green">
                                    <span>
                                    <label for="filter-2-000-000d-4-000-000d">
                                    <input type="radio" id="filter-2-000-000d-4-000-000d" name="price" value=">2000000 AND <4000000">
                                    <i class="fa"></i>
                                    2.000.000đ - 4.000.000đ							
                                    </label>
                                    </span>
                                 </li>
                                 <li class="filter-item filter-item--check-box filter-item--green">
                                    <span>
                                    <label for="filter-4-000-000d-7-000-000d">
                                    <input type="radio" id="filter-4-000-000d-7-000-000d" name="price"  value=">4000000 AND <7000000">
                                    <i class="fa"></i>
                                    4.000.000đ - 7.000.000đ							
                                    </label>
                                    </span>
                                 </li>
                                 <li class="filter-item filter-item--check-box filter-item--green">
                                    <span>
                                    <label for="filter-7-000-000d-13-000-000d">
                                    <input type="radio" id="filter-7-000-000d-13-000-000d" name="price" value=">7000000 AND <13000000">
                                    <i class="fa"></i>
                                    7.000.000đ - 13.000.000đ							
                                    </label>
                                    </span>
                                 </li>
                                 <li class="filter-item filter-item--check-box filter-item--green">
                                    <span>
                                    <label for="filter-tren13-000-000d">
                                    <input type="radio" id="filter-tren13-000-000d" name="price" value=">13000000" >
                                    <i class="fa"></i>
                                    Giá trên 13.000.000đ
                                    </label>
                                    </span>
                                 </li>
                              </ul>
                              <script>
                                     $("input[name=price]").click(function(){
                                    var brand = $(this).data('id');
                                    var cate = $('.cate-id').data('id');
                                    var type = $('.type-id').data('id');
                                    var price = $(this).val();
                                    var url = $('.fillter-url').data('url');
                                    $.ajax({
                                       type: "POST",
                                       url: url,
                                       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                       data : {
                                          brand:brand,
                                          cate:cate,
                                          type:type,
                                          price:price
                                       },
                                       success: function(data){
                                          $('.products-view').html(data.html);
                                       },

                                    })
                                 });
                              </script>
                           </div>
                        </aside>
                     </div>
                  </div>
               </div>
            </aside>
            <div class="block-collection col-lg-9 col-12 padding-10">
               @if (isset($bannerCate))
               <div class="banner-collection">
                  <a class="image_hover" href="#" title="Banner collection">
                  <img class="lazyload" src="{{$bannerCate}}"  
                     alt="Banner collection"/>
                  </a>
               </div>    
               @endif
               <div class="category-products">
                  <div class="sortPagiBar clearfix">
                     <div class="sort-cate clearfix">
                        <div id="sort-by">
                           <label class="left">Sắp xếp theo</label>
                           <ul class="ul_col">
                              <li>
                               
                                <p class="test-aa">   Mặc định </p>
                              
                         
                                 <ul class="content_ul">
                                    <li><a href="javascript:;" onclick="sort('discount-asc')" >Phần trăm giảm dần</a></li>
                                    <li><a href="javascript:;" onclick="sort('discount-desc')" >Phần trăm tăng dần</a></li>
                                    <li><a href="javascript:;" onclick="sort('price-asc')" >Giá tăng dần</a></li>
                                    <li><a href="javascript:;" onclick="sort('price-desc')" >Giá giảm dần</a></li>
                                    <li><a href="javascript:;" onclick="sort('id-desc')" >Hàng mới nhất</a></li>
                                    <li><a href="javascript:;" onclick="sort('id-asc')" >Hàng cũ nhất</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <script>
                     function sort(e){
                        var sortby = e;
                        var brand = $(this).data('id');
                        var cate = $('.cate-id').data('id');
                        var type = $('.type-id').data('id');
                        var url = $('.fillter-url').data('url');
                        console.log(sortby);
                        $.ajax({
                           type: "POST",
                           url: url,
                           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                           data : {
                              brand:brand,
                              cate:cate,
                              type:type,
                              sortby:sortby,
                           },
                           success: function(data){
                              $('.products-view').html(data.html);
                           },

                        })
                     }
                  </script>
                  <div class="products-view products-view-grid list_hover_pro">
                     <div class="row margin">
                        @foreach ($list as $pro)
                        <div class="col-6 col-xl-3 col-lg-4 col-md-4 padding">
                           @include('layouts.product.item',['product'=>$pro])
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="pagenav">
                     {{ $list->links() }}
                  </div>
               </div>
            </div>
         </div>
         <div id="open-filters" class="open-filters d-lg-none d-xl-none">
            <i class="fa fa-filter"></i>
            <span>Lọc</span>
         </div>
      </div>
</div>
   <div class="opacity_sidebar"></div>
   <script>
      function selectFilterByCurrentQuery() {
         awe_lazyloadImage();
         var isFilter = false;
         var url = window.location.href;
         var queryString = decodeURI(window.location.search);
         var filters = queryString.match(/\(.*?\)/g);
         var page = 0;
         if(queryString) {
            isFilter = true;
            $.urlParam = function(name){
               var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
               return results[1] || 0;
            }
            page = $.urlParam('page');
         }
         if(filters && filters.length > 0) {
            filters.forEach(function(item) {
               item = item.replace(/\(\(/g, "(");
               var element = $(".aside-content input[value='" + item + "']");
               element.attr("checked", "checked");
               _toggleFilter(element);
            });
      
            isFilter = true;
         }
         var sortOrder = getParameter(url, "sortby");
         if(sortOrder) {
            _selectSortby(sortOrder);
         }
         if(isFilter) {
            doSearch(page);
            renderFilterdItems();
         }
      }
      function getParameter(url, name) {
         name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
         var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(url);
         return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
      }
      
      $(document).ready(function(){
         $(window).on('popstate', function(){
            location.reload(true);
         });
         selectFilterByCurrentQuery();
         $('.filter-container .aside-item').click( function(){
            if ($(this).hasClass('active')){
               $(this).removeClass('active');
            }else{
               $('.filter-container .aside-item.active').removeClass('active');
               $(this).addClass('active');    
            }
         });
      
         $('#show-admin-bar').click(function(e){
         $('.aside.aside-mini-products-list.filter').toggleClass('active');
         });
         $('.filter-container__selected-filter-header-title').click(function(e){
            $('.aside.aside-mini-products-list.filter').toggleClass('active');
         });
      
         $('.aside-filter .aside-hidden-mobile .aside-item .aside-title').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            $this.parents('.aside-filter .aside-hidden-mobile .aside-item').find('.aside-content').stop().slideToggle();
            $(this).toggleClass('active');
            return false;
         });
         $('.open-filters').click(function(e){
            e.stopPropagation();
            $(this).toggleClass('openf');
            $('.dqdt-sidebar').toggleClass('openf');
            $('.opacity_sidebar').toggleClass('openf');
         });
         $('.opacity_sidebar').click(function(e){
            $('.opacity_sidebar').removeClass('openf');
            $('.dqdt-sidebar, .open-filters').removeClass('openf')
         });
         
      
      });
   </script>
@endsection