<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable=[

        'purchase_number',
        'purchase_order_number',
        'items',
        'remarks',
        'qty'
    ];
}
