<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_quotation_details extends Model
{
    protected $fillable=[
        'item_name',
       ' quotation_number',
        'quoted_item_code',
        'quoted_item_price',
        'quoted_item_qty',
        'quotation_number',
    ];
}
