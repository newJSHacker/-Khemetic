<?php

namespace App\Repositories;

use App\Models\TexteSiteLangue;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TexteSiteLangueRepository
 * @package App\Repositories
 * @version February 8, 2019, 9:16 am UTC
 *
 * @method TexteSiteLangue findWithoutFail($id, $columns = ['*'])
 * @method TexteSiteLangue find($id, $columns = ['*'])
 * @method TexteSiteLangue first($columns = ['*'])
*/
class TexteSiteLangueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'langue_id',
        'texte_site_id',
        'section',
        'code',
        'texte'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TexteSiteLangue::class;
    }
}
