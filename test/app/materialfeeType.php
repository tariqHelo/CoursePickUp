<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class materialfeeType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'materialfee_types';
    protected $fillable = [
        'titleEn',
        'titleAr',
    ];
}
