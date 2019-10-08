<?php

namespace App\Models;

use Eloquent as Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
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
class Portuser extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

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

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function registerMediaCollections()
    {
        // $this
        //     ->addMediaConversion('avatar')
        //     ->singleFile();

        // $this->addMediaConversion('thumb')
        //     ->width(250)
        //     ->height(250)
        //     ->sharpen(10);

        $this
            ->addMediaCollection('photos')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(250)
                    ->height(250)
                    ->sharpen(10);
            });        
    }
    
}
