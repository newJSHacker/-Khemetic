@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Media
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -25px;margin-bottom: 5px"
               href="{!! route('media.edit', $media->id) !!}">Update</a>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('media.show_fields')
                    <a href="{!! route('media.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
