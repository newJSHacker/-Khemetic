<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <h4>Welcome to {!! config('app.name') !!}</h4>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            {{--<img src="../images/icon/avatar-01.jpg" alt="John Doe" />--}}
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">  {{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{!! asset('images/icon/comment-user.jpg') !!}" alt="{{ Auth::user()->name }}" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email"><a href="https://colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c262324222823290c29342d213c2029622f2321">[email&#160;protected]</a></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                               
                                                <div class="col-12 col-md-12">
                                                    <input type="text" id="text-input" name="text-input" placeholder="Password" name="Password" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                               
                                                <div class="col-12 col-md-12">
                                                    <input type="text" id="text-input" name="text-input" placeholder="Confirm Password" name="Qty" class="form-control">
                                                   
                                                </div>
                                               </div>
                                                <div class="row form-group">
                                                 <div class="col-12 col-md-12">
                                                     <button type="submit" class="btn btn-primary btn-sm" style="width: 100%">
                                                        <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                </div>
                                            </div>
                                            </form>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
