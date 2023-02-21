<div class="section_service">
    <div class="container">
    <div class="service-swiper swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="icon">
                <img class="lazyload" width="50" height="50" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="  
                    data-src="{{url('frontend/img/icon_service_1.png')}}" alt="Innovac">
                </div>
                <div class="info">
                <h3>
                    GIAO HÀNG TOÀN QUỐC
                </h3>
                <p>
                    Miễn phí ship HN, HCM
                </p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="icon">
                <img class="lazyload" width="50" height="50" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="  
                    data-src="{{url('frontend/img/icon_service_2.png')}}" alt="Innovac">
                </div>
                <div class="info">
                <h3>
                    HỖ TRỢ SHIPCOD
                </h3>
                <p>
                    Thanh toán khi nhận hàng
                </p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="icon">
                <img class="lazyload" width="50" height="50" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="  
                    data-src="{{url('frontend/img/icon_service_3.png')}}" alt="Innovac">
                </div>
                <div class="info">
                <h3>
                    HỖ TRỢ ĐỔI TRẢ
                </h3>
                <p>
                    Đổi/ trả hàng miễn phí
                </p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="icon">
                <img class="lazyload" width="50" height="50" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="  
                    data-src="{{url('frontend/img/icon_service_4.png')}}" alt="Innovac">
                </div>
                <div class="info">
                <h3>
                    CAM KẾT CHẤT LƯỢNG
                </h3>
                <p>
                    Hàng chính hãng 100%
                </p>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</div>
<script>
    var swiperwish = new Swiper('.service-swiper', {
    slidesPerView: 4,
    loop: false,
    grabCursor: true,
    spaceBetween: 20,
    roundLengths: true,
    slideToClickedSlide: false,
    navigation: {
        nextEl: '.service-swiper .swiper-button-next',
        prevEl: '.service-swiper .swiper-button-prev',
    },
    pagination: {
        el: '.service-swiper .swiper-pagination',
        clickable: true,
    },
    autoplay: 
    {
        delay: 2000,
    },
    breakpoints: {
        300: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        500: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        991: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 20
        }
    }
    });
</script>
<footer class="footer">
<div class="mid-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 col-left">
                <div class="logo-footer">
                    <a href="{{route('home')}}" class="logo" title="Logo">
                        <img class="lazyload" width="218" height="29"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                            data-src="{{$setting->logo}}"
                            alt="Innovac">
                    </a>
                </div>
                <div class="slogan-footer">
                    {{$setting->company}}
                </div>
                <div class="contact-footer">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="19"
                            viewBox="0 0 13 19" fill="none">
                            <path
                                d="M6.46434 0.686035C3.26667 0.686035 0.650391 3.30231 0.650391 6.49999C0.650391 8.08776 2.19903 10.9476 2.27538 11.0877C2.27783 11.0922 2.2796 11.0952 2.2822 11.0996L5.87202 17.1867C6.06249 17.5097 6.52751 17.5159 6.72649 17.198L10.4722 11.2154C10.4747 11.2113 10.4763 11.2088 10.4789 11.2049C10.561 11.0807 12.3364 8.37556 12.3364 6.55813C12.3364 3.30231 9.72016 0.686035 6.46434 0.686035ZM6.46434 9.69766C4.60388 9.69766 3.09225 8.18603 3.09225 6.32557C3.09225 4.4651 4.60388 2.95348 6.46434 2.95348C8.32481 2.95348 9.83644 4.4651 9.83644 6.32557C9.7783 8.24417 8.32481 9.69766 6.46434 9.69766Z"
                                stroke="white" stroke-width="1.25" stroke-miterlimit="10" />
                        </svg>
                            <b>Hà Nội:</b>
                                <ul>
                                        @if (isset($setting->address1))
                                            <li><a href="https://www.google.com/maps/place/Vinhome+Gardenia/@21.0367142,105.7602106,17z/data=!3m1!4b1!4m5!3m4!1s0x313455e2e14cbc67:0x8796754f084b19ad!8m2!3d21.0367283!4d105.762406?hl=vi" target="_blank" rel="noopener noreferrer">{{$setting->address1}}</a></li>
                                        @endif
                                        @if (isset($setting->address2) > 0)
                                            <li><a href="https://www.google.com/maps/place/55+Ng.+171+%C4%90.+Nguy%E1%BB%85n+Ng%E1%BB%8Dc+V%C5%A9,+Trung+Ho%C3%A0,+C%E1%BA%A7u+Gi%E1%BA%A5y,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0109578,105.8053384,18z/data=!3m1!4b1!4m5!3m4!1s0x3135ac9fe56fce0f:0x6366e8daedcef88!8m2!3d21.0109553!4d105.8064327?hl=vi" target="_blank" rel="noopener noreferrer">{{$setting->address2}}</a></li>
                                        @endif
                                </ul>
                                <b>Tp Hồ Chí Minh:</b>
                                <ul>
                                    <li><a href="https://www.google.com/maps/place/10%C2%B043'18.4%22N+106%C2%B039'42.3%22E/@10.721777,106.6595621,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xe5fad49a66ff560c!8m2!3d10.721777!4d106.6617508" target="_blank" rel="noopener noreferrer">Showroom 2 - 20 Đường số 1, KDC Phi Long, Bình Hưng, Bình Chánh</a></li>
                                </ul>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path
                                d="M8.99935 0.666504C4.40435 0.666504 0.666016 4.40484 0.666016 8.99984V12.4523C0.666016 13.3057 1.41352 13.9998 2.33268 13.9998H3.16602C3.38703 13.9998 3.59899 13.912 3.75527 13.7558C3.91155 13.5995 3.99935 13.3875 3.99935 13.1665V8.88067C3.99935 8.65966 3.91155 8.4477 3.75527 8.29141C3.59899 8.13513 3.38703 8.04734 3.16602 8.04734H2.40935C2.87268 4.82234 5.64768 2.33317 8.99935 2.33317C12.351 2.33317 15.126 4.82234 15.5894 8.04734H14.8327C14.6117 8.04734 14.3997 8.13513 14.2434 8.29141C14.0871 8.4477 13.9993 8.65966 13.9993 8.88067V13.9998C13.9993 14.919 13.2518 15.6665 12.3327 15.6665H10.666V14.8332H7.33268V17.3332H12.3327C14.171 17.3332 15.666 15.8382 15.666 13.9998C16.5852 13.9998 17.3327 13.3057 17.3327 12.4523V8.99984C17.3327 4.40484 13.5943 0.666504 8.99935 0.666504Z"
                                fill="white" />
                        </svg>
                        @if (isset($setting->email))
                            <li>
                                <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                            </li>
                        @endif
                        
                    </div>
                    {{-- <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20" fill="none">
                            <path
                                d="M15.4054 19.6889C15.2186 19.6884 15.0324 19.6679 14.8499 19.6278C11.3758 18.9092 8.17522 17.2242 5.61655 14.7667C3.11247 12.3039 1.37577 9.16817 0.616547 5.73895C0.527026 5.31156 0.548998 4.86833 0.68035 4.4519C0.811701 4.03547 1.04801 3.65984 1.36655 3.36117L3.58877 1.22228C3.70227 1.11494 3.83714 1.03274 3.98456 0.981049C4.13198 0.929356 4.28864 0.909331 4.44432 0.922281C4.60575 0.939122 4.76152 0.991122 4.9007 1.07462C5.03987 1.15813 5.15906 1.27111 5.24988 1.40561L8.02766 5.51117C8.13183 5.67047 8.18211 5.859 8.17111 6.04902C8.16011 6.23904 8.0884 6.42051 7.96655 6.56673L6.5721 8.23339C7.12746 9.46253 7.91396 10.5734 8.88877 11.5056C9.85727 12.4716 11.002 13.2429 12.261 13.7778L13.9888 12.4056C14.1339 12.2909 14.3105 12.2231 14.495 12.2112C14.6796 12.1993 14.8635 12.2439 15.0221 12.3389L19.2165 15.0501C19.3605 15.136 19.4831 15.2534 19.5752 15.3935C19.6674 15.5335 19.7266 15.6926 19.7485 15.8588C19.7704 16.025 19.7544 16.194 19.7018 16.3532C19.6491 16.5124 19.5611 16.6575 19.4443 16.7778L17.2777 18.9223C17.0315 19.1672 16.7394 19.361 16.4181 19.4926C16.0968 19.6242 15.7526 19.6909 15.4054 19.6889ZM4.35544 2.02228L2.13321 4.16117C1.95402 4.32814 1.82137 4.53888 1.74832 4.77266C1.67526 5.00644 1.66431 5.25521 1.71655 5.4945C2.4225 8.71236 4.04528 11.6569 6.38877 13.9723C8.79666 16.2843 11.8086 17.8692 15.0777 18.5445C15.3251 18.5962 15.5815 18.5858 15.8239 18.514C16.0663 18.4423 16.2871 18.3115 16.4665 18.1334L18.6332 15.9889L14.5832 13.3723L12.7277 14.8501C12.6566 14.9063 12.5729 14.9443 12.4838 14.9607C12.3947 14.9772 12.303 14.9716 12.2165 14.9445C10.6758 14.3768 9.27958 13.4757 8.12766 12.3056C6.93619 11.193 6.01134 9.82562 5.4221 8.30561C5.39717 8.21359 5.39635 8.11671 5.4197 8.02428C5.44305 7.93184 5.48979 7.84698 5.55544 7.77784L7.05544 5.98339L4.35544 2.02228Z"
                                fill="white" />
                        </svg>
                        @if (isset($setting->phone1))
                        <li>
                            <a class="fone" href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
                        </li>
                        @endif
                        @if (isset($setting->phone2))
                        <li>
                            <a class="fone" href="tel:{{$setting->phone2}}">{{$setting->phone2}}</a>
                        </li>
                        @endif
                        
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-8 col-12 col-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12 link_list col-footer">
                        <h4 class="title-menu">
                            HỖ TRỢ KHÁCH HÀNG
                            <span class="Collapsible__Plus"></span>
                        </h4>
                        <div class="list-menu hidden-mobile">
                    
                            @foreach ($helpCustomer as $help)
                            <a href="{{route('helpCus',['slug'=>$help->slug])}}" title="{{$help->title}}">{{$help->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 link_list col-footer">
                        <h4 class="title-menu">
                            CHÍNH SÁCH ĐỔI TRẢ
                            <span class="Collapsible__Plus"></span>
                        </h4>
                        <div class="list-menu hidden-mobile">
        
                            @foreach ($servicehome as $service)
                            <a href="{{route('serviceDetail',['slug'=>$service->slug])}}" title="{{$service->name}}">{{$service->name}}</a>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 col-footer ">
                        <div class="tuvan-khieunai">
                            <h4 class="title-menu">
                                TƯ VẤN & KHIẾU NẠI
                                <span class="Collapsible__Plus"></span>
                            </h4>
                            <div class="hidden-mobile">
                                <div class="item">Liên hệ hotline:</div>
                                @if ($setting->phone1)
                                    <div class="item">
                                        Hà Nội -
                                        <a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">
                                            {{$setting->phone1}}
                                        </a>
                                    </div>
                                @endif
                                @if ($setting->phone2)
                                    <div class="item">
                                        TP.HCM - 
                                        <a href="tel:{{$setting->phone2}}" title="{{$setting->phone2}}">
                                            {{$setting->phone2}}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="payment hidden-custome">
                            <h4 class="title-menu">
                                HÌNH THỨC THANH TOÁN
                                <span class="Collapsible__Plus"></span>
                            </h4>
                            <div class="hidden-mobile">
                                <div class="item">
                                    <img class="lazyload" width="67" height="34"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        data-src="{{url('frontend/img/icon_payment_1.png')}}"
                                        alt="Innovac">
                                </div>
                                <div class="item">
                                    <img class="lazyload" width="67" height="34"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        data-src="{{url('frontend/img/icon_payment_2.png')}}"
                                        alt="Innovac">
                                </div>
                                <div class="item">
                                    <img class="lazyload" width="67" height="34"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        data-src="{{url('frontend/img/icon_payment_3.png')}}"
                                        alt="Innovac">
                                </div>
                                <div class="item">
                                    <img class="lazyload" width="67" height="34"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                        data-src="{{url('frontend/img/icon_payment_4.png')}}"
                                        alt="Innovac">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="mailchim">
                            <h4 class="title-menu " style="font-size: 12px">
                                Đăng ký để nhận tin tức khuyến mãi mới nhất
                            </h4>
                            <form id="mc-form" action="{{route('postcontact')}}" class="newsletter-form" data-toggle="validator" method="POST">
                            @csrf
                                <input aria-label="Địa chỉ Email" type="email" class="form-control"
                                    placeholder="Nhập địa chỉ email" name="email" required
                                    autocomplete="off" />
                                <button class="btn btn-default" type="submit" aria-label="Đăng ký nhận tin"
                                    name="subscribe">Gửi</button>
                            </form>
                            <div class="mailchimp-alerts ">
                                <div class="mailchimp-submitting"></div>
                                <!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div>
                                <!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div>
                                <!-- mailchimp-error end -->
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="copyright" class="copyright">
    <div class="container">
        <div class="wsp">
            @ Bản quyền thuộc về Innovac
            <span class="d-sm-inline-block d-none"> | </span>
            <span class="opacity1">
                Cung cấp bởi
                <a href="https://sbtsoftware.vn/"
                    rel="noopener" title="SBT" target="_blank">SBT</a>
            </span>
        </div>
    </div>
</div>
</footer>