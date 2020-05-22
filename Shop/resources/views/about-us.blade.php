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
        <h1 class="banner-title">About us</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="/">Home</a>/</li>
            <li><span>About us</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->  
  
  <!-- CONTAIN START ptb-95-->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-12">
              <h3>LV Store</h3>
              <p>LV store is one stop fashion solution provider. We offer clothing, fashion gadgets like glasses, Artificial Jewelary and stitching services. Upload a design of your own and get stitched dress at your door step. </p>
              <p>
                  LV Store was started in 2010 with a small concept of stitching center. Now we have clientele all over the world including European and Middle Eastern countries. Quality of our work is our asset and we are committed to deliver more than expectations of our customers.
              </p>
            </div>
          </div>
          <div class="about-detail mt-40">
            <div class="row">
              <div class="col-12">
                <div class="heading-part mb-30">
                  <h2 class="main_title  heading"><span>It's LV Store For You!!</span></h2>
                </div>
              </div>
              <div class="col-sm-5 mb-xs-30">
                <div class="image-part center-xs"> <img alt="Stylexpo" src="images/about-sub.jpg"> </div>
              </div>
              <div class="col-sm-7">
                <div class="heading-part-desc align_left center-md">
                  <p>Some are giving extra due to gold plating it means they are trying to divert your attention from quality, but LV store garneted best quality services with market competitive prices including something extra for goodwill with customer.</p>
                </div>
                <p>LV Store is one of the first online stitching company provide services to maintain profile of all family members. We are working on 4A slogan, Anyone, Anything,  Anytime , Anywhere, Any one can purchase anything at any time and deliver it anywhere to their loved ones.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="responsive-part">
            <div class="row">
              <div class="col-sm-12 partner-detail-main">
                <div class="heading-part mb-30">
                  <h2 class="main_title  heading"><span>Brands We Are Dealing In</span></h2>
                </div>
                <p>We are dealing in almost every brand, Replicas of Maria B, Asim Jofa, Zara, Tania and many more. Some of brands we are dealing in is as following…</p>
              </div>
              <div class="col-sm-12">
                <div class="partner-block mb-sm-30 light-gray-bg">
                  <ul>
                      @foreach($brands as $b)
                    <li><span><img src="../{{$b->brand_logo}}" alt="Stylexpo"></span></li>
                    @endforeach
                    <!--<li><span><img src="images/brand2.png" alt="Stylexpo"></span></li>-->
                    <!--<li><span><img src="images/brand3.png" alt="Stylexpo"></span></li>-->
                    <!--<li><span><img src="images/brand4.png" alt="Stylexpo"></span></li>-->
                    <!--<li class="owner-logo ">-->
                    <!--  <span><img src="images/owner-logo.png" alt="Stylexpo"></span>-->
                    <!--</li>-->
                    <!--<li><span><img src="images/brand5.png" alt="Stylexpo"></span></li>-->
                    <!--<li><span><img src="images/brand6.png" alt="Stylexpo"></span></li>-->
                    <!--<li><span><img src="images/brand7.png" alt="Stylexpo"></span></li>-->
                    <!--<li><span><img src="images/brand8.png" alt="Stylexpo"></span></li>-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 


  <!-- FOOTER START -->
@include('includes/inc_footer')
  <!-- FOOTER END -->  
</div>

@include('includes/inc_scripts')
</body>


</html>
