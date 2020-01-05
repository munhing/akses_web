<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CrewActivity
 * @package App\Models
 * @version October 5, 2019, 11:40 pm +08
 *
 * @property string crew_uuid
 * @property string crew_card_uuid
 * @property integer clock_type
 */
class CrewActivity extends Model
{

    public $table = 'crew_activities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'crew_uuid',
        'crew_card_uuid',
        'clock_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'crew_uuid' => 'string',
        'crew_card_uuid' => 'string',
        'reason' => 'string',
        'clock_type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'crew_uuid' => 'required',
        'crew_card_uuid' => 'required',
        'clock_type' => 'required'
    ];

    
}
