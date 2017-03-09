<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['school_id', 'name', 'email', 'phone', 'profile_photo_url', 'short_desc', 'long_desc'];
}
