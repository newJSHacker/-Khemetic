<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     protected $fillable=[
        'item_code','item_type','item_brand','item_category','item_name','item_description','colors','old_price','new_price','quantity'
    ];



     public function getPath(){
         $this->path = route('product-details',$this->item_code);
         return route('product-details',$this->item_code);
     }

     public function getImageLink(){
         $this->image = asset($this->item_image);
         return $this->image;
     }


}
