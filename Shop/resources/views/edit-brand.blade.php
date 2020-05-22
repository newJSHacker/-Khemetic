@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-header">
                                    <strong>Brands</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="{{ route('edit-brand', $brands->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input"  value="{{ $brands->brand_name }}" name="brand_name" placeholder="Text" class="form-control">
                                                <small class="form-text text-muted">This is a help text</small>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-multiple-input" class=" form-control-label">Images</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file-multiple-input" name="brand_logo" value="{{ $brands->brand_logo }}"  class="form-control-file">
                                            </div>
                                        </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div></form>
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