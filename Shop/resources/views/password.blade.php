<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

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
                <h1 class="banner-title">Change Password</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><span>Change Password</span></li>
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

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{route('password')}}" class="main-form full" method="post" >
                        {!! csrf_field() !!}
                        <div class="row mb-20">
                            <div class="col-12 mb-20">
                                <div class="heading-part">
                                    <h3 class="sub-heading">Change Password </h3>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box {{ $errors->has('cupass') ? ' has-error' : '' }}">
                                    <input type="password" placeholder="Current Password" name="cupass">
                                    @if ($errors->has('cupass'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cupass') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box {{ $errors->has('npass') ? ' has-error' : '' }}">
                                    <input type="password"   name="npass" placeholder="New Password">
                                    @if ($errors->has('npass'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('npassw') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box {{ $errors->has('cpass') ? ' has-error' : '' }}">
                                    <input type="password" required placeholder="Confirm Password" name="cpass">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-color right-side">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <!-- CONTAINER END -->

    <!-- FOOTER START -->
    <?php include "includes/inc_footer.php"; ?>
</div>
<?php include "includes/inc_scripts.php"; ?>
</body>

</html>
