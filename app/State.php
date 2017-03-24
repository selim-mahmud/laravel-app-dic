<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * get the postcodes of the state
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function postcodes()
    {
        return $this->hasMany('App\Postcode');
    }
}
