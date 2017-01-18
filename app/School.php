<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    protected $primaryKey = 'school_id';

    protected $fillable = ['name', 'display_name', 'short_desc', 'long_desc', 'website', 'facebook', 'twitter'];
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
