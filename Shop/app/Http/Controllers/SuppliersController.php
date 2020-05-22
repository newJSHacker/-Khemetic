<?php

namespace App\Http\Controllers;

use App\supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function create(){
        $supplier=supplier::all();
        return view('suppliers',compact('supplier'));
        //return view('suppliers');
    }
    public  function  store(Request $req){
         $this->validate($req, [
            'supplier_name' =>
                array(
                    'required',
                    'regex:/^[a-zA-Z ]*$/'
                ),
            'supplier_reg_no'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'website'=>'required',
            'email'=>'required',
            'contact_person'=>'required',
            'cp_designation'=>'required',
            'cp_phone'=>'required',
            'cp_email'=>'required',
        ]);
        supplier::create($req->all());
        return redirect()->route('suppliers');
    }
    public function delete($id){
        supplier::destroy($id);
        return redirect()->route('suppliers');
    }
    public function edit($id){
        $supplier = supplier::find($id);
        return view('edit-suppliers',compact('supplier'));
    }
    public function update($id, Request $request){
        $supplier = supplier::find($id);
        $supplier->update($request->all());
        return redirect()->route('suppliers');
    }
}
