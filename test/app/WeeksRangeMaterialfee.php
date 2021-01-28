<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeeksRangeMaterialfee extends Model
{
    use SoftDeletes;
    protected $table = 'weeksrangematerial_fees';
    protected $fillable = [
        'course_id',
        'fromWeek',
        'toWeek',
        'fee',
        'userId'
    ];
}
