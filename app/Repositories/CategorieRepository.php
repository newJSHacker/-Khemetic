<?php

namespace App\Repositories;

use App\Models\Categorie;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategorieRepository
 * @package App\Repositories
 * @version February 26, 2019, 11:10 am UTC
 *
 * @method Categorie findWithoutFail($id, $columns = ['*'])
 * @method Categorie find($id, $columns = ['*'])
 * @method Categorie first($columns = ['*'])
*/
class CategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categorie::class;
    }
}
