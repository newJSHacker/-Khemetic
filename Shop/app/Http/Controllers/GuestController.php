<?php

namespace App\Http\Controllers;

use App\GuestUser;
use App\item_brands;
use App\item_categories;
use App\order_details;
use App\user_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class GuestController extends Controller
{
    public function guest()
    {

        if (!Auth::guard('user')->check()) {
            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
            $brands = item_brands::all();
            $category = item_categories::all();
            return view('order-now', compact('cat', 'catg', 'brands', 'items', 'categories', 'category'));
        }
    }

    public function store(Request $req)
    {
        $val = $req->cookie('laravel_session', 10);
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|string|email',
            'address' => 'required',
            'mobile' => 'required',
        ]);
        $ct = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
            ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('cookie', $val)->get();
        $shp = 0;
        $qty = DB::table('user_carts')->where('cookie', $val)->sum('item_qty');

        //$shp +=(200+($qty-1)*50);
        $shp += config('app.first_item_shipping') + (($qty - 1) * config('app.other_item_shipping'));

        $total = 0;
        foreach ($ct as $ct) {
//            $total += $ct->item_qty * $ct->item_current_selling_price;
            $total += $ct->item_qty * $ct->new_price;
        }
        $code = $a = mt_rand(100000, 999999);
        GuestUser::create([
            'order_no' => $code,
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'address' => $req->address,
            'cookie' => $val,
            'total_amount' => $total + $shp
        ]);

        $cart = DB::table('user_carts')->where('cookie', '=', $val)->get();
        foreach ($cart as $car) {

            order_details::create([
                'cookie' => $val,
                'item_name' => $car->item_code,
                'item_qty' => $car->item_qty,
                'color' => 'NULL',
                'order_no' => $code,
                'measurements' => '0'

            ]);
        }

        DB::table('user_carts')->where('cookie', '=', $val)->delete();
        return redirect()->to('order-now');
    }
}
