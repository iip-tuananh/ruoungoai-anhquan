@extends('layouts.main.master')
@section('title')
{{($detail_service->name)}}
@endsection
@section('description')
{{($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
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
			 <div class="breadcrumb-nav"><span><span><a href="{{route('home')}}">Trang chủ</a> <i class="ti-angle-right"></i> <span class="breadcrumb_last" aria-current="page">{{($detail_service->name)}}</span></span></span></div>
		  </div>
	   </div>
	</div>
	<div class="blog-wrap">
	   <div class="container-md">
		  <div class="row">
			 <div class="col-md-9">
				<div class="single-inner">
				   <h1 class="title-single-o">{{($detail_service->name)}}</h1>
				   <div class="meta">{{ $detail_service->creadted_at}}</div>
				   <div class="entry-content">
					  {!!languageName($detail_service->content) !!}
				   </div>
				   <hr>
				</div>
			 </div>
			 <div class="col-md-3">
			   @include('blog.menublog')
			 </div>
		  </div>
	   </div>
	</div>
 </div>
@endsection