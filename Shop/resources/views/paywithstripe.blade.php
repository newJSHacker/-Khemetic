<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

@include("includes/inc_heads")
<body>
<div class="se-pre-con"></div>
<div class="main">

    <!-- HEADER START -->
@include("includes/inc_header")
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Payment</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><a href="your-shoping-cart">Cart</a>/</li>
                        <li><span>Payment</span></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-step mb-40">
                        <ul>
                            <li>
                                <a href="shipment-details">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">1</div>
                                    </div>
                                    <span>Shipping</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0);">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">2</div>
                                    </div>
                                    <span>Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="complete-order">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">3</div>
                                    </div>
                                    <span>Order Complete</span>
                                </a>
                            </li>
                            <li>
                                <div class="step">
                                    <div class="line"></div>
                                </div>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <div class="checkout-content">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        @if ($message = Session::get('success'))
                                            <div class="custom-alerts alert alert-success fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                {!! $message !!}
                                            </div>
                                            <?php Session::forget('success');?>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="custom-alerts alert alert-danger fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                {!! $message !!}
                                            </div>
                                            <?php Session::forget('error');?>
                                        @endif
                                        <div class="panel-heading">Pay with Stripe</div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! url('addmoney/stripe') !!}" >
                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('card_no') ? ' has-error' : '' }}">
                                                    <label for="card_no" class="col-md-4 control-label">Card No</label>
                                                    <div class="col-md-6">
                                                        <input id="card_no" type="text" class="form-control" name="card_no" value="{{ old('card_no') }}" required autofocus autocomplete="off">
                                                        @if ($errors->has('card_no'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('card_no') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                                                    <label for="ccExpiryMonth" class="col-md-4 control-label">Expiry Month</label>
                                                    <div class="col-md-6">
                                                        <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" required  autocomplete="off">
                                                        @if ($errors->has('ccExpiryMonth'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                                                    <label for="ccExpiryYear" class="col-md-4 control-label">Expiry Year</label>
                                                    <div class="col-md-6">
                                                        <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" required  autocomplete="off">
                                                        @if ($errors->has('ccExpiryYear'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('ccExpiryYear') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                                                    <label for="cvvNumber" class="col-md-4 control-label">CVV No.</label>
                                                    <div class="col-md-6">
                                                        <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('cvvNumber') }}"  autocomplete="off">
                                                        @if ($errors->has('cvvNumber'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('cvvNumber') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                    <label for="amount" class="col-md-4 control-label">Amount</label>
                                                    <div class="col-md-6">
                                                        <input id="amount" type="hidden" class="form-control" name="amount" value="{{ old('amount') }}" >
                                                        @if ($errors->has('amount'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('amount') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div-->

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Paywith Stripe
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
@include("includes/inc_footer")
<!-- FOOTER END -->
</div>
@include("includes/inc_scripts")
</body>

</html>
