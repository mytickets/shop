<?php

namespace App\Repositories;

use App\Models\LineItem;
use App\Repositories\BaseRepository;

/**
 * Class LineItemRepository
 * @package App\Repositories
 * @version November 1, 2019, 4:13 pm UTC
*/

class LineItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'qty',
        'cart_id',
        'product_id',
        'order_id'
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
        return LineItem::class;
    }
}
