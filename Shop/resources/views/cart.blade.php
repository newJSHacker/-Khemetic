<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('includes/inc_heads')
<body>
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
@include ('includes/inc_header')
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Shopping Cart</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="index.php">Home</a>/</li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-item-table commun-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <!--<th>Measurements</th>-->
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (Auth::guard('user')->check())
                                    @foreach($cart as $cart)
                                        {{--<form method="post" action="{{route('cart',$cart->cid)}}">--}}

                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" value="{{$cart->cid}}" name="cid[]" id="cy">--}}
                                        {{--<input type="hidden" value="{{$cart->item_code}}" name="item_code[]" >--}}
                                        <tr>
                                            <td>
                                                <a href="{!! route('product-details', $cart->item_code) !!}">
                                                    <div class="product-image">
                                                        <img alt="Stylexpo" src="{{$cart->item_image}}">
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="product-title">
                                                    <a href="{!! route('product-details', $cart->item_code) !!}">{{$cart->item_name}}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <div class="base-price price-box">
                                                            {{--<span class="price">{{$cart->item_current_selling_price}}</span>--}}
                                                            <span class="price">{!! getSymboleDevise() !!} {{$cart->new_price}}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="input-box select-dropdown">
                                                    <fieldset>


                                                        <input type="hidden" class="cat_id" name="cid" id="cat_id"
                                                               value="{{$cart->cid}}"/>
                                                        {{--<input type="hidden" class="total" name="total" value="{{$cart->item_current_selling_price}}"/>--}}
                                                        <input type="text" class="quantity" value="{{$cart->item_qty}}"
                                                               data-id="{{ $cart->cid }}" name="item_qty"/>
                                                        {{--<input type="hidden" class="sp" id="sp" name="sp" value="{{$cart->item_current_selling_price}}"  />--}}
                                                        <input type="hidden" class="sp" id="sp" name="sp"
                                                               value="{{$cart->new_price}}"/>
                                                        </input>
                                                    </fieldset>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="total-price price-box">
                                                    {{--<span class="pp" >{{$cart->item_qty*$cart->item_current_selling_price}}</span>--}}
                                                    <span class="pp">
                            <!--{{$cart->item_qty*$cart->new_price}}-->
                            {{--@if($cart->user_measurment_id=='0')--}}
                                {!! getSymboleDevise() !!} {{ $cart->item_qty*$cart->new_price}}

                                {{--@else--}}
                                {{--{{$cart->item_qty*$cart->new_price+800*$cart->item_qty}}--}}
                                {{--@endif--}}

                        </span>

                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('your-shoping-cart.delete',$cart->cid) }}"><i
                                                        title="Remove Item From Cart" data-id="100"
                                                        class="fa fa-trash cart-remove-item"></i>
                                                </a></td>
                                        </tr>

                                    @endforeach
                                    @php($total = 0)
                                    @foreach($ct as $ct)
                                        {{--@php($total += $ct->item_qty*$ct->item_current_selling_price)--}}
                                        <?php
                                        //                    if($ct->user_measurment_id=='0'){
                                        $total += $ct->item_qty * $ct->new_price;
                                        //                    }
                                        //                    else{
                                        //                      $total += $ct->item_qty*$ct->new_price+800*$ct->item_qty;
                                        //                    }
                                        ?>
                                        {{--@php($total1 += $ct->item_qty*$ct->new_price+800*$ct->item_qty)--}}
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-30">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-30">
                            <a href="shop" class="btn btn-color">
                                <span><i class="fa fa-angle-left"></i></span>
                                Continue Shopping
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mt-30 right-side float-none-xs">
                            <!--<label>Stitching charges of every item is 800</label>-->
                            {{--<button class="btn btn-color right-side">Update Cart</button>--}}
                        </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="mtb-30">
                <div class="row">
                    <div class="col-md-6 mb-xs-40">
                        <div class="estimate">
                            <div class="heading-part mb-20">
                                {{--<h3 class="sub-heading">Estimate shipping and tax</h3>--}}
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-total-table commun-table">
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
                                            <div class="price-box">
                                                <span class="price">{!! getSymboleDevise() !!} {{ $total }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @php
                                            $shp = 0;
                                            $qty = DB::table('user_carts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->sum('item_qty');

                                            $shp += ($qty > 0) ? config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping')) : 0;

                                        @endphp
                                        <td>Shipping</td>
                                        <td>
                                            <div class="price-box">
                                                <span class="price">{!! getSymboleDevise() !!} {{$shp}}</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>Amount Payable</b></td>
                                        <td>

                                            <div class="price-box">
                                                {{--<span class="price"><b>{{ $cart->sum('total') }}</b></span>--}}
                                                <span class="price"><b>{!! getSymboleDevise() !!} {{ $total + $shp }}</b></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endif
                                    @if (!Auth::guard('user')->check())
                                        @foreach($cc as $cart)
                                            {{--<form method="post" action="{{route('cart',$cart->cid)}}">--}}

                                            {{--{{csrf_field()}}--}}
                                            {{--<input type="hidden" value="{{$cart->cid}}" name="cid[]" id="cy">--}}
                                            {{--<input type="hidden" value="{{$cart->item_code}}" name="item_code[]" >--}}
                                            <tr>
                                                <td>
                                                    <a href="{!! route('product-details', $cart->item_code) !!}">
                                                        <div class="product-image">
                                                            <img alt="Stylexpo" src="{{$cart->item_image}}">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="product-title">
                                                        <a href="{!! route('product-details', $cart->item_code) !!}">{{$cart->item_name}}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <div class="base-price price-box">
                                                                {{--<span class="price">{{$cart->item_current_selling_price}}</span>--}}
                                                                <span class="price">{!! getSymboleDevise() !!} {{$cart->new_price}}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="input-box select-dropdown">
                                                        <fieldset>


                                                            <input type="hidden" class="cat_id" name="cid" id="cat_id"
                                                                   value="{{$cart->cid}}"/>
                                                            {{--<input type="hidden" class="total" name="total" value="{{$cart->item_current_selling_price}}"/>--}}
                                                            <input type="text" class="quantity"
                                                                   value="{{$cart->item_qty}}"
                                                                   data-id="{{ $cart->cid }}" name="item_qty"/>
                                                            {{--<input type="hidden" class="sp" id="sp" name="sp" value="{{$cart->item_current_selling_price}}"  />--}}
                                                            <input type="hidden" class="sp" id="sp" name="sp"
                                                                   value="{{$cart->new_price}}"/>
                                                            </input>
                                                        </fieldset>
                                                    </div>
                                                    <!--</td>-->
                                                    <!--<td>-->
                                                    <!--  <div class="input-box select-dropdown">-->
                                                    <!--    <fieldset>-->
                                                <!--      <div><a href="{{route('login-with-zarna') }}">login to add </div><div style="margin-top:12%"> measurements</a></div>-->

                                                    <!--    </fieldset>-->
                                                    <!--  </div>-->
                                                    <!--</td>-->
                                                <td>
                                                    <div class="total-price price-box">
                                                        {{--<span class="pp" >{{$cart->item_qty*$cart->item_current_selling_price}}</span>--}}
                                                        <span class="pp">
                            <!--{{$cart->item_qty*$cart->new_price}}-->
                              {{--@if($cart->user_measurment_id=='0')--}}
                                {!! getSymboleDevise() !!} {{ $cart->item_qty*$cart->new_price}}

                                {{--@else--}}
                                {{--{{$cart->item_qty*$cart->new_price+800*$cart->item_qty}}--}}
                                {{--@endif--}}

                        </span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('your-shoping-cart.delete',$cart->cid) }}"><i
                                                            title="Remove Item From Cart" data-id="100"
                                                            class="fa fa-trash cart-remove-item"></i>
                                                    </a></td>
                                            </tr>

                                            @endforeach
                                            @php($total = 0)
                                            @foreach($ct as $ct)
                                            {{--@php($total += $ct->item_qty*$ct->item_current_selling_price)--}}
                                            <?php
                                            //                      if($ct->user_measurment_id=='0'){
                                            $total += $ct->item_qty * $ct->new_price;
                                            //                      }
                                            //                      else{
                                            //                        $total += $ct->item_qty*$ct->new_price+800*$ct->item_qty;
                                            //                      }
                                            ?>
                                            {{--@php($total1 += $ct->item_qty*$ct->new_price+800*$ct->item_qty)--}}
                                            @endforeach


                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-30">
                                <a href="shop" class="btn btn-color">
                                    <span><i class="fa fa-angle-left"></i></span>
                                    Continue Shopping
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mt-30 right-side float-none-xs">
                                <!--<label>Stitching charges of every item is 800</label>-->
                                {{--<button class="btn btn-color right-side">Update Cart</button>--}}
                            </div>
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mtb-30">
                    <div class="row">
                        <div class="col-md-6 mb-xs-40">
                            <div class="estimate">
                                <div class="heading-part mb-20">
                                    {{--<h3 class="sub-heading">Estimate shipping and tax</h3>--}}
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-total-table commun-table">
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
                                                <div class="price-box">
                                                    <span class="price">{!! getSymboleDevise() !!} {{ $total }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $shp = 0;
                                                $qty = DB::table('user_carts')->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))->sum('item_qty');

                                                $shp += config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping'));

                                            //$shp += (200 + ($qty - 1) * 50);

                                            @endphp
                                            <td>Shipping</td>
                                            <td>
                                                <div class="price-box">
                                                    <span class="price">{!! getSymboleDevise() !!}  {{$shp}}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--<tr>-->

                                        <!--  <td>Stitching cost</td>-->
                                        <!--  <td>-->
                                        <!--    <div class="price-box">-->
                                        <!--      <span class="price">PKR 0</span>-->
                                        <!--    </div>-->
                                        <!--  </td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <td><b>Amount Payable</b></td>
                                            <td>

                                                <div class="price-box">
                                                    {{--<span class="price"><b>{{ $cart->sum('total') }}</b></span>--}}
                                                    <span class="price"><b>{!! getSymboleDevise() !!} {{ $total + $shp }}</b></span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="right-side float-none-xs">
                                @if (!Auth::guard('user')->check())
                                    <!--a href="order-now" class="btn btn-color">Order as Guest
                                        <span><i class="fa fa-angle-right"></i></span>
                                    </a-->
                                @endif
                                <a href="{!! route('shipment-details') !!}" class="btn btn-color">Proceed to checkout
                                    <span><i class="fa fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- CONTAINER END -->

    <!-- FOOTER START -->
@include ("includes/inc_footer")
<!-- FOOTER END -->
</div>
@include ("includes/inc_scripts")
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $(".quantity").on('change', function () {
            var qty = $(this).val();
            var sp = $('.sp').val();
            var cat_id = $(this).prev().val();
            console.log(sp);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: 'cart/update/' + cat_id + '/' + qty + '/' + sp,

                data: {
                    cid: cat_id,
                    qty: qty,
                    sp: sp,

                },
                success: function (data) {
                    //alert(response);
                    window.location.reload();
                    // $('.quantity').html(response);
                    //$('.pp').html(data);
                }
            });

        });
        $(".m").on('change', function () {
            var measu = $(this).val();
            var cat_id = $(this).prev().val();
            // console.log(sp);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: 'carts/updates/' + cat_id + '/' + measu
                ,

                data: {
                    cid: cat_id,
                    m: measu,
                },
                success: function (data) {
                    //alert(response);
                    window.location.reload();
                    // $('.quantity').html(response);
                    //$('.pp').html(data);
                }
            });

        });

    });

</script>

</body>

</html>
