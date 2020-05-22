<?php

namespace App\Http\Controllers;
use App\sales_customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function create(){
        $customers=sales_customers::all();
        return view('customer',compact('customers'));
    }
    public  function  store(Request $req){
         $this->validate($req, [
            'customer_name' =>
                array(
                    'required',
                    'regex:/^[a-zA-Z ]*$/'
                ),
            'customer_cnic'=>'required',
            'customer_address'=>'required',
            'customer_city'=>'required',
            'customer_country'=>'required',
            'customer_mobile_number'=>'required',
            'customer_email'=>'required',
        ]);
        sales_customers::create($req->all());
        return redirect()->route('customer');
    }
    public function delete($id){
        sales_customers::where('cid',$id)->delete();
        return redirect()->route('customer');
    }
    public function edit($id){

        $customer = sales_customers::where('cid', '=', $id)->first();
        return view('edit-customer',compact('customer'));
    }
    public function update($id, Request $request){
        $customer= sales_customers::where('cid',$id);
        $customer->update($request->except(['_token']));
        return redirect()->route('customer');
    }
}
