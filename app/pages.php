<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pages extends Model
{
    //
    use SoftDeletes;
    protected $table = 'pages';
    protected $fillable = [
        'titleEn',
        'titleAr',
        'slugEn',
        'slugAr',
        'image',
        'contentEn',
        'contentAr',
        'userId'
    ];
}
