<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VisitorCard
 * @package App\Models
 * @version September 28, 2019, 5:04 pm +08
 *
 * @property string description
 * @property string uuid
 * @property string visitor_uuid
 */
class VisitorCard extends Model
{
    use SoftDeletes;

    public $table = 'visitor_cards';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'uuid',
        'visitor_uuid'
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
        'visitor_uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'uuid' => 'required'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor','visitor_uuid', 'uuid');
    }
}
