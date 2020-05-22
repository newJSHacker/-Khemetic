<?php

namespace App\Repositories;

use App\Models\Calendar;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CalendarRepository
 * @package App\Repositories
 * @version May 8, 2019, 1:00 pm UTC
 *
 * @method Calendar findWithoutFail($id, $columns = ['*'])
 * @method Calendar find($id, $columns = ['*'])
 * @method Calendar first($columns = ['*'])
*/
class CalendarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'day',
        'created_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Calendar::class;
    }
}
