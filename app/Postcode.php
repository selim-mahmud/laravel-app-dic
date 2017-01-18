<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
   	protected $table = 'postcode';
    protected $primaryKey = 'postcode_id';
    protected $fillable = ['country_id', 'state_id', 'city_id', 'postcode'];

}
