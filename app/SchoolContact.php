<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{
    protected $fillable = ['school_id', 'email', 'phone', 'address'];

    /**
     * get school of this contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

}
