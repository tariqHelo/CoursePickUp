<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class filesSchool extends Model
{
    use SoftDeletes;
    protected $table = 'filesschools';
    protected $fillable = [
        'school_id',
        'file',
        'type',
        'userId'
    ];

    public function school()
    {
    	return $this->belongsTo(schools::class, 'id', 'school_id');
    }
}
