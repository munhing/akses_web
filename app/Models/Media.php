<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    protected $appends = ['url', 'url_thumb'];

    public function getUrlAttribute()
    {
        return $this->getUrl();
    }

    public function getUrlThumbAttribute()
    {
        return $this->getUrl('thumb');
    }    
}
