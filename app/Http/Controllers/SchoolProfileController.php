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

class SchoolProfileController extends Controller{

    public function __construct(){
        $this->middleware('manager', ['only' => ['getProfile']]);
    }
    
    public function getSchoolProfile(){
        return view('school.school_profile');
    }

}
