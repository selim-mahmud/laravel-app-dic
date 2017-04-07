<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use Illuminate\Support\Facades\Auth;

class StaffSchoolController extends Controller
{
    /**
     * @var School
     */
    protected $school;

    /**
     * @var School
     */
    protected $user;

    /**
     * StaffSchoolController constructor.
     * @param School $school
     * @param User $user
     */
    public function __construct(School $school, User $user)
    {
        $this->school = $school;
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $schools = $this->school->paginate(20);
        return view('staff.schools.index', compact('schools'));
    }

    public function shadow($id)
    {
        $user = $this->user->find(intval($id));
        Auth::login($user);
        $user = Auth::user();
        if($user){
            return redirect('school')->with('alert-success', 'You have successfully logged in as school.');
        }
        return redirect()->back()->with('alert-danger', config('dic-message.general_fail'));
    }

}
