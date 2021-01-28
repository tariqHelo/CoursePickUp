<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class permission extends Model
{
    //
    use SoftDeletes;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    use SoftDeletes;
    protected $table = 'permission';
    protected $fillable = [
        'userId',
        'type',
        'edit',
        'create',
        'delete',
    ];
}
