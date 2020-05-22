<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Background
 * @package App\Models
 * @version February 23, 2019, 1:14 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property string image
 * @property string type
 * @property integer page
 */
class Background extends Model
{
    use SoftDeletes;

    public $table = 'backgrounds';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'type',
        'page'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'type' => 'string',
        'page' => 'integer'
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
            return '<img src="'.(asset('img/'.$this->image)).'" alt="" class="float-left" width="'.$taile.'">';
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            return '<video width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('img/'.$this->image)).'" type="video/'.$this->type.'">
                        Your browser does not support the video tag.
                    </video>';
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            return '<audio width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('img/'.$this->image)).'" type="audio/'.$this->type.'">
                        Your browser does not support the video tag.
                    </audio>';
        }else{
            return '<a href="'.(asset('img/'.$this->image)).'" target="_blank">'.$this->image.'</a>';
        }
    }

    public function getPage(){
        if($this->page == 1){
            return 'Membership';
        }else{
            return 'Tribal services';
        }
    }



    public function getLink(){
        return asset("img/".$this->image);
    }

    public function getImageLocation(){
        return "img/".$this->image;
    }

    
}
