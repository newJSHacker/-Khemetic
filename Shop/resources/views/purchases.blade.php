@extends('app')
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('purchases')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {!! csrf_field() !!}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">PO #</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="purchase_order_number" id="select"  class="form-control test  {{ $errors->has('purchase_order_number') ? ' is-invalid' : '' }}"  >
                                                        <option value="">Please select</option>
                                                        @foreach($po as $po)
                                                        <option value="{{$po[0]->po_code}}">{{$po[0]->po_code}}</option>
                                                       @endforeach
                                                    </select>
                                                    @if ($errors->has('purchase_order_number'))
                                                        <span class="invalid-feedback">
                                                     <strong>{{ $errors->first('purchase_order_number') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Items Purchases</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="items" id="multiple-select" class="form-control  {{ $errors->has('items') ? ' is-invalid' : '' }}" >
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
                                                    <label for="multiple-select" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <input name="qty"  class="form-control  {{ $errors->has('qty') ? ' is-invalid' : '' }}" >

                                                    @if ($errors->has('qty'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                                    @endif
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
                                    </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchases</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               

                                                <th>Item</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temp as $index => $temp)
                                            <tr class="tr-shadow">
                                                <td class="desc">{{ $temp->items}}</td>
                                                <td>{{$temp->remarks}}</td>
                                               <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('purchases.delete',$temp->id) }}"><i class="zmdi zmdi-delete"></i></a>
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
                                    <form method="post"  action="{{ route('pur')}}">
                                        {!! csrf_field() !!}
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-success btn-sm">
                                            <a  href="{{route('purchasesPDF') }}" target="_blank" style="color: white"> <i class="fa fa-ban"></i> Save & Print</a>
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
                @endsection()
    <!-- Main JS-->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
        $(".test").on('change', function () {
            $.ajax({
                type: 'get',
                url: '/purchases/details/' + $(this).val(),
                dataType: "json",
                success:function(data) {
                    $('select[name="items"]').empty();
                    for (var i=0;i<data.length;i++)
                    {
                        var f = data[i]["purchased_item_qty"];
                        $('input[name="qty"]').val(f);
                        var t=data[i]["item_code"];
                        $('select[name="items"]').append('<option value="'+ t +'">' + data[i]["item_name"] +  '</option>');
                    }
                },

            });
        });
    });
</script>
</body>
</html>
<!-- end document-->