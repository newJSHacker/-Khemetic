<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<style>

/*.zoomable{*/
/*   max-width: 30%;*/

/*     padding-top: 2%;*/
/*  }*/
/*  .zoom{*/
/*   max-width: 180%;*/

/*     padding-top: 2%;*/
/*  }*/
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (Image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Caption of Modal Image (Image Text) - Same Width as the Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation - Zoom in the Modal */
  .modal-content, #caption {
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
</style>
@include('includes/inc_heads')
<body  class="product-page">
<div class="se-pre-con"></div>
<div class="main">

  <!-- HEADER START -->
  @include('includes/inc_header')
  <!-- HEADER END -->

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Product Details</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="/">Home</a>/</li>
            <li><span>Details</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->

  <!-- CONTAIN START -->
  <section class="pt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">

            <div class="col-lg-5 col-md-5 mb-xs-30">
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    @foreach($details as $d)
                    <img  style="max-height:20vw; max-width: 20vw; min-height:20vw; min-width: 20vw;" class="zoom"  src="../{{$d->item_image}}">
                      @endforeach
                  </div>
                  @foreach($det as $de)
                  <div class="carousel-item">

                    <img   style="max-height:20vw; max-width: 20vw; min-height:20vw; min-width: 20vw;" class="zoom" src="../{{$de->item_image}}">

                  </div>

                  @endforeach

                </div>
                </div>
                 <div >
                @foreach($det as $de)
                <img style="display: inline; margin: 5px 5px;" class="zoomable"   src="../{{$de->item_image}}" alt="" width="80" height="40" />
                  @endforeach
                {{--<img style="display: inline; margin: 0 5px;" title="mouseflow_logo" src="https://s3.amazonaws.com/rainleader/assets/mouseflow_logo.png" alt="" width="150" height="50" />--}}
                {{--<img style="display: inline; margin: 0 5px;" title="piiholo_logo" src="https://s3.amazonaws.com/rainleader/assets/piiholo_logo.png" alt="" width="150" height="50" />--}}
              </div>
          <!--    @foreach($details as $d)-->
          <!--    <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native" id="myImg"> <a href="#"><img style="max-height:17vw; max-width: 17vw; min-height:17vw; min-width: 17vw;" src="../{{$d->item_image}}" alt="Stylexpo" style="display:none"></a> @foreach($det as $de) <a href="#"><img style=" max-height:17vw; max-width: 17vw; min-height:17vw; min-width: 17vw;" src="../{{$de->item_image}}" alt="Stylexpo"></a>@endforeach</div>-->
          <!--@endforeach-->
           <!--@foreach($details as $d)-->


           <!--       <img class="zoomable"  style="max-height:17vw; max-width: 17vw; min-height:17vw; min-width: 17vw;" src="../{{$d->item_image}}">-->
           <!--      <div>-->
           <!--       @foreach($det as $de)-->

           <!--         <img class="zoomable" style="" src="../{{$de->item_image}}">-->

           <!--       @endforeach-->
           <!--      </div>-->

              <!--@endforeach-->
            </div>
            <div class="col-lg-7 col-md-7">
              <div class="row">
                <div class="col-12">
                  <div class="product-detail-main">
                    @foreach($itms as $itms)
                    <div class="product-item-details">
                      <h1 class="product-item-name">{{$itms->item_name}}</h1>
                      <div class="rating-summary-block">
                        <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                      </div>
                      <!--<div class="price-box"> <span class="price">{!! config('app.devise_symbole') !!} {{$itms->item_current_selling_price}}</span>  </div>-->
                       <div class="price-box"> <span class="price">{!! config('app.devise_symbole') !!} {{$itms->new_price}}</span>  </div>
                      <div class="product-info-stock-sku">
                        <div>
                          <label>Availability: </label>
                          @if($itms->quantity>0)
                            <span class="info-deta">In stock</span>
                          @endif
                          @if($itms->quantity==0)
                            <span class="info-deta">Out of stock</span>
                          @endif
                        </div>
                        {{--<div>--}}
                          {{--<label>SKU: </label>--}}
                          {{--<span class="info-deta">20MVC-18</span> --}}
                        {{--</div>--}}
                      </div>
                      <p>{{$itms->item_description}} </p>

                      <form method="post" action="{{route('cartt')}}">
                        <input type="hidden" name="item_code" value="{{$itms->item_code}}"/>
                        <input type="hidden" name="total" value="{{$itms->item_current_selling_price}}"/>
                        @endforeach
                        {!! csrf_field() !!}
                      <!--<div class="product-size select-arrow input-box select-dropdown mb-20 mt-30" >-->
                      <!--  <label>Order Type</label>-->
                      <!--  <fieldset>-->
                      <!--    <select  @if (Auth::guard('user')->check())  class="type" @else class="types" @endif style="border: 1px solid #eeeeee;padding: 10px 15px;width: 100% !important;" id="select-by-size" >-->
                            <!--<option selected="selected" value="">Please select</option>-->
                      <!--         <option value="unstitched">Un-Stitched</option>-->
                      <!--           @if (Auth::guard('user')->check())-->
                      <!--      <option  value="stitched" >Stitched</option>-->
                      <!--      @endif-->
                            <!--<option value="unstitched">Un-Stitched</option>-->
                      <!--    </select>-->
                      <!--  </fieldset>-->

                      <!--</div>-->
                         <a href="{{route('login-with-zarna') }}"><div id = "thetext" style="color: red"></div></a>
                      <div class="product-size select-arrow input-box select-dropdown mb-20 mt-30">
                        <label style="display:none" class="x">Measurements</label>
                        <fieldset>
                          <select id="selection"  class="y" name="user_measurment_id" style="display:none;border: 1px solid #eeeeee; padding: 10px 15px; width: 100% !important;" id="select-by-size">
                            <option selected="selected" value="unstitched">Select one</option>


                          </select>
                        </fieldset>

                      </div>
                      <div class="product-color select-arrow input-box select-dropdown mb-20">
                        <label>Color</label>
                        <fieldset>
                          <select class="selectpicker form-control option-drop" name="colors" id="select-by-color">
                            @if (isset($itms->colors) && $itms->colors != "")
                              @foreach(explode(',', $itms->colors) as $info)
                                <option value="{{$info}}">{{$info}}</option>
                              @endforeach
                            @endif
                            {{--<option selected="selected" value="Blue">{{ $itms['colors']}}</option>--}}
                            {{--<option value="Green">Green</option>--}}
                            {{--<option value="Orange">Orange</option>--}}
                            {{--<option value="White">White</option>--}}
                          </select>
                        </fieldset>
                      </div>
                      <div class="mb-20">
                        <div class="product-qty">
                          <label for="qty">Qty:</label>
                          <div class="custom-qty">
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                            <input type="text" class="input-text qty" name="item_qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                          </div>
                        </div>
                        <div class="bottom-detail cart-button">
                          <ul>
                            <li class="pro-cart-icon">

                                <button title="Add to Cart" class="btn-color"><span></span>Add to Cart</button>

                            </li>
                          </ul>
                        </div>
                      </div>
                      </form>
                      <div class="share-link">
                        {{--<label>Share This : </label>--}}
                        {{--<div class="social-link">--}}
                          {{--<ul class="social-icon">--}}
                            {{--<li><a class="facebook" title="Facebook" href="#"><i class="fa fa-facebook"> </i></a></li>--}}
                            {{--<li><a class="twitter" title="Twitter" href="#"><i class="fa fa-twitter"> </i></a></li>--}}
                            {{--<li><a class="linkedin" title="Linkedin" href="#"><i class="fa fa-linkedin"> </i></a></li>--}}
                            {{--<li><a class="rss" title="RSS" href="#"><i class="fa fa-rss"> </i></a></li>--}}
                            {{--<li><a class="pinterest" title="Pinterest" href="#"><i class="fa fa-pinterest"> </i></a></li>--}}
                          {{--</ul>--}}
                        {{--</div>--}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="brand-logo-pro align-center mb-30">
          @foreach($brand as $b)
            <img src="../{{$b->brand_logo}}" alt="Stylexpo">
            @endforeach
          </div>
          <div class="sub-banner-block align-center">
           <img src="../images/left-banner.jpg" alt="Stylexpo">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ptb-70">
    <div class="container">
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-lg-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" title="Description">Description</a></li>
                {{--<li><a class="tab-Product-Tags" title="Product-Tags">Product-Tags</a></li>--}}
                <li><a class="tab-Reviews" title="Reviews">Reviews</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected ">

                      @foreach($items as $rtm)
                      <div class="Description"> <strong>{{$rtm->item_name}}</strong><br />

                          <p>{{$rtm->item_description}}</p>
                        @endforeach
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="items-Product-Tags"><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong><br />
                      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</div>
                  </li>
                  <li>
                    <div class="items-Reviews">
                      <div class="comments-area">
                        <h4>Comments</h4>
                        <ul class="comment-list mt-30">
                          <!--<li>-->
                          <!--  <div class="comment-user"> <img src="../images/comment-user.jpg" alt="Stylexpo"> </div>-->
                          <!--  <div class="comment-detail">-->
                          <!--    <div class="user-name">John Doe</div>-->
                          <!--    <div class="post-info">-->
                          <!--      <ul>-->
                          <!--        <li>Fab 11, 2016</li>-->
                          <!--        <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>-->
                          <!--      </ul>-->
                          <!--    </div>-->
                          <!--    <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>-->
                          <!--  </div>-->
                          <!--  <ul class="comment-list child-comment">-->
                          <!--    <li>-->
                          <!--      <div class="comment-user"> <img src="../images/comment-user.jpg" alt="Stylexpo"> </div>-->
                          <!--      <div class="comment-detail">-->
                          <!--        <div class="user-name">John Doe</div>-->
                          <!--        <div class="post-info">-->
                          <!--          <ul>-->
                          <!--            <li>Fab 11, 2016</li>-->
                          <!--            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>-->
                          <!--          </ul>-->
                          <!--        </div>-->
                          <!--        <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>-->
                          <!--      </div>-->
                          <!--    </li>-->
                          <!--    <li>-->
                          <!--      <div class="comment-user"> <img src="../images/comment-user.jpg" alt="Stylexpo"> </div>-->
                          <!--      <div class="comment-detail">-->
                          <!--        <div class="user-name">John Doe</div>-->
                          <!--        <div class="post-info">-->
                          <!--          <ul>-->
                          <!--            <li>Fab 11, 2016</li>-->
                          <!--            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>-->
                          <!--          </ul>-->
                          <!--        </div>-->
                          <!--        <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>-->
                          <!--      </div>-->
                          <!--    </li>-->
                          <!--  </ul>-->
                          <!--</li>-->
                          <!--<li>-->
                            @foreach($comments as $com)
                            <div class="comment-user"> <img src="../images/comment-user.jpg" alt="Stylexpo"> </div>
                            <div class="comment-detail">
                              <div class="user-name">{{$com->name}}</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <!--<li><i class="fa fa-reply r" data-custom-value="{{$com->id}}"  data-value="{{$com->code}}"></i>Reply</li>-->
                                </ul>
                              </div>
                              <p>{{$com->message}}</p>
                            </div>
                          @endforeach
                          <div class="comm"></div>
                          </li>
                        </ul>
                      </div>
                      <div class="main-form mt-30">
                        <h4>Leave a comments</h4>
                        <form method="post" action="{{route('comments')}}">
                        {{csrf_field()}}
                          @foreach($c as $c)
                          <input type="hidden" value="{{$c->item_code}}" name="code">
                          @endforeach
                          <div class="row mt-30">
                            <div class="col-md-4 mb-30">
                              <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-4 mb-30">
                              <input type="email" name="email" placeholder="Email" required>
                            </div>
                            {{--<div class="col-md-4 mb-30">--}}
                              {{--<input type="text" placeholder="Website" required>--}}
                            {{--</div>--}}
                            <div class="col-12 mb-30">
                              <textarea cols="30" rows="3" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 mb-30">
                              <button class="btn btn-color" name="submit" type="submit">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   {{--<html>--}}
  {{--<head>--}}
    {{--<title>jQuery: Click an image to show it big on a viewport-sized modal overlay--}}
    {{--</title>--}}
  {{--</head>--}}
  {{--<body>--}}
  {{--<p>--}}
    {{--<img class="zoomable" style='width:40%;' src="../uploads\Item-rA7.jpg" />--}}
  {{--</p>--}}
  {{--<p>--}}
    {{--<img class="zoomable" style='width:40%;' src="http://www.tumblr.com/photo/1280/artedaalma/19707693049/1/tumblr_m19h2mwFRQ1rsn8cy" />--}}
  {{--</p>--}}
  <script
          src="https://code.jquery.com/jquery-1.3.2.pack.js"
          integrity="sha256-yDcKLQUDWenVBazEEeb0V6SbITYKIebLySKbrTp2eJk="
          crossorigin="anonymous"></script>

  <script>
    $('img.zoomable').css({cursor: 'pointer'}).live('click', function () {
      var img = $(this);
      var bigImg = $('<img />').css({
        'max-width': '100%',
        'max-height': '100%',
        'display': 'inline'
      });
      bigImg.attr({
        src: img.attr('src'),
        alt: img.attr('alt'),
        title: img.attr('title')
      });
      var over = $('<div />').text(' ').css({
        'height': '100%',
        'width': '100%',
        'background': 'rgba(0,0,0,.82)',
        'position': 'fixed',
        'top': 0,
        'left': 0,
        'opacity': 0.0,
        'cursor': 'pointer',
        'z-index': 9999,
        'text-align': 'center'
      }).append(bigImg).bind('click', function () {
        $(this).fadeOut(300, function () {
          $(this).remove();
        });
      }).insertAfter(this).animate({
        'opacity': 1
      }, 300);
    });
     $('img.zoom').css({cursor: 'pointer'}).live('click', function () {
      var img = $(this);
      var bImg = $('<img />').css({
        'max-width': '123%',
        'max-height': '100%',
         'display': 'inline'
      });
      bImg.attr({
        src: img.attr('src'),
        alt: img.attr('alt'),
        title: img.attr('title')
      });
      var over = $('<div />').text(' ').css({
        'height': '100%',
         'width': '100%',
         'background': 'rgba(0,0,0,.82)',
         'position': 'fixed',
        'top': 0,
        'bottom':-2,
        'left': 0,
        // 'right':-5,
        'opacity': 0.0,
        'cursor': 'pointer',
        'z-index': 9999,
        'text-align': 'center'
      }).append(bImg).bind('click', function () {
        $(this).fadeOut(300, function () {
          $(this).remove();
        });
      }).insertAfter(this).animate({
        'opacity': 1
      }, 300);
    });
  </script>
  {{--</body>--}}
  {{--</html>--}}
<!--<div id="myModal" class="modal">-->

    <!-- The Close Button -->
<!--    <span class="close">&times;</span>-->

    <!-- Modal Content (The Image) -->

<!--    <img class="modal-content" id="img01" >-->

    <!-- Modal Caption (Image Text) -->
<!--    <div id="caption"></div>-->
<!--  </div>-->


  <!-- CONTAINER END -->

  <!-- FOOTER START -->

  @include('includes/inc_footer')

</div>
@include('includes/inc_scripts')
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script>
  $(document).ready(function () {
      $(".types").on('click', function () {
    //  alert('login to add measurements');
   texttoshow = "Login to add measurements";
      document.getElementById("thetext").innerHTML = texttoshow;
    });
    $(".type").on('change', function () {
      var x = $(this).val();
      if (x == "stitched") {
        $.ajax({
          type: 'get',
          url: '/type',
          dataType: "json",
          success: function (data) {
            $('select[name="user_measurment_id"]').empty();
            $('.x').show();
            $('.y').show();

            for (var i = 0; i < data.length; i++) {
            //  var t = data[i]["id"];
               var t = data[i]["profile_name"];

              $('select[name="user_measurment_id"]').append('<option value="' + t + '">' + data[i]["profile_name"] + '</option>');

            }
             $('select[name="user_measurment_id"]').append('<option  value="https://www.zarnaboutique.com/measurements"> Add Measurements </option>');


          },


        });
      }
      if (x == "unstitched") {
        $.ajax({
          type: 'get',
          url: '/type',
          dataType: "json",
          success: function (data) {
            $('.x').hide();
            $('.y').hide();

          },


        });
      }
    });
  });
    $(document).ready(function() {
    $("#selection").change(function() {
      var curVal = $("#selection option:selected").val();
      if (curVal.indexOf('https://') === 0) {
        location = $("#selection option:selected").val();
      }
    });
  });
   $(".r").on("click", function(e){
    var value = $(this).data("custom-value");
    var v = $(this).data("value");
    //alert(value);
    e.preventDefault();
    $.ajax({
      type: 'get',
      url: '/replies/'+ v + '/'+value,
      success : function(response){
        $(".comm").html(response);
      },error : function(jqXHR, textStatus, errorThrown){
        $(".comm").html(errorThrown + textStatus);
      }
    });
   // var data = $(this).data("value");
    //alert("hello");
  });
  // Get the modal
//   var modal = document.getElementById('myModal');

//   // Get the image and insert it inside the modal - use its "alt" text as a caption
//   var img = document.getElementById('myImg');
//   var modalImg = document.getElementById("img01");
//   var captionText = document.getElementById("caption");
//   img.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     // captionText.innerHTML = this.alt;
//   }

//   // Get the <span> element that closes the modal
//   var span = document.getElementsByClassName("close")[0];

//   // When the user clicks on <span> (x), close the modal
//   span.onclick = function() {
//     modal.style.display = "none";
//   }
      </script>

</body>

</html>
