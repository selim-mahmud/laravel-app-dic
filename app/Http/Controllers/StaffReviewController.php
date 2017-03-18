<?php

namespace App\Http\Controllers;

use App\Review;

class StaffReviewController extends Controller
{
    /**
     * @var Review
     */
    protected $review;

    /**
     * StaffReviewController constructor.
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reviews = $this->review->paginate(20);
        return view('staff.reviews.index', compact('reviews'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function approvedReviews()
    {
        $reviews = $this->review->approved()->paginate(20);
        return view('staff.reviews.approved', compact('reviews'));
    }

    public function approvingReviews()
    {
        $reviews = $this->review->approving()->paginate(20);
        return view('staff.reviews.approving', compact('reviews'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rejectedReviews()
    {
        $reviews = $this->review->rejected()->paginate(20);
        return view('staff.reviews.rejected', compact('reviews'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $review = $this->review->findOrFail(intval($id));
        $review->approved = 1;
        if($review->save()){
            return redirect()->back()->with('alert-success', 'You have successfully approved the review.');
        }
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reject($id)
    {
        $review = $this->review->findOrFail(intval($id));
        $review->approved = -1;
        if($review->save()){
            return redirect()->back()->with('alert-success', 'You have successfully rejected the review.');
        }
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }
}
