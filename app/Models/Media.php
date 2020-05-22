<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZipArchive;

/**
 * Class Media
 * @package App\Models
 * @version February 26, 2019, 11:11 am UTC
 *
 * @property \App\Models\Category category
 * @property \Illuminate\Database\Eloquent\Collection blogEtcPostCategories
 * @property \Illuminate\Database\Eloquent\Collection MediaAssocier
 * @property integer categorie_id
 * @property string name
 * @property string fichier
 * @property string type
 */
class Media extends Model
{
    use SoftDeletes;

    public $table = 'medias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'categorie_id',
        'name',
        'fichier',
        'image',
        'type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categorie_id' => 'integer',
        'name' => 'string',
        'fichier' => 'string',
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



    public $fileExt = [
        "images" => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'],
        "videos" => ['mp4', 'm4a', 'm4v', 'f4v', 'f4a', 'm4b', 'm4r', 'f4b', 'mov','3gp', '3gp2', '3g2', '3gpp', '3gpp2', 'webm', 'flv', 'AVI'],
        "audios" => ['mp3', 'aac']
    ];






    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categorie()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mediaAssociers()
    {
        return $this->hasMany(\App\Models\MediaAssocier::class, 'media_id');
    }

    public function setAllAccess(){
        foreach($this->mediaAssociers as $ma){
            $ma->setAllAccess();
        }
        $this->lien = $this->getLink();
        $this->lienImage = $this->getImageLink();
        $this->mediaAssociersFile = $this->getMediaAssocierType("file");
        $this->mediaAssociersVideo = $this->getMediaAssocierType("videos");
        $this->mediaAssociersAudio = $this->getMediaAssocierType("audios");
        $this->mediaAssociersAudioVideo = $this->getMediaAssocierType("audios & videos");
        $this->mediaAssociersImage = $this->getMediaAssocierType("image");
        $cat = $this->categorie;
        $this->taille = $this->getDDSIze();

        $folder_path = 'medias/associate_for_'.$this->id;
        $baseFileName = implode('_', explode(' ',$this->name));
        $fileName_all = implode('_', explode(' ',$this->name)).'_all.zip';
        if(!is_file($folder_path.'/'.$fileName_all)){
            $this->createAllMediaZip();
        }
        $baseFileName = $folder_path.'/'.$baseFileName;

        $this->zipFileLong = asset($baseFileName.'_file.zip');
        $this->zipAudioLong = asset($baseFileName.'_audios.zip');
        $this->zipVideoLong = asset($baseFileName.'_videos.zip');
        $this->zipAudioVideoLong = asset($baseFileName.'_audios_videos.zip');
        $this->zipAudioImageLong = asset($baseFileName.'_image.zip');
        $this->zipAudioAllLong = asset($baseFileName.'_all.zip');


        $this->zipFile = $baseFileName.'_file.zip';
        $this->zipAudio = $baseFileName.'_audios.zip';
        $this->zipVideo = $baseFileName.'_videos.zip';
        $this->zipAudioVideo = $baseFileName.'_audios_videos.zip';
        $this->zipAudioImage = $baseFileName.'_image.zip';
        $this->zipAudioAll = $baseFileName.'_all.zip';

    }

    public function createMediaZip($type){

        $mediaAssociers = $this->getMediaAssocierType($type);
        if($mediaAssociers->count() > 0) {
            $folder_path = 'medias/associate_for_' . $this->id;
            $letype = ($type == "audios & videos") ? "audios_videos" : $type;
            $fileName = implode('_', explode(' ', $this->name)) . '_' . $letype;
            $zip = new ZipArchive();
            if ($zip->open($folder_path . '/' . $fileName . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                foreach ($mediaAssociers as $ma) {
                    $zip->addFile($folder_path . '/' . $ma->fichier, $ma->name . '.' . $ma->type);
                }
                $zip->close();
                return true;
            }
        }
        return false;

    }

    public function createAllMediaZip(){
        $this->createMediaZip("image");
        $this->createMediaZip("videos");
        $this->createMediaZip("audios");
        $this->createMediaZip("audios & videos");
        $this->createMediaZip("file");
        $this->createMediaZip("all");
    }



    public function getDDSIze(){
        return 0;
    }


    public function getMediaAssocierType($type){

        $mediaAssociers = collect();

        switch ($type){
            case "image" :
                foreach($this->mediaAssociers as $ma){
                    if(in_array($ma->type, $this->fileExt["images"])){
                        $mediaAssociers->push($ma);
                    }
                }
                break;
            case "videos" :
                foreach($this->mediaAssociers as $ma){
                    if(in_array($ma->type, $this->fileExt["videos"])){
                        $mediaAssociers->push($ma);
                    }
                }
                break;
            case "audios" :
                foreach($this->mediaAssociers as $ma){
                    if(in_array($ma->type, $this->fileExt["audios"])){
                        $mediaAssociers->push($ma);
                    }
                }
                break;
            case "audios & videos" :
                foreach($this->mediaAssociers as $ma){
                    if(in_array($ma->type, $this->fileExt["audios"]) || in_array($ma->type, $this->fileExt["videos"])){
                        $mediaAssociers->push($ma);
                    }
                }
                break;
            case "file" :
                foreach($this->mediaAssociers as $ma){
                    $test = !in_array($ma->type, $this->fileExt["videos"]) &&
                            !in_array($ma->type, $this->fileExt["audios"]);
                    if($test){
                        $mediaAssociers->push($ma);
                    }
                }
                break;
            case "all" :
                $mediaAssociers = $this->mediaAssociers;
                break;

        }


        return $mediaAssociers;

    }



    public function afficher($taile = 150){

        if($this->fichier == null)
            return "";

        if(in_array($this->type, $this->fileExt["images"])){
            return '<img src="'.(asset('medias/'.$this->fichier)).'" alt="" class="float-left" width="'.$taile.'">';
        }elseif(in_array($this->type, $this->fileExt["videos"])){
            return '<video width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('medias/'.$this->fichier)).'" type="video/'.$this->type.'">
                        Your browser does not support the video tag.
                    </video>';
        }elseif(in_array($this->type, $this->fileExt["audios"])){
            return '<audio width="'.$taile.'" height="auto" controls>
                        <source src="'.(asset('medias/'.$this->fichier)).'" type="audio/'.$this->type.'">
                        Your browser does not support the video tag.
                    </audio>';
        }else{
            return '<a href="'.(asset('medias/'.$this->fichier)).'" target="_blank">'.$this->fichier.'</a>';
        }
    }


    public function afficherImage($taile = 150){

        return '<img src="'.(asset('medias/'.$this->image)).'" alt="" class="float-left" width="'.$taile.'">';

    }


    public function getLink(){
        return asset("medias/".$this->fichier);
    }



    public function getImageLink(){
        return asset("medias/".$this->image);
    }







}
