<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    //
    use SoftDeletes;
    protected $table = 'insurances';
    protected $fillable = [
        'school_id',
        'titleAr',
        'titleEn',
        'status',
        'fee',
        'userId',
    ];

    public function school()
    {
        return $this->belongsTo(Insurance::class, 'school_id', 'id');
    }
}
