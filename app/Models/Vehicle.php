<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehicle
 * @package App\Models
 * @version September 22, 2019, 2:57 am +08
 *
 * @property string uuid
 * @property string plate_no
 * @property integer company_id
 * @property integer vehicle_type_id
 * @property string expires_on
 */
class Vehicle extends Model
{
    use SoftDeletes;

    public $table = 'vehicles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'plate_no',
        'company_id',
        'vehicle_type_id',
        'expires_on'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'plate_no' => 'string',
        'company_id' => 'integer',
        'vehicle_type_id' => 'integer',
        'expires_on' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'plate_no' => 'required',
        'company_id' => 'required',
        'vehicle_type_id' => 'required',
        'expires_on' => 'required'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\VehicleType','vehicle_type_id');
    }

    public function active()
    {
        return $this->hasOne('App\Models\ActiveVehicle', 'vehicle_uuid', 'uuid');
    }
    
}
