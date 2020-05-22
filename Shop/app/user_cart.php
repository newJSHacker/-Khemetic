<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_cart extends Model
{
    protected $primaryKey = 'cid';

    protected $fillable=[
        'cid',
        'item_code',
        'item_qty',
        'date_of_addition',
        'user_measurment_id',
        'user_temp_order_id',
        'color',
        'total',
        'price',
        'cookie'

    ];
}
