<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->


@include ("includes/inc_head")
<body>
<!--<div class="se-pre-con"></div>-->
<div class="main">

    <!-- HEADER START -->
@include ("includes/inc_header")
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Order Overview</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><a href="{{route('your-shoping-cart')}}">Cart</a>/</li>
                        <li><a href="{{route('shipment-details')}}">Shipment</a>/</li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-step mb-40">
                        <ul>
                            <li>
                                <a href="shipment-details">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">1</div>
                                    </div>
                                    <span>Shipping</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0);">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">2</div>
                                    </div>
                                    <span>Order Overview</span>
                                </a>
                            </li>
                            <li>
                                <a href="proceed-payment">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">3</div>
                                    </div>
                                    <span>Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="complete-order">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">4</div>
                                    </div>
                                    <span>Order Complete</span>
                                </a>
                            </li>
                            <li>
                                <div class="step">
                                    <div class="line"></div>
                                </div>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <div class="checkout-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part align-center">
                                    <h2 class="heading">Order Overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-sm-30">
                                <div class="cart-item-table commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Product Detail</th>
                                                <th>Sub Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cart as $cart)
                                                <tr>
                                                    <td><a href="product-page.html">
                                                            <div class="product-image"><img alt="Honour"
                                                                                            src="{{$cart->item_image}}">
                                                            </div>
                                                        </a></td>
                                                    <td>
                                                        <div class="product-title"> {{$cart->item_name}}
                                                            <div class="product-info-stock-sku m-0">
                                                                <div>
                                                                    <label>Price: </label>
                                                                <!--<div class="price-box"> <span class="info-deta price">{{$cart->item_current_selling_price}}</span> </div>-->
                                                                    <div class="price-box"><span
                                                                            class="info-deta price">{{$cart->new_price}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-info-stock-sku m-0">
                                                                <div>
                                                                    <label>Quantity: </label>
                                                                    <span class="info-deta">{{$cart->item_qty}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <!--<td><div data-id="100" class="total-price price-box"> <span class="price">{{$cart->item_current_selling_price * $cart->item_qty}}</span> </div></td>-->
                                                    <td>
                                                        <div data-id="100" class="total-price price-box"><span
                                                                class="price">{{$cart->new_price * $cart->item_qty}}</span>
                                                        </div>
                                                    </td>
                                                    <td><a href="{{route('order-overview.delete',$cart->cid) }}"><i
                                                                class="fa fa-trash cart-remove-item" data-id="100"
                                                                title="Remove Item From Cart"></i></a></td>
                                                </tr>
                                            @endforeach()
                                            @php($total = 0)
                                            @foreach($ct as $ct)
                                                <!--@php($total += $ct->item_qty*$ct->item_current_selling_price)-->
                                                @php($total += $ct->item_qty*$ct->new_price)
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-total-table commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th colspan="2">Cart Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>Item(s) Subtotal</td>
                                                <td>
                                                    <div class="price-box"><span class="price">{{$total}}</span></div>
                                                </td>
                                            </tr>
                                            <?php $shp = 0;
                                            $qty = DB::table('user_carts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->sum('item_qty');

                                            $shp += (200 + ($qty - 1) * 50);

                                            ?>
                                            <tr>

                                                <td>Shipping</td>
                                                {{--@if($qty==1)--}}
                                                {{--<td><div class="price-box"> <span class="price">PKR 200</span> </div></td>--}}
                                                {{--@else--}}
                                                <td>
                                                    <div class="price-box"><span class="price">PKR {{$shp}}</span></div>
                                                </td>
                                                {{--@endif--}}

                                            </tr>


                                            <tr>
                                                <td><b>Amount Payable</b></td>
                                                <td>
                                                    <div class="price-box"><span
                                                            class="price"><b>{{$total+$shp}}</b></span></div>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="right-side float-none-xs"><a href="proceed-payment" class="btn btn-color">Next</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-total-table address-box commun-table mb-30">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Shipping Address</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        @foreach($address as $address)
                                                            <li class="inner-heading"><b>{{$address->receiver_name}}</b>
                                                            </li>
                                                            <li>
                                                                {{--<p>5-A kadStylexpoi aprtment,opp. vasan eye care,</p>--}}
                                                            </li>
                                                            <li>
                                                                <p>{{$address->receiver_address}}</p>
                                                            </li>
                                                            <li>
                                                                <p>{{$address->receiver_country}}</p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-total-table address-box commun-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Billing Address</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        @foreach($a as $a)
                                                            <li class="inner-heading"><b>{{$a->receiver_name}}</b></li>
                                                            <li>
                                                                {{--<p>5-A kadStylexpoi aprtment,opp. vasan eye care,</p>--}}
                                                            </li>
                                                            <li>
                                                                <p>{{$a->receiver_address}}</p>
                                                            </li>
                                                            <li>
                                                                <p>{{$a->receiver_country}}</p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->

    <!-- FOOTER START -->
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-xl-3 f-col">
                            <div class="footer-static-block"><span class="opener plus"></span>
                                <div class="f-logo">
                                    <a href="zarna" class="">
                                        <img src="images/footer-logo.png" alt="Stylexpo">
                                    </a>
                                </div>
                                <div class="footer-block-contant">
                                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live
                                        your life. Always remember in the jungle there’s a lot of they in.</p>
                                    <p>It’s on you how you want to live your life. Everyone has a choice.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 f-col">
                            <div class="footer-static-block"><span class="opener plus"></span>
                                <h3 class="title">Help <span></span></h3>
                                <ul class="footer-block-contant link">
                                    <li><a href="#">Gift Cards</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Free Shipping</a></li>
                                    <li><a href="#">Return & Exchange </a></li>
                                    <li><a href="#">International</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 f-col">
                            <div class="footer-static-block"><span class="opener plus"></span>
                                <h3 class="title">Guidance <span></span></h3>
                                <ul class="footer-block-contant link">
                                    <li><a href="#"> Delivery information</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                    <li><a href="#"> Terms & Conditions</a></li>
                                    <li><a href="#"> Contact</a></li>
                                    <li><a href="#"> Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 f-col">
                            <div class="footer-static-block"><span class="opener plus"></span>
                                <h3 class="title">address<span></span></h3>
                                <ul class="footer-block-contant address-footer">
                                    <li class="item"><i class="fa fa-map-marker"> </i>
                                        <p>150-A Appolo aprtment, opp. Hopewell Junction, <br>Allen st Road, new
                                            york-405001.</p>
                                    </li>
                                    <li class="item"><i class="fa fa-envelope"> </i>
                                        <p><a href="#">infoservices@stylexpo.com </a></p>
                                    </li>
                                    <li class="item"><i class="fa fa-phone"> </i>
                                        <p>(+91) 9834567890</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="footer-bottom ">
                    <div class="row mtb-30">
                        <div class="col-lg-6 ">
                            <div class="copy-right ">© 2018 All Rights Reserved. Design By <a href="#">Aaryaweb</a>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="footer_social pt-xs-15 center-sm">
                                <ul class="social-icon">
                                    <li>
                                        <div class="title">Follow us on :</div>
                                    </li>
                                    <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                                    <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                                    <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                                    <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                                    <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-center mtb-30 ">
                        <div class="col-12 ">
                            <div class="site-link">
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Customer </a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Policy </a></li>
                                    <li><a href="#">Accessibility</a></li>
                                    <li><a href="#">Directory </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row align-center">
                        <div class="col-12 ">
                            <div class="payment">
                                <ul class="payment_icon">
                                    <li class="visa"><a href="#"><img src="images/pay1.png" alt="Stylexpo"></a></li>
                                    <li class="discover"><a href="#"><img src="images/pay2.png" alt="Stylexpo"></a></li>
                                    <li class="paypal"><a href="#"><img src="images/pay3.png" alt="Stylexpo"></a></li>
                                    <li class="vindicia"><a href="#"><img src="images/pay4.png" alt="Stylexpo"></a></li>
                                    <li class="atos"><a href="#"><img src="images/pay5.png" alt="Stylexpo"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-top">
        <div class="scrollup"></div>
    </div>
    <!-- FOOTER END -->
</div>
<script src="js/jquery-1.12.3.min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.downCount.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/fotorama.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- Mirrored from aaryaweb.info/html/stylexpo/stx004/order-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Oct 2018 05:10:19 GMT -->
</html>
