<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MediaAssocier
 * @package App\Models
 * @version February 26, 2019, 11:12 am UTC
 *
 * @property \App\Models\Media media
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property integer media_id
 * @property string name
 * @property string fichier
 * @property string type
 */
class MediaAssocier extends Model
{
    use SoftDeletes;

    public $table = 'media_associers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'media_id',
        'name',
        'fichier',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'media_id' => 'integer',
        'name' => 'string',
        'fichier' => 'string',
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




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function media()
    {
        return $this->belongsTo(\App\Models\Media::class, 'media_id');
    }







    public function afficher($taile = 150){

        $folder_path = 'medias/associate_for_'.$this->media_id;
        if(in_array($this->type, $this->fileExt["images"])){
            return '<img src="'.(asset($folder_path.'/'.$this->fichier)).'" alt="" class="float-left" width="'.$taile.'">';
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            return '<video width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset($folder_path.'/'.$this->fichier)).'" type="video/'.$this->type.'">
                        Your browser does not support the video tag.
                    </video>';
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            return '<audio width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset($folder_path.'/'.$this->fichier)).'" type="audio/'.$this->type.'">
                        Your browser does not support the video tag.
                    </audio>';
        }else{
            return '<a href="'.(asset($folder_path.'/'.$this->fichier)).'" target="_blank">'.$this->fichier.'</a>';
        }
    }



    public function getLink(){
        $folder_path = 'medias/associate_for_'.$this->media_id;

        return asset($folder_path."/".$this->fichier);
    }



    public function setAllAccess(){

        $this->lien = $this->getLink();
        $this->taille = $this->getDDSIze();
        $this->realSize = $this->getRealSize();
        if(in_array($this->type, $this->fileExt["images"])){
            $this->ext = "images";
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            $this->ext = "videos";
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            $this->ext = "audios";
        }else{
            $this->ext = "file";
        }
    }


    public function getDDSIze(){
        $folder_path = 'medias/associate_for_'.$this->media_id;
        $s = filesize($folder_path.'/'.$this->fichier);
        $s = round(($s/1024)/1024, 2);
        return $s;
    }

    public function getRealSize(){
        $folder_path = 'medias/associate_for_'.$this->media_id;
        $s = filesize($folder_path.'/'.$this->fichier);
        return $s;
    }


}
