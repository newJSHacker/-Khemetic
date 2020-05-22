<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include('includes/inc_head')
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
                <h1 class="banner-title">Measurements Profile</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="zarna">Home</a>/</li>
                        <li><span>Measurements Profile</span></li>
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

                <div class="col-lg-8">



                    <form action="{{ route('edit-measurements',$mea->id)}}" class="main-form full" method="post" >
                        {!! csrf_field() !!}
                        <div class="row mb-20">
                            <div class="col-12 mb-20">
                                <div class="heading-part">
                                    <h3 class="sub-heading">Edit Measurement </h3>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required  placeholder="Full Name" name="profile_name" value="{{$mea->profile_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required  name="neck" placeholder="Neck " value="{{$mea->neck}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Over Bust" name="over_bust" value="{{$mea->over_bust}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Bust" name="bust" value="{{$mea->bust}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Under Bust" name="under_bust" value="{{$mea->under_bust}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Waist" name="waist" value="{{$mea->waist}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Hips" name="hips" value="{{$mea->hips}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Neck to Heel" name="neck_to_heel" value="{{$mea->neck_to_heel}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Nek to Above Knee" name="neck_to_aboveknee" value="{{$mea->neck_to_aboveknee}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Above Knee to Ankle" name="aboveknee_to_ankle" value="{{$mea->aboveknee_to_ankle}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Arm Length" name="arm_lenth" value="{{$mea->arm_lenth}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Shoulder Seam" name="sholder_seam" value="{{$mea->sholder_seam}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Arm Hole" name="arm_hole" value="{{$mea->arm_hole}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Bicep" name="baicep" value="{{$mea->baicep}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Fore Arm" name="fore_arm" value="{{$mea->fore_arm}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Wrist" name="wrist" value="{{$mea->wrist}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="V Neck Cut" name="v_neck_cut" value="{{$mea->v_neck_cut}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Shoulder to Waist" name="shulder_to_waist" value="{{$mea->shulder_to_waist}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <input type="text" required placeholder="Waist to Above Neck" name="waist_to_above_neck" value="{{$mea->waist_to_above_neck}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-color right-side">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="col-12">
                        <div class="row justify-content-center">

                            <div class="row">

                                <div class="col-12">
                                    <img alt="Stylexpo" src="../images/chart.jpg">
                                </div>

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
</div>
@include("includes/inc_scripts")
</body>

</html>
