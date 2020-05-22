<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include('includes/inc_heads')
<body class="product-page">
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
@include('includes/inc_header')
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Login - Register</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><span>Login - Register</span></li>
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
                    <div class="col-12">
                        <div class="row justify-content-center">

                            <form class="main-form full" role="form" method="POST" action="{{ route('login-with-zarna') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg">
                                            <h2 class="heading">Create your account</h2>
                                        </div>
                                    </div>
                                    {{--<input type="hidden" id=""  name="role" value="User" required>--}}
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="f-name">Name</label>
                                            <input type="text" id="name" required placeholder=" Name" name="name"
                                                   value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<div class="col-12">--}}
                                    {{--<div class="input-box">--}}
                                    {{--<label for="l-name">Last Name</label>--}}
                                    {{--<input type="text" id="l-name" required placeholder="Last Name" name="last_name">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="login-email">Email address</label>
                                            <input id="email" type="email" required placeholder="Email Address"
                                                   name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="login-pass">Password</label>
                                            <input id="login-pass" type="password" required
                                                   placeholder="Enter your Password" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box">
                                            <label for="re-enter-pass">Re-enter Password</label>
                                            <input id="password-confirm" type="password" required
                                                   placeholder="Re-enter your Password" name="password_confirmation"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="check-box left-side mb-20">
                      <span>
                        <input type="checkbox" name="remember_me" id="remember_me" class="checkbox" name="remeber_me">
                        <label for="remember_me">Remember Me</label>
                      </span>
                                        </div>
                                        <button name="create_account" type="submit" class="btn-color right-side">
                                            Submit
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="col-12">
                        <div class="row justify-content-center">

                            <form class="main-form full" role="form" method="POST" action="{{ route('logged') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 mb-20">
                                        <div class="heading-part heading-bg">
                                            <h2 class="heading">Customer Login</h2>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="login-email">Email address</label>
                                            <input id="login-email" type="email" placeholder="Email Address"
                                                   name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('emaill'))
                                                <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('emaill') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="login-pass">Password</label>
                                            <input id="login-pass" type="password" required
                                                   placeholder="Enter your Password" name="password" required>
                                            {{--@if ($errors->has('password'))--}}
                                            {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                            {{--</span>--}}
                                            {{--@endif--}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="check-box left-side">
                      <span>
                        <input type="checkbox" name="remember_me" id="remember_me1" class="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                        <label for="remember_me1">Remember Me</label>
                      </span>
                                        </div>
                                        <button name="login_user" type="submit" class="btn-color right-side">Log In
                                        </button>
                                    </div>
                                    <div class="col-12"><a title="Forgot Password" class="forgot-password mtb-20"
                                                           href="#">Forgot your password?</a>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
