<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Portuser
 * @package App\Models
 * @version August 31, 2019, 11:18 pm UTC
 *
 * @property string uuid
 * @property string name
 * @property integer company_id
 * @property string expires_on
 */
class Portuser extends Model
{
    use SoftDeletes;

    public $table = 'portusers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'company_id',
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
        'name' => 'string',
        'company_id' => 'integer',
        'expires_on' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'name' => 'required',
        'company_id' => 'required',
        'expires_on' => 'required'
    ];

    
}
