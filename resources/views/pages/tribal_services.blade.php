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
    .cursor-pointer:hover{
        cursor: pointer;
    }
</style>
    
<section id="blog" class="pricing">
    
    <div class="container">
        <div class="row">
            @foreach($downloads as $download)
            <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12 blog-item ">
                <div class="header bg_standard2">
                    <h6 class="Times-New-text black title">{!! $download->title !!}</h6>
                    <h6 class="Times-New-text black sub-title">{!! $download->subtitle !!}</h6>
                </div>
                <div class="body bg_standard2">
                    <p class="Times-New-text white">
                        {!! $download->description !!}
                    </p>
                </div>
                <div class="footer bg_standard2 white Times-New-text center">
                    
                    @if($download->auth)
                        <span class="cursor-pointer download-btn2" data-toggle="modal" data-target="#exampleModal"
                              data-id="{!! $download->id !!}">Download</span>
                    
                    @else
                        <a href="{!! $download->getLink() !!}">
                            <span class="cursor-pointer" style="color: white;">Downlaod</span>
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
            
            
        </div>



        @include('feed_back.feedbackForm')





    </div>
</section>
            
        
        
      
@if(isset($downloads) && $downloads->count() > 0 && $downloads[0]->auth)

	@include('pages.modal_information')


@endif




@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        $('.download-btn2').click(function(){
            var id = $(this).data('id');
            $("#downdload-field").val(id);
            //downdload-field
        });
        
        $('#formparam').on('submit', function(e){
            $('#exampleModal').modal('hide');
        });

    })
</script>
        
        
@endsection








