<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name'];

    /**
     * schools of this service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    /**
     * instructors of this service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function instructors()
    {
        return $this->belongsToMany('App\Instructor');
    }
}
