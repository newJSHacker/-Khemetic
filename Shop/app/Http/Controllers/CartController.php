<?php

namespace App\Http\Controllers;

use App\item_brands;
use App\item_categories;
use App\measurments_females;
use App\item_current_inventory;
use App\items;
use App\items_images;
use App\ProductImages;
use App\Products;
use App\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function cart($id, Request $request)
    {
        if (Auth::guard('user')->check()) {
            $session = Auth::guard('user')->user()->id;
            // $details = items::join('item_current_inventories as i', 'i.item_code', '=', 'items.item_code')->where('items.item_code', $id)->get();
            $details = Products::where('products.item_code', $id)->get();
            //dd($details);
            foreach ($details as $d) {

//            user_cart::create([
//              $a=  'item_code' => $d->item_code,
//                'item_qty' => 1,
//                'user_measurment_id' =>'M',
//                'user_temp_order_id'=>$session,
//            ]);
                $cart = user_cart::where('user_temp_order_id', $session)->where('item_code', $d->item_code)->first();

                if (!$cart) {
                    $a = user_cart::create([
                        $a = 'item_code' => $d->item_code,
                        'item_qty' => 1,
                        // 'user_measurment_id' => 0,
                        'user_temp_order_id' => $session,
                        'cookie' => 0,
                    ]);
                    // dd($a);

                    return back();
                } else {
                    $u = user_cart::where('user_temp_order_id', $session)->where('item_code', $d->item_code)->get();
                    foreach ($u as $u) {
                        $q = $u->item_qty;
                        $c = $u->item_code;

                    }
                    $s = $q + 1;
                    //dd($s);
                    $hi = user_cart::where('item_code', $c);
                    $hi->update(array('item_qty' => $s));
                    //  dd($hi);
                    echo "<script>
                alert('Item already in cart.Quantity updated');
                window.location.href='../shop';
                </script>";
                }
            }
        }
        // else{
        //     return redirect()->route('login-with-zarna');
        // }
        $val = $request->cookie('laravel_session');
        if (!Auth::guard('user')->check()) {
            $details = Products::where('products.item_code', $id)->get();
            foreach ($details as $d) {

                $cart = user_cart::where('cookie', $val)->where('item_code', $d->item_code)->first();
                if (!$cart) {
                    user_cart::create([
                        $a = 'item_code' => $d->item_code,
                        'item_qty' => 1,
                        // 'user_measurment_id' => 0,
                        'cookie' => $val,
                    ]);

                    return back();
                } else {
                    $u = user_cart::where('item_code', $d->item_code)->where('cookie', $val)->get();
                    foreach ($u as $u) {
                        $q = $u->item_qty;
                        $c = $u->item_code;

                    }
                    // $s = $q + 1;
                    // //dd($s);
                    // $hi = user_cart::where('item_code', $c);
                    // $hi->update(array('item_qty' => $s));
                    //  dd($hi);
                    echo "<script>
                alert('Item already exists in cart.');
                window.location.href='../shop';
                </script>";
                }
            }
        }


        return back();

    }

    public function cartt(Request $req)
    {
        if (Auth::guard('user')->check()) {
            $session = Auth::guard('user')->user()->id;
            $cart = user_cart::where('user_temp_order_id', $session)->where('item_code', $req->item_code)->first();

            if (!$cart) {
                user_cart::create([

                    'item_code' => $req->item_code,
                    'item_qty' => $req->item_qty,
                    'user_temp_order_id' => $session,
                    'color' => $req->colors,
                    'cookie' => 0

                ]);
                return redirect()->route('shop');
            } else {
                $u = user_cart::where('user_temp_order_id', $session)->where('item_code', $req->item_code)->get();
                foreach ($u as $u) {
                    $q = $u->item_qty;
                    $c = $u->item_code;

                }
                $s = $q + 1;
                //dd($s);
                // $hi= user_cart::where('item_code',$c);
                // $hi->update(array('item_qty' => $s));
                //  dd($hi);
                echo "<script>
                alert('Item already exists in cart.');
                window.location.href='../shop';
                </script>";
            }
        }
        // else{
        //     return redirect()->route('login-with-zarna');
        // }
        else {

//            dd($value);
//            echo $value;


//            return redirect()->route('login-with-zarna');
            $details = Products::where('products.item_code', $req->item_code)->get();
            //dd($details);
            foreach ($details as $d) {

//            user_cart::create([
//              $a=  'item_code' => $d->item_code,
//                'item_qty' => 1,
//                'user_measurment_id' =>'M',
//                'user_temp_order_id'=>$session,
//            ]);
                $cart = user_cart::where('item_code', $d->item_code)->first();


//                  Cookie::queue('cookie', 1 );
//                    $value = $request->cookie('laravel_session');
//               $value= $request->cookie('cookie');
                // $cookie = Cookie::make('cookie', 1);

                // $val = Cookie::get('cookie');
                $val = $req->cookie('laravel_session');
//                    echo $value;
                user_cart::create([
                    $a = 'item_code' => $d->item_code,
                    'item_qty' => $req->item_qty,
                    'color' => $req->colors,
                    // 'user_measurment_id' => 0,
                    'cookie' => $val,
                ]);
//                    Cookie::queue(Cookie::make('stats', $d->item_code, 365 * 24 * 60));
//                    $id=($request->cookie('stats'));
//                    echo $id;

//
                return redirect()->route('shop');
//                } else {
//                    $u=user_cart::where('item_code',$d->item_code)->get();
//                    foreach($u as $u){
//                        $q=$u->item_qty;
//                        $c=$u->item_code;
//
//                    }
//                    $s=$q+1;
//                    //dd($s);
//                    $hi= user_cart::where('item_code',$c);
//                    $hi->update(array('item_qty' => $s));
//                    //  dd($hi);
//                    echo "<script>
//                alert('Item already in cart.Quantity updated');
//                window.location.href='../shop';
//                </script>";
//                }
            }
        }
    }

    public function create()
    {

        if (Auth::guard('user')->check()) {

            $session = Auth::guard('user')->user()->id;
            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
            $brands = item_brands::all();
            // $category = item_categories::all();
            // $cart = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            $cart = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            // $ms=measurments_females::join('users as u','u.id','measurments_females.user_id' )->where('user_id',$session)->get();
            //dd($ms);
//        $ct = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            $ct = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            if (Auth::guard('user')->check()) {
//            $crt = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
//                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
                $crt = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                    ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
                $sub = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                    ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            }
            return view('cart', compact('cat', 'catg', 'brands', 'items', 'categories', 'cart', 'ct', 'crt', 'sub', 'category', 'ms'));
        } else {

            $cc = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                ->groupBy('img.item_code')->where('cookie', Cookie::get('laravel_session'))->get();

            $ct = user_cart::join('products as p', 'p.item_code', '=', 'user_carts.item_code')
                ->join('product_images as img', 'img.item_code', '=', 'user_carts.item_code')
                ->groupBy('img.item_code')->where('cookie', Cookie::get('laravel_session'))->get();

            return view('cart', compact('cat', 'catg', 'brands', 'items', 'categories', 'cart', 'cc', 'ct', 'crt', 'sub', 'category', 'ms'));
            // return redirect()->route('login-with-zarna');
        }
    }

    public function delete($id)
    {
        DB::table('user_carts')->where('cid', '=', $id)->delete();
        return redirect()->route('your-shoping-cart');
    }

    public function update($cat_id, Request $request, $qty, $sp)
    {
        user_cart::where('cid', $cat_id)->update([
            'item_qty' => $request->item_qty,
            //'total'=>$qty*$p,
        ]);
    }

    public function updated($cat_id, Request $request)
    {
        user_cart::where('cid', $cat_id)->update([
            'user_measurment_id' => $request->user_measurment_id
        ]);
    }


}
