<?php

namespace App\Repositories;

use App\Models\ContactAdresse;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ContactAdresseRepository
 * @package App\Repositories
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @method ContactAdresse findWithoutFail($id, $columns = ['*'])
 * @method ContactAdresse find($id, $columns = ['*'])
 * @method ContactAdresse first($columns = ['*'])
*/
class ContactAdresseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'tel',
        'nom',
        'prenom'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ContactAdresse::class;
    }
}
