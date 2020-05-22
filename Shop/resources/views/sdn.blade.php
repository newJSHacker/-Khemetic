@extends('app')
@section('content')
    <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-lg-6">
                                  <div class="card">
                                    <div class="card-header">
                                        <strong>Invoice Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="get" class="form-inline form">
                                            {!! csrf_field() !!}
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Inv #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="p" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        @foreach($inv as $inv)
                                                        <option value="{{$inv->sales_inv_code}}">{{$inv->sales_inv_code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<p>Customer, Inv #: 123</p>--}}
                                            {{--</div>--}}
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
                                        <strong>SDN</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form  action="{{ route('sdn')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Item</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="sales_delivered_item" id="select" class="form-control  {{ $errors->has('sales_delivered_item') ? ' is-invalid' : '' }}">
                                                        <option value="">Please select</option>

                                                    </select>
                                                    @if ($errors->has('sales_delivered_item'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('sales_delivered_item') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input  id="hidden" name="sales_inv_code" type="hidden" placeholder="Text" class="form-control ">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">QTY</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="sales_delivered_qty" placeholder="Text" class="form-control  {{ $errors->has('sales_delivered_qty') ? ' is-invalid' : '' }}">
                                                    <small class="form-text text-muted test"></small>
                                                    @if ($errors->has('sales_delivered_qty'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('sales_delivered_qty') }}</strong>
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
                                                     <small class="form-text text-muted">For more than one please enter coma(,) saprated entires</small>
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
                                        <strong>SDN</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Qty </th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temp as $index => $temp)
                                            <tr class="tr-shadow">
                                                
                                                <td>{{$temp->sales_delivered_item}}</td>
                                                <td>{{$temp->sales_delivered_qty}}</td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        
                                                        {{--<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">--}}
                                                            {{--<a  href="{{route('edit-sdn',$temp->id) }}"> <i class="zmdi zmdi-edit"></i></a>--}}
                                                        {{--</button>--}}
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('sdn.delete',$temp->id) }}">   <i class="zmdi zmdi-delete"></i></a>
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
                                    <form method="post"  action="{{ route('sdns')}}">
                                        {!! csrf_field() !!}
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Save
                                            </button>
                                            <button type="reset" class="btn btn-success btn-sm">
                                                <a  href="{{route('sdnPDF') }}" target="_blank" style="color: white"><i class="fa fa-ban"></i> Save & Print</a>
                                            </button>
                                        </div>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">

        $('.form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: '/sdn/details/' + $("select[name=p]").val(),
                dataType:"json",
                success:function(data) {
                    $('select[name="sales_delivered_item"]').empty();
                    $('.test').empty();
                    for (var i=0;i<data.length;i++)
                    {
                        $("#hidden").val(data[i]["sales_inv_code"]);
                        var t=data[i]["item_code"];
                        $('select[name="sales_delivered_item"]').append('<option value="'+ t +'">' + data[i]["item_name"] +  '</option>');
                        $('.test').text("Maximum quantity is: ").append('<small>' + data[i]["item_qty"] +  '</small>');
                    }
                },
            });
        });
    </script>

@endsection