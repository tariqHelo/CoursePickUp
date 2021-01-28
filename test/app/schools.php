<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class schools extends Model
{
    //
    use SoftDeletes;
    protected $table = 'schools';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'slugAr',
        'slugEn',
        'featuredMainPage',
        'featuredCountryPage',
        'featuredCityPage',
        'currency_id',
        'country_id',
        'city_id',
        'latitude',
        'longitude',
        'logo',
        'rating',
        'registrationFee',
        'status',
        'userId'
    ];


    public function courses()
    {
        return $this->hasMany(coursesSchool::class, 'school_id', 'id');
    }

    public function active_courses()
    {
        return $this->hasMany(coursesSchool::class, 'school_id', 'id')->where('status', 1);
    }

    public function content()
    {
        return $this->hasOne(contentschools::class, 'school_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(filesSchool::class, 'school_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(filesSchool::class, 'school_id', 'id')->where('type', 1);
    }

    public function featuredCourse()
    {
        return $this->hasOne(coursesSchool::class, 'school_id', 'id')->where('featuredSchoolPage', 1)->where('status', 1);
    }

    public function city()
    {
        return $this->belongsTo(city::class);
    }

    public function country()
    {
        return $this->belongsTo(countries::class);
    }

    public function currency()
    {
        return $this->belongsTo(currency::class);
    }

    public function accreditations()
    {
        return $this->hasMany(accreditation::class, 'school_id', 'id');
    }

    public function accommodations()
    {
        return $this->hasMany(accommodation::class, 'school_id', 'id');
    }

    public function airportPickUp()
    {
        return $this->hasMany(airportPickUp::class, 'school_id', 'id');
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class, 'school_id', 'id');
    }

    public function multiPromotions()
    {
        return $this->hasMany(multiPromotions::class, 'school_id', 'id');
    }
}
