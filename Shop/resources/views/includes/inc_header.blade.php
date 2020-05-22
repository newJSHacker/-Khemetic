<?php
// $date = new \DateTime();
// $date->modify('-15 minutes');
// $formatted = $date->format('Y-m-d H:i:s');
// App\user_cart::where('updated_at', '<=', $formatted)->where('user_temp_order_id',NULL)->where('cookie',1)->delete();
?>
<header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="top-link top-link-left select-dropdown" style=" padding: 10px 0;">
                        <span style="color: #666666;"><a
                                href="{{route('event-management') }}">Event Management</a></span>&nbsp;&nbsp;
                        {{-- <span style="color: #666666;">Professional Photography</span> --}}
                        {{--<fieldset>--}}
                        {{--<select name="speed" class="countr option-drop">--}}
                        {{--<span selected="selected">English</span>--}}
                        {{--<option>Urdu</option>--}}
                        {{--<option>Arabic</option>--}}
                        {{--</select>--}}
                        {{--<select name="speed" class="currenc option-drop">--}}
                        {{--<option selected="selected">USD</option>--}}
                        {{--<option>{!! config('app.devise_symbole') !!}</option>--}}
                        {{--<option>SAR</option>--}}
                        {{--</select>--}}
                        {{--</fieldset>--}}
                    </div>
                </div>
                <div class="col-6">
                    <div class="top-right-link right-side">
                        <ul>
                            @if (!Auth::guard('user')->check())
                                <li class="login-icon content">
                                    <a class="content-link">
                                        <span class="content-icon"></span>
                                    </a>
                                    <a href="{{route('login-with-zarna') }}" title="Login">Login</a> or
                                    <a href="{{route('login-with-zarna') }}" title="Register">Register</a>
                                    <div class="content-dropdown">
                                        <ul>
                                            <li class="login-icon"><a href="{{route('login-with-zarna') }}"
                                                                      title="Login"><i class="fa fa-user"></i> Login</a>
                                            </li>
                                            <li class="register-icon"><a href="{{route('login-with-zarna') }}"
                                                                         title="Register"><i
                                                        class="fa fa-user-plus"></i> Register</a></li>

                                        </ul>
                                    </div>
                                </li>

                                {{--<li class="cart-icon">--}}
                                {{--<a href="#" title="cart"><span></span> Track your order</a>--}}
                                {{--</li>--}}
                            @else
                                <a href="{{ route('logoutt') }}" title="Logout"><i class="fa fa-sign-out"
                                                                                   style="font-size:20px ;margin-left:15px;"></i></a>
                            @endif
                            @if (Auth::guard('user')->check())
                                <a href="" title="Register" style="">{{Auth::guard('user')->user()->name}}</a>
                            @endif
                            <li class="track-icon">
                                <a href="#" title="Track your order"><span></span> Track your order</a>
                            </li>
                            <li class="gift-icon">
                                <a href="#" title="Payments"><span></span> Payments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-xl-3 col-md-3 col-xl-20per">
                    <div class="header-middle-left">
                        <div class="navbar-header float-none-sm">
                            <a class="navbar-brand page-scroll" href="{!! url('/') !!}">
                                <img alt="Logo" src="{!! asset('images/logo.png') !!}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-xl-60per">
                    <div class="header-right-part">
                        <div class="category-dropdown select-dropdown">
                            <fieldset>
                                <form method="post" action="{{route('searchResult')}}">
                                    {{csrf_field()}}
                                    <select id="search-category" class="option-drop" name="item_category">
                                        <option value="">All Categories</option>
                                        @foreach(App\item_categories::where('category_parent_category','!=', 0)->get() as $a)
                                            <option value="{{$a->category_name}}">■ {{$a->category_name}}</option>
                                        @endforeach
                                    </select>
                            </fieldset>

                        </div>
                        <div class="main-search">
                            <div class="header_search_toggle desktop-view">

                                <div class="search-box">
                                    <input class="input-text" type="text" name="item_name"
                                           placeholder="Search entire store here...">
                                    <button class="search-btn"></button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-3 col-xl-20per">
                    <div class="right-side float-left-xs header-right-link">
                        <ul>
                            @foreach (['success'] as $key)

                                @if(Session::has($key))
                                    <p style="" class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>


                                @else
                                    <li class="cart-icon">
                                        <a href="#"> <span></span>
                                            <div class="my-cart">2 items<br>$99.00</div>
                                        </a>


                                        <div class="cart-dropdown header-link-dropdown">
                                            <ul class="cart-list link-dropdown-list">
                                                @if (Auth::guard('user')->check())
                                                    {{--@foreach(App\user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                                                    {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $ct)--}}
                                                    @foreach(App\user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $ct)
                                                        <li><a class="close-cart"
                                                               href="{{route('your-shoping-cart.delete',$ct->cid) }}"
                                                               class="close-cart"><i class="fa fa-times-circle"></i></a>
                                                            <div class="media"><a class="pull-left"> <img alt="Stylexpo"
                                                                                                          src="../{{$ct->item_image}}"></a>
                                                                <div class="media-body"><span><a
                                                                            href="product-details">{{$ct->item_name}}</a></span>
                                                                <!--<p class="cart-price">{!! config('app.devise_symbole') !!} {{$ct->item_current_selling_price}}</p>-->
                                                                    <p class="cart-price">{!! config('app.devise_symbole') !!} {{$ct->new_price}}</p>
                                                                    <div class="product-qty">
                                                                        <label>Qty:</label>
                                                                        <div class="custom-qty">
                                                                            <input type="text" name="qty" maxlength="8"
                                                                                   value="{{$ct->item_qty}}" title="Qty"
                                                                                   class="input-text qty">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    @php($total = 0)
                                                    {{--@foreach(App\ user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                                                    {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $s)--}}
                                                    @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                                       ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $s)
                                                        {{--@php($total += $s->item_qty*$s->item_current_selling_price)--}}
                                                        @php($total += $s->item_qty*$s->new_price)
                                                    @endforeach

                                            </ul>
                                            <p class="cart-sub-totle"><span class="pull-left">Cart Subtotal</span> <span
                                                    class="pull-right"><strong
                                                        class="price-box">{!! config('app.devise_symbole') !!} {{$total}}</strong></span>
                                            </p>
                                            <div class="clearfix"></div>
                                            <div class="mt-20"><a href="{{route('your-shoping-cart')}}"
                                                                  class="btn-color btn">Cart</a> <a
                                                    href="shipment-details" class="btn-color btn right-side">Checkout</a>
                                            </div>
                                        </div>
                                    @else
                                        @foreach(App\user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))->get() as $ct)
                                            <li><a class="close-cart"
                                                   href="{{route('your-shoping-cart.delete',$ct->cid) }}"
                                                   class="close-cart"><i class="fa fa-times-circle"></i></a>
                                                <div class="media"><a class="pull-left"> <img alt="Stylexpo"
                                                                                              src="../{{$ct->item_image}}"></a>
                                                    <div class="media-body"><span><a
                                                                href="product-details">{{$ct->item_name}}</a></span>
                                                        {{--<p class="cart-price">{!! config('app.devise_symbole') !!} {{$ct->item_current_selling_price}}</p>--}}
                                                        <p class="cart-price">{!! config('app.devise_symbole') !!} {{$ct->new_price}}</p>
                                                        <div class="product-qty">
                                                            <label>Qty:</label>
                                                            <div class="custom-qty">
                                                                <input type="text" name="qty" maxlength="8"
                                                                       value="{{$ct->item_qty}}" title="Qty"
                                                                       class="input-text qty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        @php($total = 0)
                                        {{--@foreach(App\ user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                                        {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $s)--}}
                                        @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                           ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))->get() as $s)
                                            {{--@php($total += $s->item_qty*$s->item_current_selling_price)--}}
                                            @php($total += $s->item_qty*$s->new_price)
                                        @endforeach

                        </ul>
                        <p class="cart-sub-totle"><span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong
                                    class="price-box">{!! config('app.devise_symbole') !!} {{$total}}</strong></span>
                        </p>
                        <div class="clearfix"></div>
                        <div class="mt-20"><a href="your-shoping-cart" class="btn-color btn">Cart</a></div>
                    </div>
                    @endif
                    </li>
                    @endif
                    @endforeach
                    <li class="side-toggle">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                                type="button"><i class="fa fa-bars"></i></button>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row position-r">
                <div class="col-xl-2 col-lg-3 col-xl-20per position-initial">
                    <div class="sidebar-menu-dropdown home">
                        <a class="btn-sidebar-menu-dropdown"><span></span> Categories </a>
                        <div id="cat" class="cat-dropdown">
                            <div class="sidebar-contant">
                                <div id="menu" class="navbar-collapse collapse">
                                    <div class="top-right-link mobile right-side">
                                        <ul>

                                            <li class="login-icon content">
                                                <a class="content-link">
                                                    <span class="content-icon"></span>
                                                </a>
                                                <a href="{{route('login-with-zarna') }}" title="Login">Login</a> or
                                                <a href="{{route('login-with-zarna') }}" title="Register">Register</a>
                                                <div class="content-dropdown">
                                                    <ul>
                                                        <li class="login-icon"><a href="{{route('login-with-zarna') }}"
                                                                                  title="Login"><i
                                                                    class="fa fa-user"></i> Login</a></li>
                                                        <li class="register-icon"><a
                                                                href="{{route('login-with-zarna') }}"
                                                                title="Register"><i class="fa fa-user-plus"></i>
                                                                Register</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                            {{--<li class="track-icon">--}}
                                            {{--<a title="Track your order"><span></span> Track your order</a>--}}
                                            {{--</li>--}}
                                            <li class="gift-icon">
                                                <a href="#" title="Payment"

                                                ><span></span> Payment</a>
                                            </li>
                                        </ul>
                                    </div>

                                    {{--<div class="nav-item">--}}
                                    {{--<a class="nav-link" href="#">{{ Auth::user()->name }}</a>--}}
                                    {{--</div>--}}


                                    <ul class="nav navbar-nav ">
                                        {{--<li class="level sub-megamenu">--}}
                                        {{--<span class="opener plus"></span>--}}
                                        {{--<a href="shop" class="page-scroll"><i class="fa fa-female"></i>Fashion</a>--}}
                                        {{--<div class="megamenu mobile-sub-menu "  style="width:430px;">--}}
                                        {{--<div class="megamenu-inner-top">--}}
                                        {{--<ul class="sub-menu-level1">--}}
                                        {{--<li class="level2">--}}
                                        {{--<a href="shop"><span>Kids Fashion</span></a>--}}
                                        {{--<ul class="sub-menu-level2 ">--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Blazer & Coat</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Sport Shoes</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Trousers</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Purse</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Wallets</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Skirts</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Tops</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Sleepwear</a></li>--}}
                                        {{--<li class="level3"><a href="shop"><span>■</span>Jeans</a></li>--}}
                                        {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li  class="level2">--}}
                                        {{--<div class="sub-menu-slider d-none d-lg-block ">--}}
                                        {{--<div class="row">--}}
                                        {{--<div class="owl-carousel sub_menu_slider">--}}
                                        {{--<div class="product-item">--}}
                                        {{--<div class="product-image"> --}}
                                        {{--<a href="product-details"> --}}
                                        {{--<img src="images/2.jpg" alt="Stylexpo"> --}}
                                        {{--</a>--}}
                                        {{--<div class="product-detail-inner">--}}
                                        {{--<div class="detail-inner-left align-center">--}}
                                        {{--<ul>--}}
                                        {{--<li class="pro-cart-icon">--}}
                                        {{--<form>--}}
                                        {{--<button title="Add to Cart"><span></span></button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        {{--<!--<li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>-->--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item-details">--}}
                                        {{--<div class="product-item-name"> <a href="product-details">Defyant Reversible Dot Shorts</a> --}}
                                        {{--</div>--}}
                                        {{--<div class="price-box"> <span class="price">$80.00</span>  --}}
                                        {{--</div>--}}
                                        {{--<div class="rating-summary-block right-side">--}}
                                        {{--<div title="53%" class="rating-result"> <span style="width:53%"></span> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item">--}}
                                        {{--<div class="product-image"> --}}
                                        {{--<a href="product-details"> --}}
                                        {{--<img src="images/6.jpg" alt="Stylexpo"> --}}
                                        {{--</a>--}}
                                        {{--<div class="product-detail-inner">--}}
                                        {{--<div class="detail-inner-left align-center">--}}
                                        {{--<ul>--}}
                                        {{--<li class="pro-cart-icon">--}}
                                        {{--<form>--}}
                                        {{--<button title="Add to Cart"><span></span></button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        {{--<!--<li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>-->--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item-details">--}}
                                        {{--<div class="product-item-name"> <a href="product-details">Defyant Reversible Dot Shorts</a> </div>--}}
                                        {{--<div class="price-box"> <span class="price">$80.00</span>              --}}
                                        {{--</div>--}}
                                        {{--<div class="rating-summary-block right-side">--}}
                                        {{--<div title="53%" class="rating-result"> <span style="width:53%"></span> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item">--}}
                                        {{--<div class="product-image"> --}}
                                        {{--<a href="product-details"> --}}
                                        {{--<img src="images/8.jpg" alt="Stylexpo"> --}}
                                        {{--</a>--}}
                                        {{--<div class="product-detail-inner">--}}
                                        {{--<div class="detail-inner-left align-center">--}}
                                        {{--<ul>--}}
                                        {{--<li class="pro-cart-icon">--}}
                                        {{--<form>--}}
                                        {{--<button title="Add to Cart"><span></span></button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        {{--<!--<li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>-->--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item-details">--}}
                                        {{--<div class="product-item-name"> <a href="product-details">Defyant Reversible Dot Shorts</a> </div>--}}
                                        {{--<div class="price-box"> <span class="price">$80.00</span>  --}}
                                        {{--</div>--}}
                                        {{--<div class="rating-summary-block right-side">--}}
                                        {{--<div title="53%" class="rating-result"> <span style="width:53%"></span> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item">--}}
                                        {{--<div class="product-image"> --}}
                                        {{--<a href="product-details"> --}}
                                        {{--<img src="images/10.jpg" alt="Stylexpo"> --}}
                                        {{--</a>--}}
                                        {{--<div class="product-detail-inner">--}}
                                        {{--<div class="detail-inner-left align-center">--}}
                                        {{--<ul>--}}
                                        {{--<li class="pro-cart-icon">--}}
                                        {{--<form>--}}
                                        {{--<button title="Add to Cart"><span></span></button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        {{--<!--<li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>-->--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>                  --}}
                                        {{--</div>--}}
                                        {{--<div class="product-item-details">--}}
                                        {{--<div class="product-item-name"> <a href="product-details">Defyant Reversible Dot Shorts</a> </div>--}}
                                        {{--<div class="price-box"> <span class="price">$80.00</span> --}}
                                        {{--</div>--}}
                                        {{--<div class="rating-summary-block right-side">--}}
                                        {{--<div title="53%" class="rating-result"> <span style="width:53%"></span> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item">--}}
                                        {{--<div class="product-image"> --}}
                                        {{--<a href="product-details"> --}}
                                        {{--<img src="images/16.jpg" alt="Stylexpo"> --}}
                                        {{--</a>--}}
                                        {{--<div class="product-detail-inner">--}}
                                        {{--<div class="detail-inner-left align-center">--}}
                                        {{--<ul>--}}
                                        {{--<li class="pro-cart-icon">--}}
                                        {{--<form>--}}
                                        {{--<button title="Add to Cart"><span></span></button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        {{--<!--<li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                        {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>-->--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-item-details">--}}
                                        {{--<div class="product-item-name"> <a href="product-details">Defyant Reversible Dot Shorts</a> </div>--}}
                                        {{--<div class="price-box"> <span class="price">$80.00</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="rating-summary-block right-side">--}}
                                        {{--<div title="53%" class="rating-result"> <span style="width:53%"></span> </div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</li>--}}
                                        {{--@foreach($cat as $cat)--}}
                                        {{--<li class="level">--}}
                                        {{--<a href="{{route('shopp',$cat->category_name) }}" class="page-scroll">{{$cat->category_name}}</a>--}}

                                        {{--</li>--}}

                                        {{--@endforeach--}}
                                        @foreach(App\item_categories::with('childs')->where('category_parent_category', 0)->get() as $r)
                                            <li class="level sub-megamenu">
                                                <span class="opener plus"></span>
                                                <a href="#" class="page-scroll">{{$r->category_name}}</a>
                                                @if($r->childs->count()>0)
                                                    <div class="megamenu mobile-sub-menu" style="width:500px;">
                                                        <div class="megamenu-inner-top">
                                                            <ul class="sub-menu-level1">
                                                                <li class="level2">
                                                                    <ul class="sub-menu-level2">


                                                                        @foreach($r->childs as $submenu)
                                                                            <li class="level3"><a
                                                                                    href="{{route('shopp',$submenu->category_name) }}"><span>■</span>{{$submenu->category_name}}
                                                                                </a></li>

                                                                        @endforeach


                                                                    </ul>
                                                                </li>
                                                            </ul>
                                            @endif
                                        @endforeach

                                        <li class="level"><a href="{{route('shop')}}" class="page-scroll">More
                                                Categories</a></li>
                                    </ul>
                                    <div class="header-top mobile">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="top-link top-link-left select-dropdown ">
                                                        <fieldset>
                                                            <select name="speed" class="country option-drop">
                                                                <option selected="selected">English</option>
                                                                <option>Frence</option>
                                                                <option>German</option>
                                                            </select>
                                                            <select name="speed" class="currency option-drop">
                                                                <option selected="selected">USD</option>
                                                                <option>EURO</option>
                                                                <option>POUND</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="top-link right-side">
                                                        <div class="help-num">Need Help? : 03 233 455 55</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-xl-60per">
                    <div class="bottom-inner">
                        <div class="position-r">
                            <div class="nav_sec position-r">
                                <div class="mobilemenu-title mobilemenu">
                                    <span>Menu</span>
                                    <i class="fa fa-bars pull-right"></i>
                                </div>
                                <div class="mobilemenu-content">
                                    <ul class="nav navbar-nav" id="menu-main">
                                        <li class="active">
                                            <a href="{!! url('/') !!}"><span>Home</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('about-zarna') }}"><span>About Us</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('shop') }}"><span>Shop</span></a>
                                        </li>
                                        <li>
                                            @php
                                                $url = str_replace('/public', '', url('/'));
                                                $url = str_replace('Shop', '', $url).'public/blog';

                                            @endphp
                                            <a href="{{ $url }}"><span>Blog</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('contact-us') }}"><span>Contact</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-xl-20per d-none d-lg-block">
                    {{--<div class="right-side float-left-xs header-right-link">--}}
                    {{--<div class="offer-btn right-side">--}}
                    {{--<a href="offers" class="gift-offer" >--}}
                    {{--<i class="fa fa-gift"></i> Offers--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="popup-links ">
        <div class="popup-links-inner">
            <ul>
                <li class="categories">
                    <a class="popup-with-form" href="#categories_popup"><span class="icon"></span><span
                            class="icon-text">Categories</span></a>
                </li>
                {{--@if (Auth::guard('user')->check())--}}
                <li class="cart-icon">
                    <a class="popup-with-form" href="#cart_popup"><span class="icon"></span><span
                            class="icon-text">Cart</span></a>
                </li>
                {{--@endif--}}
                <li class="account">
                    <a class="popup-with-form" href="#account_popup"><span class="icon"></span><span class="icon-text">Account</span></a>
                </li>
                <li class="search">
                    <a class="popup-with-form" href="#search_popup"><span class="icon"></span><span class="icon-text">Search</span></a>
                </li>
                <li class="scroll scrollup">
                    <a href="#"><span class="icon"></span><span class="icon-text">Scroll-top</span></a>
                </li>
            </ul>
        </div>
        <div id="popup_containt">
            <div id="categories_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>All categories</span></h2>
                </div>
                <div class="popup-detail">
                    <ul class="cate-inner">
                        @foreach(App\item_categories::where('category_parent_category','!=', 0)->get() as $c)
                            <li class="level sub-megamenu">
                                {{--<span class="opener plus"></span>--}}
                                <a href="{{route('shopp',$c->category_name) }}"
                                   class="page-scroll">{{$c->category_name}}</a>
                                {{--<div class="megamenu  mega-sub-menu">--}}
                                {{--<div class="megamenu-inner-top">--}}
                                {{--<ul class="sub-menu-level1">--}}
                                {{--<li class="level2">--}}
                                {{--<ul class="sub-menu-level2 ">--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Blazer & Coat</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Sport Shoes</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Trousers</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Purse</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Wallets</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Skirts</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Tops</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Sleepwear</a></li>--}}
                                {{--<li class="level3"><a href="shop"><span>■</span>Jeans</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </li>
                        @endforeach
                        {{--<li class="level">--}}
                        {{--<a href="shop" class="page-scroll"><i class="fa fa-camera-retro"></i>Cameras (70)</a>--}}
                        {{--</li>--}}

                        {{--<li class="level"><a href="shop" class="page-scroll">More Categories</a></li>--}}
                    </ul>
                </div>
            </div>
            <div id="cart_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>cart</span></h2>
                </div>
                <div class="popup-detail">
                    <div class="cart-dropdown ">
                        @if (Auth::guard('user')->check())
                            <ul class="cart-list link-dropdown-list">
                                @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                            ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $ctt)
                                    <li><a href="{{route('your-shoping-cart.delete',$ctt->cid) }}" class="close-cart"><i
                                                class="fa fa-times-circle"></i></a>
                                        <div class="media"><a class="pull-left"> <img alt="Stylexpo"
                                                                                      src="../{{$ctt->item_image}}"></a>
                                            <div class="media-body"><span><a href="#">{{$ctt->item_name}}</a></span>
                                            <!--<p class="cart-price">{{$ctt->item_current_selling_price}}</p>-->
                                                <p class="cart-price">{!! config('app.devise_symbole') !!} {{$ctt->new_price}}</p>
                                                <div class="product-qty">
                                                    <label>Qty:</label>
                                                    <div class="custom-qty">
                                                        <input type="text" name="qty" maxlength="8"
                                                               value="{{$ctt->item_qty}}" title="Qty"
                                                               class="input-text qty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                @php($total = 0)
                                {{--@foreach(App\user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                                {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $sub)--}}
                                @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                          ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $sub)
                                    {{--@php($total += $sub->item_qty*$sub->item_current_selling_price)--}}
                                    @php($total += $sub->item_qty*$sub->new_price)
                                @endforeach


                            </ul>

                            <p class="cart-sub-totle"><span class="pull-left">Cart Subtotal</span> <span
                                    class="pull-right"><strong
                                        class="price-box">{!! config('app.devise_symbole') !!} {{$total}}</strong></span>
                            </p>

                            <div class="clearfix"></div>
                            <div class="mt-20"><a href="{{route('your-shoping-cart')}}" class="btn-color btn">Cart</a>
                                <a href="{{route('shipment-details')}}" class="btn-color btn right-side">Checkout</a>
                            </div>
                    </div>
                    @endif
                    @if (!Auth::guard('user')->check())
                        <ul class="cart-list link-dropdown-list">
                            {{--@foreach(App\user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                            {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $ctt)--}}
                            @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                       ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))->get() as $ctt)
                                <li><a href="{{route('your-shoping-cart.delete',$ctt->cid) }}" class="close-cart"><i
                                            class="fa fa-times-circle"></i></a>
                                    <div class="media"><a class="pull-left"> <img alt="Stylexpo"
                                                                                  src="../{{$ctt->item_image}}"></a>
                                        <div class="media-body"><span><a href="#">{{$ctt->item_name}}</a></span>
                                            {{--<p class="cart-price">{{$ctt->item_current_selling_price}}</p>--}}
                                            <p class="cart-price">{{$ctt->new_price}}</p>
                                            <div class="product-qty">
                                                <label>Qty:</label>
                                                <div class="custom-qty">
                                                    <input type="text" name="qty" maxlength="8"
                                                           value="{{$ctt->item_qty}}" title="Qty"
                                                           class="input-text qty">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            @php($total = 0)
                            {{--@foreach(App\user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')--}}
                            {{--->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get() as $sub)--}}
                            @foreach(App\ user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                      ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('cookie', \Illuminate\Support\Facades\Cookie::get('laravel_session'))->get() as $sub)
                                {{--@php($total += $sub->item_qty*$sub->item_current_selling_price)--}}
                                @php($total += $sub->item_qty*$sub->new_price)
                            @endforeach


                        </ul>

                        <p class="cart-sub-totle"><span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong
                                    class="price-box">{!! config('app.devise_symbole') !!} {{$total}}</strong></span>
                        </p>

                        <div class="clearfix"></div>
                        <div class="mt-20"><a href="your-shoping-cart" class="btn-color btn">Cart</a></div>
                </div>
                @endif
            </div>
        </div>
        <div id="account_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                <h2 class="main_title heading"><span>Account</span></h2>
            </div>
            <div class="popup-detail">
                <div class="row">
                    @if (!Auth::guard('user')->check())
                        <div class="col-lg-4">
                            <a href="{{route('login-with-zarna')}}">
                                <div class="account-inner mb-30">
                                    <i class="fa fa-user"></i><br/>
                                    <span>Account</span>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="col-lg-4">
                        <a href="{{route('your-shoping-cart')}}">
                            <div class="account-inner mb-30">
                                <i class="fa fa-shopping-bag"></i><br/>
                                <span>Shopping</span>
                            </div>
                        </a>
                    </div>
                    @if (Auth::guard('user')->check())
                        <div class="col-lg-4">
                            <a href="{{route('password')}}">
                                <div class="account-inner">
                                    <i class="fa fa-key"></i><br/>
                                    <span>Change Pass</span>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (Auth::guard('user')->check())
                        <div class="col-lg-4">
                            <a href="{{route('my-orders')}}">
                                <div class="account-inner">
                                    <i class="fa fa-history"></i><br/>
                                    <span>My Orders</span>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (Auth::guard('user')->check())
                        <div class="col-lg-4">
                            <a href="{{ route('logoutt') }}">
                                <div class="account-inner">
                                    <i class="fa fa-share-square-o"></i><br/>
                                    <span>log out</span>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div id="search_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                <h2 class="main_title heading"><span>Search</span></h2>
            </div>
            <div class="popup-detail">
                <div class="main-search">
                    <div class="header_search_toggle desktop-view">
                        <form method="post" action="{{route('searchproduct')}}">
                            {{csrf_field()}}
                            <div class="search-box">
                                <input class="input-text" type="text" name="item_name"
                                       placeholder="Search entire store here...">
                                <button class="search-btn"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
