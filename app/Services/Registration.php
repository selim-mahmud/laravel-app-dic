<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:18 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;
use App\School;
use App\User;
use Illuminate\Support\Facades\Hash;

class Registration implements RegistrationContract
{
    const LEARNER_USER_TYPE_NAME = 'learner';
    const SCHOOL_USER_TYPE_NAME = 'school';

    /**
     * @var $user User
     */
    protected $user;

    /**
     * @var $school School
     */
    protected $school;

    /**
     * Registration constructor.
     * @param User $user
     */
    public function __construct(User $user, School $school)
    {
        $this->user = $user;
        $this->school = $school;
    }

    /**
     * {@inheritdoc}
     */
    public function register(array $inputs, string $userType)
    {
        if (self::LEARNER_USER_TYPE_NAME === $userType) {
            $this->user->name = $inputs['name'];
            $this->user->display_name = $inputs['display_name'];
            $this->user->email = $inputs['email'];
            $this->user->pass_key = Hash::make($inputs['password']);
        }

        if (self::SCHOOL_USER_TYPE_NAME === $userType) {
            $school = $this->school::create(['name' => $inputs['school_name']]);
            $this->user->name = $inputs['name'];
            $this->user->school_id = $school->id;
            $this->user->email = $inputs['email'];
            $this->user->pass_key = Hash::make($inputs['password']);
        }
        $this->user->user_type = $userType;

        return $this->user->save();
    }
}