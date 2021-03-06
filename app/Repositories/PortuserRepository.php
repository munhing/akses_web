<?php

namespace App\Repositories;

use App\Models\Portuser;
use App\Repositories\BaseRepository;

/**
 * Class PortuserRepository
 * @package App\Repositories
 * @version August 31, 2019, 11:18 pm UTC
*/

class PortuserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'company_id',
        'expires_on'
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
        return Portuser::class;
    }

    public function getPortuser($uuid)
    {
        return Portuser::where('uuid', '=', $uuid)->firstOrFail();
    }
}
