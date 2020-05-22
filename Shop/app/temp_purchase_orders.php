<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_purchase_orders extends Model
{
    protected $fillable=[
        'items',
        'purchased_item_code',
        'purchased_item_qty',
        'purchased_item_price',
        'remarks',
        'purchase_refrence',
         'purchaseRequest'
    ];
}
