@extends('layouts.app')

@section('title')
    Membership - {!! config('app.name') !!}
@endsection

@section('bg_class')
special bg_standard
@endsection

@section('slide')

<div id="carousel-area" class="header-slide">
    <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <!--div class="carousel-inner" role="listbox">
            <div class="carousel-item carousel-item2 active white_bg" >
                <img src="img/bg.jpg" alt="" class="alpha-min ">
                <div class="carousel-caption center transparent">
                    <img src="img/logo.png" alt="">
                                    
                </div>
            </div>
                            
        </div-->
                        
    </div>
</div>

@endsection






@section('content')

<style>
    .form-control {
        width: 100%;
        margin-bottom: 20px;
        padding: 7px 30px;
        font-size: 14px;
        border-radius: 10px;
        border: 1px solid #6969692b;
        background: #ffffff;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
    }
</style>

<section id="direct-link" class="redirect-link special bg_standard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 center">
                <h6 class="Times-New-text white">
                    {!! Lg::ts('KHEMETIC_CHURCH_MEMBERSHIP_INFORMATION') !!}
                </h6>
            </div>
        </div>
    </div>
</section>
            
<section class="redirect-link bg_deg1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 center">
                <h6 class="Times-New-text color_standard">
                    {!! Lg::ts('application_member_ship') !!}
                </h6>
                <p class="Times-New-text">
                    {!! Lg::ts('definition') !!}<br>

                    {!! Lg::ts('membership_1') !!}<br>
                    {!! Lg::ts('membership_2') !!}
                </p>
            </div>
        </div>
    </div>
</section>
<section class="redirect-link bg_deg2" style="background-image: url({!! Lg::getBackground(1) !!});">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 center">
                @if(!isset($downloads))
                    <a href="#">
                        <button class="download-btn special bg_standard white Times-New-text">
                            {!! Lg::ts('Downlaod') !!}
                        </button>
                    </a>
                @elseif(isset($downloads) && $downloads->count() > 0 && $downloads[0]->auth)
                    <a href="#">
                        <button class="download-btn special bg_standard white Times-New-text"
                                data-toggle="modal" data-target="#exampleModal">
                            {!! Lg::ts('Downlaod') !!}
                        </button>
                    </a>
                @else
                    <a href="{!! $downloads->getLink() !!}">
                        <button class="download-btn special bg_standard white Times-New-text">
                            {!! Lg::ts('Downlaod') !!}
                        </button>
                    </a>
                @endif
            </div>
        </div>



    </div>
</section>

<section>

    <div class="container">

        @include('feed_back.feedbackForm')

        <p><br>&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;</p>

    </div>
</section>



@if(isset($downloads) && $downloads->count() > 0 && $downloads[0]->auth)

	@include('pages.modal_information')

@endif



@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        @if(isset($no_param) && $no_param == 1)
            $('#exampleModal').modal('show');
        
            $('#formparam').on('submit', function(e){
                $('#exampleModal').modal('hide');
            });
            
        @endif
        

    })
</script>
        
        
@endsection








