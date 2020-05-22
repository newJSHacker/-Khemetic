@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header">
                                    <strong>GRN</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="{{ route('edit-grn', $grn->id)}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select"  class=" form-control-label">Item</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="received_item_code" id="select" class="form-control">
                                                    <option value="{{ $grn->received_item_code}}"  <?php if($grn->received_item_code==$grn->received_item_code){ echo ' selected="selected"';}?>>{{ $grn->received_item_code}}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <input  id="hiden" name="po_code" type="hidden" placeholder="Text" class="form-control" value="{{$grn->po_code}}">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">QTY</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="received_item_qty" placeholder="Text" class="form-control" value="{{ $grn->received_item_qty}}">
                                                <small class="form-text text-muted test"></small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Serial Numbers</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="serial_num" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ $grn->serial_num}}</textarea>
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
                    </div>
                </div>
                <?php include "includes/footer.php"; ?>
            </div>
        </div>
    </div>
</div>
</div>
@endsection()