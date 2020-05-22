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
                                    <form action="{{ route('edit-pr', $pr->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Items</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="purchase_requested_item" id="select" class="form-control">
                                                    <option value="0">Please select</option>

                                                        @foreach($i as $i)
                                                            <option value="{{ $i->item_name}}"  <?php if($i->item_name==$i->item_name){ echo ' selected="selected"';}?>>{{ $i->item_name}}</option>
                                                        @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">QTY Required</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="purchase_requested_qty" value="{{$pr->purchase_requested_qty}}" placeholder="Text" class="form-control">
                                                <small class="form-text text-muted">This is a help text</small>
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