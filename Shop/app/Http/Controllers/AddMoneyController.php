<?php

namespace App\Http\Controllers;

use App\user_cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Facades\Auth;



class AddMoneyController extends Controller
{
    //


    public function payWithStripe()
    {
        return view('paywithstripe');
    }

    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            //'amount' => 'required',
        ]);
        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            $stripe = Stripe::make('sk_test_PVXtzkhKGE6eV0iuxTqgh4iZ');
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    \Session::put('error','The Stripe Token was not generated correctly');
                    return redirect()->route('addmoney.paywithstripe');
                }
                $cart = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                    ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                    ->groupBy('img.item_code')
                    ->where('user_temp_order_id', Auth::guard('user')->user()->id)
                    ->get();

                $montant = 0; $qty = 0;
                foreach($cart as $ct) {
                    $montant += $ct->item_qty * $ct->new_price;
                    $qty += $ct->item_qty;
                }
                $shp = config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping'));
                $montant = $montant + $shp;

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => config('app.devise'),
                    'amount'   => $montant,
                    'description' => 'Add in wallet',
                ]);

                 if ($charge['status'] == 'succeeded') {
                     //echo "<pre>"; print_r($charge); exit();
                     return redirect()->route('place-order');
                 } else {
                     \Session::put('error', 'Money not add in wallet!!');
                     return redirect()->route('addmoney.paywithstripe');
                 }
            } catch (Exception $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            }
        }

        \Session::put('error','All fields are required!!');
        return redirect()->route('addmoney.paywithstripe');

    }







}
