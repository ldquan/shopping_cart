<div id="footer" class="color-div">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <h4 class="widget-title">Sản phẩm</h4>
                    <div>
                        <ul>
                            @foreach($product_types as $product_type)
                            <li><a href="{{route('loai-san-pham', $product_type->id)}}"><i class="fa fa-chevron-right"></i> {{$product_type->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-10">
                    <div class="widget">
                        <h4 class="widget-title">Liên hệ với chúng tôi</h4>
                        <div>
                            <div class="contact-info">
                                <i class="fa fa-map-marker"></i>
                                <p>Quan Le</p>
                                <p>Address: Ho Chi Minh City</p>
                                <p>Phone: 0123456789</p>
                                <p>Email: Quanle@gmail.com</p>
                                <p>Skype: quanle</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget">
                    <h4 class="widget-title">Đăng kí</h4>
                    <p>Đăng kí ngay để nhận những thông tin ưu đãi mới nhất</p>
                    <br>
                    <form action="#" method="post">
                        <input type="email" name="your_email">
                        <button class="pull-right" type="submit">Đăng kí <i class="fa fa-chevron-right"></i></button>
                    </form>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- #footer -->
<div class="copyright">
    <div class="container">
        <p class="pull-left">Privacy policy. (&copy;) 2017. Design by Quan Le</p>
        <p class="pull-right pay-options">
            <a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
        </p>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .copyright -->