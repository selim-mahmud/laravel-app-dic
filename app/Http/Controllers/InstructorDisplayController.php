<?php

namespace App\Http\Controllers;

use App\Postcode;
use App\School;
use App\SchoolServiceArea;
use App\State;
use Illuminate\Http\Request;

class InstructorDisplayController extends Controller
{
    protected $state;
    protected $schoolServiceArea;
    protected $school;
    protected $postcode;

    public function __construct(
        State $state,
        SchoolServiceArea $schoolServiceArea,
        School $school,
        Postcode $postcode
    )
    {
        $this->state = $state;
        $this->schoolServiceArea = $schoolServiceArea;
        $this->school = $school;
        $this->postcode = $postcode;
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

    public function getSingleSchool($school)
    {
        $school = $this->school->findByName($school);
        return view('school_display.single_school', compact('school'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPostcode(Request $request)
    {
        $this->validate($request, [
            'postcode' => 'required|regex:/\d{4}/',
        ]);
        $postcode = $request->input('postcode');
        $postcodes = $this->postcode->findByPostcode($postcode)->pluck('id');
        $schoolServiceArea = $this->schoolServiceArea->whereIn('postcode_id', $postcodes)->get()->pluck('school_id')->unique();
        $schools = $this->school->whereIn('id', $schoolServiceArea)->paginate(10);
        $schools->withPath('/search-driving-schools?postcode='.$postcode);
        return view('school_display.search_instructors', compact('schools', 'postcode'));
    }
}
