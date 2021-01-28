<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class promotion extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use SoftDeletes;

    protected $table = 'promotions';
    protected $fillable = [
        'userId',
        'type',
        'for',
        'subFor',
        'validDateFrom',
        'validDateTo',
        'courseBookingFrom',
        'courseBookingTo',
     
    ];

    public function multiPromotions()
    {
        return $this->hasMany(multiPromotions::class, 'promotion_id', 'id');
    }
}
