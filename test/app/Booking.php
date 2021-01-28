<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    	'booking_id',
		'first_name',
		'last_name',
		'email',
		'phone',
		'nationality_id',
		'residence_id',
		'notes',
		'start_date',
		'weeks',
		'school_id',
		'course_id',
		'materialFee_id',
		'materialFee_type',
		'feeweeksoptions_id',
		'accommodation_weeks',
		'airportPickUp_id',
		'airportPickUp_type',
		'insurance_id',
		'visa_id',
		'promotions',
        'extra_weeks',
        'discount_weeks',
		'total',
		'invoice',
        'device',
        'lang',
		'status',
    ];

    public function nationality()
    {
    	return $this->belongsTo(nationalities::class, 'nationality_id', 'id');
    }

    public function residence()
    {
    	return $this->belongsTo(residences::class, 'residence_id', 'id');
    }

    public function school()
    {
    	return $this->belongsTo(schools::class, 'school_id', 'id');
    }

    public function course()
    {
    	return $this->belongsTo(coursesSchool::class, 'course_id', 'id');
    }

    public function airportPickUp()
    {
    	return $this->belongsTo(airportPickUp::class, 'airportPickUp_id', 'id');
    }

    public function insurance()
    {
    	return $this->belongsTo(Insurance::class, 'insurance_id', 'id');
    }

    public function visa()
    {
    	return $this->belongsTo(visa::class, 'visa_id', 'id');
    }
    
    public function feeweeksoption()
    {
        return $this->belongsTo(feeWeeksOptions::class, 'feeweeksoptions_id', 'id');
    }

}
