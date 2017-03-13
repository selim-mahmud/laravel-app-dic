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

class Review extends Model
{
    protected $fillable = ['user_id', 'school_id', 'instructor_id', 'rating', 'comment', 'approved'];

    /**
     * get the school that has this review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    /**
     * get the user that has this review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * mutator for approved field
     *
     * @param $value
     * @return string
     */
    public function getApprovedAttribute($value)
    {
        switch ($value) {
            case 0:
                return 'Waiting for approval';
                break;
            case 1:
                return 'Approved';
                break;
            case -1:
                return 'Rejected';
                break;
        }
    }

}
