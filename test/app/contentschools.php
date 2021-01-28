<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contentschools extends Model
{
    //
    use SoftDeletes;
    protected $table = 'contentschools';
    protected $fillable = [
        'school_id',
        'shortDescriptionEn',
        'shortDescriptionAr',
        'headingEn',
        'headingAr',
        'descriptionEn',
        'descriptionAr',
        'pageTitleEn',
        'pageTitleAr',
        'metaDescriptionEn',
        'metaDescriptionAr',
        'slugEn',
        'slugAr',
        'userId',
    ];
}
