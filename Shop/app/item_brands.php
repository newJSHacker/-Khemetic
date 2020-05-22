<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_brands extends Model
{
    protected $fillable=[
        'brand_name',
        'brand_logo'
    ];
}
