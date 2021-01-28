<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class coursesSchool extends Model
{
    //
    use SoftDeletes;
    protected $table = 'coursesschools';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'slugAr',
        'slugEn',
        'school_id',
        'minBookingWeeks',
        'maxStudents',
        'minAge',
        'hoursPerWeek',
        'lessonsPerWeek',
        'courseType_id',
        'courierFees',
        'materialFeeType_id',
        'materialFeeAmount',
        'requiredLevel',
        'status',
        'featuredSchoolPage',
        'userId'
    ];



    public function school()
    {
        return $this->belongsTo(schools::class, 'school_id', 'id');
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'courseType_id', 'id');
    }

    public function materialFeeType()
    {
        return $this->belongsTo(materialfeeType::class, 'materialFeeType_id', 'id');
    }

    public function weeksrange_fees()
    {
        return $this->hasMany(coursesFees::class, 'course_id', 'id');
    }

    public function weeksrangematerial_fees()
    {
        return $this->hasMany(WeeksRangeMaterialfee::class, 'course_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'requiredLevel', 'id');
    }

}
