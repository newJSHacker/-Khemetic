<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_grn extends Model
{
    protected $fillable=[
        'po_code',
        'received_item_code',
        'received_item_qty',
        'serial_num',
    ];
}
