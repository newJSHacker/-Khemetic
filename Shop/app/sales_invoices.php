<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_invoices extends Model
{
    protected $fillable=[
        'customer_code',
        'customer_mobile',
        'inv_number',
        'total_amount',
        'genrated_by'
    ];
}
