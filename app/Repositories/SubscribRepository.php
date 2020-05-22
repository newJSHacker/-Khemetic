<?php

namespace App\Repositories;

use App\Models\Subscrib;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubscribRepository
 * @package App\Repositories
 * @version February 16, 2019, 8:16 pm UTC
 *
 * @method Subscrib findWithoutFail($id, $columns = ['*'])
 * @method Subscrib find($id, $columns = ['*'])
 * @method Subscrib first($columns = ['*'])
*/
class SubscribRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subscrib::class;
    }
}
