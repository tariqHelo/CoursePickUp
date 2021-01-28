<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accommodation extends Model
{
    //
    use SoftDeletes;
    protected $table = 'accommodations';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'school_id',
        'accommodationType_id',
        'bookingFee',
        'status',
        'userId'
    ];

    public function accommodationType()
    {
        return $this->belongsTo(accommodationType::class, 'accommodationType_id', 'id');
    }

    public function accommodationOptions()
    {
        return $this->hasMany(accommodationOptions::class, 'accommodation_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(schools::class, 'school_id', 'id');
    }
}
