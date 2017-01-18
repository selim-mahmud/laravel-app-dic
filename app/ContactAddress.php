<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    protected $table = 'contact_address';
    protected $primaryKey = 'address_id';

    protected $fillable = ['owner_type', 'owner_id', 'country_id', 'state_id', 'city_id', 'suburb_id', 'zipcode_id', 'address'];

    public function country(){
        return $this->belongsTo('App\Country', 'country_id', 'address_id');
    }

    public function state(){
        return $this->belongsTo('App\State', 'address_id', 'state_id');
    }

    public function city(){
        return $this->belongsTo('App\City', 'address_id', 'city_id');
    }

    public function suburb(){
        return $this->belongsTo('App\Suburb', 'address_id', 'suburb_id');
    }

    public function postcode(){
        return $this->belongsTo('App\Postcode', 'address_id', 'postcode_id');
    }

    public static function getAddresses($addresses_array){
    	if($addresses_array->isEmpty()){
    		return false;
    	}
    	foreach ($addresses_array as $key => $address) {
    		$suburb = Self::find($address->first()->address_id)->suburb()->first()->name;
    		$state = Self::find($address->first()->address_id)->state()->first()->state_abbr;
    		$postcode = Self::find($address->first()->address_id)->postcode()->first()->postcode;
    		$addresses[] = $address->address.', '.$suburb.', '.$state.' '.$postcode;
    	}
    	return implode('<br />', $addresses);
    }
}
