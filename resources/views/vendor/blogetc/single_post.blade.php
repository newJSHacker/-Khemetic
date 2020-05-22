@extends("layouts.app",['title'=>$post->gen_seo_title()])
@section("content")


    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

    <div class='container'>
    <div class='row'>
        <div class='col-sm-12 col-md-1 col-lg-1'>&nbsp;</div>
        <div class='col-sm-12 col-md-10 col-lg-10'>

            @include("blogetc::partials.show_errors")
            @include("blogetc::partials.full_post_details")

            <div class="col-sm-12" id="social-links">
                <p><br>&nbsp;</p>
                <p style="text-align: center;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$post->url()}}" class="social-button " id="">
                        <span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{$post->url()}}" class="social-button " id="">
                        <span class="fa fa-twitter"></span></a>
                    <a href="https://plus.google.com/share?url={{$post->url()}}" class="social-button " id="">
                        <span class="fa fa-google-plus"></span></a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{$post->url()}}&amp;title=my share text&amp;summary={{$post->title}}" class="social-button " id="">
                        <span class="fa fa-linkedin"></span></a>
                    <a href="https://wa.me/?text={{$post->url()}}" class="social-button " id="">
                        <span class="fa fa-whatsapp"></span></a>
                </p>
                <p><br>&nbsp;</p>

            </div>

            @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
                <div class="" id='maincommentscontainer'>
                    <h2 class='text-center' id='blogetccomments'>Comments</h2>
                    @include("blogetc::partials.show_comments")
                </div>
            @else
                {{--Comments are disabled--}}
            @endif

        </div>
        <div class='col-sm-12 col-md-1 col-lg-1'>&nbsp;</div>
    </div>
    </div>

@endsection
