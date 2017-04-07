<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * get posts for this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function findByName(string $name)
    {
        return $this->where('name', $name)->firstOrfail();
    }
}
