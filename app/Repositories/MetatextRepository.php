<?php

namespace App\Repositories;

use App\Models\Metatext;
use App\Repositories\BaseRepository;

/**
 * Class MetatextRepository
 * @package App\Repositories
 * @version November 20, 2019, 4:16 pm UTC
*/

class MetatextRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code_name',
        'code_text',
        'draft'
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
        return Metatext::class;
    }
}
