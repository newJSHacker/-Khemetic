<?php

namespace App\Http\Controllers;

use App\customers;
use App\item_current_inventory;
use App\items;
use App\sales_customers;
use App\sales_invoice_details;
use App\sales_invoices;
use App\temp_invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class InvoiceController extends Controller
{
    public function create(){
        $customers=sales_customers::all();
        $items =item_current_inventory::all();
        $temp=temp_invoices::all();
        return view('sales-invoice',compact('customers','items','temp'));
    }
    public  function  store(Request $req){
        $session= Auth::user()->id;
        $sales=sales_invoices::all();
        if(count($sales)>0)
            $last = $sales->last()->inv_number;
        else
            $last=0;
           sales_invoices::create([
               'customer_code' => $req->customer_code,
               'customer_mobile' => $req->customer_mobile,
               'inv_number' => $last + 1,
               'genrated_by' => $session,
           ]);

        return redirect()->route('sales-invoice');
    }
    public function details($id)
    {
        $price= item_current_inventory::leftJoin('items as i','i.item_code' , '=','item_current_inventories.item_code' )->where('item_current_inventories.item_code', $id)->get(["item_current_selling_price","item_name"]);
        return htmlspecialchars(json_encode($price), ENT_NOQUOTES);
    }
    public  function  storeDetails(Request $req){
          $this->validate($req, [
            'item_qty' => 'required',
            'item_code'=>'required',
            'item_price'=>'required',

        ]);
       temp_invoices::create([
            'item_code' => $req->item_code,
           'item_name' => $req->item_name,
            $price=$req->item_price,
            $qty= $req->item_qty,
          'item_qty' => $qty,
          $total=$price*$qty,
          'item_price' =>$total
        ]);

        return redirect()->route('sales-invoice');
    }
    public function  save(Request $req)
    {

        $invoice=sales_invoices::all();
        $last = $invoice->last()->id;
        $in = $invoice->last()->inv_number;
        $inv='invoice-'. str_random(6);
        $temp = temp_invoices::all();
      //  dd($temp);
        foreach ($temp as $temp) {
            sales_invoice_details::create([
                'item_code' => $temp->item_code,
                'item_price' => $temp->item_price,
                'item_qty' => $temp->item_qty,
                'item_name' => $temp->item_name,
                'sales_inv_code' => $in
            ]);

            $inventory = item_current_inventory::where('item_code', $temp->item_code)->get();
            foreach ($inventory as $invent) {
                $total_qty = $invent->item_qty_in_hand - $temp->item_qty;
                // dd($total_qty);
            }
            item_current_inventory::where('item_code', $temp->item_code)->update(array('item_qty_in_hand' => $total_qty));
        }
            $total =DB::table('temp_invoices')->sum('item_price');
            $chk =sales_invoices::find($last);
            $chk->update(array('total_amount' => $total));

            temp_invoices::truncate();
            return redirect()->route('sales-invoice');

    }
    public function edit($id){
        $items =item_current_inventory::all();
        $inv = temp_invoices::find($id);
        return view('edit-invoice',compact('inv','items'));
    }
    public function update($id, Request $request){

        $inv= temp_invoices::find($id);
        $inv->update($request->all());
        return redirect()->route('sales-invoice');
    }
    public function delete($id){
       temp_invoices::destroy($id);
        return redirect()->route('sales-invoice');
    }
    public function downloadPDF(){
        $invoice=sales_invoices::all();
        $last = $invoice->last()->id;
        $in = $invoice->last()->inv_number;
        $l = $invoice->last()->total_amount;
        $inv='invoice-'. str_random(6);
        $temp = temp_invoices::all();
        //  dd($temp);
        foreach ($temp as $temp) {
            sales_invoice_details::create([
                'item_code' => $temp->item_code,
                'item_name' => $temp->item_name,
                'item_price' => $temp->item_price,
                'item_qty' => $temp->item_qty,
                'sales_inv_code' => $in
            ]);
            $inventory = item_current_inventory::where('item_code', $temp->item_code)->get();
            foreach ($inventory as $invent) {
                $total_qty = $invent->item_qty_in_hand - $temp->item_qty;
                // dd($total_qty);
            }
            item_current_inventory::where('item_code', $temp->item_code)->update(array('item_qty_in_hand' => $total_qty));
        }
        $total =DB::table('temp_invoices')->sum('item_price');
        $tem=$total;
      //  dd($tem);
        $chk =sales_invoices::find($last);
        $chk->update(array('total_amount' => $total));

        $invoice = temp_invoices::all();
        $customer=sales_invoices::leftJoin('sales_customers as c','c.cid' , '=','sales_invoices.customer_code'  )->where('sales_invoices.id',$last)->get(["customer_name"]);
        $i=sales_invoices::orderBy('id', 'desc')->limit(1)->get(['total_amount']);
        //dd($i);
        //$i=sales_invoices::where('total_amount',$l)->get(['total_amount']);
       //dd($i);
        $pdf = PDF::loadView('pdf/pdf-invoice', compact('invoice','customer','i'));
        temp_invoices::truncate();
        return $pdf->stream('Invoice.pdf');
    }
}
