@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Orders Placed</h3>
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
                                <i class="zmdi zmdi-filter-list"></i>filters
                            </button>
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
                                {{--<th>Order #</th>--}}
                                <th>date</th>
                                <th>status</th>
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
                                    <td>{{$i->created_at}}</td>
                                    <td>
                                        @if($i->payment_status==NULL || $i->payment_status==0)
                                            <span class="status--process">Processed</span>



                                        @elseif($i->payment_status==1 && $i->status==0)
                                            <span class="status--process">confirmed</span>

                                        @endif
                                        @if($i->status==1)
                                            <span class="status--process">Delivered</span>
                                        @endif
                                    </td>
                                    <td>{!! getSymboleDevise() !!} {{$i->order_amount}}</td>
                                    <td>
                                        <a href="{{route('order-details',$i->order_no)}}" target="_blank">
                                            View Details
                                        </a>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if($i->payment_status==NULL || $i->payment_status==0)
                                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <a href="{{route('o',$i->id) }}" style="color: white">
                                                        <i class="zmdi zmdi-plus"></i>Confirm</a></button>
                                            @endif
                                            @if($i->payment_status==1 && $i->status==0)
                                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    <a href="{{route('d',$i->id) }}" style="color: white"><i
                                                            class="zmdi zmdi-plus"></i>Deliver</a></button>
                                            @endif
                                        </div>
                                    </td>
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
