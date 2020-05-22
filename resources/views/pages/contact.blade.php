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
    
    <div class="container">
        <div class="row contact">
            <div class="col-lg-3 col-md-1 col-xs-12 float-left">
                &nbsp;
            </div>
            <div class="col-lg-6 col-md-10 col-xs-12 float-left">
                <div class="col-lg-12 col-md-12 col-xs-12 float-left">
                    <div class="col-lg-3 col-md-3 col-xs-12 float-left">
                        &nbsp;
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 float-left">
                        <img src="img/logo.png" class="logo_contact" >
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 float-left">
                        &nbsp;
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 float-left blog-item ">

                    @include('flash::message')

                    <div class="col-md-12">

                        <button class="btn-form border-radius"
                                data-toggle="modal" data-target="#ModalPhoneContact">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {!! Lg::ts('Call_Us') !!}
                        </button>
                    </div>
                    <div class="col-md-12">
                        <button class="btn-form msg-btn" >
                            <i class="fa fa-commenting-o" aria-hidden="true"></i>
                            {!! Lg::ts('Message_Us') !!}
                        </button>
                    </div>


                    <form id="contactForm" action="{!! route('contacts.store') !!}" method="post">
                        @csrf
                        <input type="hidden" name="contact_page" value="1">
                        <div class="row">
                            <!--div class="col-md-12">
                                <a href="#">
                                    <button class="btn-form border-radius">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                        Emails Us
                                    </button>
                                </a>
                            </div-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">{!! Lg::ts('user_info_Email_address') !!}</label>
                                    <input type="email" required="" class="form-control" name="email" placeholder="{!! Lg::ts('user_info_Enter_your_email') !!}l">
                                </div>
                                <div class="form-group">
                                    <label for="tel">{!! Lg::ts('user_info_Phone') !!}</label>
                                    <input type="tel" required="" class="form-control" name="tel" placeholder="{!! Lg::ts('user_info_your_phone_number') !!}">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Your Message" rows="7" data-error="Write your message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 center">
                                    <button class="send-btn" id="submit" type="submit">
                                        {!! Lg::ts('Send') !!} </button>
                                </div>
                            </div>
                                        
                        </div>
                        <p><br></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-1 col-xs-12 float-left">
                &nbsp;
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








