@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Purchase Order</strong> PO # 123
                                </div>
                                <div class="card-body card-block">
                                    <form action="{{ route('edit-po', $po->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Item</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="select" id="select" class="form-control">

                                                    @foreach($pr as $pr)
                                                        <option value="{{$pr->purchase_requested_item}}" <?php if($pr->purchase_requested_iteme==$pr->purchase_requested_item){ echo ' selected="selected"';}?>>{{$pr->purchase_requested_item}}</option>
                                                    @endforeach
                                                </select>`
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Price</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" value="{{$po->purchased_item_price}}" name="purchased_item_price" placeholder="price" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">QTY</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" value="{{$po->purchased_item_qty}}"  name="purchased_item_qty" placeholder="Text" class="form-control">
                                                <small class="form-text text-muted">This is a help text</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Remarks</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="remarks" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{$po->remarks}}</textarea>
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
                                    <strong>Send PO</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2" class="pr-1  form-control-label">Name</label>
                                            <input type="text" id="exampleInputName2" placeholder="Jane Doe" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2" class="px-1  form-control-label">Email</label>
                                            <input type="email" id="exampleInputEmail2" placeholder="jane.doe@example.com" required="" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </div>
</div>

                </div>
            </div>
        </div>
    </div>

</div>
           @endsection
            <!-- end document-->