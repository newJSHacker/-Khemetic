<?php

namespace App\Http\Controllers;
use App\purchase;
use App\purchase_order_details;
use App\purchase_request_details;
use App\temp_purchases;
use Illuminate\Http\Request;
use PDF;
class PurchasesController extends Controller
{
    public function create(){
        $grouped=purchase_order_details::all();
        $po=$grouped->where('purchased_item_qty','>' ,0)->groupBy('po_code');
        $poo=purchase_order_details::all();
        $temp=temp_purchases::all();
        return view('purchases',compact('po','poo','temp'));
    }
    public  function  store(Request $req)
    {
        $this->validate($req, [
            'purchase_order_number' => 'required',
            'items'=>'required',
            'remarks'=>'required',
            'qty'=>'required'
        ]);
        $t=purchase_order_details::leftJoin('items as i', 'i.item_code', '=', 'purchase_order_details.items' )->where('items', $req->items)->get(['purchased_item_qty']);
        //  dd($t);
        foreach($t as $s){
            $chk=$s->purchased_item_qty;
        }
        if($req->qty<=$chk) {
            temp_purchases::create($req->all());
            return redirect()->route('purchases');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../purchases';
                </script>";
        }
    }
     public  function  storepur(Request $req)
    {
        $code = 'P-' . str_random(6);
        //dd($pro);
        $pur = temp_purchases::all();
        $check=temp_purchases::join('purchase_order_details as s','s.items','=','temp_purchases.items')
            ->sum('qty');
         // dd($check);
        $c=temp_purchases::join('purchase_order_details as s','s.items','=','temp_purchases.items')
            ->get();
        foreach($c as $caa){
            $rq= $caa->qty;
        }
        //dd($rq);
        if($rq<=$check) {
        foreach ($pur as $pur) {
          purchase::create([
                'purchase_order_number'=>$pur->purchase_order_number,
                'items' => $pur->items,
                'remarks' => $pur->remarks,
              'qty'=>$pur->qty,
                'purchase_number' => $code,
            ]);
            $t = purchase_order_details::leftJoin('items as i', 'i.item_code', '=', 'purchase_order_details.items')->where('items', $pur->items)->get(['purchase_order_details.id', 'purchased_item_qty']);
            foreach ($t as $t) {
                $rr = $t->id;
                $tot = $t->purchased_item_qty - $pur->qty;

                // dd($tot);
                $requests = purchase_order_details::find($rr);
                $requests->update(array('purchased_item_qty' => $tot));
                // dd($s);
            }
        }
              temp_purchases::truncate();
            return redirect()->route('purchases');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../purchases';
                </script>";
        }
      
        //return redirect()->route('purchases');

    }
        public function details($id)
    {
        $purchases= purchase_order_details::leftJoin('items as i', 'i.item_code', '=', 'purchase_order_details.items' )->where('po_code', $id)->get(["item_name","item_code","purchased_item_qty"]);
        return htmlspecialchars(json_encode($purchases), ENT_NOQUOTES);
    }
    public function delete($id){
        temp_purchases::destroy($id);
        return redirect()->route('purchases');
    }
    public function downloadPDF(){
        $code = 'P-' . str_random(6);
        //dd($pro);
        $pur = temp_purchases::all();
        $check=temp_purchases::join('purchase_order_details as s','s.items','=','temp_purchases.items')
            ->sum('qty');
        // dd($check);
        $c=temp_purchases::join('purchase_order_details as s','s.items','=','temp_purchases.items')
            ->get();
        foreach($c as $caa){
            $rq= $caa->qty;
        }
        //dd($rq);
        if($rq<=$check) {
            foreach ($pur as $pur) {
                purchase::create([
                    'purchase_order_number' => $pur->purchase_order_number,
                    'items' => $pur->items,
                    'remarks' => $pur->remarks,
                    'purchase_number' => $code,
                ]);
            }
            $t = purchase_order_details::leftJoin('items as i', 'i.item_code', '=', 'purchase_order_details.items')->where('items', $pur->items)->get(['purchase_order_details.id', 'purchased_item_qty']);
            foreach ($t as $t) {
                $rr = $t->id;
                $tot = $t->purchased_item_qty - $pur->qty;

                // dd($tot);
                $requests = purchase_order_details::find($rr);
                $requests->update(array('purchased_item_qty' => $tot));
                // dd($s);
            }

            $user = temp_purchases::all();
            $pdf = PDF::loadView('pdf/pdf-purchases', compact('user'));
            temp_purchases::truncate();
            return $pdf->stream('purchases.pdf');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../purchases';
                </script>";
        }
    }

}
