<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grn_details extends Model
{
    protected $fillable=[
        'po_code',
        'grn_num',
        'received_item_code',
        'received_item_qty',
        'serial_num',
    ];
}
