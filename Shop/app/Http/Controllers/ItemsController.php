<?php
namespace App\Http\Controllers;
use App\item_brands;
use App\item_categories;
use App\items;
use App\items_images;
use App\ProductImages;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function display(){
        $items=items::all();
        $cat=item_categories::all();
        $brands=item_brands::all();
        return view('inventory',compact('items','cat','brands','im'));
    }
     public function displayAll(){
        $items=Products::all();
        $cat=item_categories::all();
        $brands=item_brands::all();
        return view('all-items',compact('items','cat','brands','im'));
    }
    public function imagesPro($id){

        $i=Products::leftJoin('product_images as p', 'p.item_code', '=', 'products.item_code' )->where('p.item_code',$id)->get(['p.item_image','p.id']);
        return htmlspecialchars(json_encode($i), ENT_NOQUOTES);

    }
     function massremovee($id)
    {
        //$id = $request->input('id');
        Products::where('id', $id)->delete();
        //dd($id);
        // items::destroy($done);
    }
    public function deleteimgs($id){
        ProductImages::destroy($id);
        return redirect()->route('all-items');
    }

    public function create(){
        $category=item_categories::where('category_parent_category','!=', 0)->get();
        $brands=item_brands::all();
        $items=items::all();
        return view('add-items',compact('category','brands','items'));
    }
     public function editPro($id){
       $category=item_categories::where('category_parent_category','!=', 0)->get();
        $brands=item_brands::all();
        $item = Products::find($id);
         $it=Products::where ('id',$id)->get();
//        dd($it);
       foreach($it as $item){
           $chk=$item-> item_code;
        }

        $img = ProductImages::where('item_code',$chk)->get();
//      dd($img);
       return view('edit-products',compact('item','brands','category','img'));
    }
    // public function updatePro($id,Request $request){
    //     $item = Products::find($id);
    //     $item->update($request->all());
    //     return redirect()->route('items');
    // }
     public function updatePro($id,Request $request){
        $item = Products::find($id);

        $item->update($request->all());
//        $product=ProductImages::where('id',$id)->get();

        $it=Products::where ('id',$id)->get();
//        dd($it);
        foreach($it as $item){
            $chk=$item->item_code;
        }
//        dd($chk);
        $product=ProductImages::where('item_code',$chk)->first();
//   dd($product);
//foreach($product as $product){
//            $product['id'];
//    $product['item_image'];
//        }
    if ($request->hasFile('item_image')) {
            $files = $request->file('item_image');
        //dd($files);
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = "Item"."-".str_random(3).".".$extension;
                $folderpath  = 'uploads'.'/';
                $x=$file->move($folderpath , $fileName);
                $product->update([
                   'item_image' => $x,
                ]);


            }
   }


        return redirect()->route('items');
    }
    public function images($id){

        $i=items::leftJoin('items_images as i', 'i.item_code', '=', 'items.item_code' )->where('i.item_code',$id)->get(['i.item_image','i.id']);
        return htmlspecialchars(json_encode($i), ENT_NOQUOTES);

    }
    public  function  store(Request $req){
          $this->validate($req, [
            'item_name' =>'required',
            'item_code'=>'required',
            'colors'=>'required',
            'item_description'=>'required',
            'item_image'=>'required',
            'item_type'=>'required',
            'item_brand'=>'required',
            'item_category'=>'required',
        ]);
        items::create($req->all());
//        $photoName = time().'.'.$req->item_image->getClientOriginalExtension();
//        $x= $req->item_image->move( $photoName);
        if ($req->hasFile('item_image')) {
            $files = $req->file('item_image');
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = "Item"."-".str_random(3).".".$extension;
                $folderpath  = 'uploads'.'/';
                $x=$file->move($folderpath , $fileName);
                items_images::create([
                    'item_code' => $req->item_code,
                    'item_image' => $x,
                ]);
            }}
        return redirect()->route('add-items');
    }

     public  function  storeItems(Request $req){
        $this->validate($req, [
            'item_name' => 'required',
            'item_code'=>'required',
            'colors'=>'required',
            'item_description'=>'required',
            'item_image'=>'required',
            'item_brand'=>'required',
            'item_category'=>'required',
        ]);
        Products::create($req->all());
//        $photoName = time().'.'.$req->item_image->getClientOriginalExtension();
//        $x= $req->item_image->move( $photoName);
        if ($req->hasFile('item_image')) {
            $files = $req->file('item_image');
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = "pro"."-".str_random(3).".".$extension;
                $folderpath  = 'uploads'.'/';
                $x=$file->move($folderpath , $fileName);
                ProductImages::create([
                    'item_code' => $req->item_code,
                    'item_image' => $x,
                ]);
            }}
        return redirect()->route('items');
    }
    public function items(){
        $category=item_categories::all();
        $brands=item_brands::all();
         $items=Products::all();
        return view('items',compact('category','brands','items'));
    }
     public function deleteItems($id){
//        DB::table('products')
//            ->join('product_images', 'products.item_code', 'product_images.item_code')
//            ->where('product_images.item_code', $id) ->where('products.item_code', $id)
//            ->delete();
        DB::table('products')->where('products.item_code', $id)->delete();
        DB::table('product_images')->where('product_images.item_code', $id)->delete();
        return redirect()->route('items');
    }
    public function delete($id){
        items::destroy($id);
        return redirect()->route('add-items');
    }
    public function deleteimg($id){
        items_images::destroy($id);
        return redirect()->route('inventory');
    }
    public function edit($id){
          $category=item_categories::where('category_parent_category','!=', 0)->get();
        $brands=item_brands::all();
        $item = items::find($id);
        return view('edit-items',compact('item','brands','category'));
    }
    public function update($id,Request $request){
        $item = items::find($id);
        $item->update($request->all());
        return redirect()->route('add-items');
    }
    public function search($id){

    $search=items::Where('item_category', 'like', '%' . $id . '%')->get();
        return htmlspecialchars(json_encode($search), ENT_NOQUOTES);
    }
    public function searchBrand($id,$c){

        $search=items::Where('item_brand', 'like', '%' . $id . '%' )->Where('item_category', 'like', '%' . $c. '%')->get();
        return htmlspecialchars(json_encode($search), ENT_NOQUOTES);

    }
    function massremove($id)
    {
        //$id = $request->input('id');
         items::where('id', $id)->delete();
        //dd($id);
      // items::destroy($done);
    }
}
