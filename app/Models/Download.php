<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Download
 * @package App\Models
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property integer page
 * @property string fichier
 * @property boolean auth
 * @property string description
 */
class Download extends Model
{
    use SoftDeletes;

    public $table = 'downloads';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'page',
        'fichier',
        'auth',
        'description',
        'active',
        'type',
        'title',
        'subtitle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page' => 'integer',
        'fichier' => 'string',
        'auth' => 'boolean',
        'description' => 'string',
        'active' => 'boolean',
        'type' => 'string',
        'title' => 'string',
        'subtitle' => 'string'
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
            return '<img src="'.(asset('download/'.$this->fichier)).'" alt="" class="float-left" width="'.$taile.'">';
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            return '<video width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('download/'.$this->fichier)).'" type="video/'.$this->type.'">
                        Your browser does not support the video tag.
                    </video>';
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            return '<audio width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('download/'.$this->fichier)).'" type="audio/'.$this->type.'">
                        Your browser does not support the video tag.
                    </audio>';
        }else{
            return '<a href="'.(asset('download/'.$this->fichier)).'" target="_blank">'.$this->fichier.'</a>';
        }
    }
    
    public function getPage(){
        if($this->page == 1){
            return 'Membership';
        }else{
            return 'Tribal services';
        }
    }
    
    public function getPageAPI(){
        if($this->page == 1){
            return [$this->page, 'Membership'];
        }else{
            return [$this->page, 'Tribal services'];
        }
    }
    public function getAuth(){
        if($this->auth){
            return 'Must get settings before dowdload';
        }else{
            return "don't aks settings before dowdload";
        }
    }
    public function getAuthAPI(){
        if($this->auth){
            return [$this->auth, 'Must get settings before dowdload'];
        }else{
            return [$this->auth, "don't aks settings before dowdload"];
        }
    }
    
    
    public function getLink(){
        return asset("download/".$this->fichier);
    }
    
}
