<?php

namespace App\Http\Controllers;

use App\User;

class StaffUserController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * StaffUserController constructor.
     * @param User $review
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->paginate(20);
        return view('staff.users.index', compact('users'));
    }

}
