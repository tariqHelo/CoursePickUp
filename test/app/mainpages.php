<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mainpages extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'option',
        'value',
        'userId'
    ];
}
