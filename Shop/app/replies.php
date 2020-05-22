<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replies extends Model
{
    protected $fillable=[
        'uname',
        //'email',
        'umessage',
        'cid',
        'icode'

    ];
}
