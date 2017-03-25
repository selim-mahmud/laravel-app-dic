<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolHasService;
use App\SchoolServiceArea;
use App\Service;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SchoolServiceAreaController extends Controller
{
    protected $schoolServiceArea;
    protected $state;

    public function __construct(SchoolServiceArea $schoolServiceArea, State $state)
    {
        $this->schoolServiceArea = $schoolServiceArea;
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
        $schoolServiceAreas = $this->schoolServiceArea->where('school_id', Auth::user()->school_id)->get();
        return view('school.service_area.index', compact('states', 'schoolServiceAreas'));
    }

    public function getPostcodes($state_id){
        $state = $this->state->findOrFail(intval($state_id));
        return $state->postcodes->pluck('id', 'suburb');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function saveServiceArea(Request $request)
    {
        $this->validate($request, [
            'state' => 'required|integer|min:1',
            'suburb' => 'required|array',
        ]);
        foreach ($request->suburb as $postcode_id){
            $schoolServiceArea = $this->schoolServiceArea->create([
                'school_id' => Auth::user()->school_id,
                'postcode_id' => $postcode_id,
            ]);
        }
        if ($schoolServiceArea) {
            return redirect('/school/service-area')->with('alert-success', 'You have successfully added service area.');
        }
        return redirect('/school/service-area')->with('alert-warning', 'Something wrong happened, please try again later.');

    }

    /**
     * delete a service area
     *
     * @param $serviceAreaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteServiceArea($serviceAreaId)
    {
        $schoolServiceArea = $this->schoolServiceArea->findOrfail(intval($serviceAreaId));
        if($schoolServiceArea->delete()){
            return redirect('/school/service-area')->with('alert-success', 'You have successfully deleted the service.');
        }
        return redirect('/school/service-area')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

}
