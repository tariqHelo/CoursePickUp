<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class visa extends Model
{
    //
    use SoftDeletes;
    protected $table = 'visas';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'country_id',
        'weekForm',
        'weekTo',
        'fee',
        'minHours',
        'maxHours',
        'userId',
    ];

    public function country()
    {
        return $this->belongsTo(countries::class, 'country_id', 'id');
    }
}
