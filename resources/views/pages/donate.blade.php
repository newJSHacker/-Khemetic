@extends('layouts.app')

@section('title')
    Donate - {!! config('app.name') !!}
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

<style>
    .sizing{
        width: 150px;
    }

</style>

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
                        </div>

                    </form>

                    <div class="row">
                            <!--div class="col-md-12 center">
                                <p><br></p>
                                <a href="#">
                                    <button class="btn-form-orange border-radius">
                                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i> 
                                        {!! Lg::ts('Donate_Now') !!}
                                    </button>
                                </a>
                            </div-->
                            
                            <div class="col-md-12 center">
                                <!--form target="paypal"  action="https://www.paypal.com/cgi-bin/webscr" method="post">

                                    <input type="hidden" name="cmd" value="_s-xclick" />
                                    <input type="hidden" name="hosted_button_id" value="PKVLNMGZJRR4S" />
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif"
                                           border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                                </form-->
                                <a href=" https://paypal.me/pools/campaign/112371230821628812">
                                    <img src="{!! asset('img/paypal2.png') !!}" class=""
                                        style="width: 200px;">
                                </a>
                            </div>
                            
                            <div class="col-md-12 center">
                                <p><br></p>
                                <p>
                                <div class="col-sm-12" id="social-links">
                                    <p style="text-align: center;">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={!! route('donate') !!}" class="social-button " id="">
                                                <span class="fa fa-facebook"></span></a>
                                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={!! route('donate') !!}" class="social-button " id="">
                                                <span class="fa fa-twitter"></span></a>
                                        <a href="https://plus.google.com/share?url={!! url('/') !!}" class="social-button " id="">
                                                <span class="fa fa-google-plus"></span></a>
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={!! route('donate') !!}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id="">
                                                <span class="fa fa-linkedin"></span></a>
                                        <a href="https://wa.me/?text={!! route('donate') !!}" class="social-button " id="">
                                                <span class="fa fa-whatsapp"></span></a>
                                    </p>

                                </div>

                                </p>
                                <!--p>
                                    <a href="mailto:{!! config('mail.admin.address') !!}">
                                        <button class="btn-form border-radius sizing">
                                            <i class="fa fa-share" aria-hidden="true"></i>
                                            {!! Lg::ts('Share') !!}
                                        </button>
                                    </a>
                                </p-->
                            </div>
                            
                                        
                            
                                        
                        </div>
                        <p><br></p>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-xs-12 float-left">
                &nbsp;
            </div>
                        
                        
        </div>


    @include('feed_back.feedbackForm')

    <p><br>&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;</p>

    </div>
</section>
            
                   
        
        



@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        

    })
</script>
        
        
@endsection








