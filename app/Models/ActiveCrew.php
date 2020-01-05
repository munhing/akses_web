<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ActiveCrew
 * @package App\Models
 * @version September 23, 2019, 5:15 am +08
 *
 * @property string crew_uuid
 * @property string crew_card_uuid
 */
class ActiveCrew extends Model
{
    public $table = 'active_crews';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'crew_uuid',
        'crew_card_uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'crew_uuid' => 'string',
        'crew_card_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'crew_uuid' => 'required',
        'crew_card_uuid' => 'required'
    ];

    public function crew()
    {
        return $this->belongsTo('App\Models\Crew', 'crew_uuid', 'uuid');
    }  
    
 

    public function card()
    {
        return $this->belongsTo('App\Models\CrewCard', 'crew_card_uuid', 'uuid');
    }     
}
