@extends('app')
@section('content')
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header">
                                    <strong>Brands</strong>
                                </div>
                                <div class="card-body card-block">
                                                         <form action="{{ route('add-brands')}}" id="myForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {!! csrf_field() !!}

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="brand_name" placeholder="Text" class="form-control {{ $errors->has('brand_name') ? ' is-invalid' : '' }}">
                                                {{--<small class="form-text text-muted">This is a help text</small>--}}
                                                @if ($errors->has('brand_name'))
                                                    <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('brand_name') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-multiple-input" class=" form-control-label">Images</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file-multiple-input" name="brand_logo" multiple="" class="form-control-file  {{ $errors->has('brand_logo') ? ' is-invalid' : '' }}">
                                                {{--<small class="form-text text-muted">Press Control to select multiple files</small>--}}
                                                @if ($errors->has('brand_logo'))
                                                    <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('brand_logo') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm" onclick="myFunction()">
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
                                    <strong>Brand </strong> Details
                                </div>
                                <div class="card-body card-block">
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Logo</th>

                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ca as $index => $c)
                                            <tr class="tr-shadow">

                                                <td>{{ $c->brand_name }}</td>
                                                <td>
                                                    <img src="{{ $c->brand_logo }}" style="width:30%">
                                                </td>

                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('edit-brand',$c->id) }}">    <i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('brand.delete',$c->id) }}">  <i class="zmdi zmdi-delete"></i>
                                                            </a>
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