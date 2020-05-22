<?php

namespace App\Http\Controllers;

use App\order_details;
use App\item_brands;
use App\item_categories;
use App\order_payment_detail;
use App\order_shipment_details;
use App\orders_payment;
use App\user_cart;
use App\item_current_inventory;
use App\ucart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function create()
    {
        if (Auth::guard('user')->check()) {


            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
            $brands = item_brands::all();
            //$category=item_categories::all();
            $session = Auth::guard('user')->user()->id;
            $shipment = user_cart::where('user_temp_order_id', $session)->sum('item_qty');
            //dd($shipment);
            $a = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
            $address = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
//        $cart=user_cart::join('items as i' , 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//            ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
            $cart = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                ->groupBy('img.item_code')
                ->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
//        $ct=user_cart::join('items as i' , 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//            ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
            $ct = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            if (Auth::guard('user')->check()) {
//            $crt = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
                $crt = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
//            $sub = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
                $sub = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            }
            return view('shipment', compact('cat', 'catg', 'brands', 'cart', 'ct', 'crt', 'sub', 'category', 'address', 'a', 'shipment'));

            //return view('shipment');
        } else {
            return redirect()->route('login-with-zarna');
        }
    }

    public function store(Request $req)
    {
        $session = Auth::guard('user')->user()->id;
        $this->validate($req, [
            'receiver_name' => 'required',
            'receiver_email' => 'required',
            'receiver_contact' => 'required',
            'receiver_address' => 'required',
            'receiver_shipment_landmark' => 'required',
            'receiver_country' => 'required',
            'receiver_city' => 'required',
        ]);
        order_shipment_details::create([

            'receiver_name' => $req->receiver_name,
            'receiver_email' => $req->receiver_email,
            'receiver_contact' => $req->receiver_contact,
            'receiver_alternative_contact' => $req->receiver_alternative_contact,
            'receiver_address' => $req->receiver_address,
            'receiver_shipment_landmark' => $req->receiver_shipment_landmark,
            'receiver_country' => $req->receiver_country,
            'receiver_city' => $req->receiver_city,
            'receiver_stat' => $req->receiver_stat,
            'receiver_zipcode' => $req->receiver_zipcode,
            'receiver_shipment_method' => $req->receiver_shipment_method,
            'user_temp_order_id' => $session,
        ]);
        return redirect()->route('addmoney.paywithstripe');
        //return redirect()->route('proceed-payment');
    }

    public function storee()
    {
        return redirect()->route('order-overview');
    }

    public function viewOrder()
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $brands = item_brands::all();
        //$category=item_categories::all();
        $session = Auth::guard('user')->user()->id;
        $shipment = user_cart::where('user_temp_order_id', $session)->sum('item_qty');
        //dd($shipment);
        $a = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
        $address = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
//        $cart=user_cart::join('items as i' , 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//            ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
        $cart = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
//        $ct=user_cart::join('items as i' , 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//            ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
        $ct = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
        if (Auth::guard('user')->check()) {
//            $crt = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            $crt = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
//            $sub = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            $sub = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
        }
        return view('order-overview', compact('cat', 'catg', 'brands', 'cart', 'ct', 'crt', 'sub', 'category', 'address', 'a', 'shipment'));
    }

    public function delete($id)
    {
        DB::table('user_carts')->where('cid', '=', $id)->delete();
        return redirect()->route('order-overview');
    }

    public function payment()
    {

        // $cart=user_cart::join('items as i' , 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
        //     ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
        $cart = user_cart::join('products as i', 'i.item_code', '=', 'user_carts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
            ->join('users as u', 'u.id', '=', 'user_carts.user_temp_order_id')
            ->groupBy('img.item_code')
            ->where('user_temp_order_id', Auth::guard('user')->user()->id)
            ->get();
        return view('payment', compact('cat', 'catg', 'brands', 'cart', 'crt', 'sub', 'category'));
    }

    public function order()
    {

        $session = Auth::guard('user')->user()->id;
        $a = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
        $address = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();
        // $cart=ucart::join('items as i' , 'i.item_code', '=', 'ucarts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'ucarts.item_code')
        //     ->join('items_images as img', 'img.item_code', '=', 'ucarts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get();
        $date = new \DateTime();
        $date->modify('-5 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $cart = DB::table('ucarts')->join('products as p', 'p.item_code', '=', 'ucarts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'ucarts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->where('ucarts.created_at', '>=', $formatted_date)->get();
        $date = new \DateTime();
        $date->modify('-5 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');
//        $ct=ucart::join('items as i' , 'i.item_code', '=', 'ucarts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'ucarts.item_code')
//            ->join('items_images as img', 'img.item_code', '=', 'ucarts.item_code')->groupBy('img.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->where('ucarts.created_at','>=',$formatted_date)->get();
        $ct = ucart::join('products as p', 'p.item_code', '=', 'ucarts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'ucarts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->where('ucarts.created_at', '>=', $formatted_date)->get();
        $method = DB::table('ucarts')->where('user_temp_order_id', Auth::guard('user')->user()->id)->where('ucarts.created_at', '>=', $formatted_date)->limit(1)->get();
        // dd($method);
        $land = order_shipment_details::where('user_temp_order_id', $session)->orderBy('id', 'desc')->limit(1)->get();

        return view('order-complete', compact('cat', 'catg', 'brands', 'cart', 'ct', 'crt', 'sub', 'category', 'a', 'address', 'method', 'land'));
    }





    public function placeOrder(Request $req)
    {
        $session = Auth::guard('user')->user()->id;

        $payment_method = "Stripe";

        $cts = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
            ->groupBy('img.item_code')
            ->where('user_temp_order_id', Auth::guard('user')->user()->id)
            ->get();
        $shp = 0;

        $total = 0; $qty = 0;
        foreach ($cts as $ct) {
            $total += $ct->item_qty * $ct->new_price;
            $qty += $ct->item_qty;
        }

        $shp += config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping'));

        $code = $a = mt_rand(100000, 999999);
        order_payment_detail::create([
            'user_temp_order_id' => $session,
            'order_amount' => $total + $shp,
            'payment_status' => 0,
            'order_no' => $code,
            'status' => 0,
            'payment_method' => $payment_method, //$req->payment_method,
        ]);
        $cartss = user_cart::where('user_temp_order_id', Auth::guard('user')->user()->id)->get();

        foreach ($cartss as $car) {
            order_details::create([
                'user_id' => $session,
                'item_name' => $car->item_code,
                'item_qty' => $car->item_qty,
                'color' => $car->color,
                'order_no' => $code,

            ]);
        }
        //$rr=user_cart::join('item_current_inventories as i' , 'i.item_code', '=', 'user_carts.item_code')->where('user_temp_order_id',Auth::guard('user')->user()->id)->get('item_code');
        $co = item_current_inventory::join('user_carts as i', 'i.item_code', '=', 'item_current_inventories.item_code')
            ->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
        // dd($co);
        foreach ($co as $co) {
            $rr = $co->item_code;
            $l = $co->item_qty_in_hand - $co->item_qty;

            // dd($rr);
            $requests = item_current_inventory::where('item_code', $rr);
            // dd($requests);
            $requests->update(array('item_qty_in_hand' => $l));
        }
        $print = user_cart::where('user_temp_order_id', '=', Auth::guard('user')->user()->id)->get();
        foreach ($print as $p) {
            ucart::create([
                //'cid' => $p->cid,
                'item_code' => $p->item_code,
                'item_qty' => $p->item_qty,
                'date_of_addition' => $p->date_of_addition,
                'user_temp_order_id' => $p->user_temp_order_id,
                'color' => $p->color,
                'order_no' => $code,
                'method' => $payment_method,

            ]);
        }

        //return redirect()->route('complete-order');
        return redirect()->route('view-order', $code);
    }

    public function truncate()
    {
        ucart::truncate();
        return redirect()->route('complete-order');
    }




    public function orderDetails($id)
    {
        $o = order_details::where('order_details.order_no', $id)
            ->join('order_payment_details as o', 'o.order_no', '=', 'order_details.order_no')
            ->get();
        $os = order_details::where('order_details.order_no', $id)
            ->join('order_shipment_details as os', 'os.user_temp_order_id', '=', 'order_details.user_id')
            ->orderby('os.id', 'desc')->limit(1)->get();
        if(Auth::guard('user')->check()){
            return view('order-details-user', compact('o', 'os'));
        }else{
            return view('order-details', compact('o', 'os'));
        }

    }



}
