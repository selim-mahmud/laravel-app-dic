<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolMedias extends Model
{
    protected $fillable = ['school_id', 'media_type', 'url'];

    /**
     * get school of this media
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

}
