<?php

namespace App\Repositories;

use App\Models\FeedBack;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FeedBackRepository
 * @package App\Repositories
 * @version May 21, 2019, 11:02 am UTC
 *
 * @method FeedBack findWithoutFail($id, $columns = ['*'])
 * @method FeedBack find($id, $columns = ['*'])
 * @method FeedBack first($columns = ['*'])
*/
class FeedBackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'subjet',
        'page',
        'content',
        'update_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FeedBack::class;
    }
}
