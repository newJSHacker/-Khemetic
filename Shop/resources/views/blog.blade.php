<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include('includes/inc_heads')
<body >
<div class="se-pre-con"></div>
<div class="main">
 
  <!-- HEADER START -->
  @include('includes/inc_header')
  <!-- HEADER END --> 
  
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Blog</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="/">Home</a>/</li>
            <li><span>Blog</span></li>
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
        <div class="col-xl-10 col-lg-9 col-xl-80per">
          <div class="blog-listing">
            <div class="row">
              @foreach($post as $posts)
              <div class="col-xl-6 col-12">
                <div class="blog-item">
                  <div style="max-height:500px;" class="blog-media mb-30" >
                    <img  src="{{$posts->image}}" alt="Stylexpo">
                    <div class="blog-effect"></div> 
                    <a href="{{route('single-blog',$posts->id) }}" title="Click For Read More" class="read">&nbsp;</a>
                  </div>
                  <div class="blog-detail">
                    {{--<span class="post-date">01 jan 2017</span>--}}
                    <h3><a href="{{route('single-blog',$posts->id) }}">{{$posts->title}}</a></h3>
                    <p>{{ str_limit($posts->description,150) }}</p>
                    <hr>
                    <div class="post-info">
                      {{--<ul>--}}
                        {{--<li><span>By</span><a href="#"> cormon jons</a></li>--}}
                        {{--<li><a href="#">(5) comments</a></li>--}}
                      {{--</ul>--}}
                    </div>
                  </div>
                </div>
              </div>
                @endforeach


            </div>
            <div class="row">
              <div class="col-12">
                <div class="pagination-bar">
                  <ul>
                    {{$post->links()}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-xl-20per">
          <div class="sidebar-block">
            <div class="sidebar-box mb-40 mb-xs-15">
              {{--<form>--}}
                {{--<div class="search-box">--}}
                  {{--<input type="text" placeholder="Search here..." class="input-text">--}}
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
                  {{--<li><a href="#">Print</a></li>--}}
                  {{--<li><a href="#">Neutral</a></li>--}}
                  {{--<li><a href="#">Tan</a></li>--}}
                  {{--<li><a href="#">Purple</a></li>--}}
                  {{--<li><a href="#">Red</a></li>--}}
                  {{--<li><a href="#">Yellow</a></li>--}}
                  {{--<li><a href="#">Blue</a></li>--}}
                  {{--<li><a href="#">White</a></li>--}}
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
                    <div class="pro-media"> <a href="{{route('single-blog',$ps->id) }}"><img alt="" src="{{$ps->image}}"></a> </div>
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

  <!-- FOOTER START -->
  @include ("includes/inc_footer")
  <!-- FOOTER END -->  
</div>
@include ("includes/inc_scripts")

</body>


</html>
