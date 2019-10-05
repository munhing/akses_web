<?php

namespace App\Repositories;

use App\Models\VisitorActivity;
use App\Repositories\BaseRepository;

/**
 * Class VisitorActivityRepository
 * @package App\Repositories
 * @version October 5, 2019, 11:40 pm +08
*/

class VisitorActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'visitor_uuid',
        'visitor_card_uuid',
        'reason',
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
        return VisitorActivity::class;
    }
}
