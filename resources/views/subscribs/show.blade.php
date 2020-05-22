@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Subscrib
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('subscribs.show_fields')
                    <a href="{!! route('subscribs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
