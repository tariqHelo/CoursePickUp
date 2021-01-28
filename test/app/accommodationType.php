<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accommodationType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'accommodationtypes';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'slugAr',
        'slugEn',
        'status',
        'userId'
    ];

    public function accommodationOptions()
    {
        return $this->hasMany(accommodationOptions::class, 'accommodationType_id', 'id');
    }

    public function accommodations()
    {
        return $this->hasMany(accommodation::class, 'accommodationType_id', 'id');
    }
}
