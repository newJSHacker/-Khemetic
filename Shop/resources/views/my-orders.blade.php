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
                <h1 class="banner-title">My Orders</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="index.php">Home</a>/</li>
                        <li><span>My Orders</span></li>
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
                                    <th>Order #</th>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Order Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $or)

                                    <tr>
                                        <td>
                                            <a href="{!! route('view-order', $or->order_no) !!}">
                                                <div class="">
                                                  {{$or->order_no}}
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{!! route('view-order', $or->order_no) !!}">{{$or->name}}</a>
                                        </td>

                                        <td>
                                            <a href="{!! route('view-order', $or->order_no) !!}">{{$or->receiver_address}}</a>
                                        </td>
                                        <td>
                                            {{ date('Y-m-d',strtotime($or->created_at)) }} at {{date('H:i',strtotime($or->created_at)) }}
                                        </td>
                                        <td>
                                            <span class="price">{!! getSymboleDevise() !!} {{$or->order_amount}}</span>
                                        </td>
                                        <td>
                                             @if($or->status==0)
                                                <a href="{{route('cancel',$or->id) }}">
                                                    <button class="btn btn-color right-side">Cancel</button>
                                                </a>
                                            @elseif($or->status==1)
                                                <a href="{{route('return-items',$or->order_no) }}">
                                                    <button class="btn btn-color right-side">Return</button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

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
                        <div class="mt-30 right-side float-none-xs">
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
