<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolContact;
use App\SchoolServiceArea;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InstructorDisplayController extends Controller
{
    protected $state;
    protected $schoolServiceArea;
    protected $school;

    public function __construct(State $state, SchoolServiceArea $schoolServiceArea, School $school)
    {
        $this->state = $state;
        $this->schoolServiceArea = $schoolServiceArea;
        $this->school = $school;
    }

    /**
     * Display a listing of instructors of a state.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStateInstructor($state)
    {
        $state = $this->state->findByName(ucwords(str_replace('-', ' ', $state)));
        $schoolServiceArea = $this->schoolServiceArea->where('state_id', $state->id)->get()->pluck('school_id')->unique();
        $schools = $this->school->whereIn('id', $schoolServiceArea)->paginate(10);
        return view('school_display.state_instructors', compact('schools', 'state'));
    }

    public function getSingleSchool($school){
        $school = $this->school->findByName($school);
        return view('school_display.single_school', compact('school'));
        dd($school);
    }
}
