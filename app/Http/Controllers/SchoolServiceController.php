<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolHasService;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SchoolServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolServices = School::find(Auth::user()->school_id)->services;
        $services = Service::all();
        return view('school.services.index', compact('schoolServices', 'services'));
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
