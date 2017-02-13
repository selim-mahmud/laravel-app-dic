<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;
use App\User;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    /**
     * @var $registrationContract RegistrationContract
     */
    protected $registrationContract;

    /**
     * RegistrationService constructor.
     * @param RegistrationContract $registrationContract
     */
    public function __construct(RegistrationContract $registrationContract)
    {
        $this->registrationContract = $registrationContract;
    }

    /**
     * register user as learner
     *
     * @param array $inputs
     * @return bool
     */
    public function registerAsLearner(array $inputs)
    {
        return $this->registrationContract->register($inputs, config('dic.learner_user_type_name'));
    }

    /**
     * register user as learner
     *
     * @param array $inputs
     * @return bool
     */
    public function registerAsSchool(array $inputs)
    {
        return $this->registrationContract->register($inputs, config('dic.school_user_type_name'));
    }

    /**
     * Return user if exists or create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    public function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        if (!isset($facebookUser->user_role)) {
            return 'not_registered';
        }

        if ($facebookUser->user_role == config('dic.learner_user_type_name')) { // register as learner
            // create learner
            $authUser = $this->createLearner($facebookUser);
        }

        if ($facebookUser->user_role == config('dic.school_user_type_name')) { // register as school
            //create school
            $authUser = $this->createSchool($facebookUser);
        }

        if ($authUser) {
            return $authUser;
        } else {
            return false;
        }
    }

    public function createLearner(array $facebookUser) : array
    {
        return User::create([
            'name' => $facebookUser->name,
            'display_name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'user_type' => config('dic.learner_user_type_name'),
            'status' => 'active'
        ]);
    }

    public function createSchool(array $facebookUser) : array
    {
        DB::beginTransaction();

        // insert into school table
        $school = School::create([
            'name' => $facebookUser->name,
        ]);

        // insert into user table
        $authUser = User::create([
            'school_id' => $school->id,
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'user_type' => config('dic.school_user_type_name'),
            'status' => 'active'
        ]);

        DB::commit();

        return $authUser;
    }
}