<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<!--<![endif]-->
<head><meta name="csrf-token" content="{{ csrf_token() }}"></head>
@include('includes/inc_heads')
<body >
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
    @include ('includes/inc_header')
            <!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Measurements</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="index.php">Home</a>/</li>
                        <li><span>Measurements</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="ptb-70">
        <div class="container">
            <div class="mb-30">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-30">
                            <a href="measurements-profile" class="btn btn-color">
                                <span><i class="fa fa-angle-left"></i></span>
                               Add Measurements
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-30 right-side float-none-xs">
                            {{--<button class="btn btn-color right-side">Update Cart</button>--}}
                        </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cart-item-table commun-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($m as $me)
                                    <tr>

                                        <td>
                                            <div class="product-title">
                                                <a href="product-page.html">{{$me->id}}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <div class="base-price price-box">
                                                        <span class="price">{{$me->profile_name}}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>

                                        <td>
                                            <a href="{{route('measurements.delete',$me->id) }}"><i  data-id="100" class="fa fa-trash cart-remove-item"></i>
</a>

                                                <a href="{{route('edit-measurements',$me->id) }}"><i  data-id="100" class="fa fa-edit cart-remove-item"></i>

                                                </a> </td>
                                    </tr>

                                @endforeach

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
            <!-- FOOTER END -->
</div>
@include ("includes/inc_scripts")
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

</body>

</html>
