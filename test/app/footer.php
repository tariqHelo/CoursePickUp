<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class footer extends Model
{
    //
    use SoftDeletes;
    protected $table = 'footers';
    protected $fillable = [
        'option',
        'value',
        'userId'
    ];
}
