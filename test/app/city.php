<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class city extends Model
{
    //
    use SoftDeletes;
    protected $table = 'city';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'slug',
        'country_id',
        'population',
        'contentAr',
        'contentEn',
        'status',
        'userId',
    ];

    public function country()
    {
        return $this->belongsTo(countries::class, 'country_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(coursesSchool::class, 'city_id', 'id');
    }

    public function schools()
    {
        return $this->hasMany(schools::class, 'city_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(imageCity::class, 'city_id', 'id');
    }

}
