<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PortuserActivity
 * @package App\Models
 * @version October 5, 2019, 11:41 pm +08
 *
 * @property string portuser_uuid
 * @property integer clock_type
 */
class PortuserActivity extends Model
{
    public $table = 'portuser_activities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'portuser_uuid',
        'clock_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'portuser_uuid' => 'string',
        'clock_type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'portuser_uuid' => 'required',
        'clock_type' => 'required'
    ];

    
}
