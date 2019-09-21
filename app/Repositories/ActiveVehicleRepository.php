<?php

namespace App\Repositories;

use App\Models\ActiveVehicle;
use App\Repositories\BaseRepository;

/**
 * Class ActiveVehicleRepository
 * @package App\Repositories
 * @version September 22, 2019, 5:36 am +08
*/

class ActiveVehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vehicle_uuid'
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
        return ActiveVehicle::class;
    }
}
