<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class destination extends Model
{
    //
    use SoftDeletes;
    protected $table = 'destinations';
    protected $fillable = [
        'titleEn',
        'titleAr',
        'status'
    ];
}
