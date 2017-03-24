<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    /**
     * get the country of this postcode
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * get the state of this postcode
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
