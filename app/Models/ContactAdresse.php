<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactAdresse
 * @package App\Models
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string email
 * @property string tel
 * @property string nom
 * @property string prenom
 */
class ContactAdresse extends Model
{
    use SoftDeletes;

    public $table = 'contact_adresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'email',
        'tel',
        'nom',
        'prenom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'tel' => 'string',
        'nom' => 'string',
        'prenom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    public function getFullName(){
        return $this->prenom.' '.$this->nom;
    }
    
    
}
