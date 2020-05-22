
<!DOCTYPE html>
@php
    if(session()->has('lang')){
        app()->setLocale(session('lang'));
    }
@endphp
<html lang="{!! app()->getLocale() !!}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="Khemetic tribal, Khemetic blog, Khemetic content">
        <meta name="description" content="Optional package for Laravel to generate social share links." />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        @yield('meta')
        <meta name="author" content="Grayrids">

        <link rel="icon" type="image/png" href="{!! asset('img/logo.png') !!}"/>


        <title>
            @yield('title') - {{ isset($title) ? $title : config('app.name', 'KHEMETIC SHURSH') }}
        </title>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" />
        <link rel="stylesheet" href="{!! asset('css/line-icons.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl.theme.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/nivo-lightbox.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/magnific-popup.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/animate.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/color-switcher.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/menu_sideslide.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/main.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/responsive.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

        @yield('css')

        <style>
            .blogetc_container{
                margin-top: 100px;
            }
            .blog-item-img a{
                max-width: 100%;
            }
            .blog-item-img a img{
                max-width: 100%;
            }

        </style>
        <style>
            .d-block.mx-auto {
                width: 100%;
            }
            .blog_title{
                font-size: 1.8em;
                margin-top: 70px;
            }
            .blog_subtitle{
                font-size: 1em;
            }
        </style>

        <style>

            #social-links {
                margin: 0;
                padding: 0;
            }
            #social-links a{
                width: 70px;
            }
            .social-button span.fa {
                display: block!important;
                text-align: center;
                font-size: 1.8em!important;
                padding: 18px 0;
                width: 65px;
                float: left;
                margin-left: 30px;
                color: white;
            }
            .fa-facebook{
                background-color: #3b5998;
            }
            .fa-twitter{
                background-color: #00aced;
            }
            .fa-google-plus{
                background-color: #dd4b39;
            }
            .fa-linkedin{
                background-color: #007bb6;
            }
            .fa-whatsapp{
                background-color: #1ebea5;
            }
        </style>

    </head>
    <body @yield('body_class')>
        @yield('after_body')
        <header id="slider-area">
            <nav class="navbar navbar-expand-md fixed-top scrolling-navbar @yield('bg_class', 'bg_standard')">
                <div class="container">
                    <img src="{!! asset('img/logo.png') !!}" class="logo" >
                    <center>
                        <a class="navbar-brand white white_hover" href="{!! url('/') !!}">
                            <b><span class="site-name">KHEMETIC</span> <br>
                            <small>Tribal</small></b>
                        </a>
                    </center>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('/') !!}">{!! Lg::ts('HOME') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('membership') !!}">{!! Lg::ts('TRIBAL_MEMBERSHIP') !!}</a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $url = url('/');
                                    $url = explode('public', $url);
                                    $url = $url[0].'/Shop/public';

                                @endphp
                                <a class="nav-link page-scroll nav-menu" href="{!! $url !!}">{!! Lg::ts('SHOP') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('tribal-services') !!}">{!! Lg::ts('TRIBAL_SERVICE') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('calendar') !!}">{!! Lg::ts('CALENDAR') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('contact-us') !!}">{!! Lg::ts('CONTACT_US') !!}</a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $url_school = str_replace('public', '', url('/'))."/School/public/login";
                                @endphp
                                <a class="nav-link page-scroll nav-menu" href="{!! $url_school !!}">{!! Lg::ts('school') !!}</a>
                            </li>
                            <li class="nav-item"> <!--  donate-btn -->
                                <a class="nav-link page-scroll nav-menu" href="{!! url('donate') !!}">{!! Lg::ts('DONATE') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            @yield('slide')

        </header>

        @yield('content')



        @include('layouts.footer')





        @include('sweetalert::alert')


        <script src="{!! asset('js/jquery-min.js') !!}"></script>
        <script src="{{ asset('js/share.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

        <script src="{!! asset('js/popper.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/owl.carousel.js') !!}"></script>
        <script>
            $(document).ready(function() {
                $('.carousel').carousel();

                $(".inputmask").inputmask("9-999-999-9999");


                /*$('#bloc-info-chat').hide();
                $('#window_info').show();
                $('#chat-box').addClass('hidden-box');*/

                /*$('#window_info').hide();
                $('#close-chat-box').click(function(e){
                    //alert();
                    if($('#bloc-info-chat').is(":hidden")){
                        $('#bloc-info-chat').show(500);
                        $('#window_info').hide(500);
                        $('#chat-box').removeClass('hidden-box');
                    }else{
                        $('#bloc-info-chat').hide(500);
                        $('#window_info').show(500);
                        $('#chat-box').addClass('hidden-box');
                    }

                });



                $('#bloc-info-chat').hide(500);
                $('#window_info').show(500);
                $('#chat-box').addClass('hidden-box');*/



                $('#subscrition-form').submit(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    //alert();
                    //return false;
                    subscrib();
                });

            });




            function subscrib(){
                var url = $('#subscrition-form').prop('action');
                //alert(url);
                $('#sub_btn').removeClass('invisible');
                $.post( url,  $('#subscrition-form').serialize())
                .done(function() {
                    $('#sub_btn').addClass('invisible');
                    alert( "{!! Lg::ts('msg_email') !!}" );
                })
                .fail(function() {
                    console.log( "some error" );
                })
                .always(function() {
                    $('#sub_btn').addClass('invisible');
                    console.log( "finished" );
                });

            }


        </script>


        @yield('scripts')

    </body>
</html>

