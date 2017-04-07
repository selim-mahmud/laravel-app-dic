<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolServiceArea extends Model
{
    protected $fillable = ['school_id', 'country_id', 'state_id', 'city_id', 'postcode_id'];

    /**
     * get postcode of this service area
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postcode()
    {
        return $this->belongsTo('App\Postcode');
    }

}
