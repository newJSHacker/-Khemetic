<?php

namespace App\Repositories;

use App\Models\Download;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DownloadRepository
 * @package App\Repositories
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @method Download findWithoutFail($id, $columns = ['*'])
 * @method Download find($id, $columns = ['*'])
 * @method Download first($columns = ['*'])
*/
class DownloadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page',
        'fichier',
        'auth',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Download::class;
    }
}
