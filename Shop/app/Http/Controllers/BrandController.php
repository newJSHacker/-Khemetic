<?php

namespace App\Http\Controllers;
use App\item_brands;
use App\item_categories;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function display(){
        $ca=item_brands::all();
        return view('brands',compact('ca'));
    }
    public function create(){
        $ca=item_brands::all();
        return view('add-brands',compact('ca'));
    }
    public  function  store(Request $req){
          $this->validate($req, [
            'brand_name' =>
                array(
                    'required',
                    'regex:/^[a-zA-Z ]*$/'
                ),
            'brand_logo'=>'required',
        ]);
      // $photoName = time().'.'.$req->brand_logo->getClientOriginalExtension();
        /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
        */
        //$x= $req->brand_logo->move(public_path('avatars'), $photoName);
      // $x= $req->brand_logo->move( $photoName);
        $files = $req->file('brand_logo');
        $extension = $files->getClientOriginalExtension();
        $fileName = "Brand"."-".str_random(3).".".$extension;
        $folderpath  = 'uploads'.'/';
        $x=$files->move($folderpath , $fileName);
        item_brands::create([
            'brand_name' => request()->get('brand_name'),
            'brand_logo' => $x,
        ]);
        return redirect()->route('brands');
    }
    public function delete($id){
        item_brands::destroy($id);
        return redirect()->route('brands');
    }
    public function edit($id){
        $brands = item_brands::find($id);
        return view('edit-brand',compact('brands'));
    }
    public function update($id, Request $request){
        $item = item_brands::find($id);
//        $photoName = time().'.'.$request->brand_logo->getClientOriginalExtension();
//        $x= $request->brand_logo->move( $photoName);

            $item->update([
                'brand_name' => request()->get('brand_name'),

            ]);
        if ($request->hasFile('brand_logo')) {
            $files = $request->file('brand_logo');
            $extension = $files->getClientOriginalExtension();
            $fileName = "Brand" . "-" . str_random(3) . "." . $extension;
            $folderpath = 'uploads' . '/';
            $x = $files->move($folderpath, $fileName);
            $item->update([
                'brand_logo' => $x,

            ]);
        }
        return redirect()->route('brands');
    }
}
