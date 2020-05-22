@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Background
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('backgrounds.show_fields')
                    <a href="{!! route('backgrounds.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
