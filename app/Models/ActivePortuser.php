<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ActivePortuser
 * @package App\Models
 * @version September 22, 2019, 3:32 am +08
 *
 * @property string portuser_uuid
 */
class ActivePortuser extends Model
{
    public $table = 'active_portusers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'portuser_uuid'
    ];

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
