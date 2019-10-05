<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class VehicleActivity
 * @package App\Models
 * @version October 5, 2019, 11:41 pm +08
 *
 * @property string vehicle_uuid
 * @property integer clock_type
 * @property string|\Carbon\Carbon clock_time
 */
class VehicleActivity extends Model
{
    public $table = 'vehicle_activities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'vehicle_uuid',
        'clock_type',
        'clock_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vehicle_uuid' => 'string',
        'clock_type' => 'integer',
        'clock_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehicle_uuid' => 'required',
        'clock_type' => 'required',
        'clock_time' => 'required'
    ];

    
}
