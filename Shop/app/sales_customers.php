<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_customers extends Model
{
    protected $fillable=[
        'customer_name',
        'customer_cnic',
        'customer_address',
        'customer_city',
        'customer_country',
        'customer_mobile_number',
        'customer_email'
    ];
}
