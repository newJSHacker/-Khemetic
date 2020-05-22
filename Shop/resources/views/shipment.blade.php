<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->


@include( "includes/inc_head")
<body>
<!--<div class="se-pre-con"></div>-->
<div class="main">

    <!-- HEADER START -->
@include ("includes/inc_header")
<!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
        <div class="container">
            <section class="banner-detail center-xs">
                <h1 class="banner-title">Checkout</h1>
                <div class="bread-crumb right-side float-none-xs">
                    <ul>
                        <li><a href="/">Home</a>/</li>
                        <li><a href="your-shoping-cart">Cart</a>/</li>
                        <li><span>Checkout</span></li>
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
                            <li class="active">
                                <a href="javascript:void(0);">
                                    <div class="step">
                                        <div class="line"></div>
                                        <div class="circle">1</div>
                                    </div>
                                    <span>Shipping</span>
                                </a>
                            </li>
                            <li>
                                <a href="proceed-payment">
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
                                    <span>Complete Order </span>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="heading-part align-center">
                                            <h2 class="heading">Please fill up your Shipping details</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">

                                    <form action="{{route('shipment-details')}}" class="main-form full" method="post">
                                        {{csrf_field()}}
                                        <div class="row mb-20">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Full Name" name="receiver_name" required
                                                    value="{!! Auth::guard('user')->user()->name !!}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="email" placeholder="Email Address" name="receiver_email" required
                                                           value="{!! Auth::guard('user')->user()->email !!}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Contact Number" name="receiver_contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Alternative Contact Number"
                                                           name="receiver_alternative_contact" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Shipping Address" name="receiver_address" required>
                                                    <span>Please provide the number and street.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Your City" name="receiver_city" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Postcode/zip" name="receiver_zipcode" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-box">
                                                    <input type="text" placeholder="Shipping Landmark"
                                                           name="receiver_shipment_landmark">
                                                    <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box select-dropdown">
                                                    <fieldset>
                                                        <input type="hidden" name="receiver_country" value="US" id="shippingcountryid">
                                                        <!--select class="option-drop" id="shippingcountryid" name="receiver_country">
                                                          <option selected="" value="">Select Country</option>
                                                          <option value="AX">Aland Islands</option>
                                                          <option value="AF">Afghanistan</option>
                                                          <option value="AL">Albania</option>
                                                          <option value="DZ">Algeria</option>
                                                          <option value="AS">American Samoa</option>
                                                          <option value="AD">Andorra</option>
                                                          <option value="AO">Angola</option>
                                                          <option value="AI">Anguilla</option>
                                                          <option value="AQ">Antarctica</option>
                                                          <option value="AG">Antigua and Barbuda</option>
                                                          <option value="AR">Argentina</option>
                                                          <option value="AM">Armenia</option>
                                                          <option value="AW">Aruba</option>
                                                          <option value="AU">Australia</option>
                                                          <option value="AT">Austria</option>
                                                          <option value="AZ">Azerbaijan</option>
                                                          <option value="BS">Bahamas</option>
                                                          <option value="BH">Bahrain</option>
                                                          <option value="BD">Bangladesh</option>
                                                          <option value="BB">Barbados</option>
                                                          <option value="BY">Belarus</option>
                                                          <option value="PW">Belau</option>
                                                          <option value="BE">Belgium</option>
                                                          <option value="BZ">Belize</option>
                                                          <option value="BJ">Benin</option>
                                                          <option value="BM">Bermuda</option>
                                                          <option value="BT">Bhutan</option>
                                                          <option value="BO">Bolivia</option>
                                                          <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                          <option value="BA">Bosnia and Herzegovina</option>
                                                          <option value="BW">Botswana</option>
                                                          <option value="BV">Bouvet Island</option>
                                                          <option value="BR">Brazil</option>
                                                          <option value="IO">British Indian Ocean Territory</option>
                                                          <option value="VG">British Virgin Islands</option>
                                                          <option value="BN">Brunei</option>
                                                          <option value="BG">Bulgaria</option>
                                                          <option value="BF">Burkina Faso</option>
                                                          <option value="BI">Burundi</option>
                                                          <option value="KH">Cambodia</option>
                                                          <option value="CM">Cameroon</option>
                                                          <option value="CA">Canada</option>
                                                          <option value="CV">Cape Verde</option>
                                                          <option value="KY">Cayman Islands</option>
                                                          <option value="CF">Central African Republic</option>
                                                          <option value="TD">Chad</option>
                                                          <option value="CL">Chile</option>
                                                          <option value="CN">China</option>
                                                          <option value="CX">Christmas Island</option>
                                                          <option value="CC">Cocos (Keeling) Islands</option>
                                                          <option value="CO">Colombia</option>
                                                          <option value="KM">Comoros</option>
                                                          <option value="CG">Congo (Brazzaville)</option>
                                                          <option value="CD">Congo (Kinshasa)</option>
                                                          <option value="CK">Cook Islands</option>
                                                          <option value="CR">Costa Rica</option>
                                                          <option value="HR">Croatia</option>
                                                          <option value="CU">Cuba</option>
                                                          <option value="CW">Curaçao</option>
                                                          <option value="CY">Cyprus</option>
                                                          <option value="CZ">Czech Republic</option>
                                                          <option value="DK">Denmark</option>
                                                          <option value="DJ">Djibouti</option>
                                                          <option value="DM">Dominica</option>
                                                          <option value="DO">Dominican Republic</option>
                                                          <option value="EC">Ecuador</option>
                                                          <option value="EG">Egypt</option>
                                                          <option value="SV">El Salvador</option>
                                                          <option value="GQ">Equatorial Guinea</option>
                                                          <option value="ER">Eritrea</option>
                                                          <option value="EE">Estonia</option>
                                                          <option value="ET">Ethiopia</option>
                                                          <option value="FK">Falkland Islands</option>
                                                          <option value="FO">Faroe Islands</option>
                                                          <option value="FJ">Fiji</option>
                                                          <option value="FI">Finland</option>
                                                          <option value="FR">France</option>
                                                          <option value="GF">French Guiana</option>
                                                          <option value="PF">French Polynesia</option>
                                                          <option value="TF">French Southern Territories</option>
                                                          <option value="GA">Gabon</option>
                                                          <option value="GM">Gambia</option>
                                                          <option value="GE">Georgia</option>
                                                          <option value="DE">Germany</option>
                                                          <option value="GH">Ghana</option>
                                                          <option value="GI">Gibraltar</option>
                                                          <option value="GR">Greece</option>
                                                          <option value="GL">Greenland</option>
                                                          <option value="GD">Grenada</option>
                                                          <option value="GP">Guadeloupe</option>
                                                          <option value="GU">Guam</option>
                                                          <option value="GT">Guatemala</option>
                                                          <option value="GG">Guernsey</option>
                                                          <option value="GN">Guinea</option>
                                                          <option value="GW">Guinea-Bissau</option>
                                                          <option value="GY">Guyana</option>
                                                          <option value="HT">Haiti</option>
                                                          <option value="HM">Heard Island and McDonald Islands</option>
                                                          <option value="HN">Honduras</option>
                                                          <option value="HK">Hong Kong</option>
                                                          <option value="HU">Hungary</option>
                                                          <option value="IS">Iceland</option>
                                                          <option value="IN">India</option>
                                                          <option value="ID">Indonesia</option>
                                                          <option value="IR">Iran</option>
                                                          <option value="IQ">Iraq</option>
                                                          <option value="IM">Isle of Man</option>
                                                          <option value="IL">Israel</option>
                                                          <option value="IT">Italy</option>
                                                          <option value="CI">Ivory Coast</option>
                                                          <option value="JM">Jamaica</option>
                                                          <option value="JP">Japan</option>
                                                          <option value="JE">Jersey</option>
                                                          <option value="JO">Jordan</option>
                                                          <option value="KZ">Kazakhstan</option>
                                                          <option value="KE">Kenya</option>
                                                          <option value="KI">Kiribati</option>
                                                          <option value="KW">Kuwait</option>
                                                          <option value="KG">Kyrgyzstan</option>
                                                          <option value="LA">Laos</option>
                                                          <option value="LV">Latvia</option>
                                                          <option value="LB">Lebanon</option>
                                                          <option value="LS">Lesotho</option>
                                                          <option value="LR">Liberia</option>
                                                          <option value="LY">Libya</option>
                                                          <option value="LI">Liechtenstein</option>
                                                          <option value="LT">Lithuania</option>
                                                          <option value="LU">Luxembourg</option>
                                                          <option value="MO">Macao S.A.R., China</option>
                                                          <option value="MK">Macedonia</option>
                                                          <option value="MG">Madagascar</option>
                                                          <option value="MW">Malawi</option>
                                                          <option value="MY">Malaysia</option>
                                                          <option value="MV">Maldives</option>
                                                          <option value="ML">Mali</option>
                                                          <option value="MT">Malta</option>
                                                          <option value="MH">Marshall Islands</option>
                                                          <option value="MQ">Martinique</option>
                                                          <option value="MR">Mauritania</option>
                                                          <option value="MU">Mauritius</option>
                                                          <option value="YT">Mayotte</option>
                                                          <option value="MX">Mexico</option>
                                                          <option value="FM">Micronesia</option>
                                                          <option value="MD">Moldova</option>
                                                          <option value="MC">Monaco</option>
                                                          <option value="MN">Mongolia</option>
                                                          <option value="ME">Montenegro</option>
                                                          <option value="MS">Montserrat</option>
                                                          <option value="MA">Morocco</option>
                                                          <option value="MZ">Mozambique</option>
                                                          <option value="MM">Myanmar</option>
                                                          <option value="NA">Namibia</option>
                                                          <option value="NR">Nauru</option>
                                                          <option value="NP">Nepal</option>
                                                          <option value="NL">Netherlands</option>
                                                          <option value="AN">Netherlands Antilles</option>
                                                          <option value="NC">New Caledonia</option>
                                                          <option value="NZ">New Zealand</option>
                                                          <option value="NI">Nicaragua</option>
                                                          <option value="NE">Niger</option>
                                                          <option value="NG">Nigeria</option>
                                                          <option value="NU">Niue</option>
                                                          <option value="NF">Norfolk Island</option>
                                                          <option value="KP">North Korea</option>
                                                          <option value="MP">Northern Mariana Islands</option>
                                                          <option value="NO">Norway</option>
                                                          <option value="OM">Oman</option>
                                                          <option value="PK">Pakistan</option>
                                                          <option value="PS">Palestinian Territory</option>
                                                          <option value="PA">Panama</option>
                                                          <option value="PG">Papua New Guinea</option>
                                                          <option value="PY">Paraguay</option>
                                                          <option value="PE">Peru</option>
                                                          <option value="PH">Philippines</option>
                                                          <option value="PN">Pitcairn</option>
                                                          <option value="PL">Poland</option>
                                                          <option value="PT">Portugal</option>
                                                          <option value="PR">Puerto Rico</option>
                                                          <option value="QA">Qatar</option>
                                                          <option value="IE">Republic of Ireland</option>
                                                          <option value="RE">Reunion</option>
                                                          <option value="RO">Romania</option>
                                                          <option value="RU">Russia</option>
                                                          <option value="RW">Rwanda</option>
                                                          <option value="ST">São Tomé and Príncipe</option>
                                                          <option value="BL">Saint Barthélemy</option>
                                                          <option value="SH">Saint Helena</option>
                                                          <option value="KN">Saint Kitts and Nevis</option>
                                                          <option value="LC">Saint Lucia</option>
                                                          <option value="SX">Saint Martin (Dutch part)</option>
                                                          <option value="MF">Saint Martin (French part)</option>
                                                          <option value="PM">Saint Pierre and Miquelon</option>
                                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                                          <option value="WS">Samoa</option>
                                                          <option value="SM">San Marino</option>
                                                          <option value="SA">Saudi Arabia</option>
                                                          <option value="SN">Senegal</option>
                                                          <option value="RS">Serbia</option>
                                                          <option value="SC">Seychelles</option>
                                                          <option value="SL">Sierra Leone</option>
                                                          <option value="SG">Singapore</option>
                                                          <option value="SK">Slovakia</option>
                                                          <option value="SI">Slovenia</option>
                                                          <option value="SB">Solomon Islands</option>
                                                          <option value="SO">Somalia</option>
                                                          <option value="ZA">South Africa</option>
                                                          <option value="GS">South Georgia/Sandwich Islands</option>
                                                          <option value="KR">South Korea</option>
                                                          <option value="SS">South Sudan</option>
                                                          <option value="ES">Spain</option>
                                                          <option value="LK">Sri Lanka</option>
                                                          <option value="SD">Sudan</option>
                                                          <option value="SR">Suriname</option>
                                                          <option value="SJ">Svalbard and Jan Mayen</option>
                                                          <option value="SZ">Swaziland</option>
                                                          <option value="SE">Sweden</option>
                                                          <option value="CH">Switzerland</option>
                                                          <option value="SY">Syria</option>
                                                          <option value="TW">Taiwan</option>
                                                          <option value="TJ">Tajikistan</option>
                                                          <option value="TZ">Tanzania</option>
                                                          <option value="TH">Thailand</option>
                                                          <option value="TL">Timor-Leste</option>
                                                          <option value="TG">Togo</option>
                                                          <option value="TK">Tokelau</option>
                                                          <option value="TO">Tonga</option>
                                                          <option value="TT">Trinidad and Tobago</option>
                                                          <option value="TN">Tunisia</option>
                                                          <option value="TR">Turkey</option>
                                                          <option value="TM">Turkmenistan</option>
                                                          <option value="TC">Turks and Caicos Islands</option>
                                                          <option value="TV">Tuvalu</option>
                                                          <option value="UG">Uganda</option>
                                                          <option value="UA">Ukraine</option>
                                                          <option value="AE">United Arab Emirates</option>
                                                          <option value="GB">United Kingdom (UK)</option>
                                                          <option value="US">United States (US)</option>
                                                          <option value="UM">United States (US) Minor Outlying Islands</option>
                                                          <option value="VI">United States (US) Virgin Islands</option>
                                                          <option value="UY">Uruguay</option>
                                                          <option value="UZ">Uzbekistan</option>
                                                          <option value="VU">Vanuatu</option>
                                                          <option value="VA">Vatican</option>
                                                          <option value="VE">Venezuela</option>
                                                          <option value="VN">Vietnam</option>
                                                          <option value="WF">Wallis and Futuna</option>
                                                          <option value="EH">Western Sahara</option>
                                                          <option value="YE">Yemen</option>
                                                          <option value="ZM">Zambia</option>
                                                          <option value="ZW">Zimbabwe</option>
                                                        </select-->
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box select-dropdown">
                                                    <input type="hidden" name="receiver_stat" value="US" id="shippingstateid">
                                                    <fieldset>
                                                        <!--select name="receiver_stat" class="option-drop" id="shippingstateid">
                                                          <option value="">Select a State</option>
                                                          <option value="AP">Andhra Pradesh</option>
                                                          <option value="AR">Arunachal Pradesh</option>
                                                          <option value="AS">Assam</option>
                                                          <option value="BR">Bihar</option>
                                                          <option value="CT">Chhattisgarh</option>
                                                          <option value="GA">Goa</option>
                                                          <option value="GJ">Gujarat</option>
                                                          <option value="HR">Haryana</option>
                                                          <option value="HP">Himachal Pradesh</option>
                                                          <option value="JK">Jammu and Kashmir</option>
                                                          <option value="JH">Jharkhand</option>
                                                          <option value="KA">Karnataka</option>
                                                          <option value="KL">Kerala</option>
                                                          <option value="MP">Madhya Pradesh</option>
                                                          <option value="MH">Maharashtra</option>
                                                          <option value="MN">Manipur</option>
                                                          <option value="ML">Meghalaya</option>
                                                          <option value="MZ">Mizoram</option>
                                                          <option value="NL">Nagaland</option>
                                                          <option value="OR">Orissa</option>
                                                          <option value="PB">Punjab</option>
                                                          <option value="RJ">Rajasthan</option>
                                                          <option value="SK">Sikkim</option>
                                                          <option value="TN">Tamil Nadu</option>
                                                          <option value="TS">Telangana</option>
                                                          <option value="TR">Tripura</option>
                                                          <option value="UK">Uttarakhand</option>
                                                          <option value="UP">Uttar Pradesh</option>
                                                          <option value="WB">West Bengal</option>
                                                          <option value="AN">Andaman and Nicobar Islands</option>
                                                          <option value="CH">Chandigarh</option>
                                                          <option value="DN">Dadar and Nagar Haveli</option>
                                                          <option value="DD">Daman and Diu</option>
                                                          <option value="DL">Delhi</option>
                                                          <option value="LD">Lakshadeep</option>
                                                          <option value="PY">Pondicherry (Puducherry)</option>
                                                        </select-->
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <!--div class="col-12 mb-20">
                                                <div class="heading-part">
                                                    <h3 class="sub-heading">Shipment Method</h3>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-20">
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <span>
                                                                <input type="checkbox" style="min-height:20px;" value="pak post" name="receiver_shipment_method">
                                                                <label for="chk-billing-address">Pak Post</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <span>
                                                                <input type="checkbox" id="biker" style="min-height:20px;" value="biker" name="receiver_shipment_method">
                                                                <label for="chk-billing-address">Biker - Only for Islamabad Rawalpindi</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <br/>
                                            </div-->


                                            <div class="col-md-12 ist">
                                                <button class="btn btn-color right-side">Submit & next</button>
                                            </div>

                                        </div>
                                    </form>

                                    <!--form method="post" action="{{route('shipment')}}">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                            <div class="check-box">
                                                <span>
                                                    <input type="checkbox" class="checkbox chk" id="chk-billing-address" name="chk-billing-address">
                                                    <label for="chk-billing-address">Use my profile address as my shipment address</label>
                                                </span>
                                            </div>
                                            <div class="col-md-12 snd">
                                                <button class="btn btn-color right-side">Submit & next</button>
                                            </div>
                                        </div>
                                    </form-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="heading-part align-center">
                                            <h2 class="heading">Order Overview</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-sm-30">
                                        <div class="cart-item-table commun-table mb-30">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Product Detail</th>
                                                        <th>Sub Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cart as $cart)
                                                        <tr>
                                                            <td><a href="product-page.html">
                                                                    <div class="product-image"><img alt="Honour"
                                                                                                    src="{{$cart->item_image}}">
                                                                    </div>
                                                                </a></td>
                                                            <td>
                                                                <div class="product-title"> {{$cart->item_name}}
                                                                    <div class="product-info-stock-sku m-0">
                                                                        <div>
                                                                            <label>Price: </label>
                                                                        <!--<div class="price-box"> <span class="info-deta price">{{$cart->item_current_selling_price}}</span> </div>-->
                                                                            <div class="price-box"><span
                                                                                    class="info-deta price">{{$cart->new_price}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-info-stock-sku m-0">
                                                                        <div>
                                                                            <label>Quantity: </label>
                                                                            <span class="info-deta">{{$cart->item_qty}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <!--<td><div data-id="100" class="total-price price-box"> <span class="price">{{$cart->item_current_selling_price * $cart->item_qty}}</span> </div></td>-->
                                                            <td>
                                                                <div data-id="100" class="total-price price-box"><span
                                                                        class="price">{{$cart->new_price * $cart->item_qty}}</span>
                                                                </div>
                                                            </td>
                                                            <td><a href="{{route('order-overview.delete',$cart->cid) }}"><i
                                                                        class="fa fa-trash cart-remove-item" data-id="100"
                                                                        title="Remove Item From Cart"></i></a></td>
                                                        </tr>
                                                    @endforeach()
                                                    @php($total = 0)
                                                    @foreach($ct as $cts)
                                                        @php($total += $cts->item_qty*$cts->new_price)
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="cart-total-table commun-table mb-30">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="2">Cart Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>Item(s) Subtotal</td>
                                                        <td>
                                                            <div class="price-box"><span class="price">{!! getSymboleDevise() !!} {{$total}}</span></div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $shp = 0;
                                                    $qty = DB::table('user_carts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->sum('item_qty');
                                                    //dd($qty);
                                                    $shp += ($qty > 0) ? config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping')) : 0;
                                                    //$shp += (200 + ($qty - 1) * 50);

                                                    ?>
                                                    <tr>

                                                        <td>Shipping</td>
                                                        {{--@if($qty==1)--}}
                                                        {{--<td><div class="price-box"> <span class="price">PKR 200</span> </div></td>--}}
                                                        {{--@else--}}
                                                        <td>
                                                            <div class="price-box"><span class="price">{!! getSymboleDevise() !!} {{$shp}}</span></div>
                                                        </td>
                                                        {{--@endif--}}

                                                    </tr>


                                                    <tr>
                                                        <td><b>Amount Payable</b></td>
                                                        <td>
                                                            <div class="price-box"><span
                                                                    class="price"><b>{!! getSymboleDevise() !!}  {{$total+$shp}}</b></span></div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="right-side float-none-xs"><!--a href="proceed-payment" class="btn btn-color">Next</a-->
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
@include ("includes/inc_footer")
<!-- FOOTER END -->
</div>
@include ("includes/inc_scripts")
</body>
<script>
    $(document).ready(function () {
        $('.snd').hide();
        $(".chk").on('click', function () {
            $('.snd').show();
            $('.ist').hide();
        });
    });

</script>

</html>
