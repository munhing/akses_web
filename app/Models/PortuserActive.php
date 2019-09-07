<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PortuserActive
 * @package App\Models
 * @version September 7, 2019, 3:31 am UTC
 *
 * @property string portuser_uuid
 */
class PortuserActive extends Model
{
    public $table = 'portusers_active';
    
    public $fillable = [
        'portuser_uuid'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'portuser_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'portuser_uuid' => 'required'
    ];

    public function portuser()
    {
        return $this->belongsTo('App\Models\Portuser', 'portuser_uuid', 'uuid');
    }

    
}
