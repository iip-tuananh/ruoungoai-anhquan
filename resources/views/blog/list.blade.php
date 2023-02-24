@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
{{$title_page}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/blog.css')}}">
@endsection
@section('js')
@endsection
@section('content')
<div class="news-block clearfix">
   <div class="breadcrumb-block">
      <div class="container-md">
         <div class="inner">
            <div class="breadcrumb-nav"><span><span><a href="{{route('home')}}">Trang chủ</a> <i class="ti-angle-right"></i> <span class="breadcrumb_last" aria-current="page">Tin tức</span></span></span></div>
         </div>
      </div>
   </div>
   <div class="blog-wrap">
      <div class="container-md">
         <div class="row">
            <div class="col-md-9">
               <div class="blog-inner">
                  <h1 class="title-category-o">Tin tức</h1>
                  <div class="content-list">
                     @foreach ($blogs as $item)
                        <article>
                           <div class="item-content clearfix">
                              <div class="thumb">
                                 <a href="{{route('detailBlog',['slug'=>$item->slug])}}">
                                 <img width="280" height="280" src="{{$item->image}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Maker’s Edition" loading="lazy" srcset="{{$item->image}} 280w, {{$item->image}} 400w, {{$item->image}} 800w, {{$item->image}} 768w, {{$item->image}} 1536w, {{$item->image}} 300w, {{$item->image}} 600w, {{$item->image}} 100w, {{$item->image}} 2048w" sizes="(max-width: 280px) 100vw, 280px" />                                        </a>
                              </div>
                              <div class="desc">
                                 <h3><a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                                 <div class="meta">{{$item->created_at}}</div>
                                 <div class="limit-text-3">
                                    {{languageName($item->description)}}
                                 </div>
                                
                              </div>
                           </div>
                        </article>
                        <hr>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="col-md-3">
             @include('blog.menublog')
            </div>
         </div>
         <div class="clearfix pagination">
            <div class="pagenav">
               {{$blogs->links()}}
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
</div>
@endsection