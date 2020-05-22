<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscrib
 * @package App\Models
 * @version February 16, 2019, 8:16 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string email
 */
class Subscrib extends Model
{
    use SoftDeletes;

    public $table = 'subscribs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
