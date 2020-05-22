@extends('app')
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                  
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sales Return</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  action="{{ route('sales-return')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">PO #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="po_code" id="code" class="form-control test  {{ $errors->has('po_code') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>
                                                        @foreach($grn as $grn)
                                                            <option value="{{$grn[0]->po_code}}">{{$grn[0]->po_code}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('po_code'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('po_code') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Deivery Note #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="grn" id="select" class="form-control  {{ $errors->has('grn') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>

                                                    </select>
                                                    @if ($errors->has('grn'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('grn') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Item Returned</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="sales_returned_item_code" id="select" class="form-control {{ $errors->has('sales_returned_item_code') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('sales_returned_item_code'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sales_returned_item_code') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Qty</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="sales_returned_item_qty" placeholder="Qty"  class="form-control {{ $errors->has('sales_returned_item_qty') ? ' is-invalid' : '' }}">
                                                    @if ($errors->has('sales_returned_item_qty'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sales_returned_item_qty') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Serial Numbers</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="textarea-input" id="textarea-input" rows="5" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group" style="display:none" id="show">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Reason</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="sales_returned_item_reson" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="defected">Defected</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer" id="footer" style="display: none;">
                                                <button type="submit" class="btn btn-primary btn-sm" >
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer" id="footr">
                                        <button type="submit" class="btn btn-primary btn-sm" id="btn">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
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
                                               
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                
                                                <td>Lori Lynch</td>
                                                <td>
                                                    Description
                                                </td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                               
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                
                                                <td>Lori Lynch</td>
                                                <td>
                                                    Description
                                                </td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                               
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <div class="card-footer" >
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-success btn-sm">
                                            <i class="fa fa-ban"></i> Save & Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include "includes/footer.php"; ?>
                    </div>
    </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $(".test").on('change', function () {
                            $.ajax({
                                type: 'get',
                                url: '/purchase-return/details/' + $(this).val(),
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="grn"]').empty();
                                    $('select[name="sales_returned_item_code"]').empty();
                                    for (var i = 0; i < data.length; i++) {
                                        var g = data[i]["grn_num"];
                                        var item=data[i]["received_item_code"];
                                        $('select[name="grn"]').append('<option value="'+ g +' ">' + data[i]["grn_num"] + '</option>');
                                        $('select[name="sales_returned_item_code"]').append('<option value="'+ item +'">' + data[i]["item_name"] + '</option>');
                                    }
                                },
                            });
                        });
                    });
                    $("#btn").click(function()
                    {
                        $("#show").show();
                        $("#footr").hide();
                        $("#footer").show();
                    });

                </script>

@endsection()