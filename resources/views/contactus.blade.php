@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
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
			 <div class="breadcrumb-nav"><span><span><a href="{{route('home')}}">Trang chủ</a> <i class="ti-angle-right"></i> <span class="breadcrumb_last" aria-current="page">Liên Hệ</span></span></span></div>
		  </div>
	   </div>
	</div>
	<div class="blog-wrap">
	   <div class="container-md">
		  <div class="row">
			 <div class="col-md-9 col-xs-12">
				<div class="single-inner">
				   <h1 class="title-single-o">Liên hệ</h1>
				   <form action="{{route('postcontact')}}" method="post" class="lienhe-cus">
					@csrf
					   <input type="text" name="name" placeholder="Nhập tên của bạn" required>
					   <br>
					   <br>
					   <input type="text" name="email" placeholder="Nhập email của bạn" required>
					   <br>
					   <br>
					   <input type="number" name="phone" placeholder="Nhập số của bạn" required>
					   <br>
					   <br>
					   Nhập nội dung
					   <br>
					   <textarea name="mess" id="" cols="115" rows="10"></textarea>
					   <br>
					   <br>
					   <input type="submit" value="Gửi thông tin cần tư vấn">
					   <br><br>
					
				   </form>
				   </div>
				</div>
				<div class="col-md-3 col-xs-12">
					{!!$setting->iframe_map!!}
				</div>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
@endsection
