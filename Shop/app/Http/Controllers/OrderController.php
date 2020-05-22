<?php

namespace App\Http\Controllers;

use App\GuestUser;
use App\order_details;
use App\order_payment_detail;
use App\request_for_return;
use App\sales_customers;
use App\sales_invoice;
use App\sales_invoice_details;
use App\sales_invoices;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        //  $inv = sales_invoices::all();
        // $inv=sales_invoices::leftJoin('sales_customers as s','s.cid', '=', 'sales_invoices.customer_code' )->get();
        $inv = User::join('order_payment_details as o', 'o.user_temp_order_id', '=', 'users.id')->get();
        return view('orders', compact('inv', 'cust'));
    }

    public function guestcreate()
    {
        //  $inv = sales_invoices::all();
        // $inv=sales_invoices::leftJoin('sales_customers as s','s.cid', '=', 'sales_invoices.customer_code' )->get();
        $inv = GuestUser::all();
        return view('guest-orders', compact('inv', 'cust'));
    }

    public function guestorderDetails($id)
    {
        $o = order_details::where('order_details.order_no', $id)->join('guest_users as o', 'o.order_no', '=', 'order_details.order_no')->get();
        return view('guestorder-details', compact('o'));
    }

    public function confirm($id)
    {

        order_payment_detail::find($id)->update(['payment_status' => 1]);
        return redirect()->route('orders');
    }

    public function deliver($id)
    {

        order_payment_detail::find($id)->update(['status' => 1]);
        return redirect()->route('orders');
    }

    public function orderDetails($id)
    {
        $o = order_details::where('order_details.order_no', $id)
            ->join('order_payment_details as o', 'o.order_no', '=', 'order_details.order_no')
            ->get();
        $os = order_details::where('order_details.order_no', $id)
            ->join('order_shipment_details as os', 'os.user_temp_order_id', '=', 'order_details.user_id')
            ->orderby('os.id', 'desc')->limit(1)->get();

        return view('order-details', compact('o', 'os'));
        /*
        if(Auth::guard('user')->check()){
            return view('order-details-user', compact('o', 'os'));
        }else{
            return view('order-details', compact('o', 'os'));
        }
        */
    }

    public function confirmed()
    {
        // $inv=sales_invoices::leftJoin('sales_customers as s','s.cid', '=', 'sales_invoices.customer_code' )->where('status',1)->get();
        $inv = order_payment_detail::join('users as u', 'u.id', '=', 'order_payment_details.user_temp_order_id')->where('payment_status', 1)->get();
        return view('confirmed-orders', compact('inv', 'cust'));
    }

    public function returnRequest()
    {
        $req = request_for_return::join('users as u', 'u.id', '=', 'request_for_returns.user_id')->join('items as i', 'i.item_code', '=', 'request_for_returns.item_code')->get();
        return view('request-for-return', compact('req'));

    }

}
