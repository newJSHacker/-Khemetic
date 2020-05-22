<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_invoices extends Model
{
    protected $fillable=[
        'sales_inv_code',
        'item_code',
        'item_name',
        'item_price',
        'item_qty'
    ];
}
