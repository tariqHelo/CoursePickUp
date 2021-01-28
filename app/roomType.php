<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class roomType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'roomtypes';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'status',
        'userId'
    ];
}
