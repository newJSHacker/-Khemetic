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
                <h1 class="banner-title">Return Item</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><span>Return Item</span></li>
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

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{route('submit-return')}}" class="main-form full" method="post" >
                        {!! csrf_field() !!}
                        <div class="row mb-20">
                            <div class="col-12 mb-20">
                                <div class="heading-part">
                                    <h3 class="sub-heading">Return Item</h3>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box ">

                                    <input type="text" placeholder="Order #" name="order_no" value="{{$ord[0]->order_no}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box ">
                                    {{--<input type="text"   name="item_code" placeholder="Item Code">--}}
                                    <select name="item_code">
                                        @foreach($ords as $ordr)
                                        <option value="{{$ordr->item_code}}">{{$ordr->item_name}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box ">
                                    <input type="text"  placeholder="Item Qty" name="item_qty">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box ">
                                    <textarea type="text"  placeholder="Reason" name="reason"></textarea>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <button class="btn btn-color right-side">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    </section>

    <!-- CONTAINER END -->
    <!-- FOOTER START -->
    @include("includes/inc_footer")
</div>
@include ("includes/inc_scripts")
</body>

</html>
