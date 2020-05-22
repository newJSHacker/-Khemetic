<?php

namespace App\Http\Controllers;
use DB;
use App\item_categories;
use App\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $req){
        
       // contact::create($contact->all());
        $to = "sales@zarnaboutique.com";
        $subject = "Zarna  Boutique";
        $name=$req->visitor_name;
        $from=$req->visitor_email;
        $m=$req->visitor_message;
        $message='
        
            <div>Name: '.$name.' </div>
           
            <div>Message: '. $m .'</div> ';
        //$website=$contact->visitor_website;
        // Always set content-type when sending HTML email
       $headers = 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // More headers
         $headers .= 'From: "' . $from . '" <' . $from . '>' . "\r\n" ;
         
        if (mail($to,$subject,$message,$headers)) {
            echo "Mail Sent.";
            return redirect()->Route("contact-us");
        }
        else {
            echo "failed";
            return redirect()->Route("shop");
            
        }

        
    }
    public function create(){
        $catg=item_categories::all();
     $cat = item_categories::groupBy('category_parent_category')->get();
       $caa=  DB::table('item_categories')->leftjoin('item_categories as subcat' ,'subcat.id','=' ,'item_categories.id')->get();
        $category=item_categories::where('category_parent_category','!=', 0)->get();
        if (Auth::guard('user')->check()){
            $crt = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
            $sub = user_cart::join('items as i', 'i.item_code', '=', 'user_carts.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'user_carts.item_code')
                ->join('items_images as img', 'img.item_code', '=', 'user_carts.item_code')->groupBy('img.item_code')->where('user_temp_order_id', Auth::guard('user')->user()->id)->get();
        }
        return view("contact-us",compact('cat','catg','crt','sub','category','caa'));
    }
}
