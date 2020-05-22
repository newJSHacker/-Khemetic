<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_quotation extends Model
{
    protected $fillable=[
        'item_name',
        'quoted_item_code',
        'quoted_item_price',
        'quoted_item_qty'
    ];
}
