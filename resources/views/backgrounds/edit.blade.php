@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Background
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($background, ['route' => ['backgrounds.update', $background->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('backgrounds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
