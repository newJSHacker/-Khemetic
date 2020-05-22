@extends('layouts.app_old')

@section('content')
    <section class="content-header">
        <h1>
            Media
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'media.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('media.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection







@section('scripts')

    <script>

        $(document).ready(function(){
            $('#to_add_associete_media').click(function (e){
                addNewAssocieteMedia();
            });
        });


        function addNewAssocieteMedia(){
            var newadd = $('#model_form_media_associer').html();
            $('#add_relieted_media').before(newadd);


        }
    </script>

@endsection
