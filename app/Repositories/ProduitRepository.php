<?php

namespace App\Repositories;

use App\Models\Produit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProduitRepository
 * @package App\Repositories
 * @version February 4, 2019, 5:58 pm UTC
 *
 * @method Produit findWithoutFail($id, $columns = ['*'])
 * @method Produit find($id, $columns = ['*'])
 * @method Produit first($columns = ['*'])
*/
class ProduitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'photo',
        'prix',
        'redirect_link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produit::class;
    }
}
