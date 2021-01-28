<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class feeWeeksOptions extends Model
{
    //
    use SoftDeletes;
    protected $table = 'feeweeksoptions';
    protected $fillable = [
        'fee',
        'fromWeek',
        'toWeek',
        'accommodationOption_id',
        'userId'
    ];

    public function accommodationOption()
    {
        return $this->belongsTo(accommodationOptions::class, 'accommodationOption_id', 'id');
    }
}
