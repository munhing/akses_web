<?php

namespace App\Repositories;

use App\Models\PortuserActive;
use App\Repositories\BaseRepository;

/**
 * Class PortuserActiveRepository
 * @package App\Repositories
 * @version September 7, 2019, 3:31 am UTC
*/

class PortuserActiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'portuser_uuid'
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
        return PortuserActive::class;
    }
}
