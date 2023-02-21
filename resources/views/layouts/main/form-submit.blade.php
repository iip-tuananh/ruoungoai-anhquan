<div class="title-popup"><span><i class="fa fa-headphones" aria-hidden="true"></i> Yêu cầu tư vấn</span></div>
<div class="content-popup">
    <form action="{{route('postcontact')}}" method="POST">
    @csrf
    <div class="form_tuvans">
        <div class="form_tuvan">
        <input type="text"  placeholder="Họ và tên *" name="name" id="contact_name">
        </div>
        <div class="form_tuvan">
        <input type="text"  placeholder="Số điện thoại *" name="phone" id="contact_tel">
        </div>
        <div class="form_tuvan">
        <input type="text"  placeholder="Email " name="email" id="contact_email">
        </div>
        <div class="form_tuvan">
        <textarea name="mess" cols="30" rows="2" placeholder="Nội dung yêu cầu tư vấn" id="contact_email"></textarea>
        </div>
        <div style="text-align: center;">
        <input type="submit" class="btn btn-yellows tracking-tuvan" value="Gửi liên hệ" style="cursor:pointer;">
        </div>
    </div>
    </form>
</div>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="@yield('title')" />
    <meta name="robots" content="noodp,index,follow" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('description')" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ url()->current() }}" />
    <meta property="og:updated_time" content="2021-08-28T22:06:30+07:00" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:secure_url" content="@yield('image')" />
    <meta property="og:image:width" content="598" />
    <meta property="og:image:height" content="333" />
    <meta property="og:image:alt" content="" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:image" content="@yield('image')" />
    <!-- Fav Icon -->
    <link rel="icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">