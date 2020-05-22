<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_invoice extends Model
{
    protected $fillable=[

        'customer_code',
        'customer_mobile',
        'total_amount',
        'inv_number',
        'genrated_by',
        'status'
    ];
}
