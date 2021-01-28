<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class articles extends Model
{
    //
    protected $table = 'articles';

    use SoftDeletes;

    protected $fillable = [
        'titleAr',
        'titleEn',
        'slugAr',
        'slugEn',
        'metaDescriptionEn',
        'metaDescriptionAr',
        'pageTitleAr',
        'pageTitleEn',
        'image',
        'contentEn',
        'contentAr',
        'featured ',
        'status',
        'userId',
        'date',
    ];
    public function prev()
    {
        return $this->where('status', 1)->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
    public function next()
    {
        return $this->where('status', 1)->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
}
