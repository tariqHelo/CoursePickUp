<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nationalities extends Model
{
    //
    use SoftDeletes;
    protected $table = 'nationalities';
    protected $fillable = [
        'titleEn',
        'titleAr',
        'status',
    ];
}
