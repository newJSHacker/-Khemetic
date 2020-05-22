<?php

namespace App\Http\Controllers;

use App\grn_details;
use App\item_current_inventory;
use App\purchase_order_details;
use App\purchase_return_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseReturnController extends Controller
{
    public function create(){
        $grouped=grn_details::all();
        $grn= $grouped->groupBy('po_code');
        return view('purchase-return',compact('purchases','grn'));
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
            'purchased_item_code'=>'required',
            'purchase_returned_item_qty'=>'required',

        ]);
        $pur = purchase_return_detail::all();
        if(count($pur)>0)
            $last = $pur->last()->purchase_return_number;
        else
            $last=0;
            purchase_return_detail::create([
                'purchased_item_code'=>$req->purchased_item_code,
                'purchase_returned_item_qty'=>$req->purchase_returned_item_qty,
                'purchase_return_number' => $last+1,
            ]);
//        $sum=DB::table('purchase_order_details')->where('items',$req->purchased_item_code)->sum('purchased_item_price');
//        $count=DB::table('purchase_order_details')->where('items',$req->purchased_item_code)->sum('purchased_item_qty');
//       $avg=$sum/$count;
        //dd($avg);
        $inventory=DB::table('item_current_inventories')->where('item_code',$req->purchased_item_code)->get();
        foreach($inventory as $inv) {
            $total_qty = $inv->item_qty_in_hand;
            $quant= $inv->item_qty_in_hand-$req->purchase_returned_item_qty;
            $avg=$inv->item_current_avg_price;
            //$purchase=$inv->item_current_purchase_price;
        }
       // dd($total_qty);
        $po=DB::table('purchase_order_details')->where('po_code',$req->po_code)->get();
        foreach($po as $po){
            $price=$po->purchased_item_price;
            $quantity=$po->purchased_item_qty;
            $qty=$total_qty-$quantity;
        }
       // dd($qty);
        $test=$price * $quantity;
        $average=$avg*$total_qty;
        $check=$average-$test;
        $t=$check/$qty;
        $avrg=($t*$qty)+($price*$req->purchase_returned_item_qty);
        $sum=$qty+$req->purchase_returned_item_qty;
        $final=$avrg/$sum;
        item_current_inventory::where('item_code',$req->purchased_item_code)->update(array('item_qty_in_hand' =>$quant,'item_current_avg_price'=>$final));
        return redirect()->route('purchase-return');
    }
}
