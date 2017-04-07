<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorHasService extends Model
{
    protected $fillable = ['instructor_id', 'service_id'];
}
