<?php

namespace App\Http\Controllers;
use App\grn_details;
use App\item_current_inventory;
use App\items;
use App\purchase;
use App\purchase_order_details;
use App\temp_grn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class GrnController extends Controller
{
    public function create(){
        $grn=temp_grn::all();
        $purchases=purchase::where('qty','!=',0)->get();
        return view('grn',compact('purchases','grn'));
    }
    public function details($id){
       $details= purchase::leftJoin('items as i', 'i.item_code', '=', 'purchases.items' )
           ->where('purchase_number', $id )->get(["item_name",'item_code',"qty",'purchase_order_number']);
        return htmlspecialchars(json_encode($details), ENT_NOQUOTES);
    }
    public  function  store(Request $req){
        $this->validate($req, [
            'received_item_code' =>

                    'required',

            'received_item_qty'=>'required',
        ]);
        $t=purchase::leftJoin('items as i', 'i.item_code', '=', 'purchases.items' )->where('items', $req->received_item_code)->get(['qty']);
     //  dd($t);
        foreach($t as $xy){
            $chk=$xy->qty;
        }
      // dd($chk);
        if($req->received_item_qty<=$chk) {
            temp_grn::create([
                'po_code' => $req->po_code,
                'received_item_code' => $req->received_item_code,
                'received_item_qty' => $req->received_item_qty,
                'serial_num' => $req->serial_num,
            ]);
            return redirect()->route('grn');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../grn';
                </script>";
        }
    }
    public  function  storegrn(Request $req)
    {
        $code = 'grn-' . str_random(6);
        $temp=temp_grn::all();
        $check=temp_grn::join('purchases as s','s.items','=','temp_grns.received_item_code')
            ->sum('received_item_qty');
         //dd($check);
        $c=temp_grn::join('purchases as s','s.items','=','temp_grns.received_item_code')
            ->get();
        foreach($c as $caa){
            $rq= $caa->qty;
        }
       // dd($rq);
        if($rq<=$check) {
        foreach($temp as $grn) {
            $a = grn_details::create([
                'po_code' => $grn->po_code,
                'grn_num' => $code,
                'received_item_code' => $grn->received_item_code,
                'received_item_qty' => $grn->received_item_qty,
                'serial_num' => $grn->serial_num,
            ]);

            $qty = $a['received_item_qty'];
            //dd($qty);
            $item = $a['received_item_code'];
            $po_code = $a['po_code'];
            $purchaseOrders = purchase_order_details::where('po_code', $po_code)->get(['purchased_item_price']);
            //  dd($purchaseOrders);
            foreach ($purchaseOrders as $po) {
                $new_price = $po['purchased_item_price'];
                //dd($new_price);
            }
            //dd($item);
            $details = purchase::leftJoin('temp_grns as g', 'g.received_item_code', '=', 'purchases.items')->get(["qty","purchases.id"]);
            foreach ($details as $d) {
                $rr=$d['id'];
                $i = $d['qty'];
               // dd($i);
                $total = $i - $qty;
               // dd($total);
                $requests = purchase::find($rr);
                $requests->update(array('qty' => $total));
             //  purchase::where('items', $po_code)->update(array('qty' => $total));
                //dd($s);
                temp_grn::truncate();
                $items = item_current_inventory::where('item_code', $item)->first();
                if ($items == null) {
                    $inventory = array();
                    $inventory['item_code'] = $item;
                    $inventory['item_qty_in_hand'] = $qty;

                    $inventory['item_current_purchase_price'] = $new_price;
                    $inventory['item_current_avg_price'] = $new_price;
                    //dd($new_price);
                    $selling = ($new_price * 10 / 100) + $new_price;
                    // dd($selling);
                    $inventory['item_current_selling_price'] = $selling;
                    item_current_inventory::create($inventory);
                } else {
                    $invent = item_current_inventory::where('item_code', $item)->get(["item_current_purchase_price", "item_qty_in_hand"]);
                    foreach ($invent as $i) {
                        $current_price = $i['item_current_purchase_price'];
                        $current_qty = $i['item_qty_in_hand'];
                    }
                    $new_qty = $items->item_qty_in_hand;
                    $total_qty = $items->item_qty_in_hand += $qty;
                    $avg = ($current_price * $current_qty) + ($new_price * $new_qty);
                    $items->item_current_avg_price = $avg / $total_qty;
                    $items->item_current_purchase_price = $new_price;
                    $items->save();
                }
            }
        }
//                $t = purchase::leftJoin('items as i', 'i.item_code', '=', 'purchases.items')->where('items', $grn->received_item_code)->get(['purchases.id', 'received_item_qty']);
//                foreach ($t as $t) {
//                    $rr = $t->id;
//                    $tot = $t->qty - $grn->received_item_qty;
//                    // dd($tot);
//                    $requests = purchase::find($rr);
//                 $s=   $requests->update(array('qty' => $tot));
//                    // dd($s);
//                }
                return redirect()->route('grn');
        
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../grn';
                </script>";
        }
    }
    public function delete($id){
        temp_grn::destroy($id);
        return redirect()->route('grn');
    }
    public function downloadPDF(){
        $code = 'grn-' . str_random(6);
        $temp=temp_grn::all();
        $check=temp_grn::join('purchases as s','s.items','=','temp_grns.received_item_code')
            ->sum('received_item_qty');
        //dd($check);
        $c=temp_grn::join('purchases as s','s.items','=','temp_grns.received_item_code')
            ->get();
        foreach($c as $caa){
            $rq= $caa->qty;
        }
        // dd($rq);
        if($check<=$rq) {
            foreach ($temp as $grn) {
                $a = grn_details::create([
                    'po_code' => $grn->po_code,
                    'grn_num' => $code,
                    'received_item_code' => $grn->received_item_code,
                    'received_item_qty' => $grn->received_item_qty,
                    'serial_num' => $grn->serial_num,
                ]);
                $qty = $a['received_item_qty'];
                //dd($qty);
                $item = $a['received_item_code'];
                $po_code = $a['po_code'];
                $purchaseOrders = purchase_order_details::where('po_code', $po_code)->get(['purchased_item_price']);
                //  dd($purchaseOrders);
                foreach ($purchaseOrders as $po) {
                    $new_price = $po['purchased_item_price'];
                    //dd($new_price);
                }
                //dd($item);
                $details = purchase::leftJoin('temp_grns as g', 'g.received_item_code', '=', 'purchases.items')->get(["qty","purchases.id"]);
                foreach ($details as $d) {
                    $rr=$d['id'];
                    $i = $d['qty'];
                    // dd($i);
                    $total = $i - $qty;
                    // dd($total);
                    $requests = purchase::find($rr);
                    $requests->update(array('qty' => $total));
                    //  purchase::where('items', $po_code)->update(array('qty' => $total));
                    //dd($s);
                    //temp_grn::truncate();
                    $items = item_current_inventory::where('item_code', $item)->first();
                    if ($items == null) {
                        $inventory = array();
                        $inventory['item_code'] = $item;
                        $inventory['item_qty_in_hand'] = $qty;

                        $inventory['item_current_purchase_price'] = $new_price;
                        $inventory['item_current_avg_price'] = $new_price;
                        item_current_inventory::create($inventory);
                    } else {
                        $invent = item_current_inventory::where('item_code', $item)->get(["item_current_purchase_price", "item_qty_in_hand"]);
                        foreach ($invent as $i) {
                            $current_price = $i['item_current_purchase_price'];
                            $current_qty = $i['item_qty_in_hand'];
                        }
                        $new_qty = $items->item_qty_in_hand;
                        $total_qty = $items->item_qty_in_hand += $qty;
                        $avg = ($current_price * $current_qty) + ($new_price * $new_qty);
                        $items->item_current_avg_price = $avg / $total_qty;
                        $items->save();
                    }
                }
            }
            $user = temp_grn::all();
            $pdf = PDF::loadView('pdf/pdf-grn', compact('user'));
            temp_grn::truncate();
            return $pdf->stream('grn.pdf');
        }else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../grn';
                </script>";
        }
    }
    public function edit($id){
        $grn=temp_grn::find($id);
        return view('edit-grn',compact('grn'));
    }
    public function update($id, Request $request){
        $grn= temp_grn::find($id);
        $grn->update($request->all());
        return redirect()->route('grn');
    }
}
