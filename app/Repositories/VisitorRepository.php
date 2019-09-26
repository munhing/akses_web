<?php

namespace App\Repositories;

use App\Models\Visitor;
use App\Repositories\BaseRepository;

/**
 * Class VisitorRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:52 am +08
*/

class VisitorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'nric',
        'company'
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
        return Visitor::class;
    }
}
