<footer>
    
    <div id="copyright" class="@yield('bg_class', 'bg_standard')">
        <div class="container">
            <div class="row">
                <div class="col-md-12 float-left">

                    <div id="chat-box" class="col-md-12 col-sm-12 col-xs-12 float-right @yield('bg_class', 'bg_standard')">
                        <div class="col-md-12 float-left">
                            <div class="col-md-12 center">
                                &nbsp;
                                <span class="Times-New-text white center" id="window_info">
                                    {!! Lg::ts('Stay_connected') !!}
                                </span>
                            </div>
                            <!--div class="col-md-1 float-left">
                                <span id="close-chat-box">X</span>
                            </div-->
                        </div>
                        <div id="bloc-info-chat" class="center">
                            <h3 class="title" style="color: #ffffff;">
                                {!! Lg::ts('Subscribe_to_our_newsletter') !!}
                            </h3>
                            <p class="white center description">
                                {!! Lg::ts('Join_our_mailling') !!}
                            </p>
							<form action="{!! route('save-subscrib') !!}" method="post" id="subscrition-form">
                                @csrf
                                <div class="col-md-12 margin-top-15">
                                    <div class="form-group">
                                        <input type="email" placeholder="{!! Lg::ts('Your_Email') !!}" id="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12 margin-top-15">
                                    <button class="special-btn" type="submit">
                                        {!! Lg::ts('Susbcribe') !!} <i class="fa fa-spinner fa-spin invisible" id="sub_btn"></i>
                                    </button>
                                    <br>&nbsp;
                                </div>
                            </form>
                            @foreach(Lg::getAllSocial() as $social)
                            <div class="col-xs-6 margin-top-15 float-left">
                                <div class="col-xs-12 social_bloc float-left ">
                                    <a href="{!! $social->link !!}" target="_blank">
                                        <img src="{!! $social->getLink() !!}" class="" alt="">
                                    </a>
                                    <br>&nbsp;
                                </div>
                            </div>
                            @endforeach


                        </div>
                        
                    </div>
                    <div class="site-info font-bold">
                        <p class="white"  style="text-align: center;">COPYRIGHT 2018 @
                            <a href="#" class="white" rel="nofollow">KHEMETIC</a>
                            @if(auth()->check())
                                <a href="{!! route('dashboard') !!}"
                                   class="" style="color : yellow;">
                                    go to Dashbord
                                </a>
                            @endif
                            <br>
                            @if(session()->has('langs'))
                                @foreach(session('langs') as $l)
                                    @if($l['active'] == 1)
                                    <!--a href="{!! route('language.set', $l['abbr']) !!}">
                                        <img src="{!! $l['link_drapeau'] !!}" width="24" > &nbsp;&nbsp;&nbsp;
                                    </a-->
                                    @endif
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>
