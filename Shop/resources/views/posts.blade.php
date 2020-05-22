
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
                            <form action="{{ route('posts')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {!! csrf_field() !!}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="title" placeholder="Title" class="form-control  {{ $errors->has('title') ? ' is-invalid' : '' }}">
                                        <small class="form-text text-muted">This is a help text</small>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="textarea-input" rows="5" placeholder="Description..." class="form-control  {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-multiple-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-multiple-input" name="image" multiple="" class="form-control-file">
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
                            <strong>Posts</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($post as $posts)
                                        <tr class="tr-shadow">
                                            <td class="desc">{{$posts->title}}</td>

                                            <td>{{$posts->description}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a  href="{{route('edit-post',$posts->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a  href="{{route('posts.delete',$posts->id) }}"><i class="zmdi zmdi-delete"></i></a>
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

        </div>
    </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {
            $(".test").on('change', function () {
                $.ajax({
                    type: 'get',
                    url: '/po/details/' + $(this).val(),
                    dataType: "json",
                    success: function (data) {
//             var x=   JSON.stringify(data);
//               x = x.replace(/[{}]/g, '');
                        $('select[name="items"]').empty();
                        for (var i = 0; i < data.length; i++) {
                            var t = data[i]["item_code"];
                            $('select[name="items"]').append('<option value="' + t + '">' + data[i]["item_name"] + '</option>');
                        }
                    },

                });
            });
            $('.form').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '/po' ,
                    dataType:"json",
                    data: $('#form').serialize(),
                    success:function(data) {

                    },
                });
            });
        });

    </script>
@endsection()
