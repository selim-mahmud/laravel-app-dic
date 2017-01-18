<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable{
    
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['role_id', 'school_id', 'facebook_id', 'name', 'display_name', 'email', 'pass_key', 'is_active','reset_key'];
    protected $hidden = ['pass_key', 'reset_key'];

    public function getAuthPassword() {
        return $this->attributes['pass_key'];
    }
    
    public function role(){
        return $this->belongsTo('App\Role', 'role_id', 'role_id');
    }

    public function school(){
        return $this->belongsTo('App\School');
    }

    public function medias(){
        return $this->hasMany('App\Media', 'owner_id', 'user_id');
    }

    public function emails(){
        return $this->hasMany('App\ContactEmail', 'owner_id', 'user_id');
    }

    public function phones(){
        return $this->hasMany('App\ContactNumber', 'owner_id', 'user_id');
    }

    public function addresses(){
        return $this->hasMany('App\ContactAddress', 'owner_id', 'user_id');
    }

    public static function isAuthAdmin(){
        $auth_user = User::find(Auth::user()->user_id);
        if($auth_user->role()->first()->role_title == 'manager'){
            return true;
        }
        return false;
    }

    public static function isAuthManager(){
        $auth_user = User::find(Auth::user()->user_id);
        if($auth_user->role()->first()->role_title == 'manager'){
            return true;
        }
        return false;
    }

    public static function isAuthLearner(){
        $auth_user = User::find(Auth::user()->user_id);
        if($auth_user->role()->first()->role_title == 'learner'){
            return true;
        }
        return false;
    }

    public static function isAuthInstructor(){
        $auth_user = User::find(Auth::user()->user_id);
        if($auth_user->role()->first()->role_title == 'instructor'){
            return true;
        }
        return false;
    }

    public static function isActive($email){
        $user = User::where('email', '=', $email)->get();

        if($user[0]->is_active>=1){
            return true;
        }
        else{
            return false;
        }
    }

    public static function isAvailable($email){
        $user = User::where('email', '=', $email)->get();

        if(count($user)==0){
            return true;
        }
        else{
            return false;
        }
    }

}
