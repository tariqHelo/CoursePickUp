<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facilitie extends Model
{
    //
    use SoftDeletes;
    protected $table = 'facilities';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'status',
        'userId'
    ];
}
