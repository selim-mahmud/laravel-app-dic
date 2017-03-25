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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15'
        ]);
        $contact = $this->schoolContact->create([
            'school_id' => Auth::user()->school_id,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($contact) {
            return redirect('/school/contacts')->with('alert-success', 'You have successfully added a contact.');
        }
        return redirect()->back()->with('alert-warning', 'Something wrong happened, please try again later.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->schoolContact->findOrfail(intval($id));
        if($contact->school_id !== Auth::user()->school_id){
            return redirect()->back();
        }
        return view('school.contacts.single', compact('contact'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolContact = $this->schoolContact->findOrfail(intval($id));
        if($schoolContact->school_id !== Auth::user()->school_id){
            return redirect()->back();
        }
        return view('school.contacts.update', compact('schoolContact'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request Request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15'
        ]);
        $contact = $this->schoolContact->findOrfail(intval($id));
        if($contact->school_id !== Auth::user()->school_id){
            return redirect()->back();
        }
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        if ($contact->save()) {
            return redirect('/school/contacts')->with('alert-success', 'You have successfully updated the contact.');
        }
        return redirect('/school/contacts')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->schoolContact->findOrfail(intval($id));
        if($contact->school_id !== Auth::user()->school_id){
            return redirect()->back();
        }
        if ($contact->delete()) {
            return redirect('/school/contacts')->with('alert-success', 'You have successfully deleted the instructor.');
        }
        return redirect('/school/contacts')->with('alert-warning', 'Something wrong happened, please try again later.');
    }
}
