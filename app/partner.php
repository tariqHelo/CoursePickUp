<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class partner extends Model
{
    //
    use SoftDeletes;
    protected $table = 'partner';
    protected $fillable = [
        'logo',
        'userId'
    ];
}
