<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = [];
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'exam_name' => 'required',
            'title' => 'required'
        ]);

        $subject = Subject::create([
            'exam_id' => $request->exam_name,
            'title' => $request->title
        ]);

        if ($subject) {
            return redirect('/control/subject')->with('alert-success', 'You have successfully created a subject.');
        } else {
            return redirect('/control/subject')->with('alert-warning', 'Something wrong happened creating a subject.');
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
        $subject = Subject::find(intval($id));
        if ($subject) {
            return view('control.subject.single', compact('subject'));
        }

        return redirect('/control/subject')->with('alert-warning', 'Data you are looking for is not available.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find(intval($id));
        if ($subject) {
            $exam = $subject->exam;
            $exams_object = DB::table('exam')->select('id', 'title')->get();
            $exams = \General::getOptionReady($exams_object, $exam);
            return view('control.subject.update', compact('subject', 'exams', 'exam'));
        }
        return redirect('/control/subject')->with('alert-warning', 'Data you are looking for is not available.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'exam_name' => 'required',
            'title' => 'required'
        ]);

        $subject = Subject::find(intval($id));

        if ($subject) {
            $subject->exam_id = $request->exam_name;
            $subject->title = $request->title;

            if ($subject->save()) {
                return redirect('/control/subject')->with('alert-success', 'You have successfully updated the subject.');
            } else {
                return redirect('/control/subject')->with('alert-warning', 'Something wrong happened updating the subject.');
            }
        }

        return redirect('/control/subject')->with('alert-warning', 'Data you are looking for is not available.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find(intval($id));
        if ($subject) {
            if ($subject->delete()) {
                return redirect('/control/subject')->with('alert-success', 'You have successfully deleted the subject.');
            } else {
                return redirect('/control/subject')->with('alert-warning', 'Something wrong happened while deleting the subject.');
            }
        }
        return redirect('/control/subject')->with('alert-warning', 'Data you are looking for is not available.');
    }
}
