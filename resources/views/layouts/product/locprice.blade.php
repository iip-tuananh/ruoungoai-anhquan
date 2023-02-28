<ul class="trend--prod">
    @foreach ($products as $pro)
        @php
            $img = json_decode($pro->images);
            $giagiam = $pro['price'] - ($pro['price'] * $pro['discount']) / 100;
        @endphp
        <li>
            <div class="inner ">
                @if ($pro->discount > 0)
                    <div class="triangle-top-right"></div>
                    <div class="nd-sale">- {{ $pro->discount }}%</div>
                @endif
                <div class="thumb">
                    <a
                        href="{{ route('detailProduct', ['cate' => $pro->cate_slug, 'slug' => $pro->slug]) }}">
                        <img width="270" height="360" src="{{ $img[0] }}"
                            class="attachment-product-thumbnail size-product-thumbnail wp-post-image"
                            alt="Contramaestre 2L" loading="lazy"
                            srcset="{{ $img[0] }} 270w, {{ $img[0] }} 300w, {{ $img[0] }} 600w, {{ $img[0] }} 768w, {{ $img[0] }} 1152w, {{ $img[0] }} 1200w"
                            sizes="(max-width: 270px) 100vw, 270px" /></a>
                </div>
                <div class="info">
                    <h3><a
                            href="{{ route('detailProduct', ['cate' => $pro->cate_slug, 'slug' => $pro->slug]) }}">{{ languageName($pro->name) }}</a>
                    </h3>
                    @if ($pro['price'] > 0 && $pro['discount'] > 0 && $pro['discount'] < 100)
                        <div class="price variant-mb">
                            <span class="reg">
                                {{ number_format($giagiam) }}đ
                            </span>
                            <br>
                            <span>
                                <del
                                    style="color: rgba(65, 64, 64, 0.678)">{{ number_format($pro['price']) }}đ</del>
                            </span>
                            <br>
                            <button class="bt_add_cart " data-id="{{$pro['id']}}" data-url="{{route('addToCart')}}">
                                <i class="fa fa-shopping-basket"></i>
                            </button>
                        </div>
                    @elseif($pro['price'] > 0 && $pro['discount'] == 0)
                        <div class="price variant-mb">
                            <span class="reg">
                                {{ number_format($pro['price']) }}đ
                            </span>
                            <br>
                            <button class="bt_add_cart " data-id="{{$pro['id']}}" data-url="{{route('addToCart')}}">
                                <i class="fa fa-shopping-basket"></i>
                            </button>
                        </div>
                    @else
                        <div class="price variant-mb">
                            <span class="reg">
                                <a style="color:red" href="tel:+{{ $setting->phone1 }}">Liên
                                    Hệ</a>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>