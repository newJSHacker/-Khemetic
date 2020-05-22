<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Calendar
 * @package App\Models
 * @version May 8, 2019, 1:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string title
 * @property string description
 * @property date day
 * @property integer created_by
 */
class Calendar extends Model
{
    use SoftDeletes;

    public $table = 'calendars';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'day',
        'created_by',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'day' => 'date',
        'created_by' => 'integer',
        'image' => 'string'
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
    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }


    public function getImageLink(){
        if($this->image != null)
            return asset('img/calendar/'.$this->image);

        return '';
    }


    public static function getMonthName($month){
        switch ($month){
            case 1:
                return "Phamenot-Amenhotep I";
                break;
            case 2:
                return "Pharmuthi-Renenutet";
                break;


            case 3:
                return "Khonsu";
                break;
            case 4:
                return "Payni-Heru";
                break;
            case 5:
                return "Epip-Wadjet";
                break;
            case 6:
                return "Mesra";
                break;


            case 7:
                return "Zep Tepi";
                break;


            case 8:
                return "Thoth";
                break;
            case 9:
                return "Phaophi-Ptah";
                break;
            case 10:
                return "Hathor";
                break;
            case 11:
                return "Choiak-Sekhmet";
                break;


            case 12:
                return "Min-Tybi";
                break;
            case 13:
                return "Mekhir-shu";
                break;
            default:
                return "Zep-Tepi";
                break;
        }


    }

}
