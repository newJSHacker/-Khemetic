@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Contact Adresse
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'contactAdresses.store']) !!}

                        @include('contact_adresses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
