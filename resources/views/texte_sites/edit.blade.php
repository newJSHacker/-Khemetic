@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Texte Site
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($texteSite, ['route' => ['texteSites.update', $texteSite->id], 'method' => 'patch']) !!}

                        @include('texte_sites.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection