<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class services extends Model
{
    //
    use SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'titleEn',
        'titleAr',
        'pageTitleAr',
        'pageTitleEn',
        'icon',
        'shortDescriptionAr',
        'shortDescriptionEn',
        'slugEn',
        'slugAr',
        'image',
        'contentEn',
        'contentAr',
        'userId',
        'brochure'
    ];

    public function prev()
    {
        return $this->where('status', 1)->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
    public function next()
    {
        return $this->where('status', 1)->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
}
