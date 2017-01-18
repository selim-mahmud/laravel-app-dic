<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*
     * Table Associate with the model
     */
    protected $table = 'user_role';
    protected $primaryKey = 'role_id';

    protected $fillable = ['role_id', 'role_title'];
}
