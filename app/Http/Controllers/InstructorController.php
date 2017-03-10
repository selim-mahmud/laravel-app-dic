<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorRequest;
use App\Instructor;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('school.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorRequest $request)
    {
        $path = '';
        if ($request->hasFile('photo')) {
            $photoName = 'avatar.' . $request->photo->extension();
            $path = $request->photo->storeAs(config('dic.instructor_avatar_path'), $photoName);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::find(intval($id));
        if ($instructor) {
            return view('school.instructors.update', compact('instructor'));
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
            $path = '';
            if ($request->hasFile('photo')) {
                $photoName = 'avatar.' . $request->photo->extension();
                $path = $request->photo->storeAs(config('dic.instructor_avatar_path'), $photoName);
            }
            $instructor->name = $request->name;
            $instructor->email = $request->email;
            $instructor->phone = $request->phone;
            if($path != ''){
                $instructor->profile_photo_url = $path;
            }
            $instructor->short_desc = $request->short_desc;
            $instructor->long_desc = $request->long_desc;
            if ($instructor->save()) {
                return redirect('/school/instructors')->with('alert-success', 'You have successfully updated the instructor.');
            } else {
                return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
            }
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
                return redirect('/school/instructors')->with('alert-success', 'You have successfully deleted the instructor.');
            } else {
                return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
            }
        }
        return redirect('/school/instructors')->with('alert-warning', 'Something wrong happened, please try again later.');
    }
}
