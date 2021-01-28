<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class countries extends Model
{
    //
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'slug',
        'image',
        'featured',
        'status',
        'userId'
    ];

    public function cities()
    {
        return $this->hasMany(city::class, 'country_id');
    }

    public function schools()
    {
        return $this->hasMany(schools::class, 'country_id', 'id');
    }

    public function visas()
    {
        return $this->hasMany(visa::class, 'country_id', 'id');
    }
}
