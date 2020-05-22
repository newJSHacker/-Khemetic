<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_invoice_details extends Model
{
    protected $fillable=[
        'sales_inv_code',
        'item_code',
        'item_price',
        'item_qty',
        'item_name'
    ];
}
