<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CreditCard
 * @package App\Models
 * @version February 17, 2020, 3:06 pm UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer user_id
 * @property string card_id
 * @property integer card_expire_month
 * @property integer card_expire_year
 * @property integer secret_code
 */
class CreditCard extends Model
{
    use SoftDeletes;

    public $table = 'credit_cards';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'card_id',
        'card_expire_month',
        'card_expire_year',
        'secret_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'card_id' => 'string',
        'card_expire_month' => 'integer',
        'card_expire_year' => 'integer',
        'secret_code' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
