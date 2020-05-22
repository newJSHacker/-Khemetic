@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Feed Back
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'feedBack.store']) !!}

                        @include('feed_back.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
