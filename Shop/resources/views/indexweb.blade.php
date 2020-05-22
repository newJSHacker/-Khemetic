@extends('main')
@section('content')
    <div class="row">
        @include('pages/inc_2collefthandside')
        <div class="col-xl-10 col-lg-9 col-xl-80per  right-side float-none-sm float-right-imp">
            <!-- BANNER STRAT -->
        @include('pages/inc_slider')
        <!-- BANNER END -->

            <!-- SUB-BANNER START -->
        {{-- <div class="sub-banner-block  pt-70">
           <div class=" center-sm">
             <div class="row">
               <div class="col-md-6">
                 <div class="sub-banner sub-banner1" >
                   <img alt="Stylexpo" src="images/sub-banner1.jpg">
                   <div class="sub-banner-detail">
                     <div class="sub-banner-title sub-banner-title-color">Most Popular Sunglasses</div>
                     <a class="btn btn-color" href="shop">Shop Now!</a>
                   </div>
                 </div>
               </div>
               <div class="col-md-6 mt-xs-30">
                 <div class="">
                   <div class="sub-banner sub-banner2">
                     <img alt="Stylexpo" src="images/sub-banner2.jpg">
                     <div class="sub-banner-detail">
                       <div class="sub-banner-title sub-banner-title-color">Shoes & Footwear</div>
                       <a class="btn btn-color " href="shop">Shop Now!</a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div> --}}
        <!-- SUB-BANNER END -->

            <!--  New arrivals Products Slider Block Start  -->
            <section class="pt-70">
                <div class="product-listing">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading-part mb-30 mb-xs-15">
                                <h2 class="main_title heading"><span>New Arrivals</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="pro_cat">
                        <div class="row">
                            <div class="owl-carousel pro-cat-slider ">
                                @foreach($items as $item)
                                    <div class="item">
                                        <div class="product-item">
                                            @php
                                                $test = $item->created_at->format("Y-m-d H:i:s") > \Carbon\Carbon::now()->subweek()->format("Y-m-d H:i:s");
                                            @endphp
                                            @if($item->is_new || $test)
                                                <div class="main-label new-label"><span>New</span></div>
                                            @endif
                                            <div class="" style=" ">
                                                <a href="{{route('product-details',$item->item_code) }}">
                                                    <img src="{{$item->item_image}}" style="height:250px" alt="Stylexpo">
                                                </a>
                                                <div class="product-detail-inner">
                                                    <div class="detail-inner-left align-center">
                                                        <ul>
                                                            <li class="pro-cart-icon">
                                                                <form method="get"
                                                                      action="{{route('cart',$item->item_code)}}">
                                                                    {{--<input type="hidden" value="{{$items->item_code}}">--}}
                                                                    @if($item->quantity>0)
                                                                        <button title="Add to Cart"><span></span>Add to
                                                                            Cart
                                                                        </button>
                                                                    @endif
                                                                    @if($item->quantity==0)
                                                                        <span
                                                                            style="color: #ff3030; font-weight: bold;background-color: white">Out Of Stock</span>
                                                                    @endif
                                                                </form>
                                                            </li>
                                                            {{--<li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>--}}
                                                            {{--<li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item-details">
                                                <div class="product-item-name"><a
                                                        href="{{route('product-details',$item->item_code) }}">{{$item->item_name}}</a>
                                                </div>
                                            <!--<div class="price-box"> <span class="price">{!! getSymboleDevise() !!} {{$item->item_current_selling_price}}</span></div>-->
                                                <div class="price-box"><span
                                                        class="price">{!! getSymboleDevise() !!} {{$item->new_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  New arrivals Products Slider Block End  -->

            <!-- Top Categories Start-->
            <section class=" ptb-70">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-part mb-30 mb-xs-15">
                            <h2 class="main_title heading"><span>Top Categories</span></h2>
                        </div>
                    </div>
                </div>


                <div class="pro_cat">
                    <div class="row">
                        <div id="top-cat-pro" class="owl-carousel sell-pro align-center">
                            @foreach($categories as $ct)
                                <div class="item ">
                                    <div class="item-inner">
                                        <img
                                            style="min-height: 210px; min-width: 210px; max-height: 210px; max-width: 210px;"
                                            src="{{$ct->item_image}}" alt="Stylexpo">
                                        <div class="cate-detail">
                                            <div>{{$ct->item_category}}</div>
                                            {{--<a class="btn btn-white" href="{{route('shopp',$ct->category_parent_category) }}">View Products</a>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top Categories End-->

            <!--  Site Services Features Block Start  -->
            <!--<div class="ser-feature-block">-->
            <!--  <div class="center-xs">-->
            <!--    <div class="row">-->
            <!--      <div class="col-xl-3 col-md-6 service-box">-->
            <!--        <div class="feature-box ">-->
            <!--          <div class="feature-icon feature1"></div>-->
            <!--          <div class="feature-detail">-->
            <!--            <div class="ser-title">Free Delivery</div>-->
            <!--            <div class="ser-subtitle">From PKR 5000</div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="col-xl-3 col-md-6 service-box">-->
            <!--        <div class="feature-box">-->
            <!--          <div class="feature-icon feature2"></div>-->
            <!--          <div class="feature-detail">-->
            <!--            <div class="ser-title">Support 24/7</div>-->
            <!--            <div class="ser-subtitle">Online 24 hours</div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="col-xl-3 col-md-6 service-box">-->
            <!--        <div class="feature-box ">-->
            <!--          <div class="feature-icon feature3"></div>-->
            <!--          <div class="feature-detail">-->
            <!--            <div class="ser-title">Free return</div>-->
            <!--            <div class="ser-subtitle">365 a day</div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="col-xl-3 col-md-6 service-box">-->
            <!--        <div class="feature-box ">-->
            <!--          <div class="feature-icon feature4"></div>-->
            <!--          <div class="feature-detail">-->
            <!--            <div class="ser-title">Big Saving</div>-->
            <!--            <div class="ser-subtitle">Weeken Sales</div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--  Site Services Features Block End  -->

            <!--small banner Block Start-->
        {{-- <section class="pt-70">
          <div class="row m-0">
            <div class="col-lg-6 p-0">
              <div class="sub-banner small-banner small-banner1">
                <a href="#">
                  <img src="images/small-banner1.jpg" alt="Stylexpo">
                </a>
              </div>
            </div>
            <div class="col-lg-6 p-0 mt-sm-30">
              <div class="sub-banner small-banner small-banner2">
                <a href="#">
                  <img src="images/small-banner2.jpg" alt="Stylexpo">
                </a>
              </div>
            </div>
          </div>
        </section> --}}
        <!--small banner Block Start-->

            <!-- Brand logo block Start  -->
        {{-- <div class="brand-logo">
          <div class="row">
            <div class="col-12 ">
              <div class="heading-part mb-30 mb-xs-15" style=" padding: 10px 0;">
                <h2 class="main_title heading"><span>Our Brands</span></h2>
              </div>
            </div>
          </div>
          <div class="row brand">
            <div class="col-md-12">
              <div id="brand-logo" class="owl-carousel align_center">
                @foreach($brands as $brands)
                <div class="item" style="max-height:8vw; max-width: 8vw; min-height:8vw; min-width: 8vw;"><a href="#"><img src="{{$brands->brand_logo}}" alt="Stylexpo"></a></div>
                  @endforeach

              </div>
            </div>
          </div>
        </div> --}}
        <!-- Brand logo block End  -->
        </div>
    </div>
    </div>
    </section>
    <!-- CONTAINER END -->
    </div>

    <script>
        /* ------------ Newslater-popup JS Start ------------- */
        $(window).load(function () {
            $.magnificPopup.open({
                items: {src: '#newslater-popup'}, type: 'inline'
            }, 0);
        });
        /* ------------ Newslater-popup JS End ------------- */
    </script>
@endsection
