<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->


@include ("includes/inc_heads")
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
                <h1 class="banner-title">Confirm Order</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="{!! url('/') !!}">Home</a>/</li>
                        <li><a href="{!! url('/your-shoping-cart') !!}">Cart</a>/</li>
                        <li><span>Confirm Order</span></li>
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
                            <li><a href="shipment-details">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">1</div>
                                    </div>
                                    <span>Shipping</span> </a></li>

                            <li><a href="proceed-payment">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">2</div>
                                    </div>
                                    <span>Payment</span> </a></li>
                            <li class="active"><a href="complete-order">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">3</div>
                                    </div>
                                    <span>Order Complete</span> </a></li>
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
                                <div id="form-print" class="admission-form-wrapper">
                                    <div class="cart-item-table complete-order-table commun-table mb-30">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Product Detail</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cart as $cart)
                                                    <tr>
                                                        <td>
                                                            <a href="product-page.html">
                                                                <div class="product-image">
                                                                    <img alt="Stylexpo" src="{{$cart->item_image}}">
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">
                                                                {{$cart->item_name}}
                                                                <div class="product-info-stock-sku m-0">
                                                                    <div>
                                                                        <label>Price: </label>
                                                                        <div class="price-box">
                                                                            {{--<span class="info-deta price">{{$cart->item_current_selling_price}}</span>--}}
                                                                            <span
                                                                                class="info-deta price">{!! getSymboleDevise() !!} {{$cart->new_price}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-info-stock-sku m-0">
                                                                    <div>
                                                                        <label>Quantity: </label>
                                                                        <span
                                                                            class="info-deta">{{$cart->item_qty}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @php($total = 0)
                                                @foreach($ct as $c)
                                                    {{--@php($total += $ct->item_qty*$ct->item_current_selling_price)--}}
                                                    @php($total += $c->item_qty*$c->new_price)
                                                @endforeach
                                                <?php
                                                $date = new \DateTime();
                                                $date->modify('-5 minutes');
                                                $formatted_date = $date->format('Y-m-d H:i:s');
                                                $shp = 0;
                                                $qty = DB::table('ucarts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->where('ucarts.created_at', '>=', $formatted_date)->sum('item_qty');

                                                $shp += ($qty > 0) ? config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping')) : 0;
                                                //$shp += (200 + ($qty - 1) * 50);

                                                $method = DB::table('ucarts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->where('ucarts.created_at', '>=', $formatted_date)->limit(1)->get();


                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="complete-order-detail commun-table mb-30">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                @foreach($method as $m)

                                                <tr>
                                                    <td><b>Total :</b></td>
                                                    <td>
                                                        <div class="price-box"><span
                                                                class="price">{!! getSymboleDevise() !!}  {{$total+$shp}}</span></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><b>Order Places :</b></td>
                                                    <td>{{$m->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Payment :</b></td>
                                                    <td>{{$m->method}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Order No. :</b></td>
                                                    <td>#{{$m->order_no}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-30">
                                        <div class="heading-part">
                                            <h3 class="sub-heading">Order Confirmation</h3>
                                        </div>
                                        <hr>
                                        @foreach($land as $l)
                                            <p class="mt-20">{{$l->receiver_address}}.</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="print-btn">
                                            <button onclick="printDiv('form-print')" class="btn btn-color"
                                                    type="button"><a href="{{route('truncate')}}" style="color: white">
                                                    Print</a></button>
                                            <div class="right-side float-none-xs mt-sm-30">
                                                <a class="btn btn-black" href="shop">
                                                    <span><i class="fa fa-angle-left"></i></span>Continue Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
                            </div>
                        </div>
                    </div>
                </div>
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
