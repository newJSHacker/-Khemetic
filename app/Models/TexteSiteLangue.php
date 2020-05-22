<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TexteSiteLangue
 * @package App\Models
 * @version February 8, 2019, 9:16 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property integer langue_id
 * @property integer texte_site_id
 * @property string section
 * @property string code
 * @property string texte
 */
class TexteSiteLangue extends Model
{
    use SoftDeletes;

    public $table = 'texte_sites_langues';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'langue_id',
        'texte_site_id',
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
        'langue_id' => 'integer',
        'texte_site_id' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function langue()
    {
        return $this->belongsTo(\App\Models\Language::class, 'langue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function texteSite()
    {
        return $this->belongsTo(\App\Models\TexteSite::class, 'texte_site_id');
    }
    
    
    
    
}
