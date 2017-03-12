<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolMedias extends Model
{
    protected $fillable = ['school_id', 'media_type', 'url'];

}
