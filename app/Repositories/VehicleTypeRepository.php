<?php

namespace App\Repositories;

use App\Models\VehicleType;
use App\Repositories\BaseRepository;

/**
 * Class VehicleTypeRepository
 * @package App\Repositories
 * @version September 22, 2019, 3:16 am +08
*/

class VehicleTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type'
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
        return VehicleType::class;
    }
}
