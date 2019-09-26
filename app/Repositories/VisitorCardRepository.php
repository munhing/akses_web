<?php

namespace App\Repositories;

use App\Models\VisitorCard;
use App\Repositories\BaseRepository;

/**
 * Class VisitorCardRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:13 am +08
*/

class VisitorCardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'uuid'
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
        return VisitorCard::class;
    }
}
