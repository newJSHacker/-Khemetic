<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable=[
        'item_image',
        'item_code'
    ];
}
