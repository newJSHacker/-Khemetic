@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Texte Site Langue
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($texteSiteLangue, ['route' => ['texteSiteLangues.update', $texteSiteLangue->id], 'method' => 'patch']) !!}

                        @include('texte_site_langues.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection