@extends('layouts.main.master')
@section('title')
Giới thiệu về {{$setting->company}}
@endsection
@section('description')
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
            <div class="breadcrumb-nav"><span><span><a href="{{route('home')}}">Trang chủ</a> <i class="ti-angle-right"></i> <span class="breadcrumb_last" aria-current="page">Giới thiệu</span></span></span></div>
         </div>
      </div>
   </div>
   <div class="blog-wrap">
      <div class="container-md">
         <div class="row">
            <div class="col-md-12">
               <div class="single-inner">
                  <h1 class="title-single-o">Giới thiệu</h1>
                  <div class="meta">{{$pageContent->created_at}}</div>
                  <div class="entry-content">
                     {!!$pageContent->content!!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection