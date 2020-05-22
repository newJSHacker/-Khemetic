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
                    <div class="table-data__tool">

                    </div>


                    <div class="row">
                        <div class="col-12" id="form-print" >
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Order Details #{!! $o->count() > 0 ? $o[0]->order_no : "" !!}</h3>

                            <div class="table-responsive table-responsive-data2" >
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>.</th>
                                        <th>Item Name</th>
                                        <th>Item Qty</th>
                                        <th>color</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($o as $index => $ord)
                                        @php
                                            $p = $ord->product;
                                            $img = $ord->itemImage->count() > 0 ? $ord->itemImage[0] : null;
                                            $total += $ord->product->new_price * $ord->item_qty;
                                            //dd($img);
                                        @endphp
                                        <tr class="tr-shadow">
                                            <td>{{$ord->product->item_code}}</td>
                                            <td>
                                                <img alt="{{$p->item_name}}" style="width: 100px"
                                                     src="{{$img ? asset($img->item_image) : "#"}}">
                                            </td>
                                            <td>{{$ord->product->item_name}}</td>
                                            <td>{{$ord->item_qty}}</td>
                                            <td>{{$ord->color}}</td>
                                            <td>{!! getSymboleDevise() !!} {{$ord->product->new_price * $ord->item_qty}}</td>
                                            <td>{{$ord->payment_method}}</td>


                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                    <tr class="tr-shadow">
                                        <td colspan="4" style="text-align: right; ">Shipping </td>
                                        <td colspan="3" style="text-align: right; background-color: #c7e1ff;">
                                            <strong>
                                                {!! getSymboleDevise() !!} {{ $o->count() > 0 ? $o[0]->order_amount - $total : 0}}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="tr-shadow">
                                        <td colspan="4" style="text-align: right; ">Total Amount </td>
                                        <td colspan="3" style="text-align: right; background-color: #ebd7ff;">
                                            <strong>
                                                {!! getSymboleDevise() !!} {{ $o->count() > 0 ? $o[0]->order_amount : 0}}
                                            </strong>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>

                                        <th>Receiver Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Alt contact</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Receiver Shipment Landmark</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($os as $index => $o)
                                        <tr class="tr-shadow">

                                            <td>{{$o->receiver_name}}</td>

                                            {{--<td class="desc"></td>--}}
                                            <td>{{$o->receiver_email}}</td>
                                            <td>{{$o->receiver_contact}}</td>
                                            <td>{{$o->receiver_alternative_contact}}</td>
                                            <td>{{$o->receiver_address}}</td>
                                            <td>{{$o->receiver_city}}</td>
                                            <td>{{$o->receiver_shipment_landmark}}</td>


                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="print-btn">
                                <button onclick="printDiv('form-print')" class="btn btn-color" type="button">
                                    <a href="#" style="color: white">Print</a>
                                </button>
                                <div class="right-side float-none-xs mt-sm-30">
                                    <a class="btn btn-black" href="{!! url('shop') !!}">
                                        <span><i class="fa fa-angle-left"></i></span>Continue Shopping
                                    </a>
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
@include ("includes/inc_scripts")
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

</body>

</html>
