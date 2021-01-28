<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class leads extends Model
{
    //
    use SoftDeletes;
    protected $table = 'leads';
    protected $fillable = [
        'fName',
        'lName',
        'email',
        'phone',
        'nationality',
        'placeOfResidence',
        'notes',
        'destination',
        'invoice',
        'device',
        'currency',
        'type',
        'userId',
        'institution',
        'subject',
    ];
}
