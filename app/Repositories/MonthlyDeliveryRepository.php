<?php

namespace App\Repositories;

use App\Models\MonthlyDelivery;
use App\Repositories\BaseRepository;

/**
 * Class MonthlyDeliveryRepository
 * @package App\Repositories
 * @version November 30, 2022, 1:24 am UTC
*/

class MonthlyDeliveryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'count_delivery',
        'hours_worked',
        'date_delivery'
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
        return MonthlyDelivery::class;
    }
}
