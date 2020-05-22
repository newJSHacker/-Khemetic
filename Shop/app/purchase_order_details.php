<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class purchase_order_details extends Model
{
    protected $fillable=[
        'items',
        'po_code',
        'purchased_item_code',
        'purchased_item_qty',
        'purchased_item_price',
        'remarks',
        'purchase_refrence',
        'po_id',
         'purchaseRequest'
    ];
    //public $timestamps = false;
//    public function items(){
//        return $this->belongsTo('App\items');
//    }
public $timestamps=false;
}
