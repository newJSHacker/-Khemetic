<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{!! asset('img/logo.png') !!}"/>

    <title>Home - Khemetic</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

    <style>
        .social-header{
            font-size: 1.3em;
            margin-left: 0.8em;
        }
        .btn-special{
            font-size: 12px;
            background-color: white;
            color: #676767 !important;
        }
        .img-full{
            width: 100%;
        }
        .bg-img{
            background: url({!! asset('img/slide1.jpg') !!});
            background-repeat: no-repeat;
            background-size: cover;
        }
        .pr-6{
            padding-right: 6.5em;
        }
        .btn-special2{
            display: none;
        }
        @media only screen and (max-width: 400px) {
            .social-header{
                font-size: 1em;
                margin-left: 0.4em;
            }
            .pr-6{
                padding-right: 0.5em;
            }
            .nav.d-flex.justify-content-between{

            }
            .btn-special2{
                display: block;
            }
            .btn-special2 .btn{
                width: 40%;
            }
            .btn-special2 .btn1{
                background-color: #343a40!important;
                color: white;
                font-weight: bold;
            }
            .btn-special2 .btn2{
                background-color: #4d0000!important;
                color: white;
                font-weight: bold;
            }
            .navbar-toggler{
                color: white !important;
                margin-left: 67%;
            }
        }
    </style>

</head>

<body>

<div class="container-fluid p-3 pb-5" style="background-color: #4d0000;">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1 center">
                <img src="{!! asset('img/logo.png') !!}" alt="" width="100px">
                <br>
                <span class="text-white">KHEMETIC TRIBAL</span>
            </div>
            <div class="col-4 text-center">
                <!--a class="blog-header-logo text-dark" href="#">Large</a-->
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center pr-6" >
                <a class="text-muted" href="#"><i class="fa fa-instagram social-header text-white" aria-hidden="true"></i></a>
                <a class="text-muted" href="#"><i class="fa fa-facebook-official social-header text-white" aria-hidden="true"></i></a>
                <a class="text-muted" href="#"><i class="fa fa-twitter social-header text-white" aria-hidden="true"></i></a>
                <a class="text-muted" href="#"><i class="fa fa-whatsapp social-header text-white" aria-hidden="true"></i></a>
                <a class="text-muted" href="#"><i class="fa fa-google-plus social-header text-white" aria-hidden="true"></i></a>
                <a class="text-muted" href="#"><i class="fa fa-linkedin-square social-header text-white" aria-hidden="true"></i></a>
                <button class="btn btn-secondary btn-sm social-header btn-special text-white"> Subscribe </button>
            </div>
        </div>
    </header>
</div>
<div class="container" style="margin-top: -55px; padding: 0px !important;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #71170c !important;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            MENU <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        @php
            $url = url('/');
            $url = explode('public', $url);
            $url = $url[0].'/Shop/public';
            //dd($url);
        @endphp

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-white" href="{!! url('/') !!}">{!! Lg::ts('HOME') !!}</a>
                <a class="p-2 text-white" href="{!! url('membership') !!}">{!! Lg::ts('MEMBERSHIP') !!}</a>
                <a class="p-2 text-white" href="{!! $url !!}">{!! Lg::ts('SHOP') !!}</a>
                <a class="p-2 text-white" href="{!! url('tribal-services') !!}">{!! Lg::ts('SERVICE') !!}</a>
                <a class="p-2 text-white" href="{!! url('contact-us') !!}">{!! Lg::ts('CONTACT_US') !!}</a>
                <a class="p-2 text-white" href="{!! url('calendar') !!}">{!! Lg::ts('CALENDAR') !!}</a>
                <a class="p-2 text-white" href="{!! url('donate') !!}">{!! Lg::ts('DONATE') !!}</a>
            </nav>

        </div>
    </nav>


    <div class="text-white bg-dark bg-img" style="height:480px">
        <div class="col-md-12 px-0">
            <a href="{!! route('join-us') !!}" class="btn btn-secondary btn-sm" style="float: right; margin-right: 6em; margin-top: 350px;">
                {!! Lg::ts('JOIN_NOW') !!}
            </a>
        </div>
    </div>

    <div class="row mb-2 btn-special2">
        <center>
            <div class="col-xs-12 mt-3">
                <a href="{!! url('contact-us') !!}">
                    <button class="btn btn-secondary btn-sm btn1">
                        {!! Lg::ts('CONTACT_US') !!}
                    </button>
                </a>
            </div>
            <div class="col-xs-12 mt-1">
                <a href="{!! url('donate') !!}">
                    <button class="btn btn-secondary btn-sm btn2">
                        {!! Lg::ts('DONATE') !!}
                    </button>
                </a>
            </div>
        </center>
    </div>


    <div class="row mb-2 bg-dark" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-6 mt-3">
            <div class="card flex-md-row mb-4 box-shadow h-md-250" style="background-color: transparent; border: none; ">
                <div class="card-body d-flex flex-column align-items-start">

                    <h3 class="mb-0">
                        <a class="text-white" href="#">{!! Lg::ts('home_title_1') !!}</a>
                    </h3>
                    <hr style="border: 1px solid #a1a1a1; width: 100%;">
                    <p class="card-text mb-auto text-white">
                        {!! Lg::ts('home_text_1') !!}
                    </p>
                    <!--a href="#">Continue reading</a-->
                </div>

            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card flex-md-row mb-4 box-shadow h-md-250" style="background-color: transparent; border: none; ">
                <div class="card-body d-flex flex-column align-items-start">

                    <h3 class="mb-0">
                        <a class="text-white" href="#">{!! Lg::ts('home_title_2') !!}</a>
                    </h3>
                    <hr style="border: 1px solid #a1a1a1; width: 100%;">
                    <p class="card-text mb-auto text-white">
                        {!! Lg::ts('home_text_2') !!}
                    </p>
                    <!--a href="#">Continue reading</a-->
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<footer class="blog-footer"
        style="
        bottom: 0px;
        position: fixed;
        background-color: black;
        width: 95%;
        padding-top: 20px;
        padding-left: 40px;">
    <p class="text-white">
        Copyright 2018 &copy; <a href="#" class="text-white">KHEMETIC</a>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

</body>
</html>

