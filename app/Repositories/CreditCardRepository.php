<?php

namespace App\Repositories;

use App\Models\CreditCard;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CreditCardRepository
 * @package App\Repositories
 * @version February 17, 2020, 3:06 pm UTC
 *
 * @method CreditCard findWithoutFail($id, $columns = ['*'])
 * @method CreditCard find($id, $columns = ['*'])
 * @method CreditCard first($columns = ['*'])
*/
class CreditCardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'card_id',
        'card_expire_month',
        'card_expire_year',
        'secret_code'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CreditCard::class;
    }
}
