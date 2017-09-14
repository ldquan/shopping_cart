<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 87A Đinh Tiên Hoàng, Phường 3, quận Bình Thạnh, TPHCM</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0122 871 3605</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="#"><i class="fa fa-user"></i>Chào bạn {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('dang-xuat')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('dang-ki')}}">Đăng kí</a></li>
                        <li><a href="{{route('dang-nhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="post" id="searchform" action="{{route('tim-kiem')}}">
                        {{csrf_field()}}
                        <input type="text" value="" name="key_word" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">

                        <div class="beta-select"><i class="fa fa-shopping-cart"></i>
                            Giỏ hàng (
                            @if(Session::has('cart'))
                            {{Session::get('cart')->totalQty}}
                            @else
                            Trống
                            @endif
                            )
                                <i class="fa fa-chevron-down"></i></div>
                        @if(Session::has('cart'))
                        <div class="beta-dropdown cart-body">
                            @foreach($cart_products as $cart_product)
                            <div class="cart-item">
                                <a href="{{route('xoa-gio-hang',$cart_product['item']['id'] )}}" class="cart-item-delete"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="{{route('san-pham', $cart_product['item']['id'])}}"><img src="image/product/{{$cart_product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$cart_product['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$cart_product['qty']}}*
                                            <span>
                                                @if($cart_product['item']['promotion_price'] != 0)
                                                    {{number_format($cart_product['item']['promotion_price'])}} đồng
                                                @else
                                                    {{number_format($cart_product['item']['unit_price'])}} đồng
                                                @endif
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format($totalPrice)}} đồng</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a href="index/#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($product_types as $product_type)
                            <li><a href="{{route('loai-san-pham',$product_type->id)}}">{{$product_type->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('thong-tin')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->