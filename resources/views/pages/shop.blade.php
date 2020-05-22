@extends('layouts.app')

@section('title')
    Shop - {!! config('app.name') !!}
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






@section('content')



<!--section id="direct-link" class="redirect-link bg_standard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 center">
                <h6 class="Times-New-text white">
                    FEATURED COLLECTIONS
                </h6>
            </div>
        </div>
    </div>
</section-->
            
            
<!--section id="blog" class="  hidden-sm hidden-xs" style="margin-top : 40px;">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 blog-item ">
                <div class="col-md-12 margin-top-15 center">
                    <span class="featured-title">
                        FEATURED TITLE
                    </span>
                </div>
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i = 1; $j = 1; @endphp
                        @for($i = 1; $i <=   3; $i++)
                        <div class="carousel-item  {!! $i == 1 ? 'active' : '' !!}">
                            @for($j = 1; $j <= 3; $j++)
                            <div class="col-lg-4 col-md-4 col-xs-12 float-left blog-item ">
                                <div class="blog-item-wrapper bg_standard">
                                    <div class="blog-item-img">
                                        <a href="single-post.html">
                                            <img src="img/bg.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-item-text">
                                        <h6 class="white center">ITEM</h6>
                                        <p class="white center">
                                            <button class="btn-deg">
                                                SEE COLLECTIONS
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endfor

                        </div>
                        @endfor
                        
                        <a class="carousel-control-prev prev-design more-up" href="#carouselExampleControls1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next next-design more-up" href="#carouselExampleControls1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-->
  
<!--section id="blog" class=" hidden-md hidden-lg " style="margin-top : 40px;">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 blog-item ">
                <div class="col-md-12 margin-top-15 center">
                    <span class="featured-title">
                        FEATURED TITLE
                    </span>
                </div>
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i = 1; @endphp
                        @for($i = 0; $i < 9; $i++)
                        <div class="carousel-item {!! $i == 1 ? 'active' : '' !!}">
                            <div class="col-xs-12 blog-item ">
                                <div class="blog-item-wrapper bg_standard">
                                    <div class="blog-item-img">
                                        <a href="single-post.html">
                                            <img src="img/bg.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-item-text">
                                        <h6 class="white center">ITEM</h6>
                                        <p class="white center">
                                            <button class="btn-deg">
                                                SEE COLLECTIONS
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        
                    </div>
                    <a class="carousel-control-prev prev-design " href="#carouselExampleControls3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next next-design" href="#carouselExampleControls3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                        
                </div>      
                            
            </div>
                        
        </div>
    </div>
</section-->
             
            
    
    
    
<section id="blog" class=" shop hidden-sm hidden-xs" style="margin-top: 70px;">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 blog-item ">
                <div class="col-md-12 margin-top-15 center">
                    <span class="featured-title">
                        FEATURED TITLE
                    </span>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i = 1; $j = 1; @endphp

                        @foreach($trois as $products)
                        <div class="carousel-item  {!! $i == 1 ? 'active' : '' !!}">
                            @foreach($products as $produit)
                            <div class="col-lg-4 col-md-4 col-xs-12 float-left blog-item">
                                <div class="blog-item-wrapper item-shop">
                                    <div class="blog-item-img">
                                        <a target="_blank" href="{!! $produit->path !!}">
                                            <img src="{{ $produit->image }}" alt="" class="float-left">
                                        </a>
                                        <span class="prix price ">${!! $produit->new_price !!}</span>
                                    </div>
                                    <div class="Times-New-text">
                                        <h6 class="color_standard">{!! $produit->item_description !!}</h6>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                                
                        </div>
                        @endforeach
                        
                                    
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                            
                            
            </div>
                        
        </div>
    </div>
</section>
            
            
   
<section id="blog" class=" shop hidden-md hidden-lg" style="margin-top: 50px;">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 blog-item ">
                <div class="col-md-12 margin-top-15 center">
                    <span class="featured-title">
                        FEATURED TITLE
                    </span>
                </div>
                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        @php
                            $produits = $produits->products;
                        @endphp

                        @foreach($produits as $produit)
                        <div class="carousel-item {!! $i == 1 ? 'active' : '' !!}">
                            <div class="col-xs-12 float-left blog-item">
                                <div class="blog-item-wrapper item-shop">
                                    <div class="blog-item-img">
                                        <a target="_blank" href="{{ $produit->path }}">
                                            <img src="{{$produit->image}}" alt="" class="float-left">
                                        </a>
                                        <span class="prix price ">$ {{$produit->new_price}}</span>
                                    </div>
                                    <div class="Times-New-text">
                                        <h6 class="color_standard">{{$produit->item_description}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php $i++; @endphp
                        @endforeach
                        
                    </div>
                    <a class="carousel-control-prev prev-design" href="#carouselExampleControls2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next next-design" href="#carouselExampleControls2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                        
                </div>      
                            
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




@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        

    })
</script>
        
        
@endsection








