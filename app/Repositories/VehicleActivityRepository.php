<?php

namespace App\Repositories;

use App\Models\VehicleActivity;
use App\Repositories\BaseRepository;

/**
 * Class VehicleActivityRepository
 * @package App\Repositories
 * @version October 5, 2019, 11:41 pm +08
*/

class VehicleActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vehicle_uuid',
        'clock_type',
        'clock_time'
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
        return VehicleActivity::class;
    }
}
