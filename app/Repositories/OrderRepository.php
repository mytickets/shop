<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version November 5, 2019, 12:54 am UTC
*/

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pay_type',
        'pay_place',
        'pay_adr',
        'pay_contact',
        'pay_discount',
        'status',
        'comment',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }
}
