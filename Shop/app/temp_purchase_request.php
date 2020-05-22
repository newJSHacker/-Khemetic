<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_purchase_request extends Model
{
    protected $fillable=[
        'purchase_request_number',
        'purchase_requested_item',
        'purchase_requested_qty',

    ];
    public function items()
    {
        return $this->belongsTo('App\items', 'item_code');
    }
}
