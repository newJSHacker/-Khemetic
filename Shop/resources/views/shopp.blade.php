<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
@include('includes/inc_head')

<body >
<!--<div class="se-pre-con"></div>-->
<div class="main">

    <!-- HEADER START -->
    @include('includes/inc_header')
            <!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Shop</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><span>Shop</span></li>
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
                <div class="col-xl-2 col-lg-3 mb-sm-30 col-xl-20per">
                    <div class="sidebar-block">
                        <div class="sidebar-box listing-box mb-40 mb-xs-15"> <span class="opener plus"></span>
                            <div class="sidebar-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="sidebar-contant">
                                <ul>
                                      @foreach(App\item_categories::where('category_parent_category','!=', 0)->get() as $ca)
                                        <li><a href="{{route('shopp',$ca->category_name) }}">{{$ca->category_name}}
                                                {{--<span>(21)</span>--}}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{--<div class="sidebar-box mb-40 mb-xs-15"> <span class="opener plus"></span>--}}
                            {{--<div class="sidebar-title">--}}
                                {{--<h3>Shop by</h3>--}}
                            {{--</div>--}}
                            {{--<div class="sidebar-contant">--}}
                                {{--<div class="price-range mb-30">--}}
                                    {{--<div class="inner-title">Price range</div>--}}
                                    {{--<input class="price-txt" type="text" id="amount">--}}
                                    {{--<div id="slider-range"></div>--}}
                                {{--</div>--}}
                                {{--<div class="size mb-20">--}}
                                    {{--<div class="inner-title">Size</div>--}}
                                    {{--<ul >--}}
                                        {{--<li><a href="#">S (10)</a></li>--}}
                                        {{--<li><a href="#">M (05)</a></li>--}}
                                        {{--<li><a href="#">L (10)</a></li>--}}
                                        {{--<li><a href="#">XL (08)</a></li>--}}
                                        {{--<li><a href="#">XXL (05)</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="mb-20">--}}
                                    {{--<div class="inner-title">Color</div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="#">Black <span>(0)</span></a></li>--}}
                                        {{--<li><a href="#">Blue <span>(05)</span></a></li>--}}
                                        {{--<li><a href="#">Brown <span>(10)</span></a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="mb-20">--}}
                                    {{--<div class="inner-title">Manufacture</div>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="#">Augue congue <span>(0)</span></a></li>--}}
                                        {{--<li><a href="#">Eu magna <span>(05)</span></a></li>--}}
                                        {{--<li><a href="#">Ipsum sit <span>(10)</span></a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<a href="#" class="btn btn-color">Refine</a> </div>--}}
                        {{--</div>--}}
                        <div class="sidebar-box mb-40 mb-xs-15 d-none d-lg-block">
                            <a href="#">
                                <img src="../images/left-banner.jpg" alt="Stylexpo">
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-xl-80per">
                    <div class="shorting mb-30">
                        <div class="row">
                            <div class="col-lg-6">
                                <!--<div class="view">-->
                                <!--    <div class="list-types grid active "> <a href="shop">-->
                                <!--            <div class="grid-icon list-types-icon"></div>-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <div class="list-types list"> <a href="shop">-->
                                <!--            <div class="list-icon list-types-icon"></div>-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--</div>-->
                                 @foreach($it as $it)
                                 {{$it->item_category}}
                                 @endforeach

                                <!--<div class="short-by float-right-sm"> <span>Sort By :</span>-->
                                <!--    <div class="select-item select-dropdown">-->
                                <!--        <fieldset>-->
                                <!--            <form id="uploadForm" >-->
                                <!--                {{csrf_field()}}-->
                                <!--                <select  name="speed">-->
                                <!--                    <option value="atz" selected="selected">Name (A to Z)</option>-->
                                <!--                    <option value="zta">Name(Z - A)</option>-->
                                <!--                    <option value="lth">price(low&gt;high)</option>-->
                                <!--                    <option value="htl">price(high &gt; low)</option>-->
                                <!--                </select>-->
                                <!--            </form>-->
                                <!--        </fieldset>-->
                                <!--    </div>-->
                                <!--</div>-->

                            </div>
                            <!--<div class="col-lg-6">-->
                            <!--    <div class="show-item right-side float-left-sm"> <span>Show :</span>-->
                            <!--        <div class="select-item select-dropdown">-->
                            <!--            <fieldset>-->
                            <!--                <form id="pagination">-->
                            <!--                    {{csrf_field()}}-->
                            <!--                    <select  name="per" id="pagin" class="">-->
                            <!--                        <option value="24" selected="selected">24</option>-->
                            <!--                        <option value="12">12</option>-->
                            <!--                        <option value="6">6</option>-->
                            <!--                    </select>-->
                            <!--                </form>-->
                            <!--            </fieldset>-->
                            <!--        </div>-->
                            <!--        <span>Per Page</span>-->

                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="product-listing" >
                        <div class="inner-listing">
                            <div class="row" id="list">
                            @foreach($i as $item)
                            <div class="col-md-4 col-6 item-width mb-30">
                            <div class="product-item">
                            <div class="" style=""> <a href="{{route('product-details',$item->item_code) }}"> <img src="../{{$item->item_image}}" style="height:250px" alt="Stylexpo"> </a>
                            <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                            <ul>
                            <li class="pro-cart-icon">
                            <form method="get" action="{{route('cart',$item->item_code)}}">
                            <input type="hidden" value="{{$item->item_code}}">
                                @if($item->quantity>0)
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                @endif
                                @if($item->quantity==0)
                                    <span style="color: #ff3030; font-weight: bold;background-color: white">Out Of Stock</span>
                                @endif
                            </form>
                            </li>
                            {{--<li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>--}}
                            {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>--}}
                            {{--</ul>--}}
                            </div>
                            </div>
                            </div>
                            <div class="product-item-details">
                            <div class="product-item-name"> <a href="{{route('product-details',$item->item_code) }}">{{$item->item_description}}</a> </div>
                            <!--<div class="price-box"> <span class="price">PKR {{$item->item_current_selling_price}}</span></div>-->
                              <div class="price-box"> <span class="price">PKR {{$item->new_price}}</span></div>
                            </div>
                            </div>
                            </div>
                            @endforeach

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination-bar">
                                        <ul>

                                            {{$i->links()}}

                                            {{--<li><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                                            {{--<li class="active"><a href="#">1</a></li>--}}
                                            {{--<li><a href="#">2</a></li>--}}
                                            {{--<li><a href="#">3</a></li>--}}
                                            {{--<li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                        </ul>
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
    @include ("includes/inc_footer")
            <!-- FOOTER END -->
</div>
@include('includes/inc_scripts')
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script>
//     $(document).ready(function() {
//         $.ajax({
//             url: "/sorts",
//             type: "get",
//             success: function (response) {

//                 $("#targetLayer").html(response);
//             }, error: function (jqXHR, textStatus, errorThrown) {
//                 $("#targetLayer").html(errorThrown + textStatus);
//             }
//         });

//         $('#uploadForm').on('change',function (e){
//             e.preventDefault();
// //     var a= $(this).val();
// //       alert(a);
//             $.ajax({
//                 url: '/sort' ,
//                 type: "POST",
//                 data: new FormData(this),
//                 contentType: false,
//                 // cache: false,
//                 processData: false,

//                 success: function (response) {
//                     $("#list").hide();
//                     $("#targetLayer").html(response);
//                 }, error: function (jqXHR, textStatus, errorThrown) {
//                     $("#targetLayer").html(errorThrown + textStatus);
//                 }
//             });
//         });

//         document.getElementById('pagination').onchange = function() {
//             $.ajax({
//                 url: '/shop' ,
//                 type: "POST",
//                 data: new FormData(this),
//                 contentType: false,
//                 // cache: false,
//                 processData: false,

//                 success: function (response) {
//                     $("#list").hide();
//                     $("#targetLayer").html(response);
//                 }, error: function (jqXHR, textStatus, errorThrown) {
//                     $("#targetLayer").html(errorThrown + textStatus);
//                 }
//             });
//         }
//     });
</script>

</body>

</html>
