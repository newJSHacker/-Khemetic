
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Grayrids">
        
        <link rel="icon" type="image/png" href="img/logo.png"/>
     
        
        <title>
            @yield('title', 'KHEMETIC SHURSH')
        </title>
        
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
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
        
    </head>
    <body>
        
        <header id="slider-area">
            <nav class="navbar navbar-expand-md fixed-top scrolling-navbar @yield('bg_class', 'bg_standard')">
                <div class="container">
                    <img src="{!! asset('img/logo.png') !!}" class="logo" >
                    <center>
                        <a class="navbar-brand white white_hover" href="index.html">
                            <b><span class="site-name">KHEMETIC</span> <br>
                            <small>CHRUCH</small></b>
                        </a>
                    </center>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('/') !!}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('membership') !!}">KTM/TRIBAL MEMBERSHIP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('shop') !!}">SHOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('tribal-services') !!}">TRIBAL SERVICE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('contact-us') !!}">CONTACT US</a>
                            </li>
                            <li class="nav-item donate-btn">
                                <a class="nav-link page-scroll nav-menu" href="{!! url('donate') !!}">DONATE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            
            @yield('slide')
            
        </header>
        
        @yield('content')
        
        
        
        @include('layouts.footer')
        
        
        
        
        
        
        <script src="{!! asset('js/jquery-min.js') !!}"></script>
        <script src="{!! asset('js/popper.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/owl.carousel.js') !!}"></script>
        <script>
            $(document).ready(function() {
                $('.carousel').carousel();
                
                /*$('#bloc-info-chat').hide();
                $('#window_info').show();
                $('#chat-box').addClass('hidden-box');*/
                $('#window_info').hide();
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
                
            })
        </script>

        @include('sweetalert::alert')

        @yield('scripts')
        
    </body>
</html>

