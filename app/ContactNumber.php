<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactNumber extends Model
{
   	protected $table = 'contact_number';
    protected $primaryKey = 'number_id';

    protected $fillable = ['owner_type', 'owner_id', 'number'];

    public static function getPhones($phones_array){
    	if($phones_array->isEmpty()){
    		return false;
    	}
    	foreach ($phones_array as $key => $phone) {
    		$phones[] = $phone->number;
    	}
    	return implode(', ', $phones);
    }
}
