<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Crew
 * @package App\Models
 * @version September 23, 2019, 5:52 am +08
 *
 * @property string uuid
 * @property string name
 * @property string nric
 * @property string vessel_name
 */
class Crew extends Model
{

    use SoftDeletes;

    public $table = 'crews';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'nric',
        'vessel_name'
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
        'vessel_name' => 'string'
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
        'vessel_name' => 'required'
    ];

}
