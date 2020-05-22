@extends('layouts.app')

@section('title')
    Tribal services - {!! config('app.name') !!}
@endsection

@section('bg_class')
    bg_standard
@endsection

@section('slide')


    <div id="carousel-area" class="header-slide">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">


        </div>
    </div>

@endsection



@section('css')


    <style>
        .msg-btn:hover{
            cursor: default !important;
        }


    </style>

@endsection







@section('content')



    <section id="blog" class="contact-bloc">

        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-xs-12 float-left">
                    <h1 class="center">{!! $pageStatic->title !!}</h1>
                </div>

                <div class="col-lg-12 col-md-12 col-xs-12 float-left">
                    {!! $pageStatic->content !!}
                </div>



            </div>
        </div>
    </section>



    @include('pages.modal_phone')

    @include('pages.modal_email')


@endsection



@section('scripts')

    <script>
        $(document).ready(function() {


        })
    </script>


@endsection








