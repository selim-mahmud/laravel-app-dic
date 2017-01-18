<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    protected $table = 'contact_email';
    protected $primaryKey = 'email_id';

    protected $fillable = ['owner_type', 'owner_id', 'email'];

    public static function getEmails($email_array){
    	if($email_array->isEmpty()){
    		return false;
    	}
    	foreach ($email_array as $key => $email) {
    		$emails[] = $email->email;
    	}
    	return implode(', ', $emails);
    }
}
