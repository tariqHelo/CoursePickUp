<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airportPickUp extends Model
{
    //
    protected $table = 'airportpickup';

    use SoftDeletes;

    protected $fillable = [
        'school_id',
        'titleAr',
        'titleEn',
        'oneWay',
        'roundWay',
        'userId',
    ];

    public function school()
    {
        return $this->belongsTo(airportPickUp::class, 'school_id', 'id');
    }
}
