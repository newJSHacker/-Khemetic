@extends('layouts.app')

@section('title')
    {!! config('app.name') !!}
@endsection

@section('bg_class')
bg_standard
@endsection

@section('slide')

<div id="carousel-area" class="header-slide">
    <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <!--div class="carousel-inner" role="listbox">
            <div class="carousel-item carousel-item2 active " >
                <img src="{!! asset('img/bg.jpg') !!}" alt="" class=" ">
                <div class="carousel-caption center transparent">
                    <img src="{!! asset('img/logo.png') !!}" alt="">
                                    
                </div>
            </div>
                            
        </div-->
        
    </div>
</div>

@endsection






@section('content')

    @php

    @endphp

<section id="blog" class="section">
    
    <div class="container">
        <div class="row">
            @foreach(\WebDevEtc\BlogEtc\Models\BlogEtcPost::orderBy("posted_at","desc")->limit(3)->get() as $post)
                <div class="col-lg-3 col-md-4 col-xs-12 blog-item ">
                    <div class="blog-item-wrapper bg_standard">
                        <div class="blog-item-img">
                            <a href="{{$post->url()}}" target="_blank">
                                {!! $post->image_tag("medium", true, ''); !!}
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <a href="{{$post->url()}}" target="_blank">
                                <h6 class="white center">{{$post->title}}</h6>
                            </a>
                            <p class="white center">
                                {!! $post->generate_introduction(40) !!}
                            </p>
                        </div>
                    </div>       
                </div>
            @endforeach
            
            
            
            
        </div>


        @include('feed_back.feedbackForm')



    </div>

    <div class="row">
        <div class="col-sm-12">
            {!! Share::page('http://freelancer.vision-numerique.com/xoheruox/public/')->facebook(); !!}
        </div>
    </div>
</section>
        
        
        



@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        

    })
</script>
        
        
@endsection








