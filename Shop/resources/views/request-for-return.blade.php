@extends('app')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Request for Return</h3>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2"id="ttt">
                            <thead>
                            <tr>

                                <th>Order #</th>
                                <th>Name</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Item Qty</th>
                                <th>Reason</th>

                            </tr>
                            </thead>
                            <tbody >


@foreach($req as $req)
                            <tr class="tr-shadow new" >

                                <td>{{ $req->order_no }}</td>
                                <td>
                                    {{ $req->name }}
                                </td>
                                <td class="desc"> {{ $req->item_code }}</td>
                                <td class="desc"> {{ $req->item_name }}</td>
                                <td>{{ $req->item_qty }}</td>

                                <td>{{ $req->reason }}</td>

                                <td>

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
        </div>
    </div>
    </div>

    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>


    </div>

    @endsection
            <!-- end document-->
            <!-- end document-->