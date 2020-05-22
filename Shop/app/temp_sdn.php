<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_sdn extends Model
{
    protected $fillable=[
        'sales_sdn_number',
        'sales_delivered_item',
        'sales_delivered_qty',
        'sales_inv_code'
    ];
}
