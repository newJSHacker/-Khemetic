<?php

function getSymboleDevise(){
    return config('app.devise_symbole');
}

function getDevise(){
    return config('app.devise');
}


function is_paypal_active(){
    return config('app.paypal_active') == true;
}

function is_cashpay_active(){
    return config('app.cashpay_active') == true;
}
function is_stripe_active(){
    return config('app.stripe_active') == true;
}
