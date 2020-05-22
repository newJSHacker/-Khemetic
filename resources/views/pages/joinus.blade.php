@extends('layouts.app')


@section('meta')
    <meta name="google-signin-client_id" content="238598676401-cifllavuiv0k0c1ovm3rv4rhc10g0i9g.apps.googleusercontent.com">



@endsection



@section('css')
    <style>
        .fb_iframe_widget{

        }
    </style>


@endsection




@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 120px;">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 g-signin2" data-onsuccess="onSignIn">

                            </div>
                            <div class="col-md-6">
                                <fb:login-button
                                    scope="public_profile,email"
                                    onlogin="checkLoginState();">
                                </fb:login-button>
                            </div>

                        </div>
                        <br><br>
                        <form method="POST" action="{{ route('join-us') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label text-md-right">{!! Lg::ts('First_name') !!}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ old('first_name') }}"  required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{!! Lg::ts('Last_name') !!}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <!--div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <form method="POST" action="{{ route('join-us') }}" id="social_form" class="hidden">
        @csrf
        <input id="fb_name" type="hidden" name="name">
        <input id="fb_photo" type="hidden" name="photo">
        <input id="fb_email" type="hidden" name="email">
        <input id="fb_id" type="hidden" name="id">
        <input id="fb_type" type="hidden" name="social">
    </form>
@endsection


@section('scripts')

    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <script>

        function onSignIn(googleUser) {
            // function onSignInGoogle(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            $("#fb_name").val(profile.getName());
            $("#fb_photo").val(profile.getImageUrl());
            $("#fb_email").val(profile.getEmail());
            $("#fb_id").val(profile.getId());
            $("#fb_type").val("google");

            $("#social_form").submit();

        }



    </script>

    <script>
        /**************************** Twitter *************************************/


    </script>

@endsection



@section('after_body')
    <script>

        function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response);                   // The current login status of the person.
            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                testAPI();
            } else {                                 // Not logged into your webpage or we are unable to tell.
                //document.getElementById('status').innerHTML = 'Please log ' +
                //    'into this webpage.';
            }
        }


        function checkLoginState() {               // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function(response) {   // See the onlogin handler
                statusChangeCallback(response);
            });
        }


        window.fbAsyncInit = function() {
            FB.init({
                appId      : '816488275529489',
                cookie     : true,
                xfbml      : true,
                version    : 'v6.0'
            });

            FB.AppEvents.logPageView();


            FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
                statusChangeCallback(response);        // Returns the login status.
            });
        };


        (function(d, s, id) {                      // Load the SDK asynchronously
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            //FB.api('/me', function(response) {
            FB.api('/me', {fields: 'name,email,avatar'}, (response) => {
                console.log('=============== Resultat facebook ========================: ');
                console.log(response);
                console.log('=============== fin facebook ========================: ');
                console.log('Successful login for: ' + response.name);
                console.log('Successful login for: ' + response.email);
                document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';

                $("#fb_name").val(response.name);
                $("#fb_photo").val("");
                $("#fb_email").val(response.email);
                $("#fb_id").val(response.id);
                $("#fb_type").val("facebook");

                $("#social_form").submit();



            });
        }

    </script>

@endsection

