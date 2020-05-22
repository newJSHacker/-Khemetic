<?php

namespace App\Http\Controllers;
use App\grn_details;
use App\item_current_inventory;
use App\purchase_order_details;
use App\sales_return_details;
use Illuminate\Http\Request;
class SalesReturnController extends Controller
{
    public function create(){
        $grouped=grn_details::all();
        $grn= $grouped->groupBy('po_code');
        return view('sales-return',compact('grn'));
    }
    public function details($id){
        $details= grn_details::leftJoin('items as i', 'i.item_code', '=', 'grn_details.received_item_code' )->where('po_code', $id )->get(["grn_num",'received_item_code','item_name']);
        return htmlspecialchars(json_encode($details), ENT_NOQUOTES);
    }
    public  function  store(Request $req)
    {
         $this->validate($req, [
            'po_code' => 'required',
            'grn'=>'required',
            'sales_returned_item_code'=>'required',
            'sales_returned_item_qty'=>'required',

        ]);
        $sales = sales_return_details::all();
        if(count($sales)>0)
            $last = $sales->last()->sales_return_number;
        else
            $last=0;
        sales_return_details::create([
            'sales_returned_item_code'=>$req->sales_returned_item_code,
            'sales_returned_item_qty'=>$req->sales_returned_item_qty,
            'sales_returned_item_reson'=>$req->sales_returned_item_reson,
            'sales_return_number' => $last+1,
        ]);
        if($req->sales_returned_item_reson=="defected"){
                //dd($req->po_code);
            $po= purchase_order_details::where('po_code',$req->po_code)->where( 'items', $req->sales_returned_item_code)->get();
            foreach($po as $po){
                $qty=$po->purchased_item_qty+$req->sales_returned_item_qty;
            }
            //dd($qty);
            purchase_order_details::where('po_code',$req->po_code)->where( 'items', $req->sales_returned_item_code)->update(array('purchased_item_qty' => $qty));

        }
        if($req->sales_returned_item_reson=="other"){
            $inventory = item_current_inventory::where('item_code',$req-> sales_returned_item_code)->get();
            foreach ($inventory as $invent) {
                $total_qty = $invent->item_qty_in_hand + $req-> sales_returned_item_qty;
                // dd($total_qty);
            }
            item_current_inventory::where('item_code', $req-> sales_returned_item_code)->update(array('item_qty_in_hand' => $total_qty));

        }
        return redirect()->route('sales-return');
    }
}
