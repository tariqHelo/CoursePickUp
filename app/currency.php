<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    //
    protected $table = 'currencies';
    protected $fillable  = [
        'name',
        'code',
        'usd',
        'gbp',
        'eur',
        'cad',
        'aud',
        'nzd',
        'aed',
        'kwd',
        'sar',
        'omr',
        'bhd',
        'jod',
        'qar',
        'myr',
        'try',
        'egp',
    ];
}
