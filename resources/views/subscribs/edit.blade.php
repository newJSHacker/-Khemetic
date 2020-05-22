@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Subscrib
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subscrib, ['route' => ['subscribs.update', $subscrib->id], 'method' => 'patch']) !!}

                        @include('subscribs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
