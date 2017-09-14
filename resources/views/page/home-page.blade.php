@extends('master')
@section('content')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer" >
                    <div class="banner" >
                        <ul>
                            <!-- THE FIRST SLIDE -->
                            @foreach($slides as $slide)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{$slide->image}}" data-src="image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($new_products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($new_products as $new_product)
                                <div class="col-sm-6 col-md-3">
                                    <div class="single-item">
                                        @if ($new_product->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('san-pham',$new_product->id)}}"><img src="image/product/{{$new_product->image}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$new_product->name}}</p>
                                            <p class="single-item-price">
                                                @if($new_product->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($new_product->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($new_product->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($new_product->promotion_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <form action="{{route('dat-hang',$new_product->id )}}" method="post">
                                                {{csrf_field()}}
                                                <button class="add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                                <select class="wc-select" name="productQty">
                                                    <option>Số lượng</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                {{--<div class="clearfix"></div>--}}
                                            </form><a class="beta-btn primary" href="{{route('san-pham',$new_product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {{$new_products->links()}}
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Top Sản Phẩm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($top_products)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($top_products as $top_product)
                                <div class="col-sm-6 col-md-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

                                        <div class="single-item-header">
                                            <a href="{{route('san-pham',$top_product->id)}}"><img src="image/product/{{$top_product->image}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$top_product->name}}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{number_format($top_product->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($top_product->promotion_price)}} đồng</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <form action="{{route('dat-hang',$top_product->id )}}" method="post">
                                                {{csrf_field()}}
                                                <button class="add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i></button>
                                                <select class="wc-select" name="productQty">
                                                    <option>Số lượng</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                {{--<div class="clearfix"></div>--}}
                                            </form>
                                            <a class="beta-btn primary" href="{{route('san-pham',$top_product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {{$top_products->links()}}
                            </div>
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection