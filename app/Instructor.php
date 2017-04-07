<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['school_id', 'name', 'email', 'phone', 'profile_photo_url', 'short_desc', 'long_desc'];

    /**
     * get school of this instructor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    /**
     * services of this instructor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany('App\Service', 'instructor_has_services')->withTimestamps();;
    }
}
