<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ActiveVehicle
 * @package App\Models
 * @version September 22, 2019, 5:36 am +08
 *
 * @property string vehicle_uuid
 */
class ActiveVehicle extends Model
{
    public $table = 'active_vehicles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'vehicle_uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vehicle_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehicle_uuid' => 'required'
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_uuid', 'uuid');
    }       
}
