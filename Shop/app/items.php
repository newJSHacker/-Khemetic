<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    protected $fillable=[
    	'item_code','item_type','item_brand','item_category','item_name','item_description','colors', 'is_new'
    ];



    public function items(){
        return $this->belongsTo(\App\items::class, 'item_name', 'item_code');
    }



}
