<?php

namespace App\Repositories;

use App\Models\worker;
use App\Repositories\BaseRepository;

/**
 * Class workerRepository
 * @package App\Repositories
 * @version November 29, 2022, 3:28 pm UTC
*/

class workerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'ref_number'
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
        return worker::class;
    }
}
