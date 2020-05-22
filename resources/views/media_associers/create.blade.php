@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Media Associer
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'mediaAssociers.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('media_associers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
