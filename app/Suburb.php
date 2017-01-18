<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
   	protected $table = 'suburb';
    protected $primaryKey = 'suburb_id';
    protected $fillable = ['country_id', 'state_id', 'city_id', 'postcode_id', 'name'];

}
