<?php

namespace App\Http\Controllers;

use App\item_categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function display(){
        $a=item_categories::all();
        return view('categorie',compact('a'));
    }
    public function create(){
        $a=item_categories::all();
          $ca=item_categories::where('category_parent_category','=','0')->get();
        return view('add-categories-brannds',compact('a','ca'));
    }
    public  function  store(Request $req){
         $this->validate($req, [
            'category_name' =>
                array(
                    'required',
                    'regex:/^[a-zA-Z ]*$/'
                ),
            'category_parent_category'=>'required',
            'category_description'=>'required',
        ]);
            item_categories::create($req->all());
            return redirect()->route('categorie');
    }
    public function delete($id){
        item_categories::destroy($id);
        return redirect()->route('categorie');
    }
    public function edit($id){
        $cat= item_categories::find($id);
        return view('edit-category',compact('cat'));
    }
    public function update($id, Request $request){
        $item = item_categories::find($id);
        $item->update($request->all());
        return redirect()->route('categorie');
    }

}
