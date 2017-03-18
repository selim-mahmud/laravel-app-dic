<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffProfileController extends Controller
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
     * StaffProfileController constructor.
     * @param Request $request
     * @param User $user
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function index()
    {
        return view('staff.staff_profile');
    }

    /**
     * change photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePhoto(){
        $this->validate($this->request, [
            'photo' => 'required|file|mimes:jpg,jpeg,bmp,png,gif|max:2048',
        ]);

        if ($this->request->file('photo')->isValid()) {
            $staff = $this->user->findorfail(Auth::user()->id);
            $photoName = $staff->id.'.'.$this->request->photo->extension();
            $path = $this->request->photo->storeAs(config('dic.default_avatar_path'), $photoName);
            $staff->profile_photo_url = $path;
            $staff->save();
            return redirect('staff')->with('alert-success', config('dic-message.change_photo_success'));
        }
        return redirect('staff')->with('alert-danger', config('dic-message.general_fail'));
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
        $staff = $this->user->findorfail(Auth::user()->id);
        $staff->name = $this->request->get('name');
        if($staff->save()){
            return redirect('staff')->with('alert-success', config('dic-message.change_learner_name_success'));
        }
        return redirect('staff')->with('alert-danger', config('dic-message.general_fail'));
    }

    /**
     * change display name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangeDisplayName()
    {
        $this->validate($this->request, [
            'display_name' => 'required|between:2,50',
        ]);
        $staff = $this->user->findorfail(Auth::user()->id);
        $staff->display_name = $this->request->get('display_name');
        if($staff->save()){
            return redirect('staff')->with('alert-success', config('dic-message.change_learner_display_name_success'));
        }
        return redirect('staff')->with('alert-danger', config('dic-message.general_fail'));
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
        $staff = $this->user->findorfail(Auth::user()->id);
        $staff->email = $this->request->get('email');
        if($staff->save()){
            return redirect('staff')->with('alert-success', config('dic-message.change_learner_email_success'));
        }
        return redirect('staff')->with('alert-danger', config('dic-message.general_fail'));
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
        $staff = $this->user->findorfail(Auth::user()->id);
        $staff->pass_key = Hash::make($this->request->get('password'));
        if($staff->save()){
            return redirect('staff')->with('alert-success', config('dic-message.change_password_success'));
        }
        return redirect('staff')->with('alert-danger', config('dic-message.general_fail'));
    }
}
