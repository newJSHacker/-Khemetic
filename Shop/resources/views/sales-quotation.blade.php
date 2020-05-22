@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Select Customer</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('sales-quotation')}}" method="post" class="form-inline">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Customer</label>
                                                <select name="customer_code" id="select" class="form-control">
                                                    <option value="0">Please select</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">Mob:</label>
                                                <input type="number" name="customer_mobile" id="exampleInputEmail2" placeholder="03336575971" required="" class="form-control">
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sales Quotation </strong>
                                    </div>
                                    <div class="card-body card-block">
                                          <form action="{{ route('sales-quotations')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Item</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="quoted_item_code" id="select" class="form-control items  {{ $errors->has('quoted_item_code') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>
                                                        @foreach($items as $item)
                                                            <option value="{{$item->item_code}}">{{$item->item_code}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('quoted_item_code'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quoted_item_code') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="hidden" name="item_name" id="iname"/>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">QTY</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="quoted_item_qty" placeholder="Text" class="form-control  {{ $errors->has('quoted_item_qty') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('quoted_item_qty'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quoted_item_qty') }}</strong>
                                    </span>
                                                    @endif
                                                    <small class="form-text text-muted">This is a help text</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="price" name="quoted_item_price" placeholder="Text" class="form-control price  {{ $errors->has('quoted_item_price') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('quoted_item_price'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quoted_item_price') }}</strong>
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
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Customer Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="#" method="post" class="form-inline">
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Name</label>
                                                <input type="text" id="exampleInputName2" disabled="disabled" placeholder="Baryal Khan" required="" class="form-control">
                                            </div>
                                            <div class="form-group" style="margin-left:10px;">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Cr</label>
                                                <input type="text" id="exampleInputName2" disabled="disabled" placeholder="Rs. 25000" required="" class="form-control">
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sales Quotation</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temp as $index => $temp)
                                            <tr class="tr-shadow">

                                                <td>{{ $temp->item_name }}</td>
                                                <td>
                                                    {{ $temp->quoted_item_qty }}
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-quotation',$temp->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('sales-quotation.delete',$temp->id) }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>

                                                    </div>
                                                </td>

                                            </tr>
                                            <tr class="spacer"></tr>
                                        @endforeach
                                            <tr class="spacer"></tr>

                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <form method="post"  action="{{ route('quotations')}}">
                                        {!! csrf_field() !!}
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Save
                                            </button>
                                            <button type="reset" class="btn btn-success btn-sm">
                                                <a  href="{{route('quotationsPDF') }}" target="_blank" style="color: white"><i class="fa fa-ban"></i> Save & Print</a>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>
                        <?php include "includes/footer.php"; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $(".items").on('change', function () {
                            $.ajax({
                                type: 'get',
                                url: '/sales-quotation/details/' + $(this).val(),
                                dataType: "json",
                                success: function (data) {
                                    $("#selectt").empty();
                                    for (var i = 0; i < data.length; i++) {
                                        // data[i]["item_current_selling_price"];

                                        $("#price").val(data[i]["item_current_selling_price"]);
                                        $("#iname").val(data[i]["item_name"]);

                                    }
                                },

                            });
                        });
                    });

                </script>
@endsection()