<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable=[
        'supplier_reg_no',
        'supplier_name',
        'address',
        'phone',
        'email',
        'website',
        'contact_person',
        'cp_designation',
        'cp_phone',
        'cp_email',

    ];
}
