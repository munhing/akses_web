<?php

namespace App\Repositories;

use App\Models\ActiveVisitor;
use App\Repositories\BaseRepository;

/**
 * Class ActiveVisitorRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:15 am +08
*/

class ActiveVisitorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'visitor_uuid',
        'visitor_card_uuid'
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
        return ActiveVisitor::class;
    }
}
