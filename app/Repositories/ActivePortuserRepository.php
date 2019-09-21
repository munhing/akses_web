<?php

namespace App\Repositories;

use App\Models\ActivePortuser;
use App\Repositories\BaseRepository;

/**
 * Class ActivePortuserRepository
 * @package App\Repositories
 * @version September 22, 2019, 3:32 am +08
*/

class ActivePortuserRepository extends BaseRepository
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
        return ActivePortuser::class;
    }
}
