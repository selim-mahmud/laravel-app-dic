<?php

/*
+----------------+---------------------+------+-----+----------+----------------
| Field          | Type                | Null | Key | Default  | Extra
+----------------+---------------------+------+-----+----------+----------------
| id             | int(10) unsigned    | NO   | PRI | NULL     | auto_increment
| school_id      | int(10) unsigned    | NO   | MUL | 0        |
| facebook_id    | bigint(20) unsigned | NO   | MUL | 0        |
| name           | varchar(100)        | NO   |     | NULL     |
| display_name   | varchar(100)        | NO   |     |          |
| user_type      | varchar(20)         | NO   |     |          |
| email          | varchar(100)        | NO   | UNI |          |
| pass_key       | varchar(255)        | NO   |     |          |
| status         | varchar(20)         | NO   |     | inactive |
| reset_key      | varchar(255)        | NO   |     |          |
| remember_token | varchar(100)        | YES  |     |          |
| created_at     | timestamp           | YES  |     | NULL     |
| updated_at     | timestamp           | YES  |     | NULL     |
+----------------+---------------------+------+-----+----------+----------------
*/
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['school_id', 'facebook_id', 'name', 'display_name',
        'email', 'user_type', 'pass_key', 'status', 'reset_key', 'remember_token'];
    protected $hidden = ['pass_key', 'reset_key'];

    /**
     * set custom password field name
     *
     * @return mixed
     */
    public function getAuthPassword()
    {
        return $this->pass_key;
    }

    /**
     * get the school that has this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    /**
     * check if an email exists in user table
     *
     * @param string $email
     * @return bool
     */
    public function isEmailExists(string $email) : bool
    {
        return ($this::where('email', $email)->count())===1?true:false;
    }

    /**
     * check if reset key exists in user table
     *
     * @param string $key
     * @return object|bool
     */
    public function getResetKeyUser(string $key)
    {
        $user = $this::where('reset_key', $key);
        if($user->count() === 1){
            return $user;
        }
        return false;
    }
}
