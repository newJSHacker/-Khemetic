<div class="col-xl-2 col-lg-3 col-xl-20per mt-30 left-side float-none-sm ">
          <div class="sidebar-block open1">

            <div class="sidebar-box sub-banner left-banner  mb-30 mb-sm-15 d-none d-lg-block"> 
              <a href="#"> 
                <img src="images/left-banner.jpg" alt="Beaox"> 
              </a> 
            </div>

            <!--Testimonial Block Start -->
            {{-- <div class="sidebar-box sidebar-testimonial client-bg mb-30 mb-sm-15"><span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Testimonial</h3>
              </div>
              <div class="client-main  sidebar-contant">
                <div class="client-inner align-center">
                  <div id="client" class="owl-carousel">
                    <div class="item client-detail">
                      <div class="quote right-side">
                        <div class="quote1-img">
                          <img src="images/quote1.png" alt="Beaox">
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the Ipsum is that it has a mtters 
                        </p>
                        <div class="quote2-img">
                          <img src="images/quote2.png" alt="Beaox">
                        </div>
                      </div>
                      <div class="client-img left-side ">
                        <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                        <img alt="Beaox" src="images/testimonial_img1.jpg"> 
                      </div>
                    </div>
                    <div class="item client-detail">
                      <div class="quote right-side">
                        <div class="quote1-img">
                          <img src="images/quote1.png" alt="Beaox">
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the Ipsum is that it has a mtters 
                        </p>
                        <div class="quote2-img">
                          <img src="images/quote2.png" alt="Beaox">
                        </div>
                      </div>
                      <div class="client-img left-side ">
                        <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                        <img alt="Beaox" src="images/testimonial_img2.jpg"> 
                      </div>
                    </div>
                    <div class="item client-detail">
                      <div class="quote right-side">
                        <div class="quote1-img">
                          <img src="images/quote1.png" alt="Beaox">
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the Ipsum is that it has a mtters 
                        </p>
                        <div class="quote2-img">
                          <img src="images/quote2.png" alt="Beaox">
                        </div>
                      </div>
                      <div class="client-img left-side ">
                        <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                        <img alt="Beaox" src="images/testimonial_img3.jpg"> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <!--Testimonial Block End -->
   <!--<div class="sidebar-box d-none d-lg-block  mb-30">-->
   <!--           <div class="video-bg">-->
   <!--             <div class="video-delail align-center">-->
   <!--               <img src="images/video-bg.jpg" alt="Beaox">-->
   <!--               <div class="video-delail-inner">-->
   <!--                 <div class="video-block">-->
   <!--                   <a class="popup-youtube" href="https://player.vimeo.com/video/19228643">-->
   <!--                     <img alt="Beaox" src="images/you-tube-icon.png" draggable="false">-->
   <!--                   </a>-->
   <!--                 </div>-->
   <!--                 <div class="video-subtitle">Must See Video </div>-->
   <!--               </div>-->
   <!--             </div>-->
   <!--           </div>-->
   <!--         </div>-->
            <!--Blog Block Start -->
            <div class="sidebar-box mb-30 mb-sm-0"><span class="opener plus"></span>
              <div class="">
                <div class="sidebar-title">
                  <h3>Recent Posts</h3>
                </div>
                <div class="sidebar-contant">
                  <div id="blog"  class="owl-carousel">
                  @foreach(App\posts::limit(3)->orderBy('id','desc')->get() as $p)
                    <div class="item">
                      <div class="blog-item">
                        <div class="">
                          <div class="blog-media"> 
                            <img src="{{$p->image}}" alt="Beaox">
                            <div class="blog-effect"></div>
                            <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                            <div class="effect"></div>  
                          </div>
                        </div>
                        <div class="">
                          <div class="blog-detail mt-30"> 
                            <div class="blog-title"><a href="{{route('single-blog',$p->id) }}">{{$p->title}}</a></div>
                            <div class="post-info">
                              <p> {{ str_limit($p->description,100) }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!--Blog Block End -->
            <div class="sidebar-box sub-banner left-banner  mb-30 mb-sm-15 d-none d-lg-block"> 
              <a href="#"> 
                <img src="images/left-banner01.jpg" alt="Beaox"> 
              </a> 
            </div>
          </div>
        </div>