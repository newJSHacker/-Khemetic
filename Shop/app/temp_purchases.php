<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_purchases extends Model
{
    protected $fillable=[
        'purchase_order_number',
        'items',
        'remarks',
        'qty',
    ];
}
