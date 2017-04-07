<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * get the postcodes of the country
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function postcodes()
    {
        return $this->hasMany('App\Postcode');
    }

}
