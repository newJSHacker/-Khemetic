<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items_images extends Model
{
    protected $fillable=[
        'item_image',
        'item_code'
    ];
}
