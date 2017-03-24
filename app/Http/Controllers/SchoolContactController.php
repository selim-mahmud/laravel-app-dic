<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SchoolContactController extends Controller
{
    protected $school;
    protected $schoolContact;

    public function __construct(SchoolContact $schoolContact, School $school)
    {
        $this->schoolContact = $schoolContact;
        $this->school = $school;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->school->find(Auth::user()->school_id)->contacts;
        return view('school.contacts.index', compact('contacts'));
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
        if ($contact->delete()) {
            return redirect('/school/contacts')->with('alert-success', 'You have successfully deleted the instructor.');
        }
        return redirect('/school/contacts')->with('alert-warning', 'Something wrong happened, please try again later.');
    }
}
