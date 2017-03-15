<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect301 extends Model
{
    protected $table = 'redirect_301';
    protected $fillable = ['path', 'redirect_to', 'status_code'];

    public function scopeSearch($query, $path)
    {
        return $query->where('path', $path);
    }

}
