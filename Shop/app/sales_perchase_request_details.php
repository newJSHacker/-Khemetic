<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_perchase_request_details extends Model
{
    protected $fillable=[
        'purchase_request_number',
        'purchase_requested_item',
        'purchase_requested_qty',
        'item_code',

    ];
    public function items()
    {
        return $this->belongsTo('App\items', 'item_code');
    }
}
