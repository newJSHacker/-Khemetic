<?php

namespace App\Http\Controllers;

use App\item_current_inventory;
use App\sales_customers;
use App\sales_quotation_details;
use App\sales_quotations;
use App\temp_invoices;
use App\temp_quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class SalesQuotationController extends Controller
{
    public function create()
    {
        $customers = sales_customers::all();
        $items = item_current_inventory::all();
        $temp = temp_quotation::all();
        return view('sales-quotation', compact('customers', 'items', 'temp'));
    }

    public function store(Request $req)
    {
        $session = Auth::user()->id;
        sales_quotations::create([
            'customer_code' => $req->customer_code,
            'customer_mobile' => $req->customer_mobile,
            'quotation_created_by' => $session,
        ]);
        return redirect()->route('sales-quotation');
    }

    public function details($id)
    {
        $price = item_current_inventory::leftJoin('items as i', 'i.item_code', '=', 'item_current_inventories.item_code')->where('item_current_inventories.item_code', $id)->get(["item_current_selling_price", "item_name"]);
        return htmlspecialchars(json_encode($price), ENT_NOQUOTES);
    }

    public function storeDetails(Request $req)
    {
         $this->validate($req, [
            'quoted_item_code' => 'required',
            'quoted_item_qty'=>'required',
            'quoted_item_price'=>'required',

        ]);
        temp_quotation::create([
            'quoted_item_code' => $req->quoted_item_code,
            'item_name' => $req->item_name,
            $price = $req->quoted_item_price,
            $qty = $req->quoted_item_qty,
            'quoted_item_qty' => $qty,
            $total = $price * $qty,
            'quoted_item_price' => $total
        ]);
        return redirect()->route('sales-quotation');
    }

    public function save(Request $req)
    {

        $invoice = sales_quotations::all();
        $last = $invoice->last()->id;
        $temp = temp_quotation::all();
        //  dd($temp);
        foreach ($temp as $temp) {
            sales_quotation_details::create([
                'item_name' => $temp->item_name,
                'quoted_item_code' => $temp->quoted_item_code,
                'quoted_item_price' => $temp->quoted_item_price,
                'quoted_item_qty' => $temp->quoted_item_qty,
                'quotation_number' => $last,
            ]);

            temp_quotation::truncate();
            return redirect()->route('sales-quotation');

        }
    }
    public function delete($id){
     temp_quotation::destroy($id);
        return redirect()->route('sales-quotation');
    }
    public function edit($id){
        $items =item_current_inventory::all();
        $inv = temp_quotation::find($id);
        return view('edit-quotation',compact('inv','items'));
    }
    public function update($id, Request $request){
        $inv= temp_quotation::find($id);
        $inv->update($request->all());
        return redirect()->route('sales-quotation');
    }
    public function downloadPDF()
    {
        $invoice = temp_quotation::all();
        $last = $invoice->last()->id;
        $temp = temp_quotation::all();
        //  dd($temp);
        foreach ($temp as $temp) {
            sales_quotation_details::create([
                'item_name' => $temp->item_name,
                'quoted_item_code' => $temp->quoted_item_code,
                'quoted_item_price' => $temp->quoted_item_price,
                'quoted_item_qty' => $temp->quoted_item_qty,
                'quotation_number' => $last,
            ]);
            $customer=sales_quotations::leftJoin('sales_customers as c','c.id' , '=','sales_quotations.customer_code'  )->where('sales_quotations.id',$last)->get(["customer_name"]);
            $pdf = PDF::loadView('pdf/pdf-quotation', compact('invoice', 'customer'));
            temp_quotation::truncate();
            return $pdf->stream('sales-quotations.pdf');
        }

    }
}