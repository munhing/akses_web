<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Visitor
 * @package App\Models
 * @version September 23, 2019, 5:52 am +08
 *
 * @property string uuid
 * @property string name
 * @property string nric
 * @property string company
 */
class Visitor extends Model
{
    use SoftDeletes;

    public $table = 'visitors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'nric',
        'company'
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
        'nric' => 'string',
        'company' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'name' => 'required',
        'nric' => 'required',
        'company' => 'required'
    ];

    
}
