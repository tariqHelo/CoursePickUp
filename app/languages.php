<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class languages extends Model
{
    //
    use SoftDeletes;

    protected $table = 'languages';
    protected $fillable = [
        'name',
        'icon',
        'status',
        'userId'
    ];
}
