<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include('includes/inc_heads')
<body >
<div class="se-pre-con"></div>
<div class="main contact-main"> 

  <!-- HEADER START -->
  @include('includes/inc_header')
  <!-- HEADER END -->   
  
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail  center-xs">
        <h1 class="banner-title">Contact</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="/">Home</a>/</li>
            <li><span>Contact</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  
  <!-- CONTAIN START ptb-95-->
  <section class="pt-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="map">
            <div class="map-part">
              <div id="map" class="map-inner-part"></div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.9905373452234!2d73.04668801472884!3d33.631487352049156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df948455336a35%3A0x91dddcf3b820f3d8!2sLogic+Valley+(Pvt.)+LTD.!5e0!3m2!1sen!2s!4v1550732931310" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-70 client-main align-center">
    <div class="container">
      <div class="contact-info">
        <div class="row m-0">
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-phone-icon"></div>
              <span><b>Tel</b></span>
              <p>(+92) 51 831 4503</p>
            </div>
          </div>
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-mail-icon"></div>
              <span><b>Mail</b></span>
              <p>info@logic-valley.com </p>
            </div>
          </div>
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-open-icon"></div>
              <span><b>Open</b></span>
              <p>Mon – Sat: 9:00 – 18:00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="heading-part mb-30">
            <h2 class="main_title  heading"><span>Leave a message!</span></h2>
          </div>
        </div>
      </div>
      <div class="main-form">
        <form method="POST" action="{{route('contact-us')}}"  name="contactform">
             {{csrf_field()}}
          <div class="row">
            <div class="col-md-4 mb-30">
              <input type="text" required placeholder="Name" name="visitor_name">
            </div>
            <div class="col-md-4 mb-30">
            <input type="email" required placeholder="Email" name="visitor_email">
            </div>
            <!--<div class="col-md-4 mb-30">-->
            <!--  <input type="text" required placeholder="Website" name="visitor_website">-->
            <!--</div>-->
            <div class="col-12 mb-30">
              <textarea required placeholder="Message" rows="3" cols="30" name="visitor_message"></textarea>
            </div>
            <div class="col-12">
              <div class="align-center">
                <button type="submit" name="submit" class="btn btn-color">Submit</button>
              </div>
            </div>
          </div>
        </form>
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
