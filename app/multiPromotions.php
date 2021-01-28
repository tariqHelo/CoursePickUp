<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class multiPromotions extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use SoftDeletes;

    protected $table = 'multipromotions';
    protected $fillable = [
        'promotion_id',
        'titleAr',
        'titleEn',
        'school_id',
        'amount',
        'bookingDurationFrom',
        'bookingDurationTo',
        'status',
    ];

    public function promotion()
    {
        return $this->belongsTo(promotion::class, 'promotion_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(promotion::class, 'school_id', 'id');
    }
}
