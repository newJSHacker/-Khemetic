<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_shipment_details extends Model
{
    protected $fillable=[
        'receiver_name'	,
        'receiver_email',
        'receiver_contact',
        'receiver_alternative_contact',
        'receiver_address',
        'receiver_shipment_landmark',
        'receiver_country',
        'receiver_city',
        'receiver_stat',
        'receiver_zipcode',
        'receiver_shipment_method',
        'user_temp_order_id'
    ];
}
