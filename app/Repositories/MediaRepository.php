<?php

namespace App\Repositories;

use App\Models\Media;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MediaRepository
 * @package App\Repositories
 * @version February 26, 2019, 11:11 am UTC
 *
 * @method Media findWithoutFail($id, $columns = ['*'])
 * @method Media find($id, $columns = ['*'])
 * @method Media first($columns = ['*'])
*/
class MediaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categorie_id',
        'name',
        'fichier',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Media::class;
    }
}
