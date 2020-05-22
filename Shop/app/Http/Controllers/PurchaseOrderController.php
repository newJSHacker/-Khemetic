<?php
namespace App\Http\Controllers;
use App\items;
use App\temp_purchase_orders;
use App\temp_purchase_request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;
use App\purchase_order;
use App\purchase_order_details;
use App\purchase_request_details;
use App\sales_perchase_request_details;
use App\supplier;
use Illuminate\Http\Request;
class PurchaseOrderController extends Controller
{
    public function create(){
        $suppliers=supplier::all();
        $items=items::all();
        $grouped=sales_perchase_request_details::where('purchase_requested_qty','!=' ,0)->get();
        $pr = $grouped->groupBy('purchase_request_number');
        //dd($pr);
        $pro=temp_purchase_orders::all();
       $chk=sales_perchase_request_details::all();
        return view('po',compact('suppliers','items','pr','pro','chk'));
    }
    public function details($id)
    {
        //$price= sales_perchase_request_details::where('purchase_request_number', $id)->get(["purchase_requested_item"]);
        $price= sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item' )->where('purchase_request_number', $id)->get(["item_name",'item_code','purchase_requested_qty','purchase_request_number']);
        return htmlspecialchars(json_encode($price), ENT_NOQUOTES);
    // return    json_decode($price, true);
    }
    public function pdetails($id,$pr)
    {
        //$price= sales_perchase_request_details::where('purchase_request_number', $id)->get(["purchase_requested_item"]);
        $price= sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item' )->where('purchase_requested_item', $id)->where('purchase_request_number',$pr)->get(['purchase_requested_qty','purchase_request_number']);
        return htmlspecialchars(json_encode($price), ENT_NOQUOTES);
        // return    json_decode($price, true);
    }
    public  function  store(Request $req){
//      temp_purchase_orders::create([
//            'purchaseRequest' => $req->purchaseRequest,
//            'items'=>$req->items,
//            'purchased_item_qty' => $req->purchased_item_qty,
//            'purchased_item_price' => $req->purchased_item_price,
//            'remarks' => $req->remarks,
//      ]);
        $this->validate($req, [
            'purchaseRequest' => 'required',
            'supplier'=>'required',
            'purchase_refrence'=>'required',
            'other_cost'=>'required',

        ]);
        $t=sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item' )->where('purchase_requested_item', $req->po_code)->get(['purchase_requested_qty']);
        //dd($t);
      $session= Auth::user()->id;
           purchase_order::create([
             $a=  'po_code' => $req->po_code,
               'purchaseRequest' => $req->purchaseRequest,
               'supplier' => $req->supplier,
               'po_genrated_by' => $session,
               'purchase_refrence' => $req->purchase_refrence,
               'other_cost' => $req->other_cost,
               'status'=>0,
           ]);

        return redirect()->route('po');
    }
    public  function  storeDetails(Request $req){
        $this->validate($req, [
            'items' => 'required',
            'purchased_item_price'=>'required',
            'purchased_item_qty'=>'required',
            'remarks'=>'required',

        ]);
        $p = purchase_order::all();
//purchase_request_details::where();
        $t=sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item' )->where('purchase_requested_item', $req->items)->get(['purchase_requested_qty']);
      //  dd($t);
        foreach($t as $s){
            $chk=$s->purchase_requested_qty;
        }
       // dd($chk);
        $pr=$p->last()->purchaseRequest;
        if($req->purchased_item_qty<=$chk) {
            temp_purchase_orders::create([
                'purchaseRequest' => $pr,
                'items' => $req->items,
                'prn'=>$req->purchase_request_number,
                'purchased_item_qty' => $req->purchased_item_qty,
                'purchased_item_price' => $req->purchased_item_price,
                'remarks' => $req->remarks,
            ]);
            return redirect()->route('po');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../po';
                </script>";
        }
       // return redirect()->route('po');
    }
    public  function  storepur(Request $req)
    {
        $code = 'PO-' . str_random(6);
        //dd($pro);
        $p = purchase_order::all();
        $a = $p->last()->id;
        $pr=$p->last()->purchaseRequest;
        //$percentage=$p->last()->percentage;
        $pro = temp_purchase_orders::all();
        $temp=temp_purchase_orders::all();
        //$b = $temp->last()->purchaseRequest;
$check=temp_purchase_orders::join('sales_perchase_request_details as s','s.purchase_requested_item','=','temp_purchase_orders.items')
    ->sum('purchased_item_qty');
      //  dd($check);
        $c=temp_purchase_orders::join('sales_perchase_request_details as s','s.purchase_requested_item','=','temp_purchase_orders.items')
            ->get();
        foreach($c as $caa){
           $rq= $caa->purchase_requested_qty;
        }
       //dd($rq);
        if($rq <= $check ) {
            foreach ($pro as $pro) {
                purchase_order_details::create([
                    'po_id' => $a,
                    'po_code' => $code,
                    'items' => $pro->items,
                    'purchased_item_price' => $pro->purchased_item_price,
                    'purchased_item_qty' => $pro->purchased_item_qty,
                    'remarks' => $pro->remarks,
                    'purchaseRequest' => $pr,
                ]);

                $t = sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item')->where('purchase_requested_item', $pro->items)->get(['sales_perchase_request_details.id', 'purchase_requested_qty']);
                foreach ($t as $t) {
                    $rr = $t->id;
                    $tot = $t->purchase_requested_qty - $pro->purchased_item_qty;

                    // dd($tot);
                    $requests = sales_perchase_request_details::find($rr);
                    $requests->update(array('purchase_requested_qty' => $tot));
                    // dd($s);
                }

                $q = DB::table('temp_purchase_orders')->sum('purchased_item_price');
                $temp = $q;
                $po = purchase_order::find($a);
                $po->update(array('po_total_value' => $temp));

                $proo = purchase_order::find($a);
                $formula = $proo->other_cost / $po->po_total_value * 100;
                $proo->update(array('percentage' => $formula));
            }

            // sales_perchase_request_details::Join('temp_purchase_orders as pa', 'pa.purchaseRequest', '=', 'sales_perchase_request_details.purchase_request_number' )->join('temp_purchase_orders as p', 'p.items', '=', 'sales_perchase_request_details.purchase_requested_item')->delete();
            temp_purchase_orders::truncate();
            return redirect()->route('po');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../po';
                </script>";
        }

    }
    public function delete($id){
       temp_purchase_orders::destroy($id);
        return redirect()->route('po');
    }
    public function edit($id){
        $po=temp_purchase_orders::find($id);
        $pr=sales_perchase_request_details::all();
        $suppliers=supplier::all();
        return view('edit-po',compact('po','pr','suppliers'));
    }
    public function update($id, Request $request){
        $po= temp_purchase_orders::find($id);
        $po->update($request->all());
        return redirect()->route('po');
    }
    public function downloadPDF(){
        $code = 'PO-' . str_random(6);
        //dd($pro);
        $p = purchase_order::all();
        $a = $p->last()->id;
        $pr=$p->last()->purchaseRequest;
        //$percentage=$p->last()->percentage;
        $pro = temp_purchase_orders::all();
        $temp=temp_purchase_orders::all();
        //$b = $temp->last()->purchaseRequest;
        $check=temp_purchase_orders::join('sales_perchase_request_details as s','s.purchase_requested_item','=','temp_purchase_orders.items')
            ->sum('purchased_item_qty');
        $c=temp_purchase_orders::join('sales_perchase_request_details as s','s.purchase_requested_item','=','temp_purchase_orders.items')
            ->get();
        foreach($c as $caa){
            $rq= $caa->purchase_requested_qty;
        }
        // dd($rq);
        if($check<=$rq) {
//        $requests =sales_perchase_request_details::find($xx);
//        $l=$requests->update(array('purchase_requested_qty' => 5));
//         dd($l);
            foreach ($pro as $pro) {
                purchase_order_details::create([
                    'po_id' => $a,
                    'po_code' => $code,
                    'items' => $pro->items,
                    'purchased_item_price' => $pro->purchased_item_price,
                    'purchased_item_qty' => $pro->purchased_item_qty,
                    'remarks' => $pro->remarks,
                    'purchaseRequest' => $pr,
                ]);

                $t = sales_perchase_request_details::leftJoin('items as i', 'i.item_code', '=', 'sales_perchase_request_details.purchase_requested_item')->where('purchase_requested_item', $pro->items)->get(['sales_perchase_request_details.id', 'purchase_requested_qty']);
                foreach ($t as $t) {
                    $rr = $t->id;
                    $tot = $t->purchase_requested_qty - $pro->purchased_item_qty;

                    // dd($tot);
                    $requests = sales_perchase_request_details::find($rr);
                    $s = $requests->update(array('purchase_requested_qty' => $tot));
                    // dd($s);
                }
                $q = DB::table('temp_purchase_orders')->sum('purchased_item_price');
                $temp = $q;
                $po = purchase_order::find($a);
                $po->update(array('po_total_value' => $temp));

                $proo = purchase_order::find($a);
                $formula = $proo->other_cost / $po->po_total_value * 100;
                $proo->update(array('percentage' => $formula));
            }

            sales_perchase_request_details::Join('temp_purchase_orders as pa', 'pa.purchaseRequest', '=', 'sales_perchase_request_details.purchase_request_number')->join('temp_purchase_orders as p', 'p.items', '=', 'sales_perchase_request_details.purchase_requested_item')->delete();
            // temp_purchase_orders::truncate();
            $user = temp_purchase_orders::all();
            $pdf = PDF::loadView('pdf/pdf', compact('user'));
            temp_purchase_orders::truncate();
            return $pdf->stream('purchase-order.pdf');
        }
        else{
            echo "<script>
                alert('Invalid Quantity value');
                window.location.href='../po';
                </script>";
        }
    }
}
