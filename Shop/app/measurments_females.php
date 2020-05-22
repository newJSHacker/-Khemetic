<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurments_females extends Model
{
    protected $fillable=[
        'user_id',
        'profile_name',
        'neck',
        'over_bust',
        'bust',
        'under_bust',
        'waist',
        'hips',
        'neck_to_heel',
        'neck_to_aboveknee',
        'aboveknee_to_ankle',
        'arm_lenth',
        'sholder_seam',
        'arm_hole',
        'baicep',
        'fore_arm',
        'wrist',
        'v_neck_cut',
        'shulder_to_waist',
        'waist_to_above_neck',
];
}
