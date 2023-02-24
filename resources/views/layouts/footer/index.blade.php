<div class="footer-support">
    <div class="container-md">
        <div class="row">
            <div class="col-sm-6 col-callnow">
                <div class="inner">
                    <a href="tel: {{$setting->phone1}}" class="btn-callnow">
                    <span><i class="icon-call-3"></i>Call now {{$setting->phone1}}</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-fbchat">
                <div class="inner">
                    <a href="{{$setting->facebook}}" class="btn-message">
                    <span><i class="ri-comment-square"></i>Chat message</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="footer-block clearfix">
    <div class="container-md">
        <div class="row">
            <div class="col-md-4 col-sm-5 footer-layout-3">
                <div class="inner">
                    <h3 class="footer--title">Thông tin</h3>
                    <div class="footer-content desc">
                        <ul>
                            <li style="display: flex; justify-content:center">
                                <img src="{{$setting->logo}}" alt="" srcset="" style="width:150px" height="150px">
                            </li>
                            <br>
                            <li><i>{{$setting->webname}}</i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-7 footer-layout-3">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 left-col">
                        <div class="inner">
                            <h3 class="footer--title">Contact</h3>
                            <div class="footer-content desc">
                                <ul>
                                    @if($setting->phone1 != "")
                                    <li>
                                        <a href="tel:+{{$setting->phone1}}">{{$setting->phone1}}</a>
                                    </li>
                                    @endif
                                    @if($setting->phone2 != "")
                                    <li>
                                        <a href="tel:+{{$setting->phone2}}">{{$setting->phone2}}</a>
                                    </li>
                                    @endif
                                    @if($setting->address1 != "")
                                    <li>
                                        <a href="tel:+{{$setting->address1}}">{{$setting->address1}}</a>
                                    </li>
                                    @endif
                                  
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 left-col">
                        <div class="inner">
                            <h3 class="footer--title">Chính sách</h3>
                            <div class="footer-content desc">
                                <ul>
                                    @foreach ($servicehome as $item)
                                        <li><a href="{{route('serviceDetail',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                        </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 footer-layout-3">
                <div class="inner">
                    <h3 class="footer--title">MAP</h3>
                    <div class="footer-content desc">
              {!!$setting->iframe_map!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container-md">
        <div class="inner clearfix text-center">
            <div class="desc">
                <span style="color: #FFF;">THƯỞNG THỨC CÓ TRÁCH NGHIỆM</span><br>
                Các sản phẩm rượu không dành cho người dưới 18 tuổi và phụ nữ đang mang thai.<br>
                Bản quyền &COPY; 2023 <span style="color: #FFF">{{$setting->company }}</span>. Mang đến sự trải nghiệm nguyên bản.
            </div>
        </div>
    </div>
</div>