<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Social
 * @package App\Models
 * @version February 23, 2019, 9:28 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string name
 * @property string link
 * @property string image
 * @property string|\Carbon\Carbon update_at
 */
class Social extends Model
{
    use SoftDeletes;

    public $table = 'socials';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link',
        'image',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'link' => 'string',
        'image' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];



    protected $fileExt = [
        "images" => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'],
        "videos" => ['mp4', 'm4a', 'm4v', 'f4v', 'f4a', 'm4b', 'm4r', 'f4b', 'mov','3gp', '3gp2', '3g2', '3gpp', '3gpp2', 'webm', 'flv', 'AVI'],
        "audios" => ['mp3', 'aac']
    ];



    public function afficher($taile = 150){

        if(in_array($this->type, $this->fileExt["images"])){
            return '<img src="'.(asset('socials/'.$this->image)).'" alt="" class="float-left" width="'.$taile.'">';
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            return '<video width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('socials/'.$this->image)).'" type="video/'.$this->type.'">
                        Your browser does not support the video tag.
                    </video>';
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            return '<audio width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('socials/'.$this->image)).'" type="audio/'.$this->type.'">
                        Your browser does not support the video tag.
                    </audio>';
        }else{
            return '<a href="'.(asset('socials/'.$this->image)).'" target="_blank">'.$this->image.'</a>';
        }
    }




    public function getLink(){
        return asset("socials/".$this->image);
    }






}
