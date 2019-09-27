<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ActiveVisitor
 * @package App\Models
 * @version September 23, 2019, 5:15 am +08
 *
 * @property string visitor_uuid
 * @property string visitor_card_uuid
 */
class ActiveVisitor extends Model
{
    public $table = 'active_visitors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'visitor_uuid',
        'visitor_card_uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'visitor_uuid' => 'string',
        'visitor_card_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'visitor_uuid' => 'required',
        'visitor_card_uuid' => 'required'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor', 'visitor_uuid', 'uuid');
    }  
    
    // public function cards()
    // {
    //     return $this->hasMany('App\Models\VisitorCard', 'uuid', 'visitor_card_uuid');
    // } 

    public function card()
    {
        return $this->belongsTo('App\Models\VisitorCard', 'visitor_card_uuid', 'uuid');
    }     
}
