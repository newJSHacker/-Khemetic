<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include("includes/inc_heads")
<body>
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
@include("includes/inc_header")
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Payment</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><a href="your-shoping-cart">Cart</a>/</li>
                        <li><span>Payment</span></li>
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
                                    <span>Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="complete-order">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">3</div>
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
                                    <h2 class="heading">Select a payment method</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <form method="post" action="{{route('proceed-payment')}}">
                                {{csrf_field()}}
                                @if(is_paypal_active())
                                <div class="payment-option-box mb-30">
                                    <div class="payment-option-box-inner gray-bg">
                                        <div class="payment-top-box">
                                            <div class="radio-box left-side">
                                                <span>
                                                    <input type="radio" checked id="paypal" value="paypal" name="payment_method">
                                                </span>
                                                <label for="paypal">PayPal</label>
                                            </div>
                                            <div class="paypal-box">
                                                <div class="paypal-top"><img src="images/paypal-img.png" alt="Stylexpo">
                                                </div>
                                                <div class="paypal-img"><img src="images/payment-method.png"
                                                                             alt="Stylexpo"></div>
                                            </div>
                                        </div>
                                        <p>If you Don't have CCAvenue Account, it doesn,t matter. You can also pay via
                                            CCAvenue with you credit card or bank debit card</p>
                                        <p>Payment can be submitted in any currency.</p>
                                    </div>
                                </div>
                                @endif

                                @if(is_cashpay_active())
                                <div class="payment-option-box mb-30">
                                    <div class="payment-option-box-inner gray-bg">
                                        <div class="payment-top-box">
                                            <div class="radio-box left-side">
                                                <span>
                                                    <input type="radio" id="cash" value="cash" name="payment_method">
                                                </span>
                                                <label for="cash">Would you like to pay by Cash on Delivery?</label>
                                            </div>
                                        </div>
                                        <p>Vestibulum semper accumsan nisi, at blandit tortor maxi'mus in phasellus
                                            malesuada sodales odio, at dapibus libero malesuada quis.</p>
                                    </div>
                                </div>
                                @endif

                                <div class="right-side float-none-xs">
                                    <button class="btn btn-color right-side">
                                        Place Order<i class="fa fa-angle-right"></i>
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                @include('paypal')
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
    <!-- FOOTER START -->
@include("includes/inc_footer")
<!-- FOOTER END -->
</div>
@include("includes/inc_scripts")
</body>

</html>
