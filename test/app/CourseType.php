<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseType extends Model
{
    //coursetypes
    use SoftDeletes;
    protected $table = 'coursetypes';
    protected $fillable = [
        'titleAr',
        'titleEn',
        'status',
        'userId'
    ];

    public function courses()
    {
    	return $this->hasMany(coursesSchool::class, 'courseType_id', 'id');
    }
}
