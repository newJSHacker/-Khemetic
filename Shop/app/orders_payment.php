<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_payment extends Model
{
    protected $fillable=[
        'user_temp_order_id',
        'payment_method',
        'status'
    ];
}
