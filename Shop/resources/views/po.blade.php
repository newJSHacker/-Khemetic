
@extends('app')
@section('content')

                {{--<!-- HEADER DESKTOP-->--}}
            {{--<!-- MAIN CONTENT-->--}}

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase Order</strong> PO # 123
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="post" id="form" enctype="multipart/form-data" class="form-horizontal form">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Purchase Request #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="purchaseRequest" id="select" class="form-control test  {{ $errors->has('purchaseRequest') ? ' is-invalid' : '' }}" >
                                                        <option value="">Please select</option>
                                                        @foreach($pr as $spr)
                                                            <option value="{{$spr[0]->purchase_request_number}}">{{$spr[0]->purchase_request_number}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('purchaseRequest'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('purchaseRequest') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Supplier</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="supplier" id="select" class="form-control {{ $errors->has('supplier') ? ' is-invalid' : '' }} ">
                                                        <option value="">Please select</option>
                                                        @foreach($suppliers as $suppliers)
                                                            <option value="{{$suppliers->id}}">{{$suppliers->supplier_name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('supplier'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('supplier') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Purchase Refrence</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="purchase_refrence" placeholder="Reference" class="form-control  {{ $errors->has('purchase_refrence') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('purchase_refrence'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('purchase_refrence') }}</strong>
                                                        </span>
                                                    @endif
                                                    {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Other Cost</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="other_cost" placeholder="other cost" class="form-control  {{ $errors->has('other_cost') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('other_cost'))
                                                        <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('other_cost') }}</strong>
                                                        </span>
                                                    @endif
                                                    {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div> </form>
                                    </div>
                                </div>
                                <div class="card">
                                            <div class="card-header">
                                                <strong>Purchase Order Details</strong>
                                            </div>
                                            <div class="card-body card-block">
                                                <form action="{{ route('pod')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="purchase_request_number" id="pr" class="form-control pr"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="select" class=" form-control-label">Item</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="items" id="select" class="form-control itemss {{ $errors->has('items') ? ' is-invalid' : '' }}">
                                                                <option value="" selected>Please select</option>
                                                            </select>
                                                            @if ($errors->has('items'))
                                                                <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('items') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Price</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="text-input" name="purchased_item_price" placeholder="price" class="form-control  {{ $errors->has('purchased_item_price') ? ' is-invalid' : '' }}">
                                                            @if ($errors->has('purchased_item_price'))
                                                                <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('purchased_item_price') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">QTY</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="text-input" name="purchased_item_qty" placeholder="Text" class="form-control  {{ $errors->has('purchased_item_qty') ? ' is-invalid' : '' }}">
                                                            @if ($errors->has('purchased_item_qty'))
                                                                <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('purchased_item_qty') }}</strong>
                                                        </span>
                                                            @endif
                                                            <small class="form-text text-muted testt"></small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="textarea-input" class=" form-control-label">Remarks</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="remarks" id="textarea-input" rows="5" placeholder="Content..." class="form-control  {{ $errors->has('remarks') ? ' is-invalid' : '' }}"></textarea>
                                                            @if ($errors->has('remarks'))
                                                                <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('remarks') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div> </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase Order</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pro as $index => $pro)
                                            <tr class="tr-shadow">
                                                <td class="desc">{{ $pro->purchased_item_qty }}</td>

                                                <td>{{ $pro->purchased_item_price }}</td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-po',$pro->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('po.delete',$pro->id) }}"><i class="zmdi zmdi-delete"></i></a>
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
                                    <form method="post"  action="{{ route('purr')}}">
                                        {!! csrf_field() !!}
                                       <input type="hidden" name="purchased_item_qty">
                                        <input type="hidden" name="purchased_item_price">
                                        <input type="hidden" name="remarks">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-sm"><a  href="{{route('pdf') }}" target="_blank" style="color: white"><i class="fa fa-ban" ></i> Save & Print</a> </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $(".test").on('change', function () {
            $.ajax({
                type: 'get',
                url: '/po/details/' + $(this).val(),
                dataType: "json",
                success: function (data) {
//             var x=   JSON.stringify(data);
//               x = x.replace(/[{}]/g, '');
                    $('select[name="items"]').empty();
                    for (var i = 0; i < data.length; i++) {
                        var f = data[i]["purchase_request_number"];
                        $('input[name="purchase_request_number"]').val(f);
                        var t = data[i]["item_code"];
                        // $('select[name="items"]').append('<option>please select </option>');
                        $('select[name="items"]').append('<option value="' + t + '">' + data[i]["item_name"] + '</option>');
//                        $('.testt').text("Maximum quantity is: ").append('<small>' + data[i]["purchase_requested_qty"] +  '</small>');
                    }
                },

            });
        });
        $(".itemss").on('change', function () {
            $.ajax({
                type: 'get',
                url: '/po/pdetails/' + $(this).val()+ '/'+ $('#pr').val(),
                dataType: "json",
                success: function (data) {
//             var x=   JSON.stringify(data);
//               x = x.replace(/[{}]/g, '');
                   // $('input[name="ff"]').empty();
                    for (var i = 0; i < data.length; i++) {
                       var t = data[i]["purchase_request_number"];
                     // $('input[name="ff"]').val(t);
                       $('.testt').text("Maximum quantity is: ").append('<small>' + data[i]["purchase_requested_qty"] +  '</small>');
                    }
                },

            });
        });
        $('.form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/po' ,
                dataType:"json",
                data: $('#form').serialize(),
                success:function(data) {

                },
            });
        });
    });

</script>
@endsection()
