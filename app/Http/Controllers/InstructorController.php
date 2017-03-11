<?php

namespace App\Http\Controllers;

use App\Helpers\MediaHelper;
use App\Http\Requests\InstructorRequest;
use App\Instructor;
use App\InstructorHasService;
use App\School;
use App\Service;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    protected $mediaHelper;

    public function __construct(MediaHelper $mediaHelper)
    {
        $this->mediaHelper = $mediaHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = School::find(Auth::user()->school_id)->instructors;
        return view('school.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('school.instructors.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorRequest $request)
    {
        $path = $this->mediaHelper->savePhoto('avatar', config('dic.instructor_avatar_path'));
        $instructor = Instructor::create([
            'school_id' => Auth::user()->school_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_photo_url' => $path,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        if ($instructor) {
            foreach ($request->services as $serviceId){
                InstructorHasService::create([
                    'instructor_id' => $instructor->id,
                    'service_id' => $serviceId,
                ]);
            }
            return redirect('/school/instructors')->with('alert-success', 'You have successfully added an instructor.');
        } else {
            return redirect()->back()->with('alert-warning', 'Something wrong happened, please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor = Instructor::find(intval($id));
        $services = $instructor->services;
        return view('school.instructors.single', compact('instructor', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::all();
        $instructor = Instructor::find(intval($id));
        $instructorServices = $instructor->services;
        $instructorServiceIds = [];
        foreach ($instructorServices as $instructorService){
            $instructorServiceIds[] = $instructorService->pivot->service_id;
        }
        if ($instructor) {
            return view('school.instructors.update', compact('instructor', 'services', 'instructorServiceIds'));
        }
        return redirect('/school/instructors')->with('alert-warning', 'Data you are looking for is not available.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorRequest $request, $id)
    {
        $instructor = Instructor::find(intval($id));
        if ($instructor) {
            $path = $this->mediaHelper->savePhoto('avatar', config('dic.instructor_avatar_path'));
            $instructor->name = $request->name;
            $instructor->email = $request->email;
            $instructor->phone = $request->phone;
            if($path != ''){
                $instructor->profile_photo_url = $path;
            }
            $instructor->short_desc = $request->short_desc;
            $instructor->long_desc = $request->long_desc;
            if ($instructor->save()) {
                $instructor->services()->detach();
                foreach ($request->services as $serviceId){
                    InstructorHasService::create([
                        'instructor_id' => $instructor->id,
                        'service_id' => $serviceId,
                    ]);
                }
                return redirect('/school/instructors')->with('alert-success', 'You have successfully updated the instructor.');
            }
            return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');

        }
        return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::find(intval($id));
        if ($instructor) {
            if ($instructor->delete()) {
                $instructor->services()->detach();
                return redirect('/school/instructors')->with('alert-success', 'You have successfully deleted the instructor.');
            }
            return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
        }
        return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
    }
}
