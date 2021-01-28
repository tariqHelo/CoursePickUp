<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class coursesFees extends Model
{
    //
    use SoftDeletes;
    protected $table = 'coursesfees';
    protected $fillable = [
        'course_id',
        'fromWeek',
        'toWeek',
        'fee',
        'userId'
    ];
}
