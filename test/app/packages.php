<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class packages extends Model
{
    //
    use SoftDeletes;
    protected $table = 'packages';
    protected $fillable = [
        'country_id',
        'city_id',
        'school_id',
        'courseType_id',
        'lessonWeek',
        'duration',
        'accommodationType',
        'roomType_id',
        'mealsType_id',
        'airportPickUp',
        'healthInsurance',
        'studentVisa',
        'featured',
        'fee',
        'otherType',
        'feeDiscount',
        'userId',
    ];

    public function country()
    {
        return $this->belongsTo(countries::class);
    }

    public function city()
    {
        return $this->belongsTo(city::class);
    }

    public function school()
    {
        return $this->belongsTo(schools::class);
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'courseType_id', 'id');
    }

    public function roomType()
    {
        return $this->belongsTo(roomType::class, 'roomType_id', 'id');
    }

    public function mealsType()
    {
        return $this->belongsTo(mealType::class, 'mealsType_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(currency::class, 'currencyType_id', 'id');
    }
}
