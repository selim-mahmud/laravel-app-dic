<?php

namespace App\Http\Controllers;

use App\Contracts\ActivityLoggerContract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LearnerProfileController extends Controller
{

    protected $request;
    protected $user;
    protected $activityLogger;
    protected $learner;

    public function __construct(Request $request, User $user, ActivityLoggerContract $activityLogger)
    {
        $this->request = $request;
        $this->user = $user;
        $this->activityLogger = $activityLogger;
    }

    public function postChangePhoto(){
        $this->validate($this->request, [
            'photo' => 'required|file|mimes:jpg,jpeg,bmp,png,gif|max:2048',
        ]);

        if ($this->request->file('photo')->isValid()) {
            $learner = $this->user::findorfail(Auth::user()->id);
            $photoName = $learner->id.'.'.$this->request->photo->extension();
            $path = $this->request->photo->storeAs(config('dic.default_avatar_path'), $photoName);
            $learner->profile_photo_url = $path;
            $learner->save();
            return redirect('learner')->with('alert-success', config('dic-message.change_learner_name_success'));
        }
        return redirect('learner')->with('alert-danger', config('dic-message.general_fail'));
    }

    public function postChangeName()
    {
        $this->validate($this->request, [
            'name' => 'required|between:3,50'
        ]);
        $learner = $this->user::findorfail(Auth::user()->id);
        $learner->name = $this->request->get('name');
        if($learner->save()){
            $this->activityLogger->detailActivitySave(
                'change_learner_name_success',
                $learner,
                config('dic-message.change_learner_name_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('learner')->with('alert-success', config('dic-message.change_learner_name_success'));
        }
        return redirect('learner')->with('alert-danger', config('dic-message.general_fail'));
    }

    public function postChangeDisplayName()
    {
        $this->validate($this->request, [
            'display_name' => 'required|between:2,50',
        ]);
        $learner = $this->user::findorfail(Auth::user()->id);
        $learner->display_name = $this->request->get('display_name');
        if($learner->save()){
            $this->activityLogger->detailActivitySave(
                'change_learner_display_name_success',
                $learner,
                config('dic-message.change_learner_display_name_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('learner')->with('alert-success', config('dic-message.change_learner_display_name_success'));
        }
        return redirect('learner')->with('alert-danger', config('dic-message.general_fail'));
    }

    public function postChangeEmail()
    {
        $this->validate($this->request, [
            'email' => 'required|email',
        ]);
        $learner = $this->user::findorfail(Auth::user()->id);
        $learner->email = $this->request->get('email');
        if($learner->save()){
            $this->activityLogger->detailActivitySave(
                'change_learner_email_success',
                $learner,
                config('dic-message.change_learner_email_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('learner')->with('alert-success', config('dic-message.change_learner_email_success'));
        }
        return redirect('learner')->with('alert-danger', config('dic-message.general_fail'));
    }

    public function postChangePassword(){
        $this->validate($this->request, [
            'password' => 'required|between:6,15|regex:/^[ A-Za-z0-9!@#$%&_-]*$/',
            'confirm_password' => 'required|same:password',
        ]);
        $learner = $this->user::findorfail(Auth::user()->id);
        $learner->pass_key = Hash::make($this->request->get('password'));
        if($learner->save()){
            $this->activityLogger->detailActivitySave(
                'change_password_success',
                $learner,
                config('dic-message.change_password_success'),
                ['ip' => $this->request->ip()]
            );
            return redirect('learner')->with('alert-success', config('dic-message.change_password_success'));
        }
        return redirect('learner')->with('alert-danger', config('dic-message.general_fail'));
    }
}
