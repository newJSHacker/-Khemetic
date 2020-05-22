<?php

namespace App\Repositories;

use App\Models\TexteSite;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TexteSiteRepository
 * @package App\Repositories
 * @version February 8, 2019, 9:15 am UTC
 *
 * @method TexteSite findWithoutFail($id, $columns = ['*'])
 * @method TexteSite find($id, $columns = ['*'])
 * @method TexteSite first($columns = ['*'])
*/
class TexteSiteRepository extends BaseRepository
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
        return TexteSite::class;
    }
}
