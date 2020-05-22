
@extends('app')
@section('content')

    {{--<!-- HEADER DESKTOP-->--}}
    {{--<!-- MAIN CONTENT-->--}}

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Posts</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('edit-post',$p->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {!! csrf_field() !!}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" value="{{$p->title}}" name="title" placeholder="Title" class="form-control">
                                        <small class="form-text text-muted">This is a help text</small>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="textarea-input" rows="5" placeholder="Description..." class="form-control">{{$p->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-multiple-input" name="image" value="{{$p->image}}" multiple="" class="form-control-file">
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


                </div>
            </div>

        </div>
    </div>
    </div>


@endsection()
