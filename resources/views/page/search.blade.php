@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Kết quả tìm kiếm với từ khóa: {{$key}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Tìm kiếm</span>
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
                                <p class="pull-left">Tìm thấy {{count($search_products)}} Sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($search_products as $search_product)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if ($search_product->promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('san-pham',$search_product->id)}}"><img src="image/product/{{$search_product->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$search_product->name}}</p>
                                                <p class="single-item-price">
                                                    @if($search_product->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($search_product->unit_price)}} đồng</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($search_product->unit_price)}} đồng</span>
                                                        <span class="flash-sale">{{number_format($search_product->promotion_price)}} đồng</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <form action="{{route('dat-hang',$search_product->id )}}" method="post">
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
                                                </form><a class="beta-btn primary" href="{{route('san-pham',$search_product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="row">
                                {{$search_products->links()}}
                            </div>
                        </div> <!-- .beta-products-list -->

                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection