@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Calendar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($calendar, ['route' => ['calendars.update', $calendar->id], 'method' => 'patch']) !!}

                        @include('calendars.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
