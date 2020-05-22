<?php

namespace App\Http\Controllers;

use App\sales_invoice_details;
use App\sales_return_details;
use App\sales_sdn_details;
use App\temp_sdn;
use Illuminate\Http\Request;
use PDF;

class SdnController extends Controller
{
    public function create(){
        $temp=temp_sdn::all();
      $inv=sales_invoice_details::all();
        return view('sdn',compact('inv','temp'));
    }
    public function details($id){
        
        $details=sales_invoice_details::where('sales_inv_code', $id )->get(["item_name",'item_qty',"sales_inv_code","item_code"]);
        return htmlspecialchars(json_encode($details), ENT_NOQUOTES);
    }
    public  function  store(Request $req){
         $this->validate($req, [
            'sales_delivered_item'=>'required',
            'sales_delivered_qty'=>'required',

        ]);
        temp_sdn::create([
            'sales_delivered_item'=>$req->sales_delivered_item,
            'sales_delivered_qty' => $req->sales_delivered_qty,
            'sales_inv_code'=>$req->sales_inv_code
        ]);
        return redirect()->route('sdn');
    }
    public function delete($id){
       temp_sdn::destroy($id);
        return redirect()->route('sdn');
    }
    public  function  storesdn(Request $req)
    {
        $code = 'sdn-' . str_random(6);
        $temp = temp_sdn::all();
        foreach ($temp as $sdn) {
            sales_sdn_details::create([
                'sales_delivered_item' => $sdn->sales_delivered_item,
                'sales_sdn_number' => $code,
                'sales_delivered_qty' => $sdn->sales_delivered_qty,
                'sales_inv_code' => $sdn->sales_inv_code,
            ]);
            temp_sdn::truncate();
            return redirect()->route('sdn');
        }
    }
    public function downloadPDF()
    {
        $code = 'sdn-' . str_random(6);
        $temp = temp_sdn::all();
        foreach ($temp as $sdn) {
            sales_sdn_details::create([
                'sales_delivered_item' => $sdn->sales_delivered_item,
                'sales_sdn_number' => $code,
                'sales_delivered_qty' => $sdn->sales_delivered_qty,
                'sales_inv_code' => $sdn->sales_inv_code,
            ]);
            $user = temp_sdn::all();
            $pdf = PDF::loadView('pdf/pdf-sdn', compact('user'));
            temp_sdn::truncate();
            return $pdf->stream('sdn.pdf');
        }
    }
}
