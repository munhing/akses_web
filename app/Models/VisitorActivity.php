<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class VisitorActivity
 * @package App\Models
 * @version October 5, 2019, 11:40 pm +08
 *
 * @property string visitor_uuid
 * @property string visitor_card_uuid
 * @property string reason
 * @property integer clock_type
 */
class VisitorActivity extends Model
{

    public $table = 'visitor_activities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'visitor_uuid',
        'visitor_card_uuid',
        'reason',
        'clock_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'visitor_uuid' => 'string',
        'visitor_card_uuid' => 'string',
        'reason' => 'string',
        'clock_type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'visitor_uuid' => 'required',
        'visitor_card_uuid' => 'required',
        'clock_type' => 'required'
    ];

    
}
