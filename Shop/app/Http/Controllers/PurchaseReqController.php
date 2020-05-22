<?php
namespace App\Http\Controllers;
use App\items;
use App\purchase_request_details;
use App\sales_perchase_request_details;
use App\temp_purchase_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PDF;
class PurchaseReqController extends Controller
{
    public function create(){
        //$input = Input::all();
        $i=items::all();
        $pr=temp_purchase_request::all();
       return view('purchase-request',compact('pr','i'));
    }
    public  function  store(Request $req){
         $this->validate($req, [
            'purchase_requested_item'=>'required',
            'purchase_requested_qty'=>'required',
        ]);
      //  $code = 'tran-' . str_random(6);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(99, 100)
            . mt_rand(99, 100)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = 'PR#-'.$pin;
       temp_purchase_request::create([
           'purchase_requested_item' => request()->get('purchase_requested_item'),
           'purchase_requested_qty' => request()->get('purchase_requested_qty'),
          // 'purchase_request_number' => $string,
       ]);
        return redirect()->route('purchase-request');
    }
    public function details($id)
    {
        $price= items::where('item_name', $id)->get(["item_code"]);
        return htmlspecialchars(json_encode($price), ENT_NOQUOTES);

        // return    json_decode($price, true);
    }
    public  function  storepurR(Request $req){

        //  $code = 'tran-' . str_random(6);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(99, 100)
            . mt_rand(99, 100)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = 'PR'.$pin;
        $temp=temp_purchase_request::all();
        foreach ($temp as $temp) {
            sales_perchase_request_details::create([
                'purchase_requested_item' => $temp->purchase_requested_item,
                'purchase_requested_qty' => $temp->purchase_requested_qty,
                 'purchase_request_number' => $string,
            ]);
        }
        temp_purchase_request::truncate();
        return redirect()->route('purchase-request');
    }
    public function delete($id){
       temp_purchase_request::destroy($id);
        return redirect()->route('purchase-request');
    }
    public function edit($id){
        $pr = temp_purchase_request::find($id);
        $i=items::all();
        return view('edit-pr',compact('pr','i'));
    }
    public function update($id, Request $request){
        $pr=temp_purchase_request::find($id);
        $pr->update($request->all());
        return redirect()->route('purchase-request');
    }
    public function downloadPDF(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(99, 100)
            . mt_rand(99, 100)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = 'PR'.$pin;
        $temp=temp_purchase_request::all();
        foreach ($temp as $temp) {
            sales_perchase_request_details::create([
                'purchase_requested_item' => $temp->purchase_requested_item,
                'purchase_requested_qty' => $temp->purchase_requested_qty,
                'purchase_request_number' => $string,
            ]);
        }
        $user = temp_purchase_request::all();
        $pdf = PDF::loadView('pdf/pdf-pr', compact('user'));
       temp_purchase_request::truncate();
        return $pdf->stream('purchase-Request.pdf');
    }
}
