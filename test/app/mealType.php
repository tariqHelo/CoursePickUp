<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mealType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'mealtypes';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'status',
        'userId'
    ];
}
