<?php

namespace App\Http\Controllers;

use App\Contracts\ActivityLoggerContract;
use App\School;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SchoolProfileController extends Controller
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var ActivityLoggerContract
     */
    protected $activityLogger;

    /**
     * @var School
     */
    protected $school;

    /**
     * SchoolProfileController constructor.
     *
     * @param Request $request
     * @param User $user
     * @param School $school
     * @param ActivityLoggerContract $activityLogger
     */
    public function __construct(Request $request, User $user, School $school, ActivityLoggerContract $activityLogger)
    {
        $this->request = $request;
        $this->user = $user;
        $this->school = $school;
        $this->activityLogger = $activityLogger;
    }

    public function getSchoolProfile()
    {
        return view('school.school_profile');
    }

    /**
     * change photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePhoto()
    {
        $this->validate($this->request, [
            'photo' => 'required|file|mimes:jpg,jpeg,bmp,png,gif|max:2048',
        ]);

        if ($this->request->file('photo')->isValid()) {
            $school = $this->school::findorfail(Auth::user()->school_id);
            $photoName = $school->id . '.' . $this->request->photo->extension();
            $path = $this->request->photo->storeAs(config('dic.default_avatar_path'), $photoName);
            $school->profile_photo_url = $path;
            $school->save();
            $this->activityLogger->detailActivitySave(
                'change_photo_success',
                $school,
                config('dic-message.change_photo_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('school/profile')->with('alert-success', config('dic-message.change_photo_success'));
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeName()
    {
        $this->validate($this->request, [
            'name' => 'required|between:3,50'
        ]);
        $schoolUser = $this->user::findorfail(Auth::user()->id);
        $schoolUser->name = $this->request->get('name');
        if ($schoolUser->save()) {
            $this->activityLogger->detailActivitySave(
                'change_scholl_name_success',
                $schoolUser,
                config('dic-message.change_learner_name_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('school/profile')->with('alert-success', config('dic-message.change_learner_name_success'));
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    public function postchangeSchoolName()
    {
        $this->validate($this->request, [
            'school_name' => 'required|between:3,50'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->name = $this->request->get('school_name');
        if ($school->save()) {
            $this->activityLogger->detailActivitySave(
                'change_school_name_success',
                $school,
                config('dic-message.change_school_name_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('school/profile')->with('alert-success', config('dic-message.change_school_name_success'));
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeEmail()
    {
        $this->validate($this->request, [
            'email' => 'required|email',
        ]);
        $schoolUser = $this->user::findorfail(Auth::user()->id);
        $schoolUser->email = $this->request->get('email');
        if ($schoolUser->save()) {
            $this->activityLogger->detailActivitySave(
                'change_school_email_success',
                $schoolUser,
                config('dic-message.change_learner_email_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('school/profile')->with('alert-success', config('dic-message.change_learner_email_success'));
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change password
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword(){
        $this->validate($this->request, [
            'password' => 'required|between:6,15|regex:/^[ A-Za-z0-9!@#$%&_-]*$/',
            'confirm_password' => 'required|same:password',
        ]);
        $schoolUser = $this->user::findorfail(Auth::user()->id);
        $schoolUser->pass_key = Hash::make($this->request->get('password'));
        if($schoolUser->save()){
            $this->activityLogger->detailActivitySave(
                'change_password_success',
                $schoolUser,
                config('dic-message.change_password_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('school/profile')->with('alert-success', config('dic-message.change_password_success'));
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change short description
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeShortDescription()
    {
        $this->validate($this->request, [
            'short_desc' => 'required|max:255'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->short_desc = $this->request->get('short_desc');
        if ($school->save()) {
            return redirect('school/profile')->with('alert-success', 'Short description has been set successfully.');
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change long description
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeLongDescription()
    {
        $this->validate($this->request, [
            'long_desc' => 'required|max:3000'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->long_desc = $this->request->get('long_desc');
        if ($school->save()) {
            return redirect('school/profile')->with('alert-success', 'Long description has been set successfully.');
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change website url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeWebsite()
    {
        $this->validate($this->request, [
            'website' => 'required|URL'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->website = $this->request->get('website');
        if ($school->save()) {
            return redirect('school/profile')->with('alert-success', 'Website url has been set successfully.');
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change facebook url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeFacebook()
    {
        $this->validate($this->request, [
            'facebook' => 'required|URL'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->facebook = $this->request->get('facebook');
        if ($school->save()) {
            return redirect('school/profile')->with('alert-success', 'Facebook url has been set successfully.');
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change twitter url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeTwitter()
    {
        $this->validate($this->request, [
            'twitter' => 'required|URL'
        ]);
        $school = $this->school::findorfail(Auth::user()->school_id);
        $school->twitter = $this->request->get('twitter');
        if ($school->save()) {
            return redirect('school/profile')->with('alert-success', 'Twitter url has been set successfully.');
        }
        return redirect('school/profile')->with('alert-danger', config('dic-message.general_fail'));
    }

}
