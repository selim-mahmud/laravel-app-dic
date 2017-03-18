<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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
                return 'Approving';
                break;
            case 1:
                return 'Approved';
                break;
            case -1:
                return 'Rejected';
                break;
        }
    }

    /**
     * query scope for approved reviews
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeApproved(Builder $query) : Builder
    {
        return $query->where('approved', 1);
    }

    /**
     * query scope for approving reviews
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeApproving(Builder $query) : Builder
    {
        return $query->where('approved', 0);
    }

    /**
     * query scope for rejected reviews
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeRejected(Builder $query) : Builder
    {
        return $query->where('approved', -1);
    }

}
