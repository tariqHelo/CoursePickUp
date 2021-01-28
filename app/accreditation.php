<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class accreditation extends Model
{
    //
    protected $table = 'accreditations';

    use SoftDeletes;

    protected $fillable = [
        'school_id',
        'logo',
        'userId',
    ];
    
    public function school()
    {
    	return $this->belongsTo('school_id', 'id');
    }
}
