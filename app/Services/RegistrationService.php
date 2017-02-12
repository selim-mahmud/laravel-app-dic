<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 9/02/2017
 * Time: 7:17 PM
 */

namespace App\Services;

use App\Contracts\RegistrationContract;

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
    public function registerAsLearner(array $inputs){
        return $this->registrationContract->register($inputs, config('dic.learner_user_type_name'));
    }

    /**
     * register user as learner
     *
     * @param array $inputs
     * @return bool
     */
    public function registerAsSchool(array $inputs){
        return $this->registrationContract->register($inputs, config('dic.school_user_type_name'));
    }
}