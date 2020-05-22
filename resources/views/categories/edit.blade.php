@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Categorie
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categorie, ['route' => ['categories.update', $categorie->id], 'method' => 'patch']) !!}

                        @include('categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
