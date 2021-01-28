<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class generalSetting extends Model
{
    //
    use SoftDeletes;
    protected $table = 'general_settings';
    protected $fillable = [
        'option',
        'value',
        'userId'
    ];
}
