@extends('app')

@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">



                    <div class="card">
                        <div class="card-header">
                            <strong>Sales Quotation </strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('edit-quotation',$inv->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {!! csrf_field() !!}

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Item</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="quoted_item_code" id="select" class="form-control items">
                                            <option value="0">Please select</option>
                                            @foreach($items as $item)
                                                <option value="{{$item->item_code}}"  <?php if($item->item_code==$item->item_code){ echo ' selected="selected"';}?>>{{$item->item_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="item_name" id="iname"/>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">QTY</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="quoted_item_qty" value="{{$inv->quoted_item_qty}}" placeholder="Text" class="form-control">
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="price" name="quoted_item_price" value="{{$inv->quoted_item_price}}" placeholder="Text" class="form-control price">
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