<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accommodationOptions extends Model
{
    //
    use SoftDeletes;
    protected $table = 'accommodationoptions';
    protected $fillable = [
        'accommodation_id',
        'roomType_id',
        'mealType_id',
        'facilitie_id',
        'supplement',
        'supplementAr',
        'minimumNumberOfWeeksToBook',
        'accommodationAge',
        'status',
    ];

    public function accommodation()
    {
        return $this->belongsTo(accommodation::class, 'accommodation_id', 'id');
    }

    public function feeWeeksOptions()
    {
        return $this->hasMany(feeWeeksOptions::class, 'accommodationOption_id', 'id');
    }

    public function roomType()
    {
        return $this->belongsTo(roomType::class, 'roomType_id', 'id');
    }

    public function mealType()
    {
        return $this->belongsTo(mealType::class, 'mealType_id', 'id');
    }

    public function facilitie()
    {
        return $this->belongsTo(facilitie::class, 'facilitie_id', 'id');
    }

}
