@if (count($cartcontent) > 0)
<div class="shopping_box">
    <div class="phone">
        <i class="fa fa-phone"></i>
        <p>
           Đặt hàng qua điện thoại
           <span>
          {{$setting->phone1}}									</span>
        </p>
     </div>
     <div class="open">
        <i class="fa fa-clock-o"></i>
        <p>
           Mở cửa hôm nay
           <span>
           08:00 - 20:00
           </span>
        </p>
     </div>
   <div class="cart_box">
      <div class="head_cart">
         <span id="order-count" class="order_counts box-cart-image">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
               <g>
                  <g>
                     <path d="M447.988,139.696c-0.156-2.084-1.9-3.696-3.988-3.696h-72v-20C372,52.036,319.96,0,256,0S140,52.036,140,116v20H68
                        c-2.088,0-3.832,1.612-3.988,3.696l-28,368c-0.084,1.108,0.296,2.204,1.056,3.02C37.824,511.536,38.888,512,40,512h432
                        c1.112,0,2.176-0.464,2.932-1.28c0.756-0.816,1.14-1.912,1.056-3.02L447.988,139.696z M172,116c0-46.316,37.68-84,84-84
                        s84,37.684,84,84v20H172V116z M156,248c-22.06,0-40-17.944-40-40c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16
                        s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636C196,230.056,178.06,248,156,248z M356,248c-22.06,0-40-17.944-40-40
                        c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636
                        C396,230.056,378.06,248,356,248z"/>
                  </g>
               </g>
            </svg>
            <i class="ord">{{count($cartcontent)}}</i>
         </span>
      </div>
      <div class="order_box" id="box_order">
         <ul class="list_order">
            @php
            $tong = 0;
            @endphp
            @foreach ($cartcontent as $item)
            @php
            $giagiam = $item['price'] - $item['price']*$item['discount']/100;
            $tong += $item['quantity']*$giagiam;
            @endphp
            <li>
               <div class="info__item">
                  <h4>{{languageName($item['name'])}}</h4>
                  <div class="qty">{{$item['quantity']}} x {{number_format($giagiam)}}đ</div>
               </div>
               <div class="cont__item">
                  <span class="bt-cminus" data-url="{{route('updateCart')}}" data-id="{{$item['id']}}"><i class="ti-minus"></i></span>
                  <input type="hidden" name="quantity" value="{{$item['quantity']}}">
                  <span class="bt-cplus" data-url="{{route('updateCart')}}" data-id="{{$item['id']}}"><i class="ti-plus"></i></span>
                  <span class="bt-cremove" data-url="{{route('removeCart')}}" data-id="{{$item['id']}}"><i class="ti-close"></i></span>
               </div>
            </li>
            @endforeach
         </ul>
         <div class="cart__total">
            Tổng<span>{{number_format($tong)}}VNĐ</span>
         </div>
         <a href="{{route('checkout')}}" class="book">
         <i class="fa fa-check"></i> Đặt Ngay
         </a>
      </div>
   </div>
</div>
@else
<div class="shopping_box">
    <div class="phone">
        <i class="fa fa-phone"></i>
        <p>
           Đặt hàng qua điện thoại
           <span>
          {{$setting->phone1}}									</span>
        </p>
     </div>
     <div class="open">
        <i class="fa fa-clock-o"></i>
        <p>
           Mở cửa hôm nay
           <span>
           08:00 - 20:00
           </span>
        </p>
     </div>
<div class="cart_box">
    
   <div class="head_cart">
      <span id="order-count" class="order_counts box-cart-image">
         <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g>
               <g>
                  <path d="M447.988,139.696c-0.156-2.084-1.9-3.696-3.988-3.696h-72v-20C372,52.036,319.96,0,256,0S140,52.036,140,116v20H68
                     c-2.088,0-3.832,1.612-3.988,3.696l-28,368c-0.084,1.108,0.296,2.204,1.056,3.02C37.824,511.536,38.888,512,40,512h432
                     c1.112,0,2.176-0.464,2.932-1.28c0.756-0.816,1.14-1.912,1.056-3.02L447.988,139.696z M172,116c0-46.316,37.68-84,84-84
                     s84,37.684,84,84v20H172V116z M156,248c-22.06,0-40-17.944-40-40c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16
                     s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636C196,230.056,178.06,248,156,248z M356,248c-22.06,0-40-17.944-40-40
                     c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636
                     C396,230.056,378.06,248,356,248z"/>
               </g>
            </g>
         </svg>
         <i class="ord">{{count($cartcontent)}}</i>
      </span>
   </div>
   <div class="order_box" id="box_order">
      <ul class="list_order">
         <li>
            <div class="info__item">
               Hiện tại không có sản phẩm nào trong giỏ hàng
            </div>
      </ul>
   </div>
</div>
@endif