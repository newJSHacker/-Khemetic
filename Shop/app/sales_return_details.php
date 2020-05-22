<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_return_details extends Model
{
    protected $fillable=[
        'sales_return_number',
        'sales_returned_item_code',
        'sales_returned_item_qty',
        'sales_returned_item_status',
        'sales_returned_item_reson'

    ];
}
