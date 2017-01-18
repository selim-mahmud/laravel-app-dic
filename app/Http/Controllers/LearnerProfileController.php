<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\ContactEmail;
use App\Media;
use App\School;
use Auth;
use App\Helpers\General;

class LearnerProfileController extends Controller{

	public function __construct(){
        $this->middleware('learner', ['only' => ['getProfile']]);
    }
    
    public function getProfile(){
        $user = User::find(Auth::user()->user_id);
        $user_medias = $user->medias();
        $user_emails = $user->emails;
        $user_phones = $user->phones;
        $user_addresses = $user->addresses;
        return view('learner.learner_profile', compact('user', 'user_medias', 'user_emails', 'user_phones', 'user_addresses'));
    }

}
