<?php

namespace App\Repositories;

use App\Models\TestSite;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TestSiteRepository
 * @package App\Repositories
 * @version February 4, 2019, 5:59 pm UTC
 *
 * @method TestSite findWithoutFail($id, $columns = ['*'])
 * @method TestSite find($id, $columns = ['*'])
 * @method TestSite first($columns = ['*'])
*/
class TestSiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'section',
        'code',
        'texte'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TestSite::class;
    }
}
