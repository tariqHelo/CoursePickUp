<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class residences extends Model
{
    //
    use SoftDeletes;
    protected $table = 'residences';
    protected $fillable = [
        'titleEn',
        'titleAr',
        'status',
    ];
}
