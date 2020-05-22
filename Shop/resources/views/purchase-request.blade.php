@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase Request</strong>
                                    </div>
                                    <div class="card-body card-block">
                                          <form action="{{ route('purchase-request')}}" id="myForm" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            {{--<div class="row form-group">--}}
                                                {{--<div class="col col-md-3">--}}
                                                    {{--<label class=" form-control-label">Purchase Request #</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-12 col-md-9">--}}
                                                    {{--<p class="form-control-static" >12345</p>--}}
                                                    {{--<div class="col-12 col-md-9">--}}
                                                        {{--<input type="text" id="text-input" name="purchase_request_number" placeholder="Text" class="form-control">--}}
                                                        {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Items</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="purchase_requested_item" id="select" class="form-control  {{ $errors->has('purchase_requested_item') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>
                                                        @foreach($i as $i)
                                                        <option value="{{$i->item_code}}">{{ $i->item_name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('purchase_requested_item'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('purchase_requested_item') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">QTY Required</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="purchase_requested_qty" placeholder="Text" class="form-control  {{ $errors->has('purchase_requested_qty') ? ' is-invalid' : '' }}">
                                                    <small class="form-text text-muted">This is a help text</small>
                                                    @if ($errors->has('purchase_requested_qty'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('purchase_requested_qty') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm"  onclick="myFunction()">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div> </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase Request</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pr as $index => $pr)
                                            <tr class="tr-shadow">
                                                <td class="desc">{{ $pr->purchase_requested_item}}</td>
                                                <td>{{ $pr->purchase_requested_qty}}</td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-pr',$pr->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a   href="{{route('purchase-request.delete',$pr->id) }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <div class="card-footer">
                                        <form  action="{{ route('purRe')}}" method="post">
                                            {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Gnerate Request
                                        </button>
                                        <button type="reset" class="btn btn-success btn-sm">
                                            <i class="fa fa-ban"></i> <a  href="{{route('downloadPurchaseReq') }}" target="_blank" style="color: white">Genrate & Print
                                       </a> </button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include "includes/footer.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    @endsection()
    <script>
        function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>

<!-- end document-->