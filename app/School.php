<?php
/*
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(200)     | NO   |     |         |                |
| short_desc | varchar(255)     | NO   |     |         |                |
| long_desc  | text             | YES  |     | NULL    |                |
| website    | varchar(255)     | NO   |     |         |                |
| facebook   | varchar(255)     | NO   |     |         |                |
| twitter    | varchar(255)     | NO   |     |         |                |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'short_desc', 'long_desc', 'website', 'facebook', 'twitter'];

    /**
     * get users for this school
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
