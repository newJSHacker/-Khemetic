<?php

namespace App\Repositories;

use App\Models\Background;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BackgroundRepository
 * @package App\Repositories
 * @version February 23, 2019, 1:14 pm UTC
 *
 * @method Background findWithoutFail($id, $columns = ['*'])
 * @method Background find($id, $columns = ['*'])
 * @method Background first($columns = ['*'])
*/
class BackgroundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'type',
        'page'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Background::class;
    }
}
