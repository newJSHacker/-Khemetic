<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package App\Models
 * @version February 8, 2019, 10:42 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string name
 * @property string flag
 * @property string abbr
 * @property string script
 * @property string native
 * @property boolean active
 * @property boolean default
 */
class Language extends Model
{
    use SoftDeletes;

    public $table = 'languages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'flag',
        'abbr',
        'script',
        'native',
        'active',
        'default'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'flag' => 'string',
        'abbr' => 'string',
        'script' => 'string',
        'native' => 'string',
        'active' => 'boolean',
        'default' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    
    
    
    
    public static function getAllFormated(){
        $langs = Language::all();
        $texts = array();
        foreach($langs as $l){
            $texts[$l->abbr] = [
                'id' => $l->id,
                'name' => $l->name,
                'flag' => $l->flag,
                'abbr' => $l->abbr,
                'script' => $l->script,
                'native' => $l->native,
                'active' => $l->active,
                'link_drapeau' => $l->getImageLink()
            ];
        }
        
        return $texts;
    }
    
    
    
    public function getImageLink() {
        if(!is_null($this->abbr)){
            return asset('img/flags/24/'.$this->abbr.'.png');
        }else{
            return asset('img/flags/24/en.png');
        }
    }
    
    
    
}
