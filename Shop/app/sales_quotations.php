<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_quotations extends Model
{
    protected $fillable=[

        'customer_code',
        'customer_mobile',
        'quotation_created_by'
    ];
}
