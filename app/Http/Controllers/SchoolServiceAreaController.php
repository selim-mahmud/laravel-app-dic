<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolHasService;
use App\Service;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SchoolServiceAreaController extends Controller
{
    protected $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = $this->state->all();
        return view('school.service_area.index', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'service' => 'required|integer|min:1',
        ]);
        $schoolHasService = SchoolHasService::create([
            'school_id' => Auth::user()->school_id,
            'service_id' => $request->service,
        ]);
        if ($schoolHasService) {
            return redirect('/school/services')->with('alert-success', 'You have successfully added a service.');
        }
        return redirect('/school/services')->with('alert-warning', 'Something wrong happened, please try again later.');

    }

    /**
     * delete a service
     *
     * @param $schoolId
     * @param $serviceId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($schoolId, $serviceId)
    {
        $school = School::find(intval($schoolId));
        if(Auth::user()->school_id === $school->id){
            $school->services()->detach(intval($serviceId));
            return redirect('/school/services')->with('alert-success', 'You have successfully deleted the service.');
        }
        return redirect('/school/services')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

}
