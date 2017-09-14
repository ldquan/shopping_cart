@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$type->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($types as $t)
                            <li><a href="{{route('loai-san-pham',$t->id)}}">{{$t->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product_types)}} Sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product_types as $product_type)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if ($product_type->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('san-pham',$product_type->id)}}"><img src="image/product/{{$product_type->image}}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$product_type->name}}</p>
                                            <p class="single-item-price">
                                                @if($product_type->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($product_type->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($product_type->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($product_type->promotion_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <form action="{{route('dat-hang',$product_type->id )}}" method="post">
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
                                            </form><a class="beta-btn primary" href="{{route('san-pham',$product_type->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($other_products)}} Sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($other_products as $other_product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if ($product_type->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('san-pham',$other_product->id)}}"><img src="image/product/{{$other_product->image}}" height="250px" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$other_product->name}}</p>
                                            <p class="single-item-price">
                                                @if($other_product->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($other_product->unit_price)}} đồng</span>
                                                @else
                                                    <span class="flash-del">{{number_format($other_product->unit_price)}} đồng</span>
                                                    <span class="flash-sale">{{number_format($other_product->promotion_price)}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <form action="{{route('dat-hang',$other_product->id )}}" method="post">
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
                                            </form><a class="beta-btn primary" href="{{route('san-pham',$other_product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {{$other_products->links()}}
                            </div>
                            <div class="space40">&nbsp;</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection