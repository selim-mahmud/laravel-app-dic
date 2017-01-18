<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   	protected $table = 'city';
    protected $primaryKey = 'city_id';

    protected $fillable = ['country_id', 'state_id', 'name'];

}
