<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
@include('includes/inc_head')
<body >
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
    @include('includes/inc_header')

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Single-blog</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><a href="{{route('blog')}}">Blog</a>/</li>
                        <li><span>Single-blog</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($postss as $p)
                        <div class="col-12 mb-60">
                            <div class="blog-media mb-30">
                                <img src="../{{$p->image}}" alt="blogs">
                            </div>
                            <div class="blog-detail ">
                                <div class="post-info">
                                    {{--<ul>--}}
                                        {{--<li><span class="post-date">03 jan 2018</span></li>--}}
                                        {{--<li><span>By</span><a href="#"> cormon jons</a></li>--}}
                                    {{--</ul>--}}
                                </div>
                                <h3>{{$p->title}}</h3>
                                <p>{{$p->description}}</p>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="sidebar-block">
                        <div class="sidebar-box mb-40 mb-xs-15">
                            {{--<form>--}}
                                {{--<div class="search-box">--}}
                                    {{--<input type="text" placeholder="Search entire store here..." class="input-text">--}}
                                    {{--<button class="search-btn"></button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                        <div class="sidebar-box listing-box mb-40 mb-xs-15"> <span class="opener plus"></span>
                            <div class="sidebar-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="sidebar-contant">
                                <ul>
                                      @foreach(App\item_categories::where('category_parent_category','!=', 0)->get() as $ca)
                  <li><a href="{{route('shopp',$ca->category_name) }}">{{$ca->category_name}}</a></li>
                 @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-box mb-40 mb-xs-15"> <span class="opener plus"></span>
                            {{--<div class="sidebar-title">--}}
                                {{--<h3>Tags</h3>--}}
                            {{--</div>--}}
                            {{--<div class="sidebar-contant">--}}
                                {{--<ul class="tagcloud">--}}
                                    {{--<li><a href="#">Orange</a></li>--}}
                                    {{--<li><a href="#">Neutral</a></li>--}}
                                    {{--<li><a href="#">Print</a></li>--}}
                                    {{--<li><a href="#">Tan</a></li>--}}
                                    {{--<li><a href="#">Purple</a></li>--}}
                                    {{--<li><a href="#">Yellow</a></li>--}}
                                    {{--<li><a href="#">White</a></li>--}}
                                    {{--<li><a href="#">Metallic</a></li>--}}
                                    {{--<li><a href="#">Red</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                        <div class="sidebar-box sidebar-item sidebar-item-wide"> <span class="opener plus"></span>
                            <div class="sidebar-title">
                                <h3>Recent Post</h3>
                            </div>
                            <div class="sidebar-contant">
                                  <ul>
                  @foreach($pst as $ps)
                  <li>
                    <div class="pro-media"> <a href="{{route('single-blog',$ps->id) }}"><img alt="" src="../{{$ps->image}}"></a> </div>
                    <div class="pro-detail-info"> <a href="{{route('single-blog',$ps->id) }}">{{$ps->title}}</a>
                      {{--<div class="post-info">jul 11, 2017</div>--}}
                    </div>
                  </li>
                  @endforeach

                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAINER END -->
    @include ("includes/inc_footer")
</div>
@include ("includes/inc_scripts")
</body>

<!-- Mirrored from aaryaweb.info/html/stylexpo/stx004/single-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Oct 2018 05:10:19 GMT -->
</html>
