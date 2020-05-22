<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TexteSite
 * @package App\Models
 * @version February 8, 2019, 9:15 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string section
 * @property string code
 * @property string texte
 */
class TexteSite extends Model
{
    use SoftDeletes;

    public $table = 'texte_sites';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'section',
        'code',
        'texte'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'section' => 'string',
        'code' => 'string',
        'texte' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function texteSitesLangues()
    {
        return $this->hasMany(\App\Models\TexteSiteLangue::class, 'texte_site_id');
    }
    
    public function getLangue($lang_id)
    {
        $ts = $this->texteSitesLangues;
        foreach($ts as $t){
            if($t->langue_id == $lang_id)
                return $t->texte;
        }
        return "";
        
        
    }
    
    public function getLang($lang_id)
    {
        $ts = $this->texteSitesLangues;
        foreach($ts as $t){
            if($t->langue_id == $lang_id)
                return $t;
        }
        return null;
        
        
    }
    
    public static function getAllFormated(){
        $langs = Language::all();
        $txt = TexteSite::all();
        $texts = array();
        foreach($txt as $t){
            if(!isset($texts[$t->code])){
                $texts[$t->code] = array();
            }
            foreach($langs as $l){
                if($l->id == 1)
                    $texts[$t->code]['en'] = $t->texte;
                else
                    $texts[$t->code][strtolower($l->code2)] = $t->getLangue($l->id);
            }
        }
        
        return $texts;
    }
    
    
    
    
}
