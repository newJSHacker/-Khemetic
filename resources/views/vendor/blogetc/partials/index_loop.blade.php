{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

<!--div class="" style='max-width:600px; margin: 50px auto; background: #fffbea;border-radius:3px;padding:0;' >

    <div class='text-center'>
    <?=$post->image_tag("medium", true, ''); ?>
        </div>
    <div style='padding:10px;'>
    <h3 class=''><a href='{{$post->url()}}'>{{$post->title}}</a></h3>
    <h5 class=''>{{$post->subtitle}}</h5>

    <p>{!! $post->generate_introduction(400) !!}</p>

    <div class='text-center'>
        <a href="{{$post->url()}}" class="btn btn-primary">View Post</a>
    </div>
        </div>
</div-->

<div class="col-lg-3 col-md-4 col-xs-12 blog-item float-left">
                
    <div class="blog-item-wrapper bg_standard">
        <div class="blog-item-img">
            <a href="{{$post->url()}}">
                <?=$post->image_tag("medium", true, ''); ?>
            </a>
        </div>
        <div class="blog-item-text">
            <h6 class="white center">{{$post->title}}</h6>
            <p class="white center">
                {!! $post->generate_introduction(200) !!}
            </p>
        </div>
    </div>
                    
</div>