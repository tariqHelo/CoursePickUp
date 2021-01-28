<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class imageCity extends Model
{
    //
    use SoftDeletes;
    protected $table = 'imagecities';
    protected $fillable = [
        'type',
        'file',
        'userId',
        'city_id',
    ];

    public function city()
    {
    	return $this->belongsTo(city::class, 'city_id','id');
    }
}
