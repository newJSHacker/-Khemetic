<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_payment_detail extends Model
{
    protected $fillable=[
        'user_temp_order_id',
        'order_amount',
        'transection_id',
        'user_cnic',
        'payment_status',
        'order_no',
        'payment_method',
        'status'
    ];
}
