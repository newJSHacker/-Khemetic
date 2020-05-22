<?php

namespace App\Repositories;

use App\Models\PageStatic;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PageStaticRepository
 * @package App\Repositories
 * @version May 21, 2019, 10:38 am UTC
 *
 * @method PageStatic findWithoutFail($id, $columns = ['*'])
 * @method PageStatic find($id, $columns = ['*'])
 * @method PageStatic first($columns = ['*'])
*/
class PageStaticRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'code',
        'title',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PageStatic::class;
    }
}
