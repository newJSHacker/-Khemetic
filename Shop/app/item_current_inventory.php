<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_current_inventory extends Model
{
    protected $fillable=[
        'item_code',
        'item_qty_in_hand',
        'item_current_purchase_price',
        'item_current_avg_price',
        'item_current_selling_price'

    ];
}
