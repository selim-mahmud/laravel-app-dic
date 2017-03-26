<?php

namespace App\Http\Controllers;

use App\Review;
use App\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * @var School
     */
    protected $school;

    /**
     * @var Review
     */
    protected $review;

    /**
     * ReviewController constructor.
     * @param School $school
     * @param Review $review
     */
    public function __construct(School $school, Review $review)
    {
        $this->school = $school;
        $this->review = $review;
    }

    /**
     * display review form for learner
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLernerReview()
    {
        $schools = $this->school->all()->pluck('name', 'id');
        $reviews = Auth::user()->reviews;
        return view('learner.reviews.index', compact('schools', 'reviews'));
    }

    /**
     * save review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewStore(Request $request)
    {
        $this->validate($request, [
            'school' => 'required|min:1',
            'rating' => 'required|in:1,2,3,4,5',
            'comment' => 'required|max:1000',
        ]);
        $review = $this->review->create([
            'user_id' => Auth::user()->id,
            'school_id' => $request->school,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        if ($review) {
            return redirect('/learner/reviews')->with('alert-success', 'You have successfully added a review.');
        }
        return redirect('/learner/reviews')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

    /**
     * display reviews for school
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSchoolReview()
    {
        $reviews = $this->review->where(['school_id' => Auth::user()->school_id, 'approved' => 1])->get();
        return view('school.reviews.index', compact('reviews'));
    }
}
