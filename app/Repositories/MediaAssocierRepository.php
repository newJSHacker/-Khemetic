<?php

namespace App\Repositories;

use App\Models\MediaAssocier;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MediaAssocierRepository
 * @package App\Repositories
 * @version February 26, 2019, 11:12 am UTC
 *
 * @method MediaAssocier findWithoutFail($id, $columns = ['*'])
 * @method MediaAssocier find($id, $columns = ['*'])
 * @method MediaAssocier first($columns = ['*'])
*/
class MediaAssocierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'media_id',
        'name',
        'fichier',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MediaAssocier::class;
    }
}
