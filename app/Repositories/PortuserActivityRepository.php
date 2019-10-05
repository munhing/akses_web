<?php

namespace App\Repositories;

use App\Models\PortuserActivity;
use App\Repositories\BaseRepository;

/**
 * Class PortuserActivityRepository
 * @package App\Repositories
 * @version October 5, 2019, 11:41 pm +08
*/

class PortuserActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'portuser_uuid',
        'clock_type'
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
        return PortuserActivity::class;
    }
}
