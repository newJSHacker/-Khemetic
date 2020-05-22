<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include('includes/inc_head')
<body  class="product-page">
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
    @include('includes/inc_header')
            <!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Order Now</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="index.php">Home</a>/</li>
                        <li><span>order now</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="col-12">
                        <div class="row justify-content-center">

                            <form class="main-form full"  role="form" method="POST" action="{{ route('order-now') }}" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg">
                                            <h2 class="heading">Order Now</h2>
                                        </div>
                                    </div>
                                    {{--<input type="hidden" id=""  name="role" value="User" required>--}}
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="f-name">Name</label>
                                            <input type="text" id="name" required placeholder=" Name" name="name" >
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="login-email">Email address</label>
                                            <input id="email" type="email" required placeholder="Email Address" name="email" >
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong  style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label for="login-pass">Mobile No.</label>
                                            <input id="login-pass" type="text" required placeholder="Enter your Mobile Number" name="mobile" >

                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="re-enter-pass">Address</label>
                                            <input id="password-confirm" type="text" required placeholder="Address" name="address" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <button name="create_account" type="submit" class="btn-color right-side">Submit</button>
                                        <br><br>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $cart_user = App\user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                                        ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                                        ->groupBy('img.item_code')
                                        ->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))
                                        ->get();
                                @endphp
                                @foreach($cart_user as $cart)
                                    <tr>
                                        <td>
                                            <a href="{!! route('product-details', $cart->item_code) !!}" target="_blank">
                                                <div class="product-image"><img alt="Honour" src="{{$cart->item_image}}"></div>
                                            </a>
                                        </td>
                                        <td> <div class="product-title"> {{$cart->item_name}}</div> </td>
                                        <td><div class="">{{$cart->item_qty}}</div></td>
                                        <td><div data-id="100" class="total-price price-box"> <span class="price">{!! getSymboleDevise() !!} {{$cart->new_price * $cart->item_qty}}</span> </div></td>


                                    </tr>
                                @endforeach()
                                {{--@php($total = 0)--}}
                                {{--@foreach($ct as $ct)--}}
                                    {{--@php($total += $ct->item_qty*$ct->item_current_selling_price)--}}
                                    {{--@php($total += $ct->item_qty*$ct->new_price)--}}
                                {{--@endforeach--}}

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CONTAINER END -->

    <!-- FOOTER START -->
     @include ("includes/inc_footer")
</div>
@include ("includes/inc_scripts")
</body>

</html>
