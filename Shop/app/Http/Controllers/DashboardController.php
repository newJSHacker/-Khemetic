<?php

namespace App\Http\Controllers;

use App\order_payment_detail;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function  create(){
        $inv=order_payment_detail::join('users as u','u.id','=','order_payment_details.user_temp_order_id')->get();
        $confirm=order_payment_detail::join('users as u','u.id','=','order_payment_details.user_temp_order_id')->where('payment_status',1)->get();
        return view('index',compact('inv','confirm'));
    }
}
