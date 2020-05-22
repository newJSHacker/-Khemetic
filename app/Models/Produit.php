<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produit
 * @package App\Models
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string photo
 * @property decimal prix
 * @property string redirect_link
 */
class Produit extends Model
{
    use SoftDeletes;

    public $table = 'produits';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'photo',
        'prix',
        'title',
        'redirect_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'photo' => 'string',
        'title' => 'string',
        'redirect_link' => 'string'
    ];
    
    public $imageLink = "";

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function getImageLink(){
        if($this->photo != null)
            return asset('img/produits/'.$this->photo);
        return asset('img/bg.jpg');
    }
    
    public function setImageLink(){
        $this->imageLink = $this->getImageLink();
    }
    
}
