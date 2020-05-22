<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_for_return extends Model
{
    protected $fillable=[
        'order_no',
        'user_id',
        'item_code',
        'item_qty',
        'reason'

    ];}
