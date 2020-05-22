@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Page Static
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pageStatics.store']) !!}

                        @include('page_statics.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>

    <script>

        $(document).ready(function(){

            var options = {
                filebrowserImageBrowseUrl: '{!! URL::to('/') !!}/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '{!! URL::to('/') !!}/laravel-filemanager/upload?type=Images&responseType=json&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: '{!! URL::to('/') !!}/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '{!! URL::to('/') !!}/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}'
            };

            CKEDITOR.replace( 'editor1', options);
        });

    </script>
@endsection
