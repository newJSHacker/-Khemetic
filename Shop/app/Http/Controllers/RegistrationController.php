<?php

namespace App\Http\Controllers;

use DB;
use App\item_brands;
use App\item_categories;
use App\items_images;
use App\User;
use App\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RegistrationController extends Controller
{
    protected $redirectTo = '/';
    protected $guard = 'admin';

    public function create()
    {

        if (!Auth::guard('user')->check()) {
            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
            $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
            $brands = item_brands::all();
            $category = item_categories::all();
            return view('register-login', compact('cat', 'catg', 'brands', 'items', 'categories', 'category', 'caa'));
        } else {
            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
            $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
            $brands = item_brands::all();
            $items = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->groupBy('items_images.item_code')->get();

            $categories = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->distinct('item_category')->groupBy('i.item_code')->get();

            return view('indexweb', compact('cat', 'catg', 'brands', 'items', 'categories', 'caa'));
        }
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $val = \Illuminate\Support\Facades\Cookie::get('laravel_session');

        $cart = user_cart::where('cookie', $val)->get();
        //dd($cart);


        $user = User::create(request(['name', 'email', 'password']));


        if (Auth::guard('user')->attempt(request(['email', 'password']), true) == true) {
            //auth()->login($user, true);

            if ($cart->count() > 0) {
                //dd(Auth::guard('user')->check());
                $new_cooke_val = \Illuminate\Support\Facades\Cookie::get('laravel_session');
                foreach ($cart as $c) {
                    $c->cookie = $new_cooke_val;
                    $c->user_temp_order_id = Auth::guard('user')->user()->id;
                    $c->save();
                }
                return redirect()->to('/shipment-details');
            } else {
                //dd("test123");
                return redirect()->to('/')->withSuccess('Registered Successfully!');
            }
        }else{
            return back();
        }
    }

    public function getstore()
    {
        if (Auth::guard('user')->attempt(request(['email', 'password'])) == true) {
//          Session::put('email', request(['email']));
//            $a=Session::get('email');
            // dd($a);
            // return redirect()->to('/');
            $val = \Illuminate\Support\Facades\Cookie::get('laravel_session');
            $date = new \DateTime();
            $date->modify('-2 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            user_cart::where('updated_at', '>=', $formatted)
                ->where('user_temp_order_id', 'NULL')
                ->where('cookie', 1)
                ->delete();

            $session = Auth::guard('user')->user()->id;
            $h = user_cart::where('user_temp_order_id', NULL)
                ->where('cookie', $val);
            $h->update(array('user_temp_order_id' => $session, 'cookie' => 0));
            $chk = user_cart::where('user_temp_order_id', NULL)
                ->where('cookie', 1)->get();
            foreach ($chk as $chk) {
                if ($chk['user_temp_order_id'] == 'NULL') {
                    return redirect()->to('cart');
                }
            }
            return redirect()->to('your-shoping-cart');

        }
        return back()->withErrors([
            'emaill' => 'These credentials do not match our records.'
        ]);
    }

    public function destroy()
    {
        Auth::guard('user')->logout();
        return redirect()->to('/login-with-zarna');
    }

}
