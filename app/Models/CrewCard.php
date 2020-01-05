<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CrewCard
 * @package App\Models
 * @version September 28, 2019, 5:04 pm +08
 *
 * @property string description
 * @property string uuid
 * @property string crew_uuid
 */
class CrewCard extends Model
{
    use SoftDeletes;

    public $table = 'crew_cards';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'uuid',
        'crew_uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'uuid' => 'string',
        'crew_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required'
    ];

    public function crew()
    {
        return $this->belongsTo('App\Models\Crew','crew_uuid', 'uuid');
    }
}
