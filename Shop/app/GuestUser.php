<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    protected $fillable=[
        'name',
        'email',
        'mobile',
        'address',
        'cookie',
        'total_amount',
        'order_no',
    ];
}
