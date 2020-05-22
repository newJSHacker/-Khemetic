@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Order Details #{!! $o->count() > 0 ? $o[0]->order_no : "" !!}</h3>
                    <!--div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">

                        </div>
                    </div-->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <!--th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th-->
                                <th>Item</th>
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
                                    $total += $ord->product->new_price * $ord->item_qty;
                                    //dd($img);
                                @endphp
                                <tr class="tr-shadow">
                                    <!--td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td-->

                                    <td>
                                        <a href="{!! route('product-details', $ord->product->item_code) !!}" target="_blank">
                                            {{$ord->item_name}}
                                        </a>
                                    </td>
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
                                        {!! getSymboleDevise() !!} {{ $o->count() > 0 ? $o[0]->orderPaymentDetail->order_amount - $total : 0}}
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
                <?php include "includes/footer.php"; ?>
                <!-- END DATA TABLE -->
@endsection
