@extends('layouts.app')

@section('title')
    Paypal - {!! config('app.name') !!}
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

<link rel="stylesheet" href="{!! asset('css/customRadioCheckbox.css') !!}">

@endsection


@section('content')



<section id="blog" class="contact-bloc donate">
    
    <div class="container">
        <div class="row contact">
            <div class="col-lg-1 col-md-1 col-xs-12 float-left">
                &nbsp;
            </div>
            <div class="col-lg-10 col-md-10 col-xs-12 float-left">
                <div class="col-lg-12 col-md-12 col-xs-12 float-left">
                    <div class="col-lg-3 col-md-3 col-xs-12 float-left">
                        &nbsp;
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 float-left">
                        <img src="{!! asset('img/logo.png') !!}" class="logo_contact" >
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 float-left">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 float-left blog-item ">
                    <form id="contactForm" class="form">
                        <div class="row">
                            <!--div class="col-md-12">
                                <a href="#">
                                    <button class="btn-form border-radius">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                        Emails Us
                                    </button>
                                </a>
                            </div-->
                            <div class="col-lg-1 col-md-12 col-xs-12 float-left text-donate" >
                                {!! Lg::ts('DONATE') !!}  
                            </div>
                            <div class="col-lg-11 col-md-11 col-xs-12 float-left">
                                @for($i = 1; $i <= 6; $i++)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 float-left">
                                        <div class="inputGroup">
                                            <input {!! $i == 1 ? 'checked' : '' !!} id="radio{!! $i !!}" name="radio" type="radio"/>
                                            <label for="radio{!! $i !!}">${!! $i * 5 !!}.00</label>
                                        </div>
                                    </div>
                                    
                                @endfor
                                
                            </div>
                            
                            <div class="col-12 float-left">
                                &nbsp;
                            </div>
                            <div class="col-lg-1 col-md-12 col-xs-12 float-left text-donate hidden-md hidden-sm hidden-xs" >
                                &nbsp;  
                            </div>
                            <div class="col-lg-11 col-md-11 col-xs-12 float-left">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 float-left">
                                    <div class="inputGroup">
                                        <input id="radio7" name="radio" type="radio"/>
                                        <label for="radio7">{!! Lg::ts('Enter_Amount') !!} : </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <input type="text" name="amount" class="form-control" placeholder="$0.00">
                                        
                                    </div>
                                </div>
                            
                            </div>
                            <div class="col-md-12 center">
                                <p><br></p>
                                <a href="#">
                                    <button class="btn-form-orange border-radius">
                                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i> 
                                        {!! Lg::ts('Donate_Now') !!}
                                    </button>
                                </a>
                            </div>
                            
                            <div class="col-md-12 center">
                                <a href="{!! route('paypal') !!}">
                                    <img src="{!! asset('img/paypal2.png') !!}" class="logo" 
                                        style="width: 200px;">
                                </a>
                            </div>
                            
                            <div class="col-md-12 center">
                                <p><br></p>
                                <a href="#">
                                    <button class="btn-form border-radius">
                                        <i class="fa fa-share" aria-hidden="true"></i> 
                                        {!! Lg::ts('Share') !!} 
                                    </button>
                                </a>
                            </div>
                            
                                        
                            
                                        
                        </div>
                        <p><br></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-xs-12 float-left">
                &nbsp;
            </div>
                        
                        
        </div>


        @include('feed_back.feedbackForm')


    </div>
</section>
            
                   
        
        



@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        

    })
</script>
        
        
@endsection








