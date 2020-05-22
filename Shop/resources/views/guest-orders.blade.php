@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Guest Orders</h3>
                    <div class="table-data__tool">
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
                            {{--<button class="au-btn au-btn-icon au-btn--green au-btn--small">--}}
                            {{--<i class="zmdi zmdi-plus"></i>Verfy Order</button>--}}
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Verified Orfders</option>
                                    <option value="">Orders In progress</option>
                                    <option value="">Oders in stiching</option>
                                    <option value="">Oders in shipimg</option>
                                    <option value="">Shartiya</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Order #</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Mobile #</th>
                                <th>Total Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inv  as $index => $i)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>

                                    <td>{{$i->name}}</td>

                                    {{--<td class="desc"></td>--}}
                                    <td>{{$i->order_no}}</td>
                                    <td>
                                        {{$i->email}}
                                    </td>
                                    <td>{{$i->address}}</td>
                                    <td>{{$i->mobile}}</td>
                                    <td>{{$i->total_amount}}</td>
                                    <td><a href="{{route('guestorder-details',$i->order_no)}}">View Details</a></td>

                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <?php include "includes/footer.php"; ?>
        </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

    </div>

@endsection