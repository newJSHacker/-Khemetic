@extends('app')

@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                  <div class="card">
                                    <div class="card-header">
                                        <strong>PO Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form   id="myForm" class="form-inline form" method="get"   >
                                            {!! csrf_field() !!}
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">P#</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="p" id="select" class="form-control" >
                                                        <option value="0">Please select</option>
                                                        @foreach($purchases as $purchases)
                                                            <option value="{{$purchases->purchase_number}}">{{$purchases->purchase_number}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                             &nbsp;&nbsp;&nbsp;   <p>Supplier, PO #: 123</p>
                                            </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm "  >
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
                                        <strong>GRN</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  action="{{ route('grn')}}" method="POST" enctype="multipart/form-data" id="form" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select"  class=" form-control-label">Item</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="received_item_code" id="select" class="form-control  {{ $errors->has('received_item_code') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>

                                                    </select>
                                                    @if ($errors->has('received_item_code'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('received_item_code') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input  id="hiden" name="po_code" type="hidden" placeholder="Text" class="form-control">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">QTY</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="received_item_qty" placeholder="Text" class="form-control  {{ $errors->has('received_item_qty') ? ' is-invalid' : '' }}">
                                                    <small class="form-text text-muted test"></small>
                                                    @if ($errors->has('received_item_qty'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('received_item_qty') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Serial Numbers</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="serial_num" id="textarea-input" rows="5" placeholder="Content..." class="form-control"></textarea>
                                                     <small class="form-text text-muted">For more than one please enter coma(,) saprated entires</small>
                                                </div>
                                            </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" >
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
                                        <strong>GRN</strong> Details
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
                                        @foreach($grn as $index => $grn)
                                            <tr class="tr-shadow">
                                                
                                                <td>{{ $grn->received_item_code }}</td>
                                                <td>{{ $grn->received_item_qty}}</td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-grn',$grn->id) }}"> <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('grn.delete',$grn->id) }}"> <i class="zmdi zmdi-delete"></i></a>
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
                                    <form method="post"  action="{{ route('grns')}}">
                                        {!! csrf_field() !!}
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-success btn-sm">
                                            <a  href="{{route('grnPDF') }}" target="_blank" style="color: white"><i class="fa fa-ban"></i> Save & Print</a>
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

    $('.form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: '/grn/details/' + $("select[name=p]").val(),
           dataType:"json",
            success:function(data) {
                $('select[name="received_item_code"]').empty();
                $('.test').empty();
                for (var i=0;i<data.length;i++)
                {
                    $("#hiden").val(data[i]["purchase_order_number"]);
                    var t=data[i]["item_code"];
//                    var testt=data[i]["purchase_order_number"];
//                    alert(testt);
                    $('select[name="received_item_code"]').append('<option value="'+ t +'">' + data[i]["item_name"] +  '</option>');
                    $('.test').text("Maximum quantity is: ").append('<small>' + data[i]["qty"] +  '</small>');
                }
            },
        });
    });
</script>

@endsection()