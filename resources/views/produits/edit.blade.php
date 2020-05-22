@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Produit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($produit, ['route' => ['produits.update', $produit->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('produits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection