<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $fillable=[
        'item_name',
        'item_qty',
        'user_id',
        'color',
        'order_no',
        'item_price',
        'cookie'
    ];



    public function product(){
        return $this->belongsTo(\App\Products::class, 'item_name', 'item_code');
    }


    public function itemImage(){
        return $this->hasMany(\App\ProductImages::class, 'item_code', 'item_name');
    }


    public function orderPaymentDetail(){
        return $this->belongsTo(\App\order_payment_detail::class, 'user_id', 'user_temp_order_id');
    }

}
