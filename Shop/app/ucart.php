<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ucart extends Model
{
    protected $fillable=[
        'cid',
        'item_code',
        'item_qty',
        'date_of_addition',
        'user_measurment_id',
        'user_temp_order_id',
        'color',
        'total',
        'price','method','order_no'

    ];
}
