<?php

namespace App\Repositories;

use App\Models\Social;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SocialRepository
 * @package App\Repositories
 * @version February 23, 2019, 9:28 am UTC
 *
 * @method Social findWithoutFail($id, $columns = ['*'])
 * @method Social find($id, $columns = ['*'])
 * @method Social first($columns = ['*'])
*/
class SocialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'link',
        'image',
        'update_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Social::class;
    }
}
