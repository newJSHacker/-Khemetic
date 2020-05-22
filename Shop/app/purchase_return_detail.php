<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_return_detail extends Model
{
    protected $fillable=[
        'po_code',
        'purchase_return_number',
        'purchased_item_code',
        'purchase_returned_item_qty'

    ];
}
