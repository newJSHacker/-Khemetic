<?php

namespace App\Http\Controllers;

use App\item_brands;
use App\comments;
use App\item_categories;
use App\items;
use App\items_images;
use App\measurments_females;
use App\order_payment_detail;
use App\user_cart;
use App\order_details;
use App\posts;
use App\ProductImages;
use App\Products;
use App\replies;
use App\request_for_return;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function links()
    {
        $url = 'ecom.logic-valley.com';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);

        if ($result === false) {
            echo 'broken url';
        } else {
            $newUrl = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);

            if ($newUrl !== $url) {
                echo 'redirect to: ' . $newUrl;
            }
        }
        curl_close($curl);
    }

    public function create()
    {

        $catg = item_categories::all();
        $pst = posts::limit(3)->orderBy('id', 'desc')->get();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        $brands = item_brands::all();
        // $items = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->orderBy('i.id','desc')->limit(10)->get();
        $items = productImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->orderBy('p.id', 'desc')->limit(10)->get();
        $categories = productImages::join('products as i', 'i.item_code', '=', 'product_images.item_code')->distinct('i.item_category')->groupBy('i.item_category')->get();
        return view('indexweb', compact('cat', 'catg', 'brands', 'items', 'categories', 'caa', 'pst'));
    }

    public function about()
    {
        $catg = item_categories::all();
        $brands = item_brands::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        return view('about-us', compact('cat', 'catg', 'cart', 'caa', 'brands'));
    }

    public function eventmanagement()
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        return view('event-management', compact('cat', 'catg', 'cart', 'caa'));
    }

    public function blog()
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        $post = posts::paginate(6);
        $pst = posts::limit(3)->orderBy('id', 'desc')->get();

        return view('blog', compact('cat', 'catg', 'cart', 'post', 'caa', 'pst'));

    }

    public function singleBlog($id)
    {
        $catg = item_categories::all();
        $caa = item_categories::where('category_parent_category', '=', '1')->get();

        $cat = item_categories::groupBy('category_parent_category')->get();

        $postss = posts::where('id', $id)->get();
        $post = posts::paginate(6);
        $pst = posts::limit(3)->orderBy('id', 'desc')->get();

        return view('single-blog', compact('cat', 'catg', 'cart', 'post', 'caa', 'postss', 'pst'));

    }

    public function shop(Request $req)
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = item_categories::where('category_parent_category', '=', '1')->get();
        $ca = item_categories::all();
        $i = Products::join('product_images as p', 'products.item_code', '=', 'p.item_code')->groupBy('p.item_code')->paginate(12);

        // $i=items_images::join('items as i' , 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->paginate();

        return view('shop', compact('cat', 'catg', 'ca', 'items', 'i', 'caa'));

    }

    public function getProduct(Request $req)
    {
        $products = Products::join('product_images as p', 'products.item_code', '=', 'p.item_code')->groupBy('p.item_code')->get();

        foreach ($products as $p) {
            $p->getPath();
            $p->getImageLink();
        }

        return response()->json([
            'products' => $products
        ]);

    }

    public function search(Request $req)
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $ca = item_categories::all();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        $in = $req->item_name;
        $ctg = $req->item_category;
        /* Do something with data */

        // $i=items_images::join('items as i' , 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->where('item_name',$in)->where('item_category',$ctg)->groupBy('items_images.item_code')->get();
        //   $i=items_images::join('items as i' , 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->where('item_name','LIKE', '%'. $in . '%')->where('item_category',$ctg)->groupBy('items_images.item_code')->get();
        $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->where('item_name', 'LIKE', '%' . $in . '%')->where('item_category', $ctg)->groupBy('product_images.item_code')->get();
        $it = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->where('item_name', 'LIKE', '%' . $in . '%')->where('item_category', $ctg)->groupBy('product_images.item_code')->limit(1)->get();
        return view('search', compact('cat', 'catg', 'ca', 'items', 'i', 'caa', 'it'));

    }

    public function shopp(Request $req, $catgr)
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $ca = item_categories::all();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        // $i=items_images::join('items as i' , 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->where('item_category',$catgr)->groupBy('items_images.item_code')->get();
        $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->where('item_category', $catgr)->groupBy('product_images.item_code')->paginate(12);
        $it = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->where('item_category', $catgr)->groupBy('product_images.item_code')->limit(1)->get();
        return view('shopp', compact('cat', 'catg', 'ca', 'items', 'i', 'caa', 'it'));

    }

    public function sorts(Request $req)
    {
        // $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->paginate();
        $i = Products::join('product_images as p', 'products.item_code', '=', 'p.item_code')->groupBy('p.item_code')->paginate();
        return view('sort', compact('i'));
    }

    public function sort(Request $req)
    {
        $p = $req->per;
        if ($req->speed == "atz") {
//            $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->orderBy('item_description', 'asc')->paginate();
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->orderBy('item_description', 'asc')->paginate();
            return view('sort', compact('i'));

        }
        if ($req->speed == "zta") {
//            $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->orderBy('item_description', 'desc')->paginate();
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->orderBy('item_description', 'desc')->paginate();
            return view('sort', compact('i'));
        }
        if ($req->speed == "lth") {
//            $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->orderBy('item_current_selling_price', 'asc')->paginate();
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->orderBy('new_price', 'asc')->paginate();
            return view('sort', compact('i'));
        }
        if ($req->speed == "htl") {
//            $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->orderBy('item_current_selling_price', 'desc')->paginate();
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->orderBy('new_price', 'desc')->paginate();

            return view('sort', compact('i'));
        }
        $p = $req->per;
        if ($req->per == "24") {
//            $i = items_images::join('items as i', 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->groupBy('items_images.item_code')->limit(24)->paginate($p);
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->limit(24)->paginate($p);
            return view('sort', compact('i'));
        }
        if ($req->per == "12") {
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->limit(12)->paginate($p);
            return view('sort', compact('i'));
        }
        if ($req->per == "6") {
            $i = ProductImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->groupBy('product_images.item_code')->limit(6)->paginate($p);
            return view('sort', compact('i'));
        }


    }


    public function details($id)
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        $brands = item_brands::all();
        // $details=items::join('items_images as i' , 'i.item_code', '=', 'items.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->where('items.item_code', $id )->limit(1)->get();
        $details = Products::join('product_images as p', 'p.item_code', '=', 'products.item_code')->where('products.item_code', $id)->limit(1)->get();
        //dd($details);
        // $det=items::join('items_images as i' , 'i.item_code', '=', 'items.item_code')->where('items.item_code', $id )->get();
        $det = Products::join('product_images as p', 'p.item_code', '=', 'products.item_code')->where('products.item_code', $id)->get();
        //dd($det);
        // $itms=items::join('item_current_inventories as it','it.item_code', '=', 'items.item_code')->where('items.item_code', $id )->get();
        $itms = Products::where('products.item_code', $id)->get();
        //  $brand=items::join('item_current_inventories as it','it.item_code', '=', 'items.item_code')->join('item_brands as b','b.brand_name', '=', 'items.item_brand')->where('items.item_code', $id )->get();
        $brand = products::join('item_brands as b', 'b.brand_name', '=', 'products.item_brand')->where('products.item_code', $id)->get();
        // dd($brand);
        // $items=items::join('item_current_inventories as it','it.item_code', '=', 'items.item_code')->where('items.item_code', $id )->get();
        $items = Products::where('item_code', $id)->get();
        //  $c=items::join('item_current_inventories as it','it.item_code', '=', 'items.item_code')->where('items.item_code', $id )->get();
        $c = products::where('item_code', $id)->get();
        // $comments=comments::join('item_current_inventories as it','it.item_code', '=', 'comments.code')->where('it.item_code', $id )->get();
        $comments = comments::join('products as it', 'it.item_code', '=', 'comments.code')->where('it.item_code', $id)->get();
        return view('product-details', compact('details', 'cat', 'catg', 'det', 'itms', 'brand', 'caa', 'items', 'c', 'comments'));
    }

    public function type()
    {
        if (Auth::guard('user')->check()) {
            $price = measurments_females::where('user_id', Auth::guard('user')->user()->id)->get(["profile_name", "id"]);
            return htmlspecialchars(json_encode($price), ENT_NOQUOTES);
        }
    }

    public function searchPro(Request $req)
    {
        $catg = item_categories::all();
        $cat = item_categories::groupBy('category_parent_category')->get();
        $caa = DB::table('item_categories')->leftjoin('item_categories as subcat', 'subcat.id', '=', 'item_categories.id')->get();
        $ca = item_categories::all();

        $in = $req->item_name;
        /* Do something with data */

        // $i=items_images::join('items as i' , 'i.item_code', '=', 'items_images.item_code')->join('item_current_inventories as it', 'it.item_code', '=', 'i.item_code')->where('item_name',$in)->groupBy('items_images.item_code')->get();
        $i = productImages::join('products as p', 'p.item_code', '=', 'product_images.item_code')->where('item_name', 'LIKE', '%' . $in . '%')->groupBy('product_images.item_code')->get();
        return view('searchh', compact('cat', 'catg', 'ca', 'items', 'i', 'caa'));
    }

    public function myOrders()
    {
        $session = Auth::guard('user')->user()->id;
        $catg = item_categories::all();
        $cat = item_categories::where('category_parent_category', '=', 0)->distinct()->get();

        $orders = order_payment_detail::join('users as u', 'u.id', '=', 'order_payment_details.user_temp_order_id')
            ->join('order_shipment_details as or', 'or.user_temp_order_id', '=', 'order_payment_details.user_temp_order_id')->where('order_payment_details.user_temp_order_id', $session)
            ->groupBy('order_payment_details.id')
            ->get(['order_payment_details.id', 'order_payment_details.created_at', 'u.name', 'or.receiver_address', 'order_no', 'status', 'order_payment_details.order_amount']);
        //dd($orders);
        return view('my-orders', compact('cat', 'catg', 'cart', 'orders'));
    }

    public function cancel($id)
    {

        order_payment_detail::destroy($id);
        return redirect()->route('my-orders');
    }

    public function ReturnItems($id)
    {
        $ord = order_details::where('order_details.order_no', $id)->join('order_payment_details as o', 'o.order_no', '=', 'order_details.order_no')->get();
        $ords = order_details::where('order_details.order_no', $id)->join('order_payment_details as o', 'o.order_no', '=', 'order_details.order_no')->join('items as itm', 'itm.item_code', '=', 'order_details.item_name')->get();
        return view('return-items', compact('ord', 'ords'));
        // return view('my-orders',compact('cat','catg','cart','crt','sub','category','orders'));
    }

    public function SubmitReturn(Request $req)
    {
        $session = Auth::guard('user')->user()->id;
        request_for_return::create([
            'order_no' => $req->order_no,
            'item_code' => $req->item_code,
            'item_qty' => $req->item_qty,
            'reason' => $req->reason,
            'user_id' => $session,
        ]);
        return redirect()->route('my-orders');


    }

    public function comments(Request $req)
    {
        comments::create($req->all());
        return redirect()->back();
        //   return redirect()->route('');
    }

    public function replies($code, $id)
    {
        $com = comments::where('code', $code)->get();
        //  dd($com);
        return view('reply', compact('com'));

        //comments::create($req->all());
        //return redirect()->back();
        //   return redirect()->route('');
    }

    public function reply(Request $req)
    {

        replies::create([
            'cid' => $req->cid,
            'icode' => $req->icode,
            'uname' => $req->uname,
            'umessage' => $req->umessage,
        ]);
        return redirect()->back();
        //comments::create($req->all());
        //return redirect()->back();
        //   return redirect()->route('');
    }

}

