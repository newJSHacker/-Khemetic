<?php

namespace App\Http\Controllers;
use DB;
use App\item_brands;
use App\item_categories;
use App\User;
use App\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function create()
    {
        if (Auth::guard('user')->check()) {
            $catg = item_categories::all();
            $cat = item_categories::groupBy('category_parent_category')->get();
              $caa=  DB::table('item_categories')->leftjoin('item_categories as subcat' ,'subcat.id','=' ,'item_categories.id')->get();
            $brands = item_brands::all();
            $category = item_categories::all();
            if (Auth::guard('user')->check()) {
                $crt = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
                    ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
                $sub = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
                    ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            }
            return view('password', compact('cat', 'catg', 'brands', 'crt', 'sub', 'category','caa'));
        } else {
            return redirect()->route('login-with-zarna');
        }
    }

    public function changepassword(Request $request)
    {


        // The passwords matches


        $session = Auth::guard('user')->user()->id;

        if ((Hash::check($request->input('cupass'), Auth::guard('user')->user()->password))) {
            if(strlen($request->npass) < 6){
                return redirect()->back()->with("error", "password should be at least 6 characters");
            }
            if ($request->npass == $request->cpass) {
                User::where('id', $session)->update([
                    'password' => bcrypt($request->cpass),
                ]);
                return redirect()->back()->with("success", "Password changed successfully !");
            } else {
                return redirect()->back()->with("error", "Password not matched,please try again");
            }
        } else {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");

        }
    }

//        $session = Auth::guard('user')->user()->id;
//        $current_password =Auth::guard('user')->user()->password;
//        if(Hash::check($request->input('cupass'), $current_password)) {
//            if ($request->npass == $request->cpass) {
//                User::where('id', $session)->update([
//                    'password' => bcrypt($request->cpass),
//                    //'total'=>$qty*$p,
//                ]);
//                return redirect()->route('password');
//            }
//            else{
//                echo "<script>
//                alert('password not matched');
//                window.location.href='../password';
//                </script>";
//            }
//        }
//        else{
//            echo "<script>
//                alert('current password is Incorrect');
//                window.location.href='../password';
//                </script>";
//        }


}
